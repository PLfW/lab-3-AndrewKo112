<?php
$institution = $params["institution"]; 
$author = User::find($institution["account_id"]); 
$canEdit = $_SESSION["user"] && $_SESSION["user"]["permissions"] != "account" || $institution["account_id"] == $_SESSION["user"]["id"];
?>
<section class="container">
	<section class="col-sm-4">
		<h3><?php echo $institution["name"]."<br>"; ?></h3>
		<section class="content-block">
			<?php echo "<strong>Місто:</strong> ".$institution["city"]."</br>";
			echo "<strong>Адреса:</strong> ".$institution["address"]."</br>";
			echo "<strong>Тип:</strong> ".Institution::type_to_ukr($institution["type"])."</br>";
			echo "<strong>Графік роботи:</strong> ".$institution["work_shedule"]."</br>";
			echo "<strong>Дата реєстрації:</strong> ".date("j-n-Y", strtotime($institution["created_at"]))."</br>";
			echo "<strong>Автор:</strong> ".User::link_to($author).($_SESSION["user"]["id"] == $institution["account_id"] ? " (це Ви)" : "")."</br>";
			echo "<h3>Ціни</h3>";
			if ($institution["hour_price"] != 0)
				echo "<strong>Година оренди: </strong> ".$institution["hour_price"]."</br>";
			if ($institution["day_price"] != 0)
				echo "<strong>Доба оренди: </strong> ".$institution["day_price"]."</br>";
			if ($institution["subscription_price"] != 0)
				echo "<strong>Місячний абонемент: </strong> ".$institution["subscription_price"]." грн"."</br>";
			if ($canEdit) {
				echo "<hr>";
				echo '<a href="edit_institution?id='.$institution["id"].'" class="link"><span class="glyphicon glyphicon-edit"></span> Редагувати</a>';
				echo "<hr>";
				echo '<a href="delete_institution?id='.$institution["id"].'" class="link"><span class="glyphicon glyphicon-remove"></span> Видалити</a>';
			}
			?>
		</section>
	</section>
	<section class="col-sm-8">
		
			<?php $posts = Post::where("institution_id=".$institution["id"])->take();
			if (count($posts) > 0) { ?>
				<h3>Записи:</h3>
				<div class="posts-block">
					<div class="row data-row" id="posts">
						<?php
							foreach ($posts as $key => $posts) {
								echo Post::to_html($posts, $canEdit);
							}
						?>
					</div>
				</div>
			<?php } else {
				echo "<h3>Записів ще немає</h3>";
			} ?>
			
		<?php if ($canEdit) {
			echo '<button class="btn btn-primary" data-toggle="collapse" data-target="#post-form"><span class="glyphicon glyphicon-plus"></span> Додати</button>';
		} ?>
		<hr>
		<form id="post-form" action="/add_post" method="POST" class="collapse">
			<input type="text" name="post[title]" class="form-control" placeholder="Тема">
			<textarea id="post" name="post[post]" class="form-control" placeholder="Текст запису"></textarea>
			<input type="hidden" name="post[institution_id]" value="<?php echo $institution['id'] ?>">
			<button id="post-submit" class="btn btn-primary" data-toggle="collapse" data-target="#post-form">Надіслати</button>
		</form>

		<h3>Відгуки:</h3>
			<div class="posts-block">
				<div class="row data-row" id="rates">
					<?php $rates = Rating::where("institution_id=".$institution["id"])->take();
					if (count($rates) > 0) { ?>
						<?php
							foreach ($rates as $key => $rating) {
								$canRemove = $_SESSION["user"]["permissions"] != "account" || $rating["account_id"] == $_SESSION["user"]["id"];
								echo Rating::to_html($rating, $canRemove);
							}
						?>
					<?php } else {
						echo "<h3>Відгуків ще немає</h3>";
					} ?>
				</div>
			</div>
		<?php if ($canEdit) {
			echo '<button class="btn btn-primary" data-toggle="collapse" data-target="#rating-form"><span class="glyphicon glyphicon-pencil"></span> Написати відгук</button>';
		} ?>
		<hr>
		<form id="rating-form" class="collapse">
			<textarea id="post" name="rating[comment]" class="form-control" placeholder="Відгук"></textarea>
			<input type="hidden" name="rating[institution_id]" value="<?php echo $institution['id'] ?>">
			<button id="rating-submit" class="btn btn-primary" data-toggle="collapse" data-target="#rating-form">Надіслати</button>
		</form>
	</section>
</section>

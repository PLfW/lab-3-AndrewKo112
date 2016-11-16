<section class="container">
	<section class="jumbotron content-block">
		<h1>Спорт Регістр</h1>
		<h2>Тренуймося разом</h2>
	</section>
	<h3>Нові заклади:</h3>
	<section class="main row">
		<?php foreach ($params["last_institutions"] as $key => $value) {
			echo Institution::to_html($value);
		} ?>
	</section>
</section>


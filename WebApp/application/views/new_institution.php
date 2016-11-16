<section class="container">
	<form id="institution-form" class="thin-form center-block content-block">
		<?php if ($params["edit"]) {
			echo "<h2>Редагування закладу</h2>";
			echo '<input type="hidden" name="id" value="'.$params["institution"]["id"].'" id="id">';
		} else 
			echo "<h2>Додавання нового закладу</h2>";
		?>
		<hr>
			<input type="text" id="name" name="institution[name]" placeholder="Назва" class="form-control input-lg" 
					data-toggle="popover" data-trigger="hover" data-placement="right" data-content="">
			<input type="text" id="city" name="institution[city]" placeholder="Населений пункт" class="form-control input-lg" 
					data-toggle="popover" data-trigger="hover" data-placement="right" data-content="">
			<input type="text" id="address" name="institution[address]" placeholder="Адреса" class="form-control input-lg" 
					data-toggle="popover" data-trigger="hover" data-placement="right" data-content="">
			<div class="form-group">
				<label for="type">Тип закладу</label>
				<select class="form-control input-lg" id="type" name="institution[type]">
					<option value="gym">Тренажерний зал</option>
					<option value="stadium">Стадіон</option>
					<option value="fitness">Фітнес</option>
					<option value="sports_complex">Спортивний комплекс</option>
					<option value="pool">Басейн</option>
				</select>
			</div>
			<input type="text" id="work_shedule" name="institution[work_shedule]" placeholder="Час роботи" class="form-control input-lg"
					data-toggle="popover" data-trigger="hover" data-placement="right" data-content="">
			<input type="number" id="hour_price" name="institution[hour_price]" placeholder="Вартість годинної оренди" 
					class="form-control input-lg" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="">
			<input type="number" id="day_price" name="institution[day_price]" placeholder="Вартість денної оренди" 
					class="form-control input-lg" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="">
			<input type="number" id="subscription_price" name="institution[subscription_price]" placeholder="Вартість місячного абонементу" 
					class="form-control input-lg" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="">
		<div id="new-institution-submit" class="btn btn-primary btn-block btn-lg">Надіслати</div>
		<section id="errors" class="thin-form center-block"></section>
	</form>
</section>
<?php if ($params["edit"]) {
	echo '<script>edit(\''.str_replace("\"", "\\\"",  json_encode($params["institution"])).'\');</script>';
} ?>
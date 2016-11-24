<?php
class Institution extends Model
{
	protected static $table_name = "institution";

	public static function to_html ($institution) {
		$user = User::find($institution["account_id"]);
		return '
			<article class="col-sm-6">
				<div class="institution data-block">
					<a href="institution?id='.$institution["id"].'" class="link">
					<strong>'.$institution["name"].'</strong>
					</a><br>
					'.static::type_to_ukr($institution["type"]).'
					<br>
					'.$institution["city"].'
					<br>
				<section class="bicycle">
						'.User::link_to($user).'</section>
				</div>
			</article>
		';
	}

	public static function type_to_ukr ($type) {
		switch ($type) {
			case 'gym':
				return 'Тренажерний зал';
			case 'stadium':
				return 'Стадіон';
			case 'fitness':
				return 'Фітнес-Клуб';
			case 'sports_complex':
				return 'Спортивний комплекс';
			case 'pool':
				return 'Басейн';
			default:
				# code...
				break;
		}
	}
}
?>
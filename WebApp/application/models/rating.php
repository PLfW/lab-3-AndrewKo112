<?php
class Rating extends Model
{
	protected static $table_name = "rating";

	public static function to_html ($rating, $canEdit = false) {
		return '<article class="post data-block">
				<section class="col-xs-8 post-top-left">
					<strong>'.User::link_to(User::find($rating["account_id"])).'</strong><br>
				</section>
				<section class="col-xs-4 post-top-right">
					<em class="small-text">'.date("j-n-Y", strtotime($rating["created_at"])).'</em>'.($canEdit ? '<button class="btn btn-close rating-rm-btn" value="'.$rating["id"].'"><span class="glyphicon glyphicon-remove-circle"></span></button>' : '').
				'</section><br><hr>'.$rating["comment"].'
		</article>';
	}
}
?>
<?php
class Post extends Model
{
	protected static $table_name = "post";

	public static function to_html ($post, $canEdit = false) {
		return '<article class="post data-block">
			<section class="post-top">
				<section class="col-xs-8 post-top-left">
					<strong>'.$post["title"].'</strong><br>
				</section>
				<section class="col-xs-4 post-top-right">
					<em>'.date("j-n-Y", strtotime($post["created_at"])).'</em>'.($canEdit ? '<button class="btn btn-secondary post-rm-btn btn-close" value="'.$post["id"].'"><span class="glyphicon glyphicon-remove-circle"></span></button>' : '').
				'</section>
			</section>
			<hr>'.$post["post"].'
		</article>';
	}
}
?>
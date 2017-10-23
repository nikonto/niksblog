<?php
/*

Template Name: Special Template

*/
get_header();
	if (have_posts()) :
		while (have_posts()) : the_post() ?>

		<article class=" spage">
		<h2> <a><?php the_title(); ?></a></h2>
		<!--info box-->
		<div class="info-box">
			<h4>Info-Box</h4>
			<p>
			This Blog is only knowledge base about incredable world of Computing.
			</p>
		</div><!--info box-->
		<?php the_content(); ?>	 
	</article>

	<?php endwhile;
	else :

		echo "no content found";

	endif;
get_footer();
?>
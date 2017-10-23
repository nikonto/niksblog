<?php

	get_header();?>
	<h2>
		Search result for: <?php the_search_query();?>
	</h2>
	<?php
	if (have_posts()) :
		while (have_posts()) : the_post();
			get_template_part('content',get_post_format());

	 endwhile;
	 echo paginate_links();
	else :



	endif;
	get_footer();

?>
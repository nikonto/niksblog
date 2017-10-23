<?php

	get_header();
	if (have_posts()) :
		?>

		<h2>
			<?php 
				if(is_category()){
					single_cat_title();
				}
				elseif (is_tag()) {
					# code...
					single_tag_title();
				}
				elseif (is_author()) {
					# code...
					the_post();
					echo 'Author Archive: ' . get_the_author();
					rewind_posts();
				}
				elseif (is_day()) {
					# code...
					echo 'Daily Archive: ' . get_the_date();
				}
				elseif (is_month()) {
					# code...
					echo 'Monthly Archive: ' . get_the_date('F Y');
				}
				elseif (is_year()) {
					# code...
					echo 'Yearly Archive: ' . get_the_date('Y');
				}
				else{
					echo "Archive";
				}
			?>
		</h2>
		<?php
		while (have_posts()) : the_post() ;
			
			get_template_part('content', get_post_format());
   		 endwhile;
   		 echo paginate_links();
		else :



		endif;
		get_footer();

?>
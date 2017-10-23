<?php

	get_header();?>
	<!--site content-->
	<div class="site-content clearfix">
		 <?php if (have_posts()) :
		while (have_posts()) : the_post() ;
		
		the_content();
	     endwhile;
	     else :

		echo '<p>no content found</p>';

	    endif;?>
	    <!--home-coloumn-->
	    <div class="home-columns clearfix">
	    	<!--one half-->
	    	<div class="one-half">
	             <?php  // opinion loops begins here.
	               $animalPost = new WP_Query('cat=6&posts_per_page=2');
		           if ($animalPost->have_posts()) :
		           while ($animalPost->have_posts()) : $animalPost->the_post() ;?>
		
		           <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		           <?php the_post_thumbnail('small-thumbnails');?>
		           <?php the_excerpt();?>
	             <?php endwhile;
	             else :

		      echo '<p>no content found</p>';

	       endif;
	          wp_reset_postdata();?>
	    	</div><!--one half-->
			
	    	<!--second half-->
	    	<div class="one-half last">
	    		
                <?php //Business Categary

	     $businessPost = new WP_Query('cat=8&posts_per_page=2');
		 if ($businessPost->have_posts()) :
		while ($businessPost->have_posts()) : $businessPost->the_post() ;?>
		
		<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		<?php the_post_thumbnail('small-thumbnails');?>
		<?php the_excerpt();?>
	    <?php endwhile;
	     else :

		echo '<p>no content found</p>';

	    endif;
	    wp_reset_postdata();

	    ?>
	           
	    	</div><!--second half-->

	    </div><!--home-coloumn-->

	</div><!--site content-->
	
	<?php get_footer();

?>
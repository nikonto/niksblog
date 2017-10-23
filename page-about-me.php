<?php
get_header();
	if (have_posts()) :
		while (have_posts()) : the_post() ?>

			<article class="post page">
				<?php
					if(has_children() OR $post->post_parent>0) {?>

				
				<nav class="site-nav children-links clearfix">
					<span class="parent-link">
						<a href="<?php /*get_the_permalink(get_top_ancestor_id());*/?>">
						<?php echo get_the_title(get_top_ancestor_id());?>
						</a>
					</span>
					<ul>
					<?php
						$args = array(
						'child_of' => get_top_ancestor_id(),
						'title_li' => ''
						);
					?>
					<?php wp_list_pages($args);?>
					</ul>
				</nav>
				<?php } ?>
				<h2> <a><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
			</article>


	<?php endwhile;
	else :

		echo "no content found";

	endif; ?>

	<h1>Result Posts Animal</h1>

	<?php 
	$ourCurrentPage = get_query_var('paged');
	$aboutAnimal = new WP_Query(array(

		'category_name' => 'Animal',
		'posts_per_page' => 2, 
		'paged' => $ourCurrentPage
	));

	if($aboutAnimal->have_posts()) :
		while($aboutAnimal->have_posts()) :
			$aboutAnimal->the_post();
			?>

		<li>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</li>

	<?php 
	endwhile;
	//if it is front page then use page insted of paged.
	/*previous_posts_link();
	next_posts_link('Next page', $aboutAnimal->max_num_pages);*/
	echo paginate_links(array(
		'total' => $aboutAnimal->max_num_pages 
	));
	endif;

	?>

	<?php
get_footer();
?>



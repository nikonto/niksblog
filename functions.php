
<?php

	// Including stylesheet
	
	function niksBlog_resource()
	{
        
		wp_enqueue_style('style',get_stylesheet_uri());
        
	}

	add_action('wp_enqueue_scripts','niksBlog_resource');


	//Navigation menu location we included

		register_nav_menus(array(
		'primary' => __('Primary Menu'),
		//'footer' => __('Footer Menu'),
	));

	//children menus
	function get_top_ancestor_id()
	{
		global $post;
		if($post->post_parent)
		{
			$ancestors=array_reverse(get_post_ancestors($post->ID));
			return $ancestors[0];

		}

		else
		{
			return $post->ID;
		}
		
	}

	//Does page have children

	function has_children()
	{
		global $post;
		$pages = get_pages('child_of='.$post->ID);
		return count($pages);
	}


	//Excerpt links

	function custome_excerpt_length(){
		return 25;
	}

	add_filter('excerpt_length','custome_excerpt_length');


	//Theme setup
	function feature_image()
	{
		//Navigation menu location we included

		//register_nav_menus(array(
		//'primary' => __('Primary Menu'),
		//'footer' => __('Footer Menu'),
	//));
		
		//Add feature image support

		add_theme_support('post-thumbnails');
		add_image_size('small-thumbnails',180,120,true);
		add_image_size('banner-image',1050,210,true);


		//Add post format support

		add_theme_support('post-formats',array('aside','gallery','link'));

	}

	add_action('after_setup_theme','feature_image');

	//widget area

	function widgetArea()
	{
		register_sidebar(array(
			'name' => 'Sidebar',
			'id' => 'sidebar1'
		));

		register_sidebar(array(
			'name' => 'Footer Area 1',
			'id' => 'footer1',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="my-special-class">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => 'Footer Area 2',
			'id' => 'footer2',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="my-special-class">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => 'Footer Area 3',
			'id' => 'footer3',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="my-special-class">',
			'after_title' => '</h4>'
		));
		register_sidebar(array(
			'name' => 'Footer Area 4',
			'id' => 'footer4'
		));
	}
	
	add_action('widgets_init','widgetArea');


	//customize apperance option

	function niksblog_customize_register($wp_customize){

		$wp_customize->add_setting('nb_link_color',array(

			'default' => '#006ec3',
			'transport' => 'refresh',

		));

		$wp_customize->add_setting('nb_btn_color',array(

			'default' => '#006ec3',
			'transport' => 'refresh',

		));

		$wp_customize->add_section('nb_standard_colors',array(

			'title' => __('Standard Colors','niksblog'),
			'priority' => 30,

		));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nb_link_color_control', array(


			'label' => __('Link Color', 'niksblog'),
			'section' => 'nb_standard_colors',
			'settings' => 'nb_link_color',

		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nb_btn_color_control', array(


			'label' => __('Button Color', 'niksblog'),
			'section' => 'nb_standard_colors',
			'settings' => 'nb_btn_color',

		)));

	}

	add_action('customize_register','niksblog_customize_register');


	//output customize css

	function nb_customize_css()
	{?>

		<style type="text/css">
			a:link,
			a:visited{
				color: <?php echo get_theme_mod('nb_link_color');?>;
			}

			.site-header nav ul li.current-menu-item a:link,
			.site-header nav ul li.current-menu-item a:visited,
			.site-header nav ul li.current-page-ancestor a:link,
			.site-header nav ul li.current-page-ancestor a:visited{
				background-color: <?php echo get_theme_mod('nb_link_color');?>;
			}

			
		</style>

	<?php }

	add_action('wp_head','nb_customize_css');



	//add footer callout section to admin apperance customize screen

	function nb_footer_callout($wp_customize)
	{
		$wp_customize->add_section('nb-footer-callout-section',array(

			'title' => 'Footer Callout',
		));

		//////////////////////////////

		$wp_customize->add_setting('nb-footer-callout-display',array(

			'default' => 'No',


		));
	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'nb-footer-callout-display-control', array(


			'label' => 'Display this section?',
			'section' => 'nb-footer-callout-section',
			'settings' => 'nb-footer-callout-display',
			'type' => 'select',
			'choices' => array('No' => 'No', 'Yes' => 'Yes')
		)));
////////////////////////////////////////////////
		$wp_customize->add_setting('nb-footer-callout-headline',array(

			'default' => 'Example headline text',


		));
	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'nb-footer-callout-headline-control', array(


			'label' => 'Headline',
			'section' => 'nb-footer-callout-section',
			'settings' => 'nb-footer-callout-headline',

		)));



		$wp_customize->add_setting('nb-footer-callout-text',array(

			'default' => 'Example paragraph text',


		));
	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'nb-footer-callout-text-control', array(


			'label' => 'Text',
			'section' => 'nb-footer-callout-section',
			'settings' => 'nb-footer-callout-text',
			'type' => 'textarea',

		)));

////////////////////////////////////////////////

		$wp_customize->add_setting('nb-footer-callout-link');
	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'nb-footer-callout-link-control', array(


			'label' => 'Link',
			'section' => 'nb-footer-callout-section',
			'settings' => 'nb-footer-callout-link',
			'type' => 'dropdown-pages',

		)));

		///////////////////////////////////////

		$wp_customize->add_setting('nb-footer-callout-image');
	

		$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'nb-footer-callout-image-control', array(


			'label' => 'Image',
			'section' => 'nb-footer-callout-section',
			'settings' => 'nb-footer-callout-image',
			'width' => 750,
			'height' => 500,

		)));

	}
	add_action('customize_register','nb_footer_callout');
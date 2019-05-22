<?php 
// Call the function
function enqueue(){
  //register scripts
      //Bootstrap (global)
      wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', NULL, '3.3.4');

      //Fancybox
      wp_register_script('fancybox2', get_stylesheet_directory_uri().'/js/source/jquery.fancybox.js', NULL, '2.1.4');

  //enqueue global scripts
  wp_enqueue_script(array('jquery','bootstrap'));

  //register styles
      //Bootstrap Core CSS (global)
      wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', NULL, '3.3.4');
      
      //Theme stylesheet
      wp_register_style('styles', get_stylesheet_directory_uri().'/style.css', NULL, NULL);
      
      //Fancybox CSS
      wp_register_style('fancybox2', get_stylesheet_directory_uri().'/js/source/jquery.fancybox.css', NULL, '2.1.4');

  //enqueue global styles
  wp_enqueue_style(array('bootstrap','styles'));

//Conditional styles for fancybox pop-up on template page inside a folder 'page-templates'
	if (is_page_template('page-templates/gallery.php')){
		wp_enqueue_style('fancybox2');
		wp_enqueue_script('fancybox2');
	}

}
// Hook into the WordPress Function
add_action('wp_enqueue_scripts', 'enqueue');

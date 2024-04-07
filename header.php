<!DOCTYPE html>
<html lang="en">
<head>
  <?php wp_head(); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo get_bloginfo( 'name' ); ?></title>
</head>
<body <?php body_class(); ?>>
  <main class="container">
  <header class="d-flex justify-content-between">
    <a href="<?php echo get_home_url(); ?>">
      <figure>
        <img src="<?php echo get_template_directory_uri(); ?>/public/images/jellicate.jpg" width="50" alt="logo">
      </figure>
    </a>
    <nav>
      <?php wp_nav_menu(array(
        'menu' => 'header_menu',
        'menu_class' => 'header-menu'
      ));?>
    </nav>
  </header>

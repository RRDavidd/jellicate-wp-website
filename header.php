<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-JYFKVKCVRY"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-JYFKVKCVRY');
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<?php bloginfo( 'charset' ); ?>" >
  <title><?php echo get_bloginfo( 'name' ); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#1d1d1d">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">
  <meta name="format-detection" content="telephone=no">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
  $home_id = 10;
  $banner_text = get_field('banner_text', $home_id);

?>
  <div class="header-banner1">
    <?php echo $banner_text ? $banner_text : "Welcome To Jellicate Nailz!"?>
  </div>
  <main class="main-body container">
    <header class="d-flex justify-content-between align-items-center">
      <a class="header-logo-1" href="<?php echo get_home_url(); ?>">
        <figure>
          <img src="<?php echo get_template_directory_uri(); ?>/public/images/logo.png" width="50" alt="logo">
        </figure>
      </a>
      <a class="header-logo-2" href="<?php echo get_home_url(); ?>">
        <figure>
          <img src="<?php echo get_template_directory_uri(); ?>/public/images/jellicate-text.png" width="200" alt="logo">
        </figure>
      </a>
      <nav class="desktop-menu">
      <!-- Need to use walker for cart number -->
      <?php
        class Cart_Walker extends Walker_Nav_Menu {
          function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
              global $wp_query;
              $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

              $class_names = $value = '';

              $classes = empty( $item->classes ) ? array() : (array) $item->classes;

              $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
              $class_names = ' class="' . esc_attr( $class_names ) . '"';

              if( $item->title === 'Cart' ) {
                $output .= $indent . '<li id="cart-nav-item" class="menu-item-' . $item->ID . '"' . $value . $class_names .'>';
              } else {
                  $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
              }

              $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
              $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
              $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
              $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

              $item_output = $args->before;
              $item_output .= '<a'. $attributes .'>';
              $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );

              // Add cart count if this is the cart menu item
              if( $item->title === 'Cart' ) {
                  $cart_count = WC()->cart->get_cart_contents_count();
                  $item_output .= $cart_count > 0 ? '<span class="cart-count">' . $cart_count . '</span>' : '';
              }

              $item_output .= $args->link_after . '</a>';
              $item_output .= $args->after;

              $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
        }

          // Use our custom walker
          wp_nav_menu(array(
              'menu' => 'Header Menu',
              'menu_class' => 'header-menu',
              'walker' => new Cart_Walker()
          ));
          //search
        ?>
      </nav>
      <!-- burger menu -->
      <div class="burger-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
        <nav class="mobile-menu">
          <?php
            wp_nav_menu(array(
                'menu' => 'Header Menu',
                'menu_class' => 'header-menu',
                'walker' => new Cart_Walker()
            ));
          ?>
        </nav>
      </div>
      <!-- mobile menu -->
    </header>

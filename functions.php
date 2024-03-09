<?php

//enqueue scripts and styles
function enqueue_scripts_and_stylesheets() {


}

//make post editor classic editor
add_filter('use_block_editor_for_post', '__return_false', 10);


//enable featured image for posts
add_theme_support('post-thumbnails');


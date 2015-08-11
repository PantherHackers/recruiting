<?php 

function register_menu(){

    register_nav_menus(array(
        'primary' => 'Primary Menu'
    ));

    register_nav_menus(array(
        'footer' => 'Footer Menu'
    ));
}
add_action('init', 'register_menu');

function time_since($dateString){
	$date = new DateTime($dateString); 
  	echo $date->diff(new DateTime())->format("%a days %h hours ago");
}
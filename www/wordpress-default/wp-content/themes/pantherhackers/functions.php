<?php 

function register_menus(){

    register_nav_menus(array(
        'primary' => 'Primary Menu'
    ));

    register_nav_menus(array(
        'footer' => 'Footer Menu'
    ));
}
add_action('init', 'register_menus');

function register_custom_post_types(){
	register_post_type('Event', array(
		'label' => 'Events',
		'public' => false,
		'show_ui' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'has_archive' => true
	));
}
add_action('init', 'register_custom_post_types');

function register_meta_boxes() {
    add_meta_box( 'event_meta_box',
		__( 'Event Info', 'myplugin_textdomain' ),
		'event_meta_box_content',
		'Event',
		'normal',
		'high'
    );
}
add_action( 'add_meta_boxes', 'register_meta_boxes' );

function event_meta_box_content($post){
	wp_nonce_field( plugin_basename( __FILE__ ), 'events_info_box_content_nonce' );
	
	// couldn't we create a 'templates' folder, extract the html to a file there, and then import the file here?
	echo '<label for="event_month">Month:</label> ';
	echo '<input type="text" id="event_month" name="event_month" placeholder="ex: February" value="'.get_post_meta($post->ID, "month", true).'" />';
	
	echo '<br /><br />';
	
	echo '<label for="event_date">Date:</label> ';
	echo '<input type="text" id="event_date" name="event_date" placeholder="ex: 22" value="'.get_post_meta($post->ID, "date", true).'" />';
	
	echo '<br /><br />';
	
	echo '<label for="event_start_time">Start Time: </label> ';
	echo '<input type="text" id="event_start_time" name="event_start_time" placeholder="ex: 11:00 am" value="'.get_post_meta($post->ID, 'start_time', true).'"/>';
	
	echo '<br /><br />';
	
	echo '<label for="event_end_time">End Time: </label> ';
	echo '<input type="text" id="event_end_time" name="event_end_time" placeholder="12:30 pm" value="'.get_post_meta($post->ID, 'end_time', true).'"/>';
	
	echo '<br /><br />';
	
	echo '<label for="event_location">Location: </label> ';
	echo '<input type="text" id="event_location" name="event_location" placeholder="1234 Awesome Street. Atlanta Ga. 30303" value="'.get_post_meta($post->ID, 'location', true).'"/>';
	
}

function event_info_box_save( $post_id ) {
	// if the first isn't set, why would the others be?	
	if($_POST && isset($_POST['event_month'])){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
		
		if (isset($_POST['events_info_box_content_nonce']) && !wp_verify_nonce( $_POST['events_info_box_content_nonce'], plugin_basename( __FILE__ ) ) )
		return;
		
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ) )
			return;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ) )
			return;
		}
		
		update_post_meta( $post_id,'month', $_POST['event_month']);
		update_post_meta( $post_id,'date', $_POST['event_date']);
		update_post_meta( $post_id,'start_time', $_POST['event_start_time']);
		update_post_meta( $post_id,'end_time', $_POST['event_end_time']);
		update_post_meta( $post_id,'location', $_POST['event_location']);	
	}
		
}
add_action( 'save_post', 'event_info_box_save' );

function time_since($dateString){
	$date = new DateTime($dateString); 
  	echo $date->diff(new DateTime())->format("%a days %h hours ago");
}

function dd($exp){
	die(var_dump($exp));
}
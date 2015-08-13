<?php 

function setup(){
	add_theme_support('post-thumbnails', array('post', 'page'));
}

add_action('init', 'setup');

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
	
	register_post_type("Member", array(
		'label' => 'Members',
		'public' => false,
		'show_ui' => true,
		'show_in_admin_bar' => true,
		'supports' => array(''),
		'menu_position' => 5
	));
}
add_action('init', 'register_custom_post_types');

function register_meta_boxes() {
    add_meta_box( 'event_meta_box',
		__( 'Event Info', 'domain' ),
		'event_meta_box_content',
		'Event',
		'normal',
		'high'
    );
	
	add_meta_box('member_meta_box',
		__('Member Info', 'domain'),
		'member_meta_box_content',
		'Member',
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

function member_meta_box_content($post){
	echo "<label> Name: </label>";
	echo "<p><b>".get_post_meta($post->ID, 'name', true).'</b></p>';
	
	echo "<label> Panther ID: </label>";
	echo "<p><b>".get_post_meta($post->ID, 'panther_id', true).'</b></p>';
	
	echo "<br />";
	
	echo "<label> Programming Experience: </label>";
	echo "<p><b>".get_post_meta($post->ID, 'experience', true).'</b></p>';
	
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
		
		update_post_meta( $post_id, 'month' , $_POST['event_month']);
		update_post_meta( $post_id, 'date' , $_POST['event_date']);
		update_post_meta( $post_id, 'start_time' , $_POST['event_start_time']);
		update_post_meta( $post_id, 'end_time' , $_POST['event_end_time']);
		update_post_meta( $post_id, 'location' , $_POST['event_location']);	
	}
		
}
add_action( 'save_post', 'event_info_box_save' );

function member_save(){
	if (!wp_verify_nonce( $_POST['member_save_content_nonce'], 'secretkeywordissecretkeywordpantherhackers') )
		return;
		
	$name = sanitize_text_field($_POST['user_name']);
	$panther_id = sanitize_text_field($_POST['panther_id']);
	$experience = sanitize_text_field(@$_POST['experience']);
	
	if(empty($name))
		return array('error' => "Please fill in your name.");
		
	if(empty($panther_id))
		return array('error' => "Please fill in your panther id.");
		
	if(empty($experience))
		return array('error' => "Please fill in your experience.");
		
	global $user_ID;
	$new_post = array(
		'post_title' => $name,
		'post_content' => '',
		'post_status' => 'publish',
		'post_date' => date('Y-m-d H:i:s'),
		'post_author' => $user_ID,
		'post_type' => 'Member'
	);
	
	$post_id = wp_insert_post($new_post);
	update_post_meta($post_id, 'name', $name);
	update_post_meta($post_id, 'panther_id', $panther_id);
	update_post_meta($post_id, 'experience', $experience);
	
	return array('success' => 'Thanks for signing up!');
}

function time_since($dateString){
	$date = new DateTime($dateString); 
  	echo $date->diff(new DateTime())->format("%a days %h hours ago");
}

function dd($exp){
	die(var_dump($exp));
}
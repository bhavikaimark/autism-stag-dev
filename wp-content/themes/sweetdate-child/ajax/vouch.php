<?php

include('../../../../wp-config.php');

global $wpdb;


    $userName = $_POST['userName'];
    $str = substr($userName, 1);
   
  	// $user = get_userdatabylogin('im@rk');
    //$user = get_userdatabylogin($str);
	//var_dump($user);
//echo $user->ID; // prints the id of the user

$query = $wpdb->get_row( "SELECT ID FROM ad_users WHERE user_nicename = '$str'" );
//$user = get_user_by( 'user_nicename', $str );
//$userId = $user->first_name;
//echo $user->ID;
$vouch_to = $query->ID; 

$vouch_by = get_current_user_id();

//check if already vouched by current user
$query = $wpdb->get_var( 
	"SELECT COUNT(ID) FROM ad_vouch 
	WHERE vouch_to = '$vouch_to' 
	AND vouch_by = '$vouch_by'");

if ($query > 0) {
	echo "Already vouched !";
}

else{
	$wpdb->insert('ad_vouch', 
		array( 
			'vouch_to' => $vouch_to, 
			'vouch_by' => $vouch_by
		) 
	);


	$query = $wpdb->get_row( "SELECT ID FROM ad_vouch WHERE vouch_to = '$vouch_to'" );

	$vouch_count = $wpdb->get_var("SELECT COUNT(vouch_to) FROM ad_vouch WHERE vouch_to = '$vouch_to'");

//$user_id = 1;
//$awesome_level = 1000;
	update_user_meta( $vouch_to, '_no_of_vouch', $vouch_count );
//add_user_meta( $vouch_by, '_no_of_vouch', $vouch_count);

	if ($vouch_count >= 3) 
	{
		/*$wpdb->update( 
		'ad_posts', 
		array( 
			'post_status' => 'publish',
		), 
		array( 'post_author' => $vouch_to ), 
		);*/
		$wpdb->query("UPDATE ad_posts SET post_status = 'publish'
	    	WHERE post_author = $vouch_to 
	    	AND post_status = 'pending'
	    	AND (post_type = 'topic' OR post_type = 'reply') ");
	}

	//echo 'to: '.$vouch_to.' by: '.$vouch_by.' count: '.$vouch_count;
	echo "Vouched !";
}
?>
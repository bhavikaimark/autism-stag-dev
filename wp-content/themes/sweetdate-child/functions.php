<?php
/**
 * @package WordPress
 * @subpackage Sweetdate
 * @author SeventhQueen <themesupport@seventhqueen.com>
 * @since Sweetdate 1.0
 */


/**
 * Sweetdate Child Theme Functions
 * Add extra code or replace existing functions
*/ 



/* added by BVR */

//START new topic creation
add_action( 'bbp_new_topic', 'action_bbp_new_topic', 10, 1 ); 

function action_bbp_new_topic($topic_id=0) { 
   
   global $wpdb;
   $user_id = get_current_user_id();
   $vouch_count = $wpdb->get_var("SELECT COUNT(vouch_to) FROM ad_vouch WHERE vouch_to = '$user_id'");
   if ($vouch_count <= 2) 
  {
      $wpdb->update( $wpdb->posts, array( 'post_status' => 'pending' ), array( 'ID' => $topic_id ) );
  }
}; 
// END topic creation


// START reply on topic
function action_bbp_new_reply( $comment_id=0 ) { 
    global $wpdb;
    $user_id = get_current_user_id();
    $vouch_count = $wpdb->get_var("SELECT COUNT(vouch_to) FROM ad_vouch WHERE vouch_to = '$user_id'");
    if ($vouch_count <= 2) 
   {
       $wpdb->update( $wpdb->posts, array( 'post_status' => 'pending' ), array( 'ID' => $comment_id ) );
   }
}; 
         
add_action( 'bbp_new_reply', 'action_bbp_new_reply', 10, 3 ); 
//END reply on topic




/*add_action( 'comment_post', 'action_comment_post', 10, 2 );
function action_comment_post( $comment_ID, $comment_approved ) {
  
  global $wpdb;
   $user_id = get_current_user_id();
   $vouch_count = $wpdb->get_var("SELECT COUNT(vouch_to) FROM ad_vouch WHERE vouch_to = '$user_id'");
   if ($vouch_count <= 2) 
  {
      $wpdb->update( $wpdb->posts, array( 'post_status' => 'pending' ), array( 'ID' => $topic_id ) );
  }
}*/
         
/* added till here */ 

/* add extra col in users.php */
function new_contact_methods( $contactmethods ) {
    $contactmethods['_no_of_vouch'] = 'No. of Vouch';
    return $contactmethods;
}
add_filter( 'user_contactmethods', 'new_contact_methods', 10, 1 );


function new_modify_user_table( $column ) {
    $column['_no_of_vouch'] = 'Vouch';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

/*function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case '_no_of_vouch' :
            //return get_the_author_meta( '_no_of_vouch', $user_id );
        $aaa = get_user_meta( $user_id, '_no_of_vouch', true );
        if ($aaa=="") {
          $aaa = 0;
        }
        return $aaa;
            break;
        default:
    }
    return $val;
}*/

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case '_no_of_vouch' :
            //return get_the_author_meta( '_no_of_vouch', $user_id );
        $aaa = get_user_meta( $user_id, '_no_of_vouch', true );
        if ($aaa=="") {
          $aaa = 0;
        }
        if ($aaa >= 3) {
          return "Fully (".$aaa.")";
        }
        else{return "Partially (".$aaa.")";}
        //return $aaa;
            break;
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );
/* till here */
?>

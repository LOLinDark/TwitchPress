<?php
/**
 * TwitchPress Follower-Only Shortcode 
 * 
 * This is a wrapper shortcode that will hide content unless the visitor is logged 
 * into WP and is a follower on the main or giving channel.
 *
 * @author   Ryan Bayne
 * @category Shortcodes
 * @package  TwitchPress/Core
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {    
    exit;
}
                                                        
add_shortcode( 'twitchpress_followers_only', 'twitchpress_shortcode_follower_only_content' );
                                                  
/**
* Follower-only content shortcode...
* 
* @param mixed $atts
* 
* @version 1.0
*/
function twitchpress_shortcode_follower_only_content( $atts, $content = null  ) {   
    $atts = shortcode_atts( array(             
            'channel_id'   => null
    ), $atts, 'twitchpress_shortcode_follower_only_content' );
             
    $html_output = ''; 
    
    // Visitor must be logged into the blog...
    if( !is_user_logged_in() ) { 
        $html_output .= '<p>' . __( 'Unlock more content here by following my Twitch channel and login into this site...', 'twitchpress' ) . '</p>'; 
        return $html_output; 
    }
    
    // Visitor must be following the main channel...
    $is_following = twitchpress_is_user_following( get_current_user_id() );
    if( !$is_following ) {
        // Try live check if meta is missing
        $twitch_api = class_exists('TwitchPress_Twitch_API') ? new TwitchPress_Twitch_API() : null;
        $user_id = get_current_user_id();
        $channel_id = $atts['channel_id'] ? $atts['channel_id'] : twitchpress_get_main_channels_twitchid();
        if( $twitch_api && $user_id && $channel_id ) {
            $follows = $twitch_api->get_channels_followers( (int)$channel_id, null, null, twitchpress_get_user_twitchid_by_wpid($user_id) );
            if( isset($follows->total) && $follows->total > 0 ) {
                update_user_meta( $user_id, 'twitchpress_following_' . $channel_id, 1 );
                $is_following = true;
            }
        }
    }
    if( !$is_following ) {
        $html_output .= '<p>' . __( 'Unlock hidden content on this page by following my Twitch channel...', 'twitchpress' ) . '</p>';
        return $html_output;
    }
    
    // Final - prepare $content for output...
    $html_output = $content;
               
    return $html_output;    
}
          
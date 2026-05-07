<?php
function twitchpress_giveaways_entry_current_user() {
    //return twitchpress_giveaways_entry( $wp_user_id, $raffle_id, $email_notify_user );  
}

function twitchpress_giveaways_entry( $wp_user_id = null, $raffle_id = null, $email_notify_user = true ) {
    // Require authentication
    if ( ! is_user_logged_in() ) {
        wp_die( __( 'You must be logged in to enter the giveaway.', 'twitchpress' ) );
    }
    if ( is_null( $wp_user_id ) ) {
        $wp_user_id = get_current_user_id();
    }
    if ( ! $wp_user_id ) {
        wp_die( __( 'Invalid user.', 'twitchpress' ) );
    }
    // TODO: Validate $raffle_id (for now, use a default or fail)
    if ( is_null( $raffle_id ) ) {
        wp_die( __( 'No giveaway/raffle specified.', 'twitchpress' ) );
    }
    // Prevent duplicate entries
    $existing = get_user_meta( $wp_user_id, 'twitchpress_giveaway_entry_' . $raffle_id, true );
    if ( $existing ) {
        wp_die( __( 'You have already entered this giveaway.', 'twitchpress' ) );
    }
    // Optional: Check Twitch subscriber status here if required
    // if ( ! twitchpress_user_is_subscriber( $wp_user_id ) ) { ... }
    // Save entry
    update_user_meta( $wp_user_id, 'twitchpress_giveaway_entry_' . $raffle_id, current_time( 'mysql' ) );
    // Optionally notify user
    if ( $email_notify_user ) {
        $user = get_userdata( $wp_user_id );
        if ( $user && $user->user_email ) {
            wp_mail( $user->user_email, __( 'Giveaway Entry Confirmation', 'twitchpress' ), __( 'You have successfully entered the giveaway!', 'twitchpress' ) );
        }
    }
    // Success message
    wp_die( __( 'You have successfully entered the giveaway!', 'twitchpress' ) );
}

function twitchpress_giveaways_entry_delete( $wp_user_id, $reason = null, $email_notify_user = false ) {
    
}

function twitchpress_giveaways_create( $title, $atts ) {
    //type = raffle, randomwpuser, randomtwitchuser
    //closure = instant, manual 
}

function twitchpress_giveaways_get( $giveaway_id ) {
    
}

function twitchpress_giveaways_close( $giveaway_id ) {
    
}

function twitchpress_giveaways_delete( $giveaway_id ) {
    
}
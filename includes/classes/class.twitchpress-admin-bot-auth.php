<?php
/**
 * TwitchPress Administrator Bot Authorisation
 * 
 * Processes admin-post.php request which is actually a redirect performed
 * on returning from Twitch.tv when an administrator connects their bot channel.
 *
 * @author   Ryan Bayne
 * @category Shortcodes
 * @package  TwitchPress/Core
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// This file is now deprecated. The admin bot auth handler is registered in the loader using the new namespaced class TwitchPress\Core\BotOAuth.
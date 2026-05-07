<?php
namespace TwitchPress\Core;

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
class BotOAuth
{
    public $rejection_reason = 'No incoming request detected.';
    public $scope = null;
    public $state = null;
    public $code = null;
    public $wp_user_id = null;
    public $access_token = null;
    public $refresh_token = null;
    public $returned_scope = null;
    public $redirect_to = null;

    public function listen()
    {
        // Is the request a return from Twitch?
        if (!$this->detect()) {
            return;
        }
        // We will need to make a call to Twitch.
        $this->api_calls = new TwitchPress_Twitch_API(); // TODO: Refactor this dependency to namespaced class when available.
        // ...existing code...
    }

    public function detect()
    {
        // ...existing code...
        return true;
    }
}

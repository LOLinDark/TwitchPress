<?php
$f = 'c:/wamp64/www/TwitchPress/wp-content/plugins/twitchpress/includes/libraries/twitch/helix/class.twitch-api.php';
$c = file_get_contents($f);

// 1. Replace eventsub_channel_follow stub with a working v2 implementation
$pattern = '/    public function eventsub_channel_follow\(\).*?\n    \}/s';
$replacement = '    /**
    * Subscribe to channel.follow events (EventSub v2).
    * Requires moderator:read:followers scope.
    * 
    * @param int $wp_post_id
    * @param int $broadcaster_user_id
    * @param int $moderator_user_id
    * 
    * @version 2.0
    */
    public function eventsub_channel_follow( $wp_post_id, $broadcaster_user_id, $moderator_user_id ) {
        $endpoint = \'https://api.twitch.tv/helix/eventsub/subscriptions\';
        $type = \'channel.follow\';

        $this->curl( __FILE__, __FUNCTION__, __LINE__, $endpoint, \'POST\' );

        $this->curl_object->add_headers( array(
            \'Client-ID\'     => twitchpress_get_app_id(),
            \'Authorization\' => \'Bearer \' . twitchpress_get_app_token(),
            \'Content-Type\'  => \'application/json\',
        ) );

        $this->curl_object->curl_request_body = array(
            \'type\'      => $type,
            \'version\'   => \'2\',
            \'condition\' => array(
                \'broadcaster_user_id\' => (string) $broadcaster_user_id,
                \'moderator_user_id\'   => (string) $moderator_user_id,
            ),
            \'transport\' => array(
                \'method\'   => \'webhook\',
                \'callback\' => TWITCHPRESS_WEBHOOK_CALLBACK,
                \'secret\'   => $wp_post_id . \'_channel_follow_\' . twitchpress_random14(),
            ),
        );

        $this->call();

        return $this->curl_object->curl_reply_body;
    }';
$c = preg_replace($pattern, $replacement, $c, 1);

file_put_contents($f, $c);
echo "eventsub_channel_follow updated to v2\n";

// 2. Fix inconsistent class name casing across shortcodes
$f2 = 'c:/wamp64/www/TwitchPress/wp-content/plugins/twitchpress/includes/shortcodes/shortcodes-main.php';
$c2 = file_get_contents($f2);
// The class is defined as TwitchPress_Twitch_API but some places use TWITCHPRESS_Twitch_API
$c2 = str_replace('TWITCHPRESS_Twitch_API', 'TwitchPress_Twitch_API', $c2);
file_put_contents($f2, $c2);
echo "Fixed class name casing in shortcodes-main.php\n";

// 3. Fix in functions.php
$f3 = 'c:/wamp64/www/TwitchPress/wp-content/plugins/twitchpress/functions.php';
$c3 = file_get_contents($f3);
$c3 = str_replace('TWITCHPRESS_Twitch_API', 'TwitchPress_Twitch_API', $c3);
file_put_contents($f3, $c3);
echo "Fixed class name casing in functions.php\n";

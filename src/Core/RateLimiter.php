<?php
namespace TwitchPress\Core;

/**
 * Rate limiting utility for Twitch API calls in shortcodes.
 */
class RateLimiter
{
    public static function check($key, $limit = 5, $window = 60)
    {
        $transient_key = 'twitchpress_rate_' . md5($key);
        $calls = get_transient($transient_key);
        if (!$calls) {
            set_transient($transient_key, 1, $window);
            return true;
        }
        if ($calls < $limit) {
            set_transient($transient_key, $calls + 1, $window);
            return true;
        }
        return false;
    }
}

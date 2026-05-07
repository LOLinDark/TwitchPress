<?php
namespace TwitchPress\Core;

/**
 * Avatar utility for filtering and retrieving Twitch avatars.
 */
class Avatar
{
    public static function filterSlugGetAvatar($avatar, $id_or_email = null, $size = null, $default = false, $alt = '', $buddypress = false, $height = null)
    {
        if (is_object($id_or_email) && isset($id_or_email->comment_author_email)) {
            $user = get_user_by('email', $id_or_email->comment_author_email);
            if ($user) {
                $id_or_email = $user->ID;
            } else {
                return $avatar;
            }
        }
        if (!is_numeric($id_or_email)) {
            $user = get_user_by('email', $id_or_email);
            if ($user) {
                $id_or_email = $user->ID;
            }
        }
        if (!is_numeric($id_or_email)) {
            return $avatar;
        }
        $saved = get_user_meta($id_or_email, 'twitchpress_avatar_url', true);
        $allowed_domains = ['static-cdn.jtvnw.net', 'cdn.twitch.tv'];
        if (filter_var($saved, FILTER_VALIDATE_URL)) {
            $host = parse_url($saved, PHP_URL_HOST);
            if (in_array($host, $allowed_domains, true)) {
                if ($buddypress) {
                    if ($alt && is_string($alt)) {
                        $alt = ' alt="' . $alt . '"';
                    }
                    $saved = str_replace('300x300', '150x150', $saved);
                    return sprintf('<img src="%s"%s%s%s />', esc_url($saved), esc_attr($alt), $size, $height);
                }
                return sprintf('<img src="%s?s=%s" alt="%s" width="%s" height="%s" />', esc_url($saved), $size, esc_attr($alt), $size, $size);
            }
        }
        return $avatar;
    }
}

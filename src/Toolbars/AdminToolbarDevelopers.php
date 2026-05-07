<?php
namespace TwitchPress\Toolbars;

use function current_user_can;
use function admin_url;
use function esc_url;
use function get_option;

/**
 * Developer Toolbar for users with 'twitchpressdevelopertoolbar' capability.
 */
class AdminToolbarDevelopers
{
    public function __construct()
    {
        if (!current_user_can('twitchpressdevelopertoolbar')) {
            return;
        }
        $this->init();
    }

    private function init()
    {
        self::parentLevel();
        self::secondLevelConfigurationOptions();
    }

    private static function parentLevel()
    {
        global $wp_admin_bar;
        $args = [
            'id'    => 'twitchpress-toolbarmenu-developers',
            'title' => __('TwitchPress Developers', 'twitchpress'),
        ];
        $wp_admin_bar->add_menu($args);
    }

    private static function secondLevelConfigurationOptions()
    {
        global $wp_admin_bar;
        $args = [
            'id'     => 'twitchpress-toolbarmenu-configurationoptions',
            'parent' => 'twitchpress-toolbarmenu-developers',
            'title'  => __('Configuration Options', 'twitchpress'),
            'meta'   => ['class' => 'second-toolbar-group'],
        ];
        $wp_admin_bar->add_menu($args);

        // Uninstall settings
        $thisaction = 'twitchpressuninstalloptions';
        if (function_exists('twitchpress_returning_url_nonced')) {
            $href = twitchpress_returning_url_nonced(['twitchpressaction' => $thisaction], $thisaction, $_SERVER['REQUEST_URI']);
            $args = [
                'id'     => 'twitchpress-toolbarmenu-uninstallsettings',
                'parent' => 'twitchpress-toolbarmenu-configurationoptions',
                'title'  => __('Un-Install Settings', 'twitchpress'),
                'href'   => esc_url($href),
            ];
            $wp_admin_bar->add_menu($args);
        }

        // Beta Testing Switch
        $thisaction = 'twitchpress_beta_testing_switch';
        $href = admin_url('admin-post.php?action=' . $thisaction);
        $title = __('Activate Beta Testing', 'twitchpress');
        if (get_option('twitchpress_beta_testing')) {
            $title = __('Disable Beta Testing', 'twitchpress');
        }
        $args = [
            'id'     => 'twitchpress-toolbarmenu-activatebetatesting',
            'parent' => 'twitchpress-toolbarmenu-configurationoptions',
            'title'  => $title,
            'href'   => esc_url($href),
        ];
        $wp_admin_bar->add_menu($args);
    }
}

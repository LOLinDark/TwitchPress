<?php
namespace TwitchPress\Toolbars;

use function add_action;
use function current_user_can;

/**
 * Adds menus to the admin toolbar, front and backend.
 */
class Toolbars
{
    public function __construct()
    {
        // This is admin side only bars not administrator only. Security is done deeper into toolbar classes.
        add_action('wp_before_admin_bar_render', [$this, 'adminOnlyToolbars']);
    }

    public function adminOnlyToolbars()
    {
        if (!current_user_can('activate_plugins')) return;
        if (!current_user_can('twitchpressdevelopertoolbar')) return;

        // Use Composer autoloading for the developer toolbar class
        if (class_exists('TwitchPress\\Toolbars\\AdminToolbarDevelopers')) {
            new AdminToolbarDevelopers();
        }
    }
}

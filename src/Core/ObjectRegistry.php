<?php
namespace TwitchPress\Core;

/**
 * TwitchPress - The object registry provides object access throughout WordPress
 * without using globals.
 *
 * @author   Ryan Bayne
 * @category Scripts
 * @package  TwitchPress/Core
 * @since    1.0.0
 */
class ObjectRegistry
{
    protected static $storage = [];

    public static function add($id, $class)
    {
        self::$storage[$id] = $class;
    }

    public static function get($id)
    {
        return array_key_exists($id, self::$storage) ? self::$storage[$id] : null;
    }

    /**
     * Update the variable in the registry object.
     *
     * @param string $id
     * @param string $var variable name
     * @param mixed $new new variable value
     * @param mixed $old old variable value
     *
     * @version 2.0
     */
    public static function updateVar($id, $var, $new, $old = null)
    {
        if (isset(self::$storage[$id]) && is_object(self::$storage[$id])) {
            if (property_exists(self::$storage[$id], $var)) {
                self::$storage[$id]->$var = $new;
            }
        }
    }
}

<?php
// User meta and OAuth management for TwitchPress
if ( ! defined( 'ABSPATH' ) ) exit;

class TwitchPress_User_Manager {
    public static function is_user_authorized( int $wp_user_id )  {
        if( !get_user_meta( $wp_user_id, 'twitchpress_code', false ) ) return false;
        if( !get_user_meta( $wp_user_id, 'twitchpress_token', false ) ) return false;
        return true;
    }
    public static function get_twitch_credentials( int $user_id ) {
        if( !$user_id ) return false;
        if( !$code = self::get_user_code( $user_id ) ) return false;
        if( !$token = self::get_user_token( $user_id ) ) return false;
        return array('code' => $code, 'token' => $token);
    }
    public static function update_oauth( int $wp_user_id, string $code, string $token, int $twitch_user_id, int $expires_in, $scope_array, $refresh_token ) {
        self::update_user_code( $wp_user_id, $code );
        self::update_user_token( $wp_user_id, $token );
        self::update_user_twitchid( $wp_user_id, $twitch_user_id );
        self::update_user_token_expires_in( $wp_user_id, $expires_in );
        self::update_user_token_scope( $wp_user_id, $scope_array );
        self::update_user_token_refresh( $wp_user_id, $refresh_token );
    }
    public static function get_user_code( $wp_user_id ) {
        return get_user_meta( $wp_user_id, 'twitchpress_code', true );
    }
    public static function get_user_token( $wp_user_id ) {
        if ( $wp_user_id == get_current_user_id() ) {
            $obj = \TwitchPress_Object_Registry::get( 'currentusertwitch' );
            return isset( $obj->user_token ) ? $obj->user_token : null;
        }
        return get_user_meta( $wp_user_id, 'twitchpress_user_token', true );
    }
    public static function update_user_code( $wp_user_id, $code ) {
        $now = time();
        update_user_meta( $wp_user_id, 'twitchpress_auth_time', $now );
        if( defined('TWITCHPRESS_CURRENTUSERID') && TWITCHPRESS_CURRENTUSERID == $wp_user_id ) {
            \TwitchPress_Object_Registry::update_var( 'currentusertwitch', 'user_auth_time', $now );
        }
        update_user_meta( $wp_user_id, 'twitchpress_code', $code );
        if( defined('TWITCHPRESS_CURRENTUSERID') && TWITCHPRESS_CURRENTUSERID == $wp_user_id ) {
            \TwitchPress_Object_Registry::update_var( 'currentusertwitch', 'user_code', $code );
        }
    }
    public static function update_user_token( $wp_user_id, $token ) {
        $v = sanitize_key( $token );
        $time = time();
        update_user_meta( $wp_user_id, 'twitchpress_auth_time', $time );
        if( defined('TWITCHPRESS_CURRENTUSERID') && TWITCHPRESS_CURRENTUSERID == $wp_user_id ) {
            \TwitchPress_Object_Registry::update_var( 'currentusertwitch', 'user_auth_time', $time );
        }
        update_user_meta( $wp_user_id, 'twitchpress_token', $v );
        if( defined('TWITCHPRESS_CURRENTUSERID') && TWITCHPRESS_CURRENTUSERID == $wp_user_id ) {
            \TwitchPress_Object_Registry::update_var( 'currentusertwitch', 'user_token', $v );
        }
    }
    public static function update_user_twitchid( $wp_user_id, $twitch_user_id ) {
        update_user_meta( $wp_user_id, 'twitchpress_twitch_id', $twitch_user_id );
        if( defined('TWITCHPRESS_CURRENTUSERID') && TWITCHPRESS_CURRENTUSERID == $wp_user_id ) {
            return \TwitchPress_Object_Registry::update_var( 'currentusertwitch', 'user_twitch_id', $twitch_user_id );
        }
    }
    public static function update_user_token_expires_in( $wp_user_id, $expires_in ) {
        update_user_meta( $wp_user_id, 'twitchpress_twitch_expires_in', $expires_in );
        if( defined('TWITCHPRESS_CURRENTUSERID') && TWITCHPRESS_CURRENTUSERID == $wp_user_id ) {
            return \TwitchPress_Object_Registry::update_var( 'currentusertwitch', 'user_expires_in', $expires_in );
        }
    }
    public static function update_user_token_scope( $wp_user_id, $scope ) {
        update_user_meta( $wp_user_id, 'twitchpress_token_scope', $scope );
        if( defined('TWITCHPRESS_CURRENTUSERID') && TWITCHPRESS_CURRENTUSERID == $wp_user_id ) {
            return \TwitchPress_Object_Registry::update_var( 'currentusertwitch', 'user_scope', $scope );
        }
    }
    public static function update_user_token_refresh( $wp_user_id, $token ) {
        $v = sanitize_key( $token );
        update_user_meta( $wp_user_id, 'twitchpress_token_refresh', $v );
        if( defined('TWITCHPRESS_CURRENTUSERID') && TWITCHPRESS_CURRENTUSERID == $wp_user_id ) {
            return \TwitchPress_Object_Registry::update_var( 'currentusertwitch', 'user_refresh', $v );
        }
    }
}

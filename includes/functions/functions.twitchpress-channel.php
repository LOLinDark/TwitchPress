<?php
// Main channel get/update functions for TwitchPress
if ( ! defined( 'ABSPATH' ) ) exit;

class TwitchPress_Channel_Manager {
    public static function get_main_channels_name() {
        $obj = \TwitchPress_Object_Registry::get( 'mainchannelauth' );
        return isset( $obj->main_channels_name ) ? $obj->main_channels_name : null;
    }
    public static function get_main_channels_twitchid() {
        $obj = TwitchPress_Object_Registry::get( 'mainchannelauth' );
        return isset( $obj->main_channels_id ) ? $obj->main_channels_id : null;
    }
    public static function get_main_channels_token() {
        $obj = TwitchPress_Object_Registry::get( 'mainchannelauth' );
        return isset( $obj->main_channels_token ) ? $obj->main_channels_token : null;
    }
    public static function get_main_channels_code() {
        $obj = TwitchPress_Object_Registry::get( 'mainchannelauth' );
        return isset( $obj->main_channels_code ) ? $obj->main_channels_code : null;
    }
    public static function get_main_channels_wpowner_id() {
        $obj = TwitchPress_Object_Registry::get( 'mainchannelauth' );
        return isset( $obj->main_channels_wpowner_id ) ? $obj->main_channels_wpowner_id : null;
    }
    public static function get_main_channels_refresh() {
        $obj = TwitchPress_Object_Registry::get( 'mainchannelauth' );
        return isset( $obj->main_channels_refresh ) ? $obj->main_channels_refresh : null;
    }
    public static function get_main_channels_scopes() {
        $obj = TwitchPress_Object_Registry::get( 'mainchannelauth' );
        return isset( $obj->main_channels_scopes ) ? $obj->main_channels_scopes : null;
    }
    public static function get_main_channels_postid() {
        $obj = TwitchPress_Object_Registry::get( 'mainchannelauth' );
        return isset( $obj->main_channels_postid ) ? $obj->main_channels_postid : null;
    }
    public static function update_main_channels_code( $new_code ) {
        update_option( 'twitchpress_main_channels_code', $new_code, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_code', $new_code );
    }
    public static function update_main_channels_wpowner_id( $wp_user_id ) {
        update_option( 'twitchpress_main_channels_wpowner_id', $wp_user_id, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_wpowner_id', $wp_user_id );
    }
    public static function update_main_channels_token( $new_token ) {
        update_option( 'twitchpress_main_channels_token', $new_token, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_token', $new_token );
    }
    public static function update_main_channels_refresh_token( $new_refresh_token ) {
        update_option( 'twitchpress_main_channels_refresh_token', $new_refresh_token, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_refresh_token', $new_refresh_token );
    }
    public static function update_main_channels_scopes( $new_main_channels_scopes ) {
        update_option( 'twitchpress_main_channels_scopes', $new_main_channels_scopes, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_scopes', $new_main_channels_scopes );
    }
    public static function update_main_channels_authtime() {
        $time = time();
        update_option( 'twitchpress_main_channels_authtime', $time, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_authtime', $time );
    }
    public static function update_main_channels_name( $new_main_channels_name ) {
        update_option( 'twitchpress_main_channels_name', $new_main_channels_name, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_name', $new_main_channels_name );
    }
    public static function update_main_channels_id( $new_main_channels_id ) {
        update_option( 'twitchpress_main_channels_id', $new_main_channels_id, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_id', $new_main_channels_id );
    }
    public static function update_main_channels_postid( $new_main_channels_postid ) {
        update_option( 'twitchpress_main_channels_postid', $new_main_channels_postid, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_postid', $new_main_channels_postid );
    }
    public static function update_main_channels_expires_in( $expires_in ) {
        update_option( 'twitchpress_main_channels_expires_in', $expires_in, false );
        return \TwitchPress_Object_Registry::update_var( 'mainchannelauth', 'main_channels_postid', $expires_in );
    }
}

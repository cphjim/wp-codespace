<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class DJC_Registry {
    private static $games = [];

    public static function register_game( $slug, $args ) {
        self::$games[ $slug ] = $args;
    }

    public static function get_games() {
        return self::$games;
    }

    public static function get_game( $slug ) {
        return isset( self::$games[ $slug ] ) ? self::$games[ $slug ] : null;
    }
}

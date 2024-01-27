<?php

// directly access denied
defined('ABSPATH') || exit;

$files = [
    'classes/class-assets',
    'classes/class-render-posts',
];

foreach ( $files as $file ) {
    if( file_exists(  dirname( __FILE__ ) . '/' . $file . '.php' ) ){
        require_once dirname( __FILE__ ) . '/' . $file . '.php';
    }else{
        $not_found = dirname(__FILE__) . '/' . $file . '.php';
        throw new Exception("file not found {$not_found}", 1);
    }
}
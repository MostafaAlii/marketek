<?php
define('PAGINATION_COUNT', 10);

if(!function_exists('admin_guard')){
    function admin_guard() {
        return auth('admin');
    }
}

if(!function_exists('supplier_guard')){
    function supplier_guard() {
        return auth('supplier');
    }
}

if(!function_exists('user_guard')){
    function user_guard() {
        return auth('web');
    }
}
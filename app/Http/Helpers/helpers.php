<?php
if(!function_exists('admin_guard')){
    function admin_guard() {
        return auth('admin');
    }
}

if(!function_exists('user_guard')){
    function user_guard() {
        return auth('web');
    }
}
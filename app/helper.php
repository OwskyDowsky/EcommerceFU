<?php

if (!function_exists('userID')) {
    function userID() {
        return auth()->user()->id;
    }
}

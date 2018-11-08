<?php

if (!function_exists('get_thumb')) {
    function get_thumb($image) {
        if (starts_with($image, '/photos/')) {
            return str_replace( '/' . basename($image), '/thumbs/' . basename($image), $image);
        }
        return false;
    }
}
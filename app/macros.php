<?php

    // Produces nav item lis with class="active" for current page
    // From: http://mikekoro.com/blog/laravel-4-active-class-for-navigational-menu/
    HTML::macro('nav_link', function($route, $text) {    
        if(Request::path() == $route) {
            $active = "class = 'active'";
        }
        else {
            $active = '';
        }    
        return '<li '.$active.'>'.link_to($route, $text).'</li>';
    });

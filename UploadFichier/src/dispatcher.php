<?php
//=============================================================================
// Dispatcher script for ooless web apps.
// Author:  Pascal Hurni
// Date:    2022-08-27, 03-05-2014
//=============================================================================

//=============================================================================
// Decode the given route and return the bag augmented with:
//    handler        string  PHP file name that should handle this request (without php extension).
//    status_code    int     HTTP code to return if already determined.
function dispatch($bag)
{
    $matches = [];

    // If any match defines a 'view', it should use our one and only layout.
    $bag['layout'] = 'views/layout';

    //-----------------------------------------------------------------------------
    if (preg_match('/^\/?$/', $bag['route'])) {
        $bag['view'] = 'views/site/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/(login|register)$/', $bag['route'], $matches)) {
        if ($bag['method'] == 'POST') {
            $bag['handler'] = 'controllers/site/'.$matches[1];
        } elseif ($bag['method'] == 'GET') {
            $bag['view'] = 'views/site/'.$matches[1];
        }
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/logout$/', $bag['route']) && $bag['method'] == 'POST') {
        $bag['handler'] = 'controllers/site/logout';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/search$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/images/search';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/images$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/images/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/users$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/users/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/users\/(\w+)\/images$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/users/images';
        $bag['username'] = $matches[1];
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/categories$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/categories/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/categories\/(.+?)\/images$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/categories/images';
        $bag['category'] = urldecode($matches[1]);
    }
    //-----------------------------------------------------------------------------
    // todo pass the handler method as a parameter to avoid having to create a new controller for each method
    elseif (preg_match('/^\/images\/upload$/', $bag['route'], $matches)) {
        if ($bag['method'] == 'POST') {
            $bag['handler']  = 'controllers/images/upload';
        } elseif ($bag['method'] == 'GET') {
            $bag['handler']  = 'controllers/images/uploadView';
        }
    }
    //-----------------------------------------------------------------------------
    else {
        $bag['status_code'] = 404;
    }

    return $bag;
}

//=============================================================================
// Return the URL for the given named route (the opposite of the dispatcher)
function route($name, ...$args) {
    if ($name == 'users/images') {
        return '/users/'.$args[0].'/images';
    }
    if ($name == 'categories/images') {
        return '/categories/'.$args[0].'/images';
    }
    return '/'.$name; 
}

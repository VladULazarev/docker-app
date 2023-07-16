<?php

namespace Core;

class App
{
    /**
     * Start the Application
     * Load 'view' according to 'ROUTE[0]', see Core\Router.pnp
     * @return void
     */
    public static function run(): void
    {
        if (ROUTE[0] == "home") {
            
            // Example: current uri: http://domain.com/
            // ROUTE[0] = 'home'
            // Path to the view is: $path = "home/home-page-content"
            $path = ROUTE[0] . "/" . ROUTE[0] . "-page-content";
            View::render($path);
        }
    }
}

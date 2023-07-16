<?php

namespace App\Controllers;

use Core\Controller;

class ErrorController extends Controller
{
    /**
     * If a webpage or data from DB were not found
     * @return void
     */
		public static function notFound(): void
		{
            header('Location: /404.php');
		}
}

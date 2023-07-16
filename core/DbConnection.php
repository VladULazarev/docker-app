<?php

namespace Core;

use PDO;

class DbConnection
{
    /**
     * Set the connection to DB
     *
     * @return PDO|void
     */
    public function connect()
    {
        $localhost = 'demodocker_db';
        $dbname    = 'demodocker';
        $password  = 'root';
        $username  = 'root';

        try {
          	$handler = new PDO("mysql:host={$localhost};charset=utf8mb4;dbname={$dbname}", "{$username}", "{$password}");
          	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          	//echo $e->getMessage(); // for debugging
          	die("<h1>Sorry, db problema.</h1>
          		 	<p>It could be a wrong 'database name'.</p>
          			<p>It could be a wrong 'login'.</p>
          			<p>It could be a wrong 'password'.</p>
          			");
        }

        return $handler;
    }
}

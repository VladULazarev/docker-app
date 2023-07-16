<?php

namespace App\Controllers;

require_once 'autoloader.php';

use Core\Controller;
use App\Models\Numbers;
use PDO;

class NumbersController extends Controller
{
    /**
     * Generate array of the random numbers
     * @param int $minNumber Min value
     * @param int $maxNumber Max value
     * @return array Array of randomly generated numbers
     */
    public static function randomGen(int $minNumber, int $maxNumber): array
    {
        $numbers = range($minNumber, $maxNumber);
        shuffle($numbers);
        return $numbers;
    }

    /**
     * Delete previous generation, pass $minNumber and $maxNumber to randomGen()
     * and store data in db
     * Auto increment of 'id' was not set to start 'id' from 1 for every new generation
     * @param int $minNumber Min value
     * @param int $maxNumber Max value
     * @return void
     */
    public static function generate(int $minNumber, int $maxNumber): void
    {
        $obj = new Numbers();

        // Delete previous generation,
        $obj->delete();

        // Get array of randomly generated numbers
        $numbers = self::randomGen($minNumber, $maxNumber);

        // Store data to store in db aand pass to store()
        foreach ($numbers as $key => $number) {

            // Set the first id as '1'
            $key = $key + 1;
            $obj->store($key, $number);
        }

        // If 'OK' send it to /app.js --- 1. Generate random numbers
        echo 'ok';
    }

    /**
     * Retrive randomly generated number by 'id'
     *    and pass it to /app.js  --- 2. Retrive generated numbers by 'id'
     * @param int $searchNumber 'id' of a number from DB
     * @return Void
     */
    public static function retrieve(int $searchNumber): void
    {
        $obj = new Numbers();

        // Get randomly generated number by 'id'
        $number = $obj->findOne($searchNumber)->fetch(PDO::FETCH_OBJ);

        // Echo found number to /app.js  --- 3. Retrive generated numbers by 'id'
        if ( $number ) {
          echo $number->rand_num;
        }

    }
}

// If 'Generate numbers' block was clicked
if (isset($_POST['generateNumbers'])) {

    $minNumber = trim($_POST['minNumber']);
    $maxNumber = trim($_POST['maxNumber']);
    NumbersController::generate($minNumber, $maxNumber);

// If user is searching for a number by 'id'
} elseif (isset($_POST['searchNumber'])) {

    $searchNumber = trim($_POST['searchNumber']);
    NumbersController::retrieve($searchNumber);
}

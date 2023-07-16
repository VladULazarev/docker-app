<?php

namespace App\Models;

use Core\Model;

class Numbers extends Model
{
    /**
     * Delete previous generation
     * @return void
     */
    public function delete(): void
    {
        $deleteRecords = $this->connect()->prepare("DELETE FROM $this->tableName");
        $deleteRecords->execute();
    }

    /**
     * Store a number in DB
     * @param int $key 'id' of current number
     * @param int $number current number
     * @return void
     */
    public function store(int $key, int $number): void
    {
        $pre_insert = "INSERT INTO $this->tableName (id, rand_num) VALUES (?, ?)";
        $insert = $this->connect()->prepare($pre_insert);
        $insert->execute([$key, $number]);
    }

    /**
     * Find a number in DB
     * @param int $id 'id' of current number
     * @return object|bool if number was found otherwise 'false'
     */
    public function findOne(int $id): object|bool
    {
        $data = $this->connect()->prepare("SELECT rand_num FROM $this->tableName WHERE id = ?");
        $data->execute([$id]);
        return $data;
    }
}

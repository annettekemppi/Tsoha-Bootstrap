<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Rotu extends BaseModel {

    // Attribuutit
    public $id, $rotu_id, $name, $status, $description, $published, $publisher, $added;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {

        $query = DB::connection()->prepare('SELECT * FROM Rotu');

        $query->execute();

        $rows = $query->fetchAll();
        $races = array();


        foreach ($rows as $row) {

            $races[] = new Rotu(array(
                'id' => $row['id'],
                'rotu_id' => $row['rotu_id'],
                'name' => $row['name'],
                'status' => $row['status'],
                'description' => $row['description'],
                'published' => $row['published'],
                'publisher' => $row['publisher'],
                'added' => $row['added']
            ));
        }

        return $races;
    }

}

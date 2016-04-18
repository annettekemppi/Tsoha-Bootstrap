<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Kayttaja extends BaseModel {

    // Attribuutit
    public $id, $name, $password;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {

        $query = DB::connection()->prepare('SELECT * FROM Kayttaja');

        $query->execute();

        $rows = $query->fetchAll();
        $users = array();


        foreach ($rows as $row) {

            $users[] = new Kayttaja(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'password' => $row['password'],
            ));
        }

        return $users;
    }

    public static function hae($id) {
        $query = DB::connection()->prepare('SELECT * FROM Rotu WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $race = new Rotu(array(
                'id' => $row['id'],
                'rotu_id' => $row['rotu_id'],
                'name' => $row['name'],
                'status' => $row['status'],
                'description' => $row['description'],
                'published' => $row['published'],
                'publisher' => $row['publisher'],
                'added' => $row['added']
            ));

            return $race;
        }

        return null;
    }
    

}

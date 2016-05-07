<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Roturyhma extends BaseModel {

    // Attribuutit
    public $name, $id, $description, $published, $publisher, $added;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_published', 'validate_publisher', 'validate_description');
    }

    public static function all() {

        $query = DB::connection()->prepare('SELECT * FROM Roturyhma');

        $query->execute();

        $rows = $query->fetchAll();
        $races = array();


        foreach ($rows as $row) {

            $racegroups[] = new Roturyhma(array(
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

        return $racegroups;
    }

    public function save() {

        $query = DB::connection()->prepare('INSERT INTO Rotuyhma (name, id, publisher, description) VALUES (:name, :id, :publisher, :description) RETURNING id');
        $query->execute(array('name' => $this->name, 'id' => $this->id, 'publisher' => $this->publisher, 'description' => $this->description));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function validate_name() {
        $errors = array();
        if ($this->name == '' || $this->name == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        if (strlen($this->name) < 3) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
        }

        return $errors;
    }

    public static function hae($id) {
        $query = DB::connection()->prepare('SELECT * FROM Roturyhma WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $racegroup = new Roturyhma(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'published' => $row['published'],
                'publisher' => $row['publisher'],
                'added' => $row['added']
            ));

            return $racegroup;
        }

        return null;
    }

}
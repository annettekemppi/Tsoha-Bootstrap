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
        $this->validators = array('validate_name', 'validate_published', 'validate_publisher', 'validate_description');
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

    public function save() {

        $query = DB::connection()->prepare('INSERT INTO Rotu (name, rotu_id, publisher, description) VALUES (:name, :rotu_id, :publisher, :description) RETURNING id');
        $query->execute(array('name' => $this->name, 'id' => $this->rotu_id, 'publisher' => $this->publisher, 'description' => $this->description));
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

}

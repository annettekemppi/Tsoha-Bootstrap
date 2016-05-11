<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Rotu extends BaseModel {

    // Attribuutit
    public $id, $name, $status, $description, $published, $country, $added;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_id', 'validate_name', 'validate_status', 'validate_description', 'validate_published', 'validate_country', 'validate_added');
    }

    public static function all() {

        $query = DB::connection()->prepare('SELECT * FROM Rotu');

        $query->execute();

        $rows = $query->fetchAll();
        $races = array();
        Kint::dump($rows);
        foreach ($rows as $row) {

            $races[] = new Rotu(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'status' => $row['status'],
                'description' => $row['description'],
                'published' => $row['published'],
                'country' => $row['country'],
                'added' => $row['added']
            ));
        }
        Kint::dump($races);
        return $races;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Rotu (id, name, status, description, published, country, added) VALUES (:id, :name, :status, :description, :published, :country, :added) RETURNING id');
        $query->execute(array('id' => $this->id, 'name' => $this->name, 'status' => $this->status, 'description' => $this->description, 'published' => $this->published, 'country' => $this->country, 'added' => $this->added));
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

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Rotu WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $race = new Rotu(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'status' => $row['status'],
                'description' => $row['description'],
                'published' => $row['published'],
                'country' => $row['country'],
                'added' => $row['added']
            ));

            return $race;
        }

        return null;
    }
    

}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Roturyhma extends BaseModel {

    // Attribuutit
    public $id, $rotu_id, $name, $count, $class;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_id', 'validate_rotu_id', 'validate_name', 'validate_count', 'validate_class');
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
                'count' => $row['count'],
                'class' => $row['class']
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

    public static function find($id) {
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
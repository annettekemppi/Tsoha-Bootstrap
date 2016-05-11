<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Kayttaja extends BaseModel {

    // Attribuutit
    public $id, $name, $password, $admin;

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
                'admin' => $row['admin']
            ));
        }

        Kint::dump($users);
        return $users;
    }    
    
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kayttaja (id, name, password, admin) VALUES (:id, :name, :password, :admin) RETURNING id');
        $query->execute(array('id' => $this->id, 'name' => $this->name, 'password' => $this->password, 'admin' => $this->admin));
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
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $user = new Kayttaja(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'password' => $row['password'],
                'admin' => $row['admin']
            ));

            return $user;
        }

        return null;
    }

}

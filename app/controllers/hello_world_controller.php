<?php

class HelloWorldController extends BaseController {

    public static function index() {
        echo 'Tämä on etusivu!';
    }

    public static function sandbox() {
        $saku = new Rotu(array(
            'name' => 'Saksanpaimenkoira',
            'rotu_id' => 'FCI 2',
            'publisher' => 'Mili',
            'description' => 'monipuolinen käyttö-, paimen- ja palveluskoira'
        ));
        $errors = $doom->errors();

        Kint::dump($errors);
    }

    public static function race_list() {
        View::make('suunnitelmat/race_list.html');
    }

    public static function race_show() {
        View::make('suunnitelmat/race_show.html');
    }

    public static function login() {
        View::make('suunnitelmat/login.html');
    }

}

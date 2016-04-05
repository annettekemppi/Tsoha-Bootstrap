<?php

class HelloWorldController extends BaseController {

    public static function index() {
        echo 'Tämä on etusivu!';
    }

    public static function sandbox() {
        View::make('helloworld.html');
    }

}

<?php

class HelloWorldController extends BaseController {

    public static function index() {
        echo 'Tämä on etusivu!';
    }

    public static function sandbox() {
        View::make('helloworld.html');
    }
    
    public static function race_list(){
    View::make('suunnitelmat/race_list.html');
  }

  public static function race_show(){
    View::make('suunnitelmat/race_show.html');
  }

  public static function login(){
    View::make('suunnitelmat/login.html');
  }

}

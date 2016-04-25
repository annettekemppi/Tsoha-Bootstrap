<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserController extends BaseController {

    public static function login() {
        View::make('user/login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $user = User::authenticate($params['username'], $params['password']);

        if (!$user) {
            View::make('user/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
        } else {
            $_SESSION['user'] = $user->id;

            Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
        }
    }

    public static function logout() {
        $_SESSION['user'] = null;
        Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
    }

    public static function index() {
        self::check_logged_in();
        //...
    }

    public static function show($id) {
        self::check_logged_in();
        //...
    }

    public static function edit($id) {
        self::check_logged_in();
        //...
    }

    public static function update($id) {
        self::check_logged_in();
        //...
    }

    public static function create() {
        self::check_logged_in();
        //...
    }

    public static function store() {
        self::check_logged_in();
        //...
    }

    public static function destroy($id) {
        self::check_logged_in();
        //...
    }

}

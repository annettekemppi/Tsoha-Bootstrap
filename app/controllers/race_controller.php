<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RaceController extends BaseController {

    public static function index() {

        $races = Game::all();

        View::make('race/index.html', array('races' => $races));
    }

    public static function store() {

        $params = $_POST;

        $race = new Rotu(array(
            'name' => $params['name'],
            'description' => $params['description'],
            'status' => $params['status'],
            'published' => $params['published']
        ));

        $race->save();
        Redirect::to('/race/' . $race->id, array('message' => 'Rotu on lisätty kirjastoosi!'));

        $game = new Game($attributes);
        $errors = $game->errors();

        if (count($errors) == 0) {
            $race->save();

            Redirect::to('/race/' . $race->id, array('message' => 'Rotu on lisätty kirjastoon!'));
        } else {
            View::make('race/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RaceController extends BaseController {

    public static function index() {
        $races = Rotu::all();
        View::make('race/index.html', array('races' => $races));
    }

    public static function store() {
        $params = $_POST;

        $race = new Rotu(array(
            'id' => $params['id'],
            'name' => $params['name'],
            'description' => $params['description'],
            'status' => $params['status'],
            'published' => $params['published'],
            'country' => $params['country'],
            'added' => $params['added']
        ));

        $race->save();
        Redirect::to('/race/' . $race->id, array('message' => 'Rotu on lisätty kirjastoosi!'));

        $race = new Rotu($attributes);
        $errors = $race->errors();

        if (count($errors) == 0) {
            $race->save();

            Redirect::to('/race/' . $race->id, array('message' => 'Rotu on lisätty kirjastoon!'));
        } else {
            View::make('race/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function edit($id) {
        $race = Rotu::find($id);
        View::make('race/edit.html', array('attributes' => $race));
    }

    public static function update($id) {
        $params = $_POST;

        $attributes = array(
        'id' => $id,
        'name' => $params['name'],
        'saved' => $params['saved'],
        'description' => $params['description'],
        );

        $race = new Rotu($attributes);
        $errors = $race->errors();

        if (count($errors) > 0) {
            View::make('race/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $race->update();

            Redirect::to('/race/' . $race->id, array('message' => 'Rodun tietoja on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        $race = new Rotu(array('id' => $id));
        
        $race->destroy();

        Redirect::to('/race', array('message' => 'Rotu on poistettu onnistuneesti!'));
    }
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RaceController extends BaseController{
    
  public static function index(){
      
    $races = Game::all();
    
    View::make('race/index.html', array('races' => $races));
    
  }
}
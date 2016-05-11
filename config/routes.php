<?php

  $routes->get('/', function() {
    View::make('index.html');
  });

  $routes->get('/login', function() {
  UserController::login();
  });
  
//  $routes->post('/login', function(){
//  UserController::handle_login();
//  });
//  
  $routes->get('/race', function(){
  RaceController::index();
  });
  
  $routes->post('/race', function(){
  RaceController::store();
  });

//
//  $routes->get('/race/:id', function($id){
//  RaceController::show($id);
//  });
//  
//  $routes->post('/race', function(){
//  RaceController::store();
//  });
//
//  $routes->get('/race/new', function(){
//  RaceController::create();
//  });
//  
//  $routes->get('/race/:id/edit', function($id){
//  RaceController::edit($id);
//  });
//
//  $routes->post('/race/:id/edit', function($id){
//  RaceController::update($id);
//  });
//
//  $routes->post('/race/:id/destroy', function($id){
//  RaceController::destroy($id);
//  });
//
//  $routes->get('/race', 'check_logged_in', function(){
//  RaceController::index();
//  });
//
//  $routes->get('/race/new', 'check_logged_in', function(){
//  RaceController::create();
//  });
//
//  $routes->get('/race/:id', 'check_logged_in', function($id){
//  RaceController::show($id);
//  });
//  
//  $routes->post('/logout', function(){
//  UserController::logout();
//  });
//  
//  $routes->get('/racegroup', function(){
//  RacegroupController::index();
//  });
//
//  $routes->get('/racegroup/:id', function($id){
//  RacegroupController::show($id);
//  });
//  
//  $routes->post('/racegroup', function(){
//  RacegroupController::store();
//  });
//
//  $routes->get('/racegroup/new', function(){
//  RacegroupController::create();
//  });
//  
//  $routes->get('/racegroup/:id/edit', function($id){
//  RacegroupController::edit($id);
//  });
//
//  $routes->post('/racegroup/:id/edit', function($id){
//  RacegroupController::update($id);
//  });
//
//  $routes->post('/racegroup/:id/destroy', function($id){
//  RacegroupController::destroy($id);
//  });
<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/race', function() {
  HelloWorldController::race_list();
  });
  
  $routes->get('/race/1', function() {
  HelloWorldController::race_show();
  });

  $routes->get('/login', function() {
  UserController::login();
  });
  
  $routes->post('/login', function(){
  UserController::handle_login();
  });
  
  $routes->get('/race', function(){
  RaceController::index();
  });

  $routes->get('/race/:id', function($id){
  RaceController::show($id);
  });
  
  $routes->post('/race', function(){
  RaceController::store();
  });

  $routes->get('/race/new', function(){
  RaceController::create();
  });
  
  $routes->get('/race/:id/edit', function($id){
  GameController::edit($id);
  });

  $routes->post('/race/:id/edit', function($id){
  RaceController::update($id);
  });

  $routes->post('/race/:id/destroy', function($id){
  RaceController::destroy($id);
  });
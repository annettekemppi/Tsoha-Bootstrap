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
  HelloWorldController::login();
  });
  
  $routes->get('/race', function(){
  RaceController::index();
});
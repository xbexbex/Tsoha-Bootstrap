<?php

$routes->get('/', function() {
  ArvosteluController::index();
});

$routes->post('/review', function(){
  ArvosteluController::store();
});

$routes->post('/review/edited/:id', function($id){
  ArvosteluController::modify($id);
});

$routes->get('/review/edit/:id/:stuff', function($id){
  ArvosteluController::edit($id);
});

$routes->get('/review/edit/:id', function($id){
  ArvosteluController::edit($id);
});

$routes->get('/review/edit/:id/', function($id){
  ArvosteluController::edit($id);
});

$routes->get('/review/remove/:id/:stuff', function($id){
  ArvosteluController::remove($id);
});

$routes->get('/review/remove/:id', function($id){
  ArvosteluController::remove($id);
});

$routes->get('/review/remove/:id/', function($id){
  ArvosteluController::remove($id);
});


$routes->get('/review/add/', function(){
  ArvosteluController::add();
});

$routes->get('/review/add', function(){
  ArvosteluController::add();
});

$routes->get('/review/:id', function($id){
  ArvosteluController::show($id);
});

$routes->get('/review/:id/:stuff', function($id){
  ArvosteluController::show($id);
});

$routes->get('/review/:id/', function($id){
  ArvosteluController::show($id);
});

$routes->get('/hiekkalaatikko', function() {
  DefaultController::sandbox();
});

$routes->get('/suunnitelmat/kirves', function() {
  SuunnitelmaController::kirves();
});

$routes->get('/suunnitelmat/muokkaus', function() {
  SuunnitelmaController::muokkaus();
});

$routes->get('/suunnitelmat/haku', function() {
  SuunnitelmaController::haku();
});

$routes->get('/suunnitelmat/login', function() {
  SuunnitelmaController::login();
});


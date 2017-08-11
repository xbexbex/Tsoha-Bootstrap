<?php

$routes->get('/', function() {
  ReviewController::index();
});

$routes->post('/review', function(){
  ReviewController::store();
});

$routes->post('/review/edited/:id', function($id){
  ReviewController::modify($id);
});

$routes->get('/review/edit/:id/:stuff', function($id){
  ReviewController::edit($id);
});

$routes->get('/review/edit/:id', function($id){
  ReviewController::edit($id);
});

$routes->get('/review/edit/:id/', function($id){
  ReviewController::edit($id);
});

$routes->get('/review/remove/:id/:stuff', function($id){
  ReviewController::remove($id);
});

$routes->get('/review/remove/:id', function($id){
  ReviewController::remove($id);
});

$routes->get('/review/remove/:id/', function($id){
  ReviewController::remove($id);
});


$routes->get('/review/add/', function(){
  ReviewController::add();
});

$routes->get('/review/add', function(){
  ReviewController::add();
});

$routes->get('/review/:id', function($id){
  ReviewController::show($id);
});

$routes->get('/review/:id/:stuff', function($id){
  ReviewController::show($id);
});

$routes->get('/review/:id/', function($id){
  ReviewController::show($id);
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


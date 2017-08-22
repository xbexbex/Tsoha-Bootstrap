<?php

$routes->get('/', function() {
  ReviewController::index();
});

$routes->post('/review', function(){
  ReviewController::store();
});

$routes->post('/review/:id/edit', function($id){
  ReviewController::modify($id);
});

$routes->post('/review/:id/edit/', function($id){
  ReviewController::modify($id);
});

$routes->get('/review/:id/edit', function($id){
  ReviewController::edit($id);
});

$routes->get('/review/:id/edit/', function($id){
  ReviewController::edit($id);
});

$routes->post('/review/:id/remove', function($id){
  ReviewController::remove($id);
});

$routes->post('/review/:id/remove/', function($id){
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

$routes->get('/login', function() {
  AccountController::login();
});

$routes->post('/login', function() {
  AccountController::handle_login();
});

$routes->post('/logout', function(){
  AccountController::logout();
});

$routes->get('/logout', function(){
  AccountController::logout();
});





$routes->get('/test', function(){
  TestController::test();
});



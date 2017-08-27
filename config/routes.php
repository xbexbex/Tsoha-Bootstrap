<?php

$routes->get('/', function() {
  ReviewController::index();
});



$routes->post('/review/add', function(){
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

$routes->get('/register', function(){
  AccountController::add();
});

$routes->post('/register', function(){
  AccountController::store();
});

$routes->get('/list/users', function(){
  AccountController::list();
});

$routes->get('/user/:id/remove', function($id){
  AccountController::remove($id);
});

$routes->get('/user/:id', function($id){
  AccountController::show($id);
});

$routes->post('/user/:id/edit', function($id){
  AccountController::modify($id);
});

$routes->get('/user/:id/edit', function($id){
  AccountController::edit($id);
});

$routes->get('/user/:id/reviews', function($id){
  ReviewController::reviews_for_user($id);
});





$routes->get('/tag/:id/:name', function($id){
  TagController::show($id);
});

$routes->get('/tag/:id', function($id){
  TagController::show($id);
});

$routes->get('/list/tags', function(){
  TagController::list();
});




$routes->get('/test', function(){
  TestController::test();
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



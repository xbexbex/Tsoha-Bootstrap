<?php

  $routes->get('/', function() {
    DefaultController::index();
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


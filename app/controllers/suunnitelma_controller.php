<?php

  class SuunnitelmaController extends BaseController{

    public static function muokkaus(){
   	  View::make('suunnitelmat/muokkaus.html');
    }

    public static function kirves(){
     View::make('suunnitelmat/kirves.html');
    }

    public static function login(){
     View::make('suunnitelmat/login.html');
    }

    public static function haku(){
     View::make('suunnitelmat/haku.html');
    }
  }


<?php

class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
  protected $validators, $validatees;

  public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
    foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
      if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
        $this->{$attribute} = $value;
      }
    }
  }

  public function get_time(){
    return date("Y:m:d:H:i:s");
  }

  public static function validate_string_length($name, $string, $length){
    $error = array();
    if(strlen($string) < $length){
      $error[] = "${name} must be longer than $length characters";
    }
    return $error;
  }

  public static function validate_string_empty($name, $string){
    $error = array();
    if($string == '' || $string == null){
      $error[] = "${name} must not be empty";
    }
    return $error;
  }

   public static function validate_int($name, $string){
    $error = array();
    if($string == '' || $string == null){
      $error[] = "${name} cannot be empty";
    } elseif(!is_numeric($string)) {
      $error[] = "${name} must be an integer";
    } elseif($string < 0){
      $error[] = "${name} cannot be negative";
    }
    return $error;
  }

  public function validate_many($validatees, $validators){
    $errors = array();
    foreach ($validatees as $name => $string) {
      foreach ($validators as $validator) {
        $errors = array_merge($errors, $this->{$validator}($name, $string));
      }
    }
    return $errors;
  }
}

<?php

class BaseController{

  public static function get_account_logged_in(){
    if(isset($_SESSION['account'])){
      $account_id = $_SESSION['account'];
      $account = Account::find($account_id);
      
      return $account;
    }
    return null;
  }

  public static function check_logged_in(){
      // Toteuta kirjautumisen tarkistus tähän.
      // Jos käyttäjä ei ole kirjautunut sisään, ohjaa hänet toiselle sivulle (esim. kirjautumissivulle).
  }

}

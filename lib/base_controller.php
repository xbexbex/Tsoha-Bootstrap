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
    if(!isset($_SESSION['account'])){
      Redirect::to('/login', array('message' => 'You need to log in first'));
    }
  }

  public static function check_edit_rights($id){
    $account = self::get_account_logged_in();
    if(!$account == null){
      if($account->admin == true){
        return 2;
      }elseif($account->id == $id){
        return 1;
      }
    }
    return 0;
  }
}

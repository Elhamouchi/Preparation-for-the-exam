<?php
  include "../inc/config/conf-validat.php";
  /**
   * check if a email is valid
   * 
   * @param string $email
   * 
   * @return bool 
   */

  function is_a_valid_email(string $email): bool{
    $email = trim($email);
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      return true;
    }
    return false;
  }


  /**
   * check if a password is valid
   * 
   * @param string $password
   * 
   * @return bool 
   */

  function is_a_valid_password(string $password): bool{

    $pass = trim($password);
    if(strlen($pass) <= PASS_MAX_LENGTH && strlen($pass) >= PASS_MIN_LENGTH ){
      return true;
    }
    return false;

  }

  /**
   * check if a label is valid
   * 
   * @param string $label
   * 
   * @return bool 
   */

  function is_a_valid_label(string $label):bool{
    $label = trim($label);

    if(preg_match("/^[a-zA-Z][a-zA-Z1-9\s\-_]{1,29}$/", $label)){
      return true;
    }
    return false;
  }

  /**
   * check if the prix is valid
   * 
   * @param string $prix
   * 
   * @return bool
   * 
   */


  function is_a_valid_prix(string $prix): bool{
    $prix = trim($prix);
    if(preg_match("/^[1-9][0-9]*(\.[0-9]+)?$/", $prix)){
      return true;
    }

    return false;
  }

  /**
   * check if a date is valid
   * - date form Y/m/d
   *
   * @param string  $date
   * 
   * @return bool
   * 
   */

  function is_a_valid_date(string $date){
    $date = trim($date);
    if(preg_match("/^[0-9]{4}[\/\-][0-9]{1,2}[\/\-][0-9]{1,2}$/", $date)){

      list($year, $month, $day) = preg_split("/\-\//", $date);
      if(checkdate($month, $day, $year)){
        return true;
      }

    }
    return false;
    
  }

  function is_a_valid_select(string $option, array $options): bool{
    if(array_search($option, $options) === false){
      return false;
    }
    return true;
  }
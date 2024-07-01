<?php
include_once "../inc/config/conf-flash.php";

/**
 * Create a flash message
 * fileP : inc/flash.php 
 *
 * @param string $name
 * @param string $message
 * @param string $type
 * @return void
 */
function create_flash_message(string $name, string $message, string $type): void{
  if(isset($_SESSION[FLASH][$name])){
    unset($_SESSION[FLASH][$name]);
  }

  $_SESSION[FLASH][$name]  = ["message"=> $message, "type"=> $type];

}


/**
 * Format a flash message
 * fileP : inc/flash.php 
 * @param array $flash_message
 * @return string
 */
function format_flash_message(array $flash_message): string{
  return sprintf('<div class="alert alert-%s">%s</div>',  $flash_message["type"], $flash_message["message"]);
}   

/**
 * Display a flash message
 * fileP : inc/flash.php 
 * @param string $name
 * @return void
 */
function display_flash_message(string $name): void{
  if(!isset($_SESSION[FLASH][$name])){
    return;
  }
  $flash_message = $_SESSION[FLASH][$name];
  unset($_SESSION[FLASH][$name]);

  echo format_flash_message($flash_message);
}


/**
 * Flash a message
 * fileP : inc/flash.php 
 * @param string $name
 * @param string $message
 * @param string $type (error, warning, info, success)
 * @return void
 */
function flash(string $name = '', string $message = '', string $type = ''): void{
  if($name != "" && $message != "" && $type != ""){
    create_flash_message($name, $message, $type);
  }elseif($name != "" && $message == "" && $type == ""){
    display_flash_message($name);
  }
}


?>



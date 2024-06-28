<?php 
const FLASH = 'FLASH_MESSAGES';
const FLASH_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info';
const FLASH_SUCCESS = 'success';

/**
 * Create a flash message
 * fileP : inc/flash.php 
 *
 * @param string $name
 * @param string $message
 * @param string $type
 * @return void
 */

function create_flash_message(string $name, string $message, string $type): void
{ 
  if($_SESSION[FLASH][$name]){
    unset($_SESSION[FLASH][$name]);
  }

  $_SESSION[FLASH][$name] = ["message" => $message, "type" => $type];
}
/** 
* format a flash message, write the array of a FLASH name to alert div
* @param array $flash_message
* @return string
*/
function format_flash_message(array $flash_message): string{
  return sprintf('<div class="alert alert-%s">%s</div>',
  $flash_message["type"], $flash_message["message"]);
}


function display_flash_message(string $name){

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
function flash(string $name = '', string $message = '', string $type = ''): void
{
    if ($name !== '' && $message !== '' && $type !== '') {
        // create a flash message
        create_flash_message($name, $message, $type);
    } elseif ($name !== '' && $message === '' && $type === '') {
        // display a flash message
        display_flash_message($name);
    }
}

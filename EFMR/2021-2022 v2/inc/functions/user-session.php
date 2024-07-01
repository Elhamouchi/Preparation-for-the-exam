<?php
require_once "db.php";
function create_user_session($login, $password, $nom, $prenom){
    if(isset($_SESSION["user"][$login])){
        unset($_SESSION["user"][$login]);
    }

    $_SESSION["user"] = [
        "login" => $login,
        "password"=>$password, 
        "nom" => $nom,
        "prenom"=> $prenom
    ];
}


function check_session(){
    $is_authen = false;
    if(isset($_SESSION["user"], $_SESSION["user"]["login"], $_SESSION["user"]["password"])){
        $login = $_SESSION["user"]["login"];
        $password = $_SESSION["user"]["password"];
        $is_authen = authentification($login, $password);
    }

    if(!$is_authen){
        header("location: ../viewPages/login.php");
    };
}


function logout_session(){
    unset($_SESSION);
    session_destroy();
    header("location: ../viewPages/login.php");
}
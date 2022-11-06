<?php
require_once File::build_path(['controller','ControllerVoiture.php']);
require_once File::build_path(['controller','ControllerUtilisateur.php']);

$preference = $_GET['pref'];
setcookie('preference', $preference, time()+3600*24); /* expire dans 1 heure = 3600 secondes */

// On recupère l'action passée dans l'URL
if(isset($_COOKIE['preference'])){
    $controller_default = $_COOKIE['preference'];
}else{
    $controller_default = 'voiture';
}

if($controller_default == "voiture"){

    $controller_class = "Controller" . ucfirst($controller_default);

    if(empty($_GET["action"])){

        $action = "readall";
        ControllerVoiture::readAll();
    
    }else{
        $action = $_GET["action"];
    
        switch($action){
    
            case "readall":
                ControllerVoiture::readAll();
                break;
            case "read":
                $immat = $_GET['immat'];
                ControllerVoiture::read($immat);
                break;
            case "create":
                ControllerVoiture::create();
                break;
            case "deleted":
                $immat = $_GET['immat'];
                ControllerVoiture::deleted($immat);
                break;
            case "update":
                ControllerVoiture::update();
                break;
            case "updated":
                $marque = $_GET['marque'];
                $couleur = $_GET['couleur'];
                $immat = $_GET['immat'];
                ControllerVoiture::updated($immat,$marque,$couleur);
                break;
            case "created":
                $marque = $_GET['marque'];
                $couleur = $_GET['couleur'];
                $immat = $_GET['immat'];
                ControllerVoiture::created($immat,$marque,$couleur);
                break;
            default:
                ControllerVoiture::error();
        }
    }

}elseif($controller_default == "utilisateur"){

    $controller_class = "Controller" . ucfirst($controller_default);

    if(!class_exists($controller_class)){
        ControllerVoiture::error();
    }

    if(empty($_GET["action"])){

        $action = "readall";
        ControllerUtilisateur::readAll();
    
    }else{
        $action = $_GET["action"];
    
        switch($action){
    
            case "readall":
                ControllerUtilisateur::readAll();
                break;
            case "read":
                $login = $_GET['login'];
                ControllerUtilisateur::read($login);
                break;
            case "deleted":
                $login = $_GET['login'];
                ControllerUtilisateur::deleted($login);
                break;
            case "create":
                ControllerUtilisateur::create();
                break;
            case "update":
                ControllerUtilisateur::update();
                break;
        }
    }
}else{
    ControllerVoiture::error();

}



?>
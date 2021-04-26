<?php
    require_once('../Config/conf.php');
    require_once('../Models/Model.php');
    require_once ('../Models/ModelVoiture.php'); // chargement du modèle
    class ControllerVoiture{
        public static function readAll(){
            $construct = new ModelVoiture("porsche","vert","et94ryre");
            $tab_v = $construct->getAllVoiture(); //appel au modèle pour gerer la BD
            require('../Views/Voiture/list.php');
        }
        public static function read(){
            $construct = new ModelVoiture("porsche","vert","et94ryre");
            $immatriculation = $construct->getVoitureByImmat("et94ryre",'porsche','couleur');
            require('../Views/Voiture/detail.php');
        }
    }
    
   
?>
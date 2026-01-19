<?php
require_once "../app/Models/Huissier.php";
require_once "../app/Helper/Database.php";
$Huissier = new Huissier();
if(isset($_GET['name'])){
    $name = $_GET['name'];
    $huissiers = $Huissier->getAllHuissiersFilter($name);
    $huissiers = json_encode($huissiers);
    header('Content-Type: application/json');
    echo ($huissiers);
}
elseif(isset($_GET['ville_id']) && $_GET['ville_id'] != 'toutes'){
    $ville_id = $_GET['ville_id'];
    $huissiers = $Huissier->getAllHuissiersFilterVille($ville_id);
    $huissiers = json_encode($huissiers);
    header('Content-Type: application/json');
    echo ($huissiers);
}
elseif(isset($_GET['ville_id'])&& $_GET['ville_id'] = 'toutes'){

    $huissiers = $Huissier->getAllHuissier();
    $huissiers = json_encode($huissiers);
    header('Content-Type: application/json');
    echo ($huissiers);
}

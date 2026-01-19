<?php
require_once "../app/Models/Avocat.php";
require_once "../app/Helper/Database.php";
$Avocat = new Avocat();
if(isset($_GET['name'])){
    $name = $_GET['name'];
    $avocats = $Avocat->getAllAvocatsFilter($name);
    $avocats = json_encode($avocats);
    header('Content-Type: application/json');
    echo ($avocats);
}
elseif(isset($_GET['ville_id']) && $_GET['ville_id'] != 'toutes'){
    $ville_id = $_GET['ville_id'];
    $avocats = $Avocat->getAllAvocatsFilterVille($ville_id);
    $avocats = json_encode($avocats);
    header('Content-Type: application/json');
    echo ($avocats);
}
elseif(isset($_GET['ville_id'])&& $_GET['ville_id'] = 'toutes'){
    $avocats = $Avocat->getAllAvocats();
    $avocats = json_encode($avocats);
    header('Content-Type: application/json');
    echo ($avocats);
}
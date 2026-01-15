<?php
require_once "../app/Models/Avocat.php";
require_once "../app/Helper/Database.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {

  switch ($_POST['type']) {
    case "Avocat":
      $inputs = array("email", "full_name", "password_hash", "age", "sexe", "annes_experience", "specialite", "consult_en_ligne", "ville_id");
      $infos = [];
      foreach ($inputs as $input) {
        $infos[$input] = $_POST[$input];
      }
      $infos['password_hash'] = password_hash($_POST['password_hash'], PASSWORD_BCRYPT);
      $avocat = new Avocat();
      try {
        $avocat->addAvocat($infos);
      } catch (PDOException $e) {
        throw new PDOException("error d'insertion: " . $e->getMessage());
      }
      header("location: /listAvocat");
      break;
    case "Huissier":
      break;
  }
} else {
  require_once "../src/Views/FormAvocatHuissier.php";
}

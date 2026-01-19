<?php
require_once "../app/Models/Avocat.php";
require_once "../app/Models/Huissier.php";
require_once "../app/Helper/Database.php";
$Huissier = new Huissier();
$Avocat = new Avocat();

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['action'] === 'create') {

  switch ($_POST['type']) {
    case "Avocat":
      $inputs = array("email", "full_name", "password_hash", "age", "sexe", "annes_experience", "specialite", "consult_en_ligne", "ville_id");
      $infos = [];
      foreach ($inputs as $input) {
        $infos[$input] = $_POST[$input];
      }
      $infos['password_hash'] = password_hash($_POST['password_hash'], PASSWORD_BCRYPT);
      try {
        $Avocat->addAvocat($infos);
      } catch (PDOException $e) {
        throw new PDOException("error d'insertion: " . $e->getMessage());
      }
      header("location: /listAvocat");
      exit;
      break;
    case "Huissier":
      
      $inputs = array("email", "full_name", "password_hash", "age", "sexe", "annes_experience", "type_actes", "ville_id");
      $infos = [];
      foreach ($inputs as $input) {
        $infos[$input] = $_POST[$input];
      }
      $infos['password_hash'] = password_hash($_POST['password_hash'], PASSWORD_BCRYPT);
      try {
        $Huissier->addHuissier($infos);
      } catch (PDOException $e) {
        throw new PDOException("error d'insertion: " . $e->getMessage());
      }
      header("location: /listHuissier");
      exit;

      break;
  }
} elseif (isset($_GET['id'])) {
  $id = $_GET['id'];
  $avocat = $Avocat->select($id);
  require_once "../src/Views/FormAvocatHuissier.php";
?>
  <script>
    const selected = <?= json_encode($avocat) ?>;
    const inputs = document.querySelectorAll(".inputs");
    inputs[0].value = selected.full_name;
    inputs[1].value = selected.email;
    inputs[2].value = selected.age;
    if (selected.sexe === 'male') {
      document.querySelector('input[name="sexe"][value="male"]').checked = true;
    } else {
      document.querySelector('input[name="sexe"][value="female"]').checked = true;
    }
    inputs[5].value = selected.annes_experience;
    inputs[6].value = selected.ville_id;

    if (selected.specialite != null && selected.specialite != undefined) {
      document.querySelector('input[name="type"][value="Avocat"]').checked = true;
      let infos = document.querySelector(".type");
      infos.innerHTML = "";
      infos.innerHTML = `
          <div class="form-group">
                <label for="specialite">SPÉCIALITÉ</label>
                <input type="text" id="specialite" name="specialite" class="spectialite" placeholder="Ex: droit civil, droit pénal" required>
            </div>


            <div class="form-group">
                <label>CONSULTATION EN LIGNE</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="consult_yes" name="consult_en_ligne" value="yes">
                        <label for="consult_yes">Oui</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="consult_no" name="consult_en_ligne" value="no">
                        <label for="consult_no">Non</label>
                    </div>
                </div>
            </div>
    
    `
      document.querySelector(".spectialite").value = selected.specialite
      if (selected.consult_en_ligne === 'yes') {
        document.querySelector('input[name="consult_en_ligne"][value="yes"]').checked = true;
      } else {
        document.querySelector('input[name="consult_en_ligne"][value="no"]').checked = true;
      }

    }
  </script> 
<?php
}
 elseif ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['id_type'])) {

    $inputs = array("email", "full_name", "age", "sexe", "annes_experience", "specialite", "consult_en_ligne", "ville_id");
    $data = [];
    foreach ($inputs as $input) {
      $data[$input] = $_POST[$input];
    }
    $data['id'] = intval($_POST['id_type']);
    $data['ville_id'] = intval($_POST['ville_id']);
    $data['annes_experience'] = intval($_POST['annes_experience']);
    try {
      $Avocat->update($data);
    } catch (PDOException $e) {
      throw new PDOException("error d'insertion: " . $e->getMessage());
    }
    header("location: /listAvocat");
    exit;
  } else {
  require_once "../src/Views/FormAvocatHuissier.php";
}

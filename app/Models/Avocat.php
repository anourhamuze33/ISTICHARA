<?php
class Avocat {

    public function addAvocat(array $infos):bool
    {
            $db = Database::getInstance()->getConnection();
            $sql = "INSERT INTO avocats (email, full_name, password_hash, age, sexe, annes_experience, specialite, consult_en_ligne, ville_id) values(:email, :full_name, :password_hash, :age, :sexe, :annes_experience, :specialite, :consult_en_ligne, :ville_id)";
            $stmt = $db->prepare($sql);
            $stmt->execute($infos);
            return true;
    }
    public function getAllAvocats(): array
    {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT a.*, v.name as ville FROM avocats a
        INNER JOIN villes v on v.id = a.ville_id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
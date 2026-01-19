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

    public function select(int $id): array
    {
        $db = Database::getInstance()->getConnection();
        $selected = "SELECT a.*, v.name as ville FROM avocats a
        INNER JOIN villes v on v.id = a.ville_id where a.id = ?";
        $stmt = $db->prepare($selected);
        $stmt->execute([$id]);
        $selectedAvocat = $stmt->fetch();
        return $selectedAvocat;
    }

    public function update($data)
    {
    
            $db = Database::getInstance()->getConnection();
            $sql = "UPDATE avocats SET email= :email, full_name= :full_name, age= :age, sexe= :sexe, annes_experience= :annes_experience, specialite= :specialite, consult_en_ligne= :consult_en_ligne, ville_id= :ville_id
            WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute($data);
    }

    public function getAllAvocatsFilter(string $name) {
        $db = Database::getInstance()->getConnection();
        $selected = "SELECT a.*, v.name as ville FROM avocats a
        INNER JOIN villes v on v.id = a.ville_id where a.full_name like '{$name}%' or a.email like '{$name}%'";
        $stmt = $db->prepare($selected);
        $stmt->execute();
        $filtredAvocat = $stmt->fetchAll();
        return $filtredAvocat;
    }
    public function getAllAvocatsFilterVille(string $ville_id) {
        $db = Database::getInstance()->getConnection();
        $selected = "SELECT a.*, v.name as ville FROM avocats a
        INNER JOIN villes v on v.id = a.ville_id where v.id =?";
        $stmt = $db->prepare($selected);
        $stmt->execute([$ville_id]);
        $filtredAvocat = $stmt->fetchAll();
        return $filtredAvocat;
    }
}
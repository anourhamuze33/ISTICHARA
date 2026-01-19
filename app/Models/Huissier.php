<?php
class Huissier {
    public function addHuissier(array $infos): bool
    { 
            $db = Database::getInstance()->getConnection();
            $sql = "INSERT INTO huissiers (email, full_name, password, age, sexe, annes_experience, type_actes, ville_id) values(:email, :full_name, :password_hash, :age, :sexe, :annes_experience, :type_actes, :ville_id)";
            $stmt = $db->prepare($sql);
            $stmt->execute($infos);
            return true;
    }
    public function getAllHuissier(): array
    {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT h.*, v.name as ville FROM huissiers h
        INNER JOIN villes v on v.id = h.ville_id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    public function getAllHuissiersFilter(string $name) {
        $db = Database::getInstance()->getConnection();
        $selected = "SELECT h.*, v.name as ville FROM huissiers h
        INNER JOIN villes v on v.id = h.ville_id where h.full_name like '{$name}%' or h.email like '{$name}%'";
        $stmt = $db->prepare($selected);
        $stmt->execute();
        $filtredHuissier = $stmt->fetchAll();
        return $filtredHuissier;
    }
    public function getAllHuissiersFilterVille(string $ville_id) {
        $db = Database::getInstance()->getConnection();
        $selected = "SELECT h.*, v.name as ville FROM huissiers h
        INNER JOIN villes v on v.id = h.ville_id where v.id =?";
        $stmt = $db->prepare($selected);
        $stmt->execute([$ville_id]);
        $filtredHuissier = $stmt->fetchAll();
        return $filtredHuissier;
    }
}
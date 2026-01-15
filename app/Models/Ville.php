<?php
require_once "../app/Helper/Database.php";
class Ville
{
    public function getAllVilles() 
    {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT name, id FROM villes";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $result = $stmt->fetchAll();
    }
}

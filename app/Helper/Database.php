<?php
class Database
{
    private static ?Database $instance = null;

    private string $host = "localhost";
    private string $username = "root";
    private string $db_name = "istichara";
    private string $password = "";
    private ?PDO $pdo = null;

    // just khnowing other
    // synchronized
    //eager init(static block)
    //     class Singleton {
    //     private static Singleton obj = new Singleton();
    //     private Singleton() {}
    //     public static Singleton getInstance() { return obj; }
    // }

    private function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $this->pdo = new PDO(
                $dsn,
                $this->username,
                $this->password,
                [
                    PDO::ERRMODE_EXCEPTION       => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, False);
        } catch (PDOException $e) {
            throw new PDOException("failed to connect to database try later" . $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (!self::$instance) {
            // self::$instance = new Database;
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
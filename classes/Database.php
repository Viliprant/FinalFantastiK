<?php

require_once("classes/Characters/Paladin.php");
require_once("classes/Characters/Thief.php");
require_once("classes/Characters/Monster.php");
require_once("classes/Characters/Wizard.php");

class Database
{
    private static $conn;
    private static $host = "localhost";
    private static $port = 3306;
    private static $user = "root";
    private static $pwd = "finalk";
    private static $db_name = "finalfantastik";

    public static function init()
    {
        try {
            self::$conn = new PDO("mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$db_name, self::$user, self::$pwd);
        } catch (PDOException $except) {
            throw $except;
        }

        return "Connexion établie";
    }

    public function getKaracters(string $label) {
        $request = 
        '   SELECT * 
            FROM karacter k
            INNER JOIN karacter_kategory kk ON kk.id = k.id_karacter_kategory
            WHERE kk.label = :label
        ';
        $result = self::$conn->prepare($request);
        $result->bindParam('label', $label, PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetchall();

        foreach($data as $karacter) {
            $karacters[] = new $karacter['class']("Fuck"); // changer les constructeurs samer !!!!!!
        }
        return $karacters;
    }

   
}

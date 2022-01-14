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

    public static function getKaracters(string $label)
    {
        $request =
            '   SELECT k.`id`, k.`class`, k.`label`, k.`id_karacter_kategory`, k.`life_point`, k.`armor`, k.    `strength`, k.`speed`, k.`agility`, k.`faith`, k.`magic`
                FROM karacter k
                INNER JOIN karacter_kategory kk ON kk.id = k.id_karacter_kategory
                WHERE kk.label = :label
        ';
        $result = self::$conn->prepare($request);
        $result->bindParam('label', $label, PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetchall();
        $result->closeCursor();

        foreach ($data as $karacter) {
            $karacters[] = new $karacter['class'](
                $karacter['id'],
                $karacter['life_point'],
                $karacter['speed'],
                $karacter['strength'],
                $karacter['armor'],
                $karacter['faith'],
                $karacter['magic'],
                $karacter['agility'],
                self::getSkills($karacter['id']),
                $label != "Player" ? $karacter['label'] : ""
            );
        }
        return $karacters;
    }

    public static function getSkills(int $idKaracter)
    {
        $request =
            '   SELECT sk.`id`, sk.`label`, sk.`is_multi_target`, sk.`cool_down`
                FROM skill sk
                INNER JOIN karacter_skill ks ON sk.id = ks.id_skill
                WHERE ks.id_karacter = :id
                ORDER BY sk.`cool_down` ASC
        ';
        $result = self::$conn->prepare($request);
        $result->bindParam('id', $idKaracter, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetchall();
        $result->closeCursor();

        $skills = [];

        foreach ($data as $skill) {
            $skills[] = new Skill(
                $skill['id'],
                $skill['label'],
                self::getTypeSkill($skill['id']),
                $skill['is_multi_target'],
                $skill['cool_down']
            );
        }

        return $skills;
    }

    public static function getTypeSkill(int $idSkill)
    {
        $request =
            '   SELECT st.`multiplier`, t.`label`
                FROM `type` t
                INNER JOIN skill_type st ON t.id = st.id_type
                WHERE st.id_skill = :id
        ';
        $result = self::$conn->prepare($request);
        $result->bindParam('id', $idSkill, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetchall();
        $result->closeCursor();

        foreach ($data as $type) {
            $types[$type['label']] = $type['multiplier'];
        }

        return $types;
    }
}

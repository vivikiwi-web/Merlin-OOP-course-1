<?php


class DB
{
    /**
     * Подключение к базе данных
     *
     * @return PDO
     */
    public static function getConnection()
    {
       $configPath = ROOT . '/include/config/db_config.php';
       $params = include($configPath);

       // SQL запро
       $dsn = "mysql:host=".$params['host'].";dbname=".$params['dbname'].";charset=" . $params['charset'];

       try {

           $pdo = new PDO($dsn, $params['username'], $params['password']);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           return $pdo;

       } catch (\PDOException $e) {
            throw new PDOException($e->getMessage());
       }

    }

}

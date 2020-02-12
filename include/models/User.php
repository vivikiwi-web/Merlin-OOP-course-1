<?php

class User
{
    private $pdo;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->pdo = DB::getConnection();
    }

    /**
     * Метод для получения всех зерегестрированых пользователе
     *
     * @return array $userList
     */
    public function getUsers(){

        $userList = [];
        $i = 0;

        // SQL запрос
        $query = 'SELECT id, email FROM users ORDER BY id DESC';
        $result = $this->pdo->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        if($result) {
            while ($row = $result->fetch()) {
                $userList[$i]['id'] = $row['id'];
                $userList[$i]['email'] = $row['email'];
                $i++;
            }
        }
        return $userList;
    }

    /**
     * Регистрация пользователя в базу
     *
     * @param  string $email
     * @param  string $password
     * @return void|mixed
     */
    public function registerUser($email, $password)
    {
        // SQL запрос
        $query = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmp = $this->pdo->prepare($query);
        $stmp->execute(array($email, $password));
        return true;
    }

    /**
     * Проверка пользователя на существование
     *
     * @param  string $email
     * @return string|void
     */
    public function userExists($email)
    {
        $query = "SELECT * FROM users WHERE `email` = '?'";
        $result = $this->pdo->prepare($query);
        $result->execute(array($email));
        $numRows = $result->fetchColumn();

        if ($numRows > 0) {
            return "Такой пользователь уже существует";
        }
        return;
    }

}

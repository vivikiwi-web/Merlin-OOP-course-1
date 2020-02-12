<?php
// Подключаем HELPER файл с слассом Validation()
require_once(ROOT . '/include/helpers/Validation.php');

// Подключаем файл с слассом User()
require_once(ROOT . '/include/models/User.php');

/**
 * Class SiteController - запуск сайта через контроллер
 */
class SiteController
{

    /**
     * Медот запускается при открырии сайта
     */
    public static function actionIndex()
    {
        $userRegister = "";

        // Инициализируем объект класса User()
        $user = new User();

        // Получаем список зарегестрированныч пользователей из класса User() и возвращаем его
        $userList = $user->getUsers();

        if (isset($_POST['register'])) {

            // Присваеваем полученные данные
            $email = Validation::default($_POST['email']);
            $password = Validation::default($_POST['password']);
            $passwordConfirm = Validation::default($_POST['password_confirm']);

            // Устонавливаем дополнительные атрибуты
            $errors = [];
            $showError = false;
            $userRegister = false;

            // Проходим волидацию поле
            $errors[] = Validation::checkEmpty($email, 'Эл. почта');
            $errors[] = Validation::checkEmail($email);
            $errors[] = Validation::checkEmpty($password, 'Пароль');
            $errors[] = Validation::checkEmpty($passwordConfirm, 'Повторитъ пароль');
            $errors[] = Validation::matchPasswords($password, $passwordConfirm);

            // Проверяем существует ли такой пользователь в базе
            $errors[] = $user->userExists($email);

            foreach ($errors as $error => $value) {
                if(!empty($value)){
                    $showError = true;
                }
            }

            if($showError == false) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $userRegister = $user->registerUser($email, $passwordHash);
            }

        }

        // Подлючаем файл с формой регистрации
        require_once ROOT . '/view/register.php';

    }

}
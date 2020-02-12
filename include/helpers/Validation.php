<?php

class Validation
{

    /**
     * Перепроверка инпутов
     * 
     * @param  string $input
     * @return string       
     */
    public static function default($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }

    /**
     * Проверка почты
     * 
     * @param  string $input     
     * @param  string $fieldText 
     * @return void|string
     */
    public static function checkEmpty($input, $fieldText)
    {
        if( empty($input) || !isset($input) ) {
            return "$fieldText поле пустое";
        }
        return;
    }

    /**
     * Проверка почты на валидацию
     * 
     * @param  string $input 
     * @return void|string
     */
    public static function checkEmail($input)
    {
        if(!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return "Эл. почта введина не коректно.";
        }

        return;
    }

    /**
     * Проверка поролей на совподение
     * 
     * @param  string $password        
     * @param  string $passwordConfirm 
     * @return void|string            
     */
    public static function matchPasswords($password, $passwordConfirm)
    {
        if($password !== $passwordConfirm) {
            return "Пароли не совподают.";
        }
        return;
    }


}
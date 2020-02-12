<?php

// Регистрируем константы
define('ROOT', dirname(__FILE__));

// Подключаем файл с классом и подключаемся к баззе данных
require_once(ROOT . '/include/models/DB.php');

// Подключаем закрузочный контролер
require_once ROOT . '/include/controllers/SiteController.php';

SiteController::actionIndex();
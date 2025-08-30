<?php

// Abrir a sessão
session_start();


// carregar config
require_once __DIR__."/../config.php";

// carregar classes
require_once BASE_PATH."/vendor/autoload.php";

require_once BASE_PATH."/core/routes.php";

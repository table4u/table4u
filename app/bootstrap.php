<?php

//load config
require_once 'config/config.php';

//load helpers
require_once 'helpers/session_helper.php';
require_once 'helpers/validation_helper.php';
require_once 'helpers/reservation_helper.php';
// require_once 'helpers/session_helper.php';

//autoload core libraries
spl_autoload_register(function ($className) {
    require_once 'libs/' . $className . '.php';
});

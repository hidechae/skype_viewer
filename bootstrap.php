<?php
//require_once('/usr/share/php/Smarty/Smarty.class.php');

define('THEME', 'respond');

define('ROOT', dirname(__FILE__).'/');
define('LIB_DIR', ROOT . 'lib/');
define('TPL_DIR', ROOT . 'tpl/');
define('DB_DIR', ROOT . 'db/');
define('DAO_DIR', ROOT . 'dao/');
define('THEME_DIR', '../theme/' . THEME);

require_once(LIB_DIR . 'Smarty/Smarty.class.php');
require_once(DAO_DIR . 'base.php');

class MySmarty extends Smarty
{
    function MySmarty()
    {
        $this->template_dir = ROOT . '/templates/';
        $this->compile_dir = ROOT . '/templates_c/';
        $this->Smarty();
    }
}

/* global function */

function getDao($dao_name)
{
    $file_name = DAO_DIR . $dao_name . ".php";
    $class_name = strtoupper($dao_name) . "Dao";

    if (!file_exists($file_name)) {
        throw new Exception("No file `$file_name`");
    }

    require_once $file_name;
    return new $class_name;
}

<?php
/**
 * Description:
 */
function __autoload($class) {
	include strtolower($class) . '.php';
}

spl_autoload_register('__autoload');
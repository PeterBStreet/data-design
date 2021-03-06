<?php
/*
 * Created by PhpStorm.
 * User: petersdata
 * @author Peter Street <peterbstreet@gmail.com>
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * Date: 1/22/18
 * Time: 10:15 AM
 * Notes from DeepDiveBootCamp web site
 * Object Oriented PHP
 * Autoloader
 *
 * PSR-4 Compliant Autoloader
 *
 * This will dynamically load classes by resolving the prefix and class name. This is the method that frameworks
 * such as Laravel and Composer automatically resolve class names and load them. To use it, simply set the
 * configurable parameters inside the closure. This example is taken from PHP-FIG, referenced below.
 *
 * @param string $class fully qualified class name to load
 * @see http://www.php-fig.org/psr/psr-4/examples/ PSR-4 Example Autoloader
*/
 spl_autoload_register(function($class) {
/*
 * CONFIGURABLE PARAMETERS
 * prefix: the prefix for all the classes (i.e., the namespace)
 * baseDir: the base directory for all classes (default = current directory)
*/
$prefix = "DataDesign";
$baseDir = __DIR__;
/*
 * does the class use the namespace prefix?
 * no, move to the next registered autoloader
*/
$len = strlen($prefix);
if (strncmp($prefix, $class, $len) !== 0) {
		return;
}
/*
 * get the relative class name
*/
	 $className = substr($class, $len);
/*
 * replace the namespace prefix with the base directory, replace namespace
 * separators with directory separators in the relative class name, append
 * with .php
*/
$file = $baseDir . str_replace("\\", "/", $className) . ".php";
/*
	// if the file exists, require it
*/
if(file_exists($file)) {
		require_once($file);
	}
});

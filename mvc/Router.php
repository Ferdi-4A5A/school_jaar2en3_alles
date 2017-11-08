<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * [Router description]
 */
class Router
{
    public function __construct()
    {
        // getPayload
//    $url = $_SERVER['REQUEST_URI'];


        // $url = REQUEST_URI -> Contactscontroller word dan dus "Contacts" en readAllContactData blijft methode naam

        // dis dit moet in de URL komen als je op een naam klikt: ContactsController/readAllContactData

//    $url = "/ContactsController/readAllContactData/param1/param2";
    $url = $_SERVER['REQUEST_URI'];
    $packets = explode('/',$url);
    $this->determineDestination($packets);
    }
    /**
     * [determineDestination description]
     * @param  string $packets [description]
     * @return [type]          [description]
     */
    public function determineDestination($packets='')
    {
        if (isset($packets[2]) && $packets[2] != '') $classname = $packets[2];
        if (isset($packets[3]) && $packets[3] != '') $method = $packets[3];
//        if (empty($packets[2])) {
//            var_dump("HALLO");
//        }
        $params = array_slice($packets, 4);

        $this->sendToDestination($classname, $method, $params);
    }

    /**
     * [sendToDestination description]
     * @param  [type] $classname [description]
     * @param  [type] $method    [description]
     * @param  [type] $params    [description]
     * @return [type]            [description]
     */
    public function sendToDestination($classname,$method='',$params)
    {
        $class = 'controller/' . $classname . '.php';
        require_once($class);
        $obj = new $classname;
        die(call_user_func_array(array($obj, $method), array($params)));
    }

    public function __destruct()
    {
    }
}
new Router();


//htaccess toevoegen (zodat bij elke klik er in htaccess word gekeken):
//
//<IfModule mod_rewrite.c>
//RewriteEngine On
//RewriteCond %{REQUEST_FILENAME} !-f
//RewriteCond %{REQUEST_FILENAME} !-d
//RewriteRule . index.php [L]
//</IfModule>
//
//# Prevent file browsing
//    Options -Indexes
?>
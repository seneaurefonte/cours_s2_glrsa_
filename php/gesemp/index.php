 <?php

use App\Config\RouterIntermedaire;

 require_once __DIR__."/vendor/autoload.php";

$uri=($_SERVER['REQUEST_URI']);
RouterIntermedaire::route($uri);
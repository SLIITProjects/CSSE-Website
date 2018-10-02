<?php
/**
 * Created by PhpStorm.
 * User: chethiya
 * Date: 9/26/18
 * Time: 1:49 AM
 */

require_once '../vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/../secret/csse-ee784-62d164010846.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

$database = $firebase->getDatabase();
die(print_r($database));

?>
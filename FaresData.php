<?php
/**
 * Created by PhpStorm.
 * User: chethiya
 * Date: 10/3/18
 * Time: 11:56 PM
 */


require_once './vendor/autoload.php';

include_once ('AbstractObserverFares.php');

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FaresData extends AbstractObserverFares {

    protected $database;
    protected $dbname = 'PaymentHistory';

    public function __construct(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/csse-ee784-62d164010846.json');
        $firebase = (new factory)->withServiceAccount($serviceAccount)->create();

        $this->database = $firebase->getDatabase();

    }

    public function get(){


        if($this->database->getReference($this->dbname)->getSnapshot()){

            return $this->database->getReference($this->dbname)->getValue();
        }
        else{
            return FALSE;
        }
    }


}

?>
<?php
/**
 * Created by PhpStorm.
 * User: chethiya
 * Date: 10/4/18
 * Time: 1:54 AM
 */

require_once './vendor/autoload.php';
include_once ('AbstractObserverRoutes.php');

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

/**RoutesData calss extends the AbstractObserverRoutes and implments the get function*/
class RoutesData extends AbstractObserverRoutes {

    protected $database;
    protected $dbname = 'PaymentHistory';

    public function __construct(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/csse-ee784-62d164010846.json');
        $firebase = (new factory)->withServiceAccount($serviceAccount)->create();

        $this->database = $firebase->getDatabase();

    }

    /**Retrieves route data from the DB*/
    public function get(){
        if($this->database->getReference($this->dbname)->getSnapshot()){

            return $this->database->getReference($this->dbname)->getValue();
        }
        else{
            return FALSE;
        }
    }

}
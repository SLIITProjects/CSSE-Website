<?php
/**
 * Created by PhpStorm.
 * User: chethiya
 * Date: 10/5/18
 * Time: 10:44 PM
 */

include_once ('./FaresData.php');

use PHPUnit\Framework\TestCase;

class faresDataTest extends TestCase
{
    public function testRouteData()
    {

        $fareData = new FaresData();

        $data = $fareData->get();
        $actual = null;
        $actual1 = null;

        foreach ($data as $key => $value) {
            foreach ($value as $ky => $val){
                $actual=$ky;
                $actual1=$val;

                break;
            }
        }

        $this->assertEquals('accountId', $actual);

        $this->assertEquals('968765466V', $actual1);
    }
}
?>
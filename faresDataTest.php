<?php
/**
 * Created by PhpStorm.
 * User: chethiya
 * Date: 10/5/18
 * Time: 10:44 PM
 */

include_once ('./FaresData.php');

use PHPUnit\Framework\TestCase;

/**faresData unit test*/
class faresDataTest extends TestCase
{
    public function testRouteData()
    {

        $fareData = new FaresData();

        $data = $fareData->get();
        $actual = null;
        $actual1 = null;
        $actual3 = null;

        foreach ($data as $key => $value) {
            $actual3 = $key;
            foreach ($value as $ky => $val){
                $actual=$ky;
                $actual1=$val;

                break;
            }
        }

        $this->assertEquals('968765466V', $actual3);

        $this->assertEquals('accountId', $actual);

        $this->assertEquals('968765466V', $actual1);
    }
}
?>
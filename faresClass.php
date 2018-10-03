<?php
/**
 * Created by PhpStorm.
 * User: chethiya
 * Date: 9/26/18
 * Time: 2:09 AM
 */

class faresClass{

    /**Pie chart data*/
    public function piechartData(){

        $pieChartData= array(
            array("label"=> "1/3 (Colomobo-Kandy)", "y"=> 590),
            array("label"=> "22 (Anduradhpura-Kandy)", "y"=> 261),
            array("label"=> "1/44 (Jaffna-Colombo)", "y"=> 158),
            array("label"=> "77 (Galle-Kalutara)", "y"=> 72),
            array("label"=> "88 (Kandy-Galle)", "y"=> 191),
            array("label"=> "103 (Kaduwela-Malabe)", "y"=> 573)
        );
        return $pieChartData;

    }

    /**Bar chart data*/
    public function barchartData(){

        $barChartData = array(
            array("label"=> "Jan", "y"=> 284935),
            array("label"=> "Feb", "y"=> 256548),
            array("label"=> "Mar", "y"=> 245214),
            array("label"=> "Apr", "y"=> 233464),
            array("label"=> "May", "y"=> 200285),
            array("label"=> "Jun", "y"=> 194422),
            array("label"=> "Jul", "y"=> 180337),
            array("label"=> "Aug", "y"=> 172340),
            array("label"=> "Sep", "y"=> 118187),
            array("label"=> "Oct", "y"=> 107530)
        );
        return $barChartData;

    }

    /**Vertical bar chart data*/
    public function vbarchartData(){

        $vbarChartData = array( 
            array("y" => 7,"label" => "Mon" ),
            array("y" => 12,"label" => "Tue" ),
            array("y" => 28,"label" => "Wed" ),
            array("y" => 18,"label" => "THU" ),
            array("y" => 41,"label" => "FRI" ),
            array("y" => 15,"label" => "SAT" ),
            array("y" => 1,"label" => "SUN" )
        );
        
        return $vbarChartData;

    }


}
?>
<?php

include './RoutesData.php';

class routesClass{

    /**Bar chart data*/
    public function barchartData(){

        $analyze = new RoutesData();
        $arr=$analyze->get();

        foreach($arr as $key => $value){
            foreach ($value as $k => $val){
                echo $k.'=>'.$val."\n";
                echo $val."\n";
            }

        }

        $barChartData = array(
            array("label"=> "1/3 Colomobo-Kandy", "y"=> 284935),
            array("label"=> "22 Anduradhpura-Kandy", "y"=> 256548),
            array("label"=> "1/44 Jaffna-Colombo", "y"=> 245214),
            array("label"=> "77 Galle-Kalutara", "y"=> 233464),
            array("label"=> "88 Kandy-Galle", "y"=> 200285),
            array("label"=> "103 Kaduwela-Malabe", "y"=> 194422)
        );
        return $barChartData;
    }

    /**Pie chart data*/
    public function piechartData(){

        $dataPoints = array( 
            array("label"=>"September", "symbol" => "September","y"=>46.6),
            array("label"=>"October", "symbol" => "October","y"=>207.7),
        );
        return $dataPoints;
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
<?php

include './RoutesData.php';

class routesClass{

    /**Bar chart data*/
    public function barchartData(){

        $analyze = new RoutesData();
        $arr=$analyze->get();

        $barChartData = array();

        $data=array();
        $datarow=array();
        $datavals=array();

        foreach($arr as $key => $value){
            foreach ($value as $k => $val){

                if($k=='route'){
                    $route=$val;
                }

            }
            array_push($datarow, $route);
        }

        $values=array_count_values($datarow);


        foreach($values as $key=>$value){
            $datavals=array($key=>$value);
            array_push($data, $datavals);

        }

        foreach($data as $key=>$value) {
            foreach ($value as $k=>$v){
                $barChart = array(

                    "label" => $k, "y" => $v

                );
                array_push($barChartData,$barChart);
            }

        }


        return $barChartData;
    }

    /**Pie chart data*/
    public function piechartData(){

        $analyze = new RoutesData();
        $arr=$analyze->get();


        $cmonth=date('m');
        $cmonthname=date('M');
        $cmonthcount=0;
        $pmonth=date('m', strtotime('-1 month'));
        $pmonthname=date('M', strtotime('-1 month'));
        $pmonthcount=0;

        foreach($arr as $key => $value){
            foreach ($value as $k => $val){

                if($k=='date'){
                    $date=strtotime($val);
                    $month=date('m',$date);

                    if($month==$pmonth){
                        $pmonthcount=$pmonthcount+1;
                    }
                    if($month==$cmonth){
                        $cmonthcount=$cmonthcount+1;
                    }
                }

            }
        }

        $dataPoints = array( 
            array("label"=>$pmonthname, "symbol" =>$pmonthname,"y"=>$pmonthcount),
            array("label"=>$cmonthname, "symbol" => $cmonthname,"y"=>$cmonthcount),
        );
        return $dataPoints;
    }

    /**Vertical bar chart data*/
    public function vbarchartData(){

        $analyze = new RoutesData();
        $arr=$analyze->get();

        $vbarChartData = array();

        $data=array();
        $datarow=array();
        $datavals=array();

        foreach($arr as $key => $value){
            foreach ($value as $k => $val){

                if($k=='date'){
                    $date=$val;

                    $month=substr($date,5, -3);

                    $cmonth=date('m');

                    if($month==$cmonth){
                        $date=strtotime($date);
                        $day=date('D',$date);

                        array_push($datarow, $day);
                    }

                }

            }
            //array_push($datarow, $route);
        }

        $values=array_count_values($datarow);


        foreach($values as $key=>$value){
            $datavals=array($key=>$value);
            array_push($data, $datavals);

        }


        foreach($data as $key=>$value) {
            foreach ($value as $k=>$v){
                $vbarChart = array(

                    "label" => $k, "y" => $v

                );
                array_push($vbarChartData,$vbarChart);
            }

        }

        return $vbarChartData;
    }

}
?>
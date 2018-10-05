<?php
/**
 * Created by PhpStorm.
 * User: chethiya
 * Date: 9/26/18
 * Time: 2:09 AM
 */

include './FaresData.php';

include_once ('AbstractSubjectFares.php');

/**fares class extends abstractsubjectfares and implements the chart functions*/
class faresClass extends AbstractSubjectFares {

    /**Pie chart data*/
    public function piechartData(){


        $analyze = new FaresData();
        $arr=$analyze->get();

        $pieChartData = array();

        $data=array();

        $datarow=array();
        $route=null;
        $cost=0;

        foreach($arr as $key => $value){
            foreach ($value as $k => $val){

                if($k=='route'){
                    $route=$val;
                }
                if($k=='cost'){
                    $cost=$val;
                }

            }
            if(array_key_exists($route, $datarow)){
                $datarow[$route]=$datarow[$route]+$cost;
            }
            else{
                $datarow[$route]=$cost;
            }

        }

        foreach($datarow as $key=>$val){
            $pieChart=array(
                "label" => $key, "y" => $val
            );
            array_push($pieChartData,$pieChart);
        }


        return $pieChartData;

    }

    /**Bar chart data*/
    public function barchartData(){

        $analyze = new FaresData();
        $arr=$analyze->get();

        $janamt=0;
        $febamt=0;
        $maramt=0;
        $apramt=0;
        $mayamt=0;
        $junamt=0;
        $julamt=0;
        $aguamt=0;
        $sepamt=0;
        $octamt=0;
        $novamt=0;
        $decamt=0;
        $cost=0;

        foreach($arr as $key => $value){
            foreach ($value as $k => $val){

                if($k=='cost'){
                    $cost=$val;
                }

                if($k=='date'){
                    $date=strtotime($val);
                    $year=date('y', $date);
                    $cyear=date('y');

                    if($year==$cyear){

                        $month=date('M',$date);

                        if($month=='Jan'){
                            $janamt=$janamt+$cost;
                        }
                        if($month=='Feb'){
                            $febamt=$febamt+$cost;
                        }
                        if($month=='Mar'){
                            $maramt=$maramt+$cost;
                        }
                        if($month=='Apr'){
                            $apramt=$apramt+$cost;
                        }
                        if($month=='May'){
                            $mayamt=$mayamt+$cost;
                        }
                        if($month=='Jun'){
                            $junamt=$junamt+$cost;
                        }
                        if($month=='Jul'){
                            $julamt=$julamt+$cost;
                        }
                        if($month=='Aug'){
                            $aguamt=$aguamt+$cost;
                        }
                        if($month=='Sep'){
                            $sepamt=$sepamt+$cost;
                        }
                        if($month=='Oct'){
                            $octamt=$octamt+$cost;
                        }
                        if($month=='Nov'){
                            $novamt=$novamt+$cost;
                        }
                        if($month=='Dec'){
                            $decamt=$decamt+$cost;
                        }

                    }
                }
            }

        }

        $barChartData=array(
            array("label"=> "JAN", "y"=> $janamt),
            array("label"=> "FEB", "y"=> $febamt),
            array("label"=> "MAR", "y"=> $maramt),
            array("label"=> "APR", "y"=> $apramt),
            array("label"=> "MAY", "y"=> $mayamt),
            array("label"=> "JUN", "y"=> $junamt),
            array("label"=> "JUL", "y"=> $julamt),
            array("label"=> "AUG", "y"=> $aguamt),
            array("label"=> "SEP", "y"=> $sepamt),
            array("label"=> "OCT", "y"=> $octamt),
            array("label"=> "NOV", "y"=> $novamt),
            array("label"=> "DEC", "y"=> $decamt)

        );

        return $barChartData;

    }

    /**Vertical bar chart data*/
    public function vbarchartData(){

        $analyze = new FaresData();
        $arr=$analyze->get();

        $vbarChartData = array();

        $data=array();

        $mon=0;
        $tue=0;
        $wed=0;
        $thur=0;
        $fri=0;
        $sat=0;
        $sun=0;

        foreach($arr as $key => $value){
            foreach ($value as $k => $val){

                if($k=='cost'){
                    $cost=$val;
                }


                if($k=='date'){
                   $date=strtotime($val);
                   $year=date('y', $date);
                   $cyear=date('y');

                   if($year==$cyear){

                       $month=date('m', $date);
                       $cmonth=date('m');

                       if($month==$cmonth){

                           $day=date('D', $date);

                           if($day=='Mon'){
                               $mon=$mon+$cost;
                           }
                           if($day=='Tue'){
                               $tue=$tue+$cost;
                           }
                           if($day=='Wed'){
                               $wed=$wed+$cost;
                           }
                           if($day=='Thu'){
                               $thur=$thur+$cost;
                           }
                           if($day=='Fri'){
                               $fri=$fri+$cost;
                           }
                           if($day=='Sat'){
                               $sat=$sat+$cost;
                           }
                           if($day=='Sun'){
                               $sun=$sun+$cost;
                           }

                       }
                   }
               }
            }
        }


        $vbarChartData=array(
            array("y"=>$mon,"label"=>"MON"),
            array("y"=>$tue,"label"=>"TUE"),
            array("y"=>$wed,"label"=>"WED"),
            array("y"=>$thur,"label"=>"THU"),
            array("y"=>$fri,"label"=>"FRI"),
            array("y"=>$sat,"label"=>"SAT"),
            array("y"=>$sun,"label"=>"SUN")

        );

        return $vbarChartData;

    }


}
?>
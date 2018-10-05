<?php
/**
 * Created by PhpStorm.
 * User: chethiya
 * Date: 10/5/18
 * Time: 11:23 PM
 */

/**fares abstract subject class*/
abstract class AbstractSubjectFares
{
    /**functions that generates charts*/
    abstract function piechartData();
    abstract function barchartData();
    abstract function vbarchartData();

}
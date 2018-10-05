<?php
/**
 * Created by PhpStorm.
 * User: chethiya
 * Date: 10/5/18
 * Time: 11:18 PM
 */

/**routes abstract subject class*/
abstract class AbstractSubjectRoutes
{
    /**functions that generate charts*/
    abstract function barchartData();
    abstract function piechartData();
    abstract function vbarchartData();
}
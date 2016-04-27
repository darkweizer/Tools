<?php
/**
 * Created by PhpStorm.
 * User: Darkweizer
 * Date: 27/04/2016
 * Time: 22:51
 */

    require_once "../model/bd.php";
    $bd = new Bd();
    $connect = $bd->getPDO();

    $result = $connect->query("SELECT user_name FROM user WHERE user_id = 2");
    $result->setFetchMode( PDO::FETCH_OBJ );
    $data = $result->fetchAll();
    var_dump($data);

<?php
/**
 * Created by PhpStorm.
 * User: pascalkuiper
 * Date: 2019-06-07
 * Time: 08:44
 */

function getBackground($code){
    $connection = dbConnect();

    $sql = 'SELECT `name` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if($stmt->rowCount()){
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        return getBackground('bg-burst');
    }
}

function getH1($code){
    $connection = dbConnect();

    $sql = 'SELECT `h1` FROM `text` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if($stmt->rowCount()){
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getH2($code){
    $connection = dbConnect();

    $sql = 'SELECT `h2` FROM `text` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if($stmt->rowCount()){
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getP($code){
    $connection = dbConnect();

    $sql = 'SELECT `p` FROM `text` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if($stmt->rowCount()){
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getSpan($code){
    $connection = dbConnect();

    $sql = 'SELECT `span` FROM `text` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if($stmt->rowCount()){
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getTag1($code){
    $connection = dbConnect();

    $sql = 'SELECT `tag1` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if($stmt->rowCount()){
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getTag2($code){
    $connection = dbConnect();

    $sql = 'SELECT `tag2` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if($stmt->rowCount()){
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getTag3($code){
    $connection = dbConnect();

    $sql = 'SELECT `tag3` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if($stmt->rowCount()){
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}
?>
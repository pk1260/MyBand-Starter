<?php
/**
 * Created by PhpStorm.
 * User: pascalkuiper
 * Date: 2019-06-07
 * Time: 08:44
 */

function getBackground($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `name` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        return getBackground('bg-burst');
    }
}

function getH1($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `h1` FROM `text` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getH2($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `h2` FROM `text` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getP($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `p` FROM `text` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getSpan($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `span` FROM `text` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getTag1($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `tag1` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getTag2($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `tag2` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getTag3($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `tag3` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getTitel($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `titel` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getInfo($code)
{
    $connection = dbConnect();

    $sql = 'SELECT `titel` FROM `photos` WHERE code = :code';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['code' => $code]);
    if ($stmt->rowCount()) {
        $data = $stmt->fetchColumn();
        return $data;
    } else {
        echo 'lol';
    }
}

function getData()
{
    $database = dbConnect();

// de define() function maakt een constante (een vaste waarde)
    define("RIJ_PER_PAGINA", 3);

// Zoeken
    $zoek_keyword = '';
    if (!empty($_POST['search']['keyword'])) {
        $zoek_keyword = $_POST['search']['keyword'];
    }

    $sql = 'SELECT * FROM launch WHERE titel LIKE :keyword OR omschrijving LIKE :keyword OR datum LIKE :keyword ORDER BY datum DESC ';

// Pagination
    $per_pagina_html = '';
    $pagina = 1;
    $start = 0;
    if (!empty($_POST["page"])) {
        $pagina = $_POST["page"];
        $start = ($pagina - 1) * RIJ_PER_PAGINA;
    }
    $limit = " limit " . $start . "," . RIJ_PER_PAGINA;

// PDO statement
    $pagination_statement = $database->prepare($sql);
    $pagination_statement->bindValue(':keyword', '%' . $zoek_keyword . '%', PDO::PARAM_STR);
    $pagination_statement->execute();

// uitrekenen pagina's
    $rij_count = $pagination_statement->rowCount();
    if (!empty($rij_count)) {
        // ceil is een afrondfunctie in php
        $pagina_count = ceil($rij_count / RIJ_PER_PAGINA);
        if ($pagina_count > 1) {
            for ($i = 1; $i <= $pagina_count; $i++) {
                if ($i == $pagina) {
                    $per_pagina_html .= '<input type="button" name="page" value="' . $i . '" class="btn-page current" />';
                } else {
                    $per_pagina_html .= '<input type="button" name="page" value="' . $i . '" class="btn-page" />';
                }
            }
        }
    }

    $query = $sql . $limit;
    $pdo_statement = $database->prepare($query);
    $pdo_statement->bindValue(':keyword', '%' . $zoek_keyword . '%', PDO::PARAM_STR);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();

    return $result;
}

function showPhotos($random = false)
{
    // PHOTOS
    $data = [];
    $connection = dbConnect();
    // $sql = 'SELECT * FROM `photos` ORDER BY RAND()';

    $sql = 'SELECT * FROM `photos`';
    $stmt = $connection->query($sql);

    if ($stmt->rowCount()) {
        $data = $stmt->fetchAll();
    }


    if ($random === true) {
        shuffle($data);
    }

    return $data;
}

?>
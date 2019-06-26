<?php
/**
 * Created by PhpStorm.
 * User: pascalkuiper
 * Date: 2019-06-12
 * Time: 14:19
 */
?>
<?php

$database = dbConnect();

// de define() function maakt een constante (een vaste waarde)
define("RIJ_PER_PAGINA", 3);

// Zoeken
$zoek_keyword = '';
if (!empty($_POST['search']['keyword'])) {
    $zoek_keyword = $_POST['search']['keyword'];
}else if (!empty($_GET['search_keyword'])) {
    $zoek_keyword = $_GET['search_keyword'];
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
                $per_pagina_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
            } else {
                $per_pagina_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
            }
        }
    }
}

$query = $sql . $limit;
$pdo_statement = $database->prepare($query);
$pdo_statement->bindValue(':keyword', '%' . $zoek_keyword . '%', PDO::PARAM_STR);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

?>
<div class="img" style="background: url(<?php echo url('/img/') . getBackground('bg-launch'); ?>) 60% 0% no-repeat">
    <div id="img-text">
        <h1><?php echo getH1('main-launch'); ?></h1>
        <h2><?php echo getH2('main-launch'); ?></h2>
    </div>
</div>

<div class="launch-content">
    <div class="launch-tabel">
        <form action="<?php echo url('/launch')?>" name='zoekformulier' autocomplete="off" method="post">
            <div class='zoek'>Search<br>
                <input type='text' name='search[keyword]' value="<?php echo $zoek_keyword; ?>" id='search' maxlength='25' placeholder="what are you looking for">
                <div id="show_up"></div>
            </div>
            <table class="table-fill">
                <thead>
                <tr>
                    <th class='text-left'>Name</th>
                    <th class='text-left'>Description</th>
                    <th class='text-left'>Date</th>
                </tr>
                </thead>

                <tbody id='tabel-hover'>
                <?php
                if (!empty($result)) {
                    foreach ($result as $row) {
                        ?>
                        <tr class='tabel-rij'>
                            <td class="text-left"><?php echo $row['titel']; ?></td>
                            <td class="text-left"><?php echo $row['omschrijving']; ?></td>
                            <td class="text-left"><?php echo $row['datum']; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
            <?php echo "<p class='paginanummers'>$per_pagina_html</p>";?>
        </form>
    </div>
</div>
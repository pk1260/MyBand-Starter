<?php
/**
 * Created by PhpStorm.
 * User: pascalkuiper
 * Date: 2019-06-12
 * Time: 14:11
 */
?>

<div class="img" style="background: url(<?php echo url('/img/') . getBackground('bg-boundry'); ?>) 60% 30% no-repeat">
    <div id="img-text">
        <h1><?php echo getH1('main-photo'); ?></h1>
        <h2><?php echo getH2('main-photo'); ?></h2>
    </div>
</div>

<div class="photo-content">
    <?php foreach ($photos as $img) { ?>
        <div class="content-box">
            <h2 class="titel"><?php echo $img['titel'] ?></h2>
            <img class="content-img" src="<?php echo url('/img/' . $img['name']) ?>" alt="img" />
            <p class="text-content"><?php echo $img['text'] ?></p>
            <p id='tag' class="tag-1">Tag 1: <?php echo $img['tag1'] ?></p>
            <p id='tag' class="tag-2">Tag 2: <?php echo $img['tag2'] ?></p>
            <p id='tag' class="tag-3">Tag 3: <?php echo $img['tag3'] ?></p>
        </div>
    <?php } ?>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: pascalkuiper
 * Date: 2019-06-12
 * Time: 14:11
 */
?>

<div class="img" style="background: url(<?php echo url('/img/') . getBackground('bg-boundry'); ?>) 60% 30%">
    <div id="img-text">
        <h1><?php echo getH1('main-photo'); ?></h1>
        <h2><?php echo getH2('main-photo'); ?></h2>
    </div>
</div>

<div class="photo-content">
    <div class="content-box">
        <h2 class="titel">Hello</h2>
        <img class="content-img" src="<?php echo url('/img/') . getBackground('bg-spacex'); ?>" alt="img">
        <p class="content-p">Falon heavy on launchpad 13A the historic launch site of the Saturn rockets</p>
        <p id='tag' class="tag-1">Tag 1: <?php echo getTag1('bg-spacex'); ?></p>
        <p id='tag' class="tag-2">Tag 2: <?php echo getTag2('bg-spacex'); ?></p>
        <p id='tag' class="tag-3">Tag 3: <?php echo getTag3('bg-spacex'); ?></p>
    </div>

    <div class="content-box">
        <h2 class="titel">Hello</h2>
        <img class="content-img" src="<?php echo url('/img/') . getBackground('bg-launch'); ?>" alt="img">
        <p class="content-p">Falon heavy on launchpad 13A the historic launch site of the Saturn rockets</p>
        <p id='tag' class="tag-1">Tag 1: <?php echo getTag1('bg-launch'); ?></p>
        <p id='tag' class="tag-2">Tag 2: <?php echo getTag2('bg-launch'); ?></p>
        <p id='tag' class="tag-3">Tag 3: <?php echo getTag3('bg-launch'); ?></p>
    </div>

    <div class="content-box">
        <h2 class="titel">Hello</h2>
        <img class="content-img" src="<?php echo url('/img/') . getBackground('bg-elon'); ?>" alt="img">
        <p class="content-p">Falon heavy on launchpad 13A the historic launch site of the Saturn rockets</p>
        <p id='tag' class="tag-1">Tag 1: <?php echo getTag1('bg-elon'); ?></p>
        <p id='tag' class="tag-2">Tag 2: <?php echo getTag2('bg-elon'); ?></p>
        <p id='tag' class="tag-3">Tag 3: <?php echo getTag3('bg-elon'); ?></p>
    </div>

    <div class="content-box">
        <h2 class="titel">Hello</h2>
        <img class="content-img" src="<?php echo url('/img/') . getBackground('bg-burst'); ?>" alt="img">
        <p class="content-p">Falon heavy on launchpad 13A the historic launch site of the Saturn rockets</p>
        <p id='tag' class="tag-1">Tag 1: <?php echo getTag1('bg-burst'); ?></p>
        <p id='tag' class="tag-2">Tag 2: <?php echo getTag2('bg-burst'); ?></p>
        <p id='tag' class="tag-3">Tag 3: <?php echo getTag3('bg-burst'); ?></p>
    </div>
</div>

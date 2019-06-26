<?php
/**
 * Created by PhpStorm.
 * User: pascalkuiper
 * Date: 2019-05-24
 * Time: 09:28
 */
?>

<div class="img" style="background: url(<?php echo url('/img/') . getBackground('bg-spacex'); ?>) 60% 30% no-repeat">
    <div class="img-text">
        <h1><?php echo getH1('main-text'); ?><span><?php echo getSpan('main-text'); ?></span></h1>
        <h2><?php echo getH2('main-text'); ?></h2>
    </div>
</div>

<div class="aboutus">
    <div class="aboutus-text-left">
        <h2><?php echo getH2('about-text-left'); ?></h2><br>
        <p><?php echo getP('about-text-left'); ?></p>
    </div>
    <div class="aboutus-text-right">
        <p><?php echo getP('about-text-right'); ?></p>
    </div>
</div>


<a class="box-1" href="about">
    <div class="box-text">
        <h2><?php echo getH2('box-1'); ?></h2>
    </div>
    <div class="overlay-1" style="background: url(<?php echo url('/img/') . getBackground('bg-elon'); ?> )70% 30%">
        <div class="text"><h2><?php echo getH2('box-1'); ?></h2></div>
    </div>
</a>

<a class="box-2" href="photos">
    <div class="box-text">
        <h2><?php echo getH2('box-2'); ?></h2>
    </div>
    <div class="overlay-2"  style="background: url(<?php echo url('/img/') . getBackground('bg-burst'); ?>) 40% 30%">
        <div class="text"><h2><?php echo getH2('box-2'); ?></h2></div>
    </div>
</a>

<a class="box-3" href="launch">
    <div class="box-text">
        <h2><?php echo getH2('box-3'); ?></h2>
    </div>
    <div class="overlay-3"  style="background: url(<?php echo url('/img/') . getBackground('bg-launch'); ?>) 35% 5%">
        <div class="text"><h2><?php echo getH2('box-3'); ?></h2></div>
    </div>
</a>

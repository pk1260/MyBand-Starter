<?php
/**
 * Created by PhpStorm.
 * User: pascalkuiper
 * Date: 2019-06-12
 * Time: 14:14
 */
?>

<div class="img" style="background: url(<?php echo url('/img/') . getBackground('bg-elon'); ?>) 60% 0% no-repeat">
    <div id="img-text">
        <h1><?php echo getH1('main-about-left'); ?></h1>
        <h2><?php echo getH2('main-about-left'); ?></h2>
    </div>
</div>

<div class="aboutus-main">
    <div class="aboutus-main-left">
        <h2><?php echo getH2('main-about-left'); ?></h2><br>
        <p><?php echo getP('main-about-left'); ?></p>
    </div>
    <div class="aboutus-main-right">
        <p><?php echo getP('main-about-right'); ?></p>
    </div>
</div>
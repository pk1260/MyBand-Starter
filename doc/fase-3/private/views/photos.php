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
    <?php
        echo imgSpewer('');
    ?>
</div>

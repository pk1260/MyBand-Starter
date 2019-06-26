<div class="login-container">
    <div class="login-img" style="background: url(<?php echo url('/img/') . getBackground('bg-launch'); ?>) 30% 0% no-repeat"></div>

    <div class="login-form">
        <form class="login-box" action="<?php echo url('/login')?>" method="post">
            <h1>Login</h1>
            <input type="text" name="" value="" placeholder="Username">
            <input type="password" name="" value="" placeholder="Password">
            <input type="submit" name="" value="Login">
            <p>Don't have an account?</p>
            <a class="login-register" href="register">register here</a>
        </form>
    </div>
</div>
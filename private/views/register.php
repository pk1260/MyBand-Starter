<div class="login-container">
    <div class="login-img" style="background: url(<?php echo url('/img/') . getBackground('bg-launch'); ?>) 30% 0% no-repeat"></div>

    <div class="login-form">
        <form class="login-box" action="<?php echo url('/register')?>" method="post">
            <h1>Register</h1>
            <input type="text" value="" placeholder="First Name">
            <input type="text" value="" placeholder="Email">
            <input type="text" name="" value="" placeholder="Username">
            <input type="password" name="" value="" placeholder="Password">
            <input type="submit" name="" value="Register">
            <p>Already have an account?</p>
            <a class="login-register" href="login">login here</a>
        </form>
    </div>
</div>
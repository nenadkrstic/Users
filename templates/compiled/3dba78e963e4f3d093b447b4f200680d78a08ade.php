<?php $__env->startSection('content'); ?>
<div class="container">

    <?php
    if(isset($_SESSION['msg']))
        echo "<h3 class='text-center'> {$_SESSION['msg']}</h3>";
    ?>

    <div class="text-center"><h1>Sign up </h1> </div>

    <div class="container">
        <div class="col-lg-4">
            <form class="form-group text-left" method="post" action="signUp">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" >

                <label for="email">E-mail</label>
                <input class="form-control" type="mail" name="email" >

                <label for="mail">Password</label>
                <input class="form-control" type="password" name="password_one" >

                <label for="ConfirmPassword">Confirm password</label>
                <input class="form-control" type="password" name="ConfirmPassword_two" ><hr><br>

                <input class="btn btn-block btn-primary" type="submit" value="Sign up" >

            </form>
        </div>


    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
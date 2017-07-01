
@extends('app')

@section('content')
    <?php
    if(isset($_SESSION['msg']))
        echo "<h3 class='text-center'> {$_SESSION['msg']}</h3>";
    ?>
<div class="container">
    <div class="text-center"><h1>Log in</h1> </div>

    <div class="container">
        <div class="col-lg-4">
            <form class="form-group" onsubmit="return validetForm();return false;" method="POST" action="login">


                <label for="email">E-mail</label>
                <p id="emailErr"></p>
                <input id="email" class="form-control" type="text" name="email" >


                <label for="password">Password</label>
                <p id="passErr"></p>
                <input id="pass" class="form-control" type="password" name="password" ><hr><br>

                <input class="btn btn-block btn-primary" type="submit" value="Login" >

            </form>
        </div>


    </div>

</div>
    <script>


        function validetForm() {
            var email = $('#email').val();
            var pass = $('#pass').val();

            if(email == ''){
                $('#emailErr').append('E mail forma ne sme biti prazna');
                $('#email').css("border", "red solid 1px");
                return false;
            }

            if(pass == ''){
                $('#passErr').append('Password forma ne sme biti prazna');
                $('#pass').css("border", "red solid 1px");
                return false;
            }

            return true;
        }

    </script>

    @stop
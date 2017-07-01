@extends('app')
@section('content')
<div class="container">

    <div class="text-center"><h1>Sign up </h1> </div>

    <div class="container">
        <div class="col-lg-4">
            <form class="form-group text-left" method="post" action="signup">

                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" >

                <label for="email">E-mail</label>
                <input class="form-control" type="mail" name="email" >

                <label for="mail">Password</label>
                <input class="form-control" type="password" name="password_one" >

                <label for="ConfirmPassword">Confirm password</label>
                <input class="form-control" type="password" name="password_two" ><hr><br>

                <input class="btn btn-block btn-primary" type="submit" value="Sign up" >

            </form>
        </div>


    </div>

</div>
@stop
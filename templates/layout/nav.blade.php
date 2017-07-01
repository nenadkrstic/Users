<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <i class="fa fa-play-circle"></i></span> Quantox
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <?php
                    if(isset($_SESSION['user_id'])){
                        echo '<li><a class="page-scroll" href="/">Home</a></li>';
                        echo '<li><a class="page-scroll" href="">'. $_SESSION['name'].'</a></li>';
                        echo '<li><a class="page-scroll" href="">'. $_SESSION['email'].'</a></li>';
                        echo '<li><a class="page-scroll" href="logout">LogOut</a></li>';

                    }else{
                        echo '<li><a class="page-scroll" href="/">Home</a></li>';
                        echo '<li><a class="page-scroll" href="login-render">Login</a></li>';
                        echo '<li><a class="page-scroll" href="signup-render">Sign up</a></li>';
                    }
                ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
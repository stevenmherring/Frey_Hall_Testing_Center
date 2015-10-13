<!-- Navigation -->
<!--<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">-->
<nav class=".navbar-modified-margin-bottom navbar-default" role="navigation">

    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="#" rel="home" title="Stony Brook Testing Center">
              <img class="logo img-responsive" src="img/logo.jpg" alt="" style="max-width:250px; margin-top: -13px;">
            </a>
        </div>
        <!-- nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <?php
                        if (login_check($mysqli) == true) {
                          echo '
                          <li>
                              <a href="includes/perform_logout.php" data-toggle="tooltip" title="Logout">Logout</a>
                          </li> ';
                        }
                ?>


                <li><a href="#contactUsModal" data-toggle="modal" data-target="#contactUsModal">Contact us</a></li>
            </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>

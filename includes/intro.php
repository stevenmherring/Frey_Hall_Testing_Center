<a name="landing"></a>
<div class="intro-header">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="intro-message">
                    <h1>Stony Brook University</h1>
                    <h3>Testing Center at Frey Hall</h3>
                    <hr class="intro-divider">
                    <ul class="list-inline intro-social-buttons">
                        <li>
                          <?php
                            if(Authentication::login_check($db->getMysqli()) == false) {
                                echo '<a href="#login" class="btn btn-default btn-lg" data-toggle="modal"><i class="fa fa-sign-in fa-fw"></i> <span class="network-name">Login</span></a>';
                          } else {
                            echo '<a href="includes/perform_logout.php" class="btn btn-default btn-lg"><i class="fa fa-sign-out fa-fw"></i> <span class="network-name">Logout</span></a>';
                          }
                          ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.intro-header -->

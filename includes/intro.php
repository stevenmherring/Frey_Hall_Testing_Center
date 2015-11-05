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
<!-- Page Content -->
<section id="content-1">
  <div class="container">
    <div class="row section-header">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading section-themeable">Welcome to Frey Hall Testing Center</h2>
      </div>
     </div>
     <div class="row">
       <div class="col-sm-12 col-lg-12 text-center">
         <div class="introduction section-introduction section-themeable">
           <h3><p><strong>
             <?php
                     if (Authentication::login_check($db->getMysqli()) == true) {
                                     echo '<p>Hello, ' . htmlentities($_SESSION['username']) . '.</p>';
                     } else {
                                     echo '<p>Currently logged ' . $logged . '.</p>';
                             }
             ?>
           </strong></p></h3>
           <?php if (Authentication::login_check($db->getMysqli()) == false)
           echo '<p>Please Login to Continue</p>';
           ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- /.banner -->
<?php include('includes/modals.php');

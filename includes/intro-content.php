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

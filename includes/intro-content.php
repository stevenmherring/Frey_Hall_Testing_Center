<!-- Page Content -->
<section id="content-1">
  <div class="container">
    <div class="row section-header">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading section-themeable">Testing Center</h2>
      </div>
     </div>
     <div class="row">
       <div class="col-sm-12 col-lg-12 text-center">
         <div class="introduction section-introduction section-themeable">
           <h3><p><strong>
             <?php
                     if (login_check($mysqli) == true) {
                                     echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

                         echo '<p>Do you want to logout? <a href="includes/perform_logout.php">Log out</a>.</p>';
                         if ($_SESSION['auth'] == 2) {
                           echo '<p>STUDENT: ' . $logged . ' as ' . htmlentities($_SESSION['username']) . ' with AUTH: ' . htmlentities($_SESSION['auth']) . '.</p>';;
                         } else if($_SESSION['auth'] == 1) {
                            //echo '<p> ADMIN:' .  htmlentities($_SESSION['username']) . '</p>';
                            echo '<p>FACULTY: ' . $logged . ' as ' . htmlentities($_SESSION['username']) . ' with AUTH: ' . htmlentities($_SESSION['auth']) . '.</p>';
                          } else if($_SESSION['auth'] == 0) {
                           //echo '<p> ADMIN:' .  htmlentities($_SESSION['username']) . '</p>';
                           echo '<p>ADMIN: ' . $logged . ' as ' . htmlentities($_SESSION['username']) . ' with AUTH: ' . htmlentities($_SESSION['auth']) . '.</p>';
                         }
                     } else {
                                     echo '<p>Currently logged ' . $logged . '.</p>';
                             }
             ?>
           </strong></p></h3>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- /.banner -->

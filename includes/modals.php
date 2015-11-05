<!--login modal-->
<div id="login" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">DoIT - Single Sign On</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="includes/perform_login.php" method="post" name="login_form">
            <div class="form-group">
              <input type="text" name="netid" class="form-control input-lg" placeholder="Netid">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-danger btn-lg btn-block" value="Login" onclick="formhash(this.form, this.form.password);">Sign In</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
            <?php
              if (isset($_GET['error'])) {
                echo '<p class="error">Error Logging In!</p>';
              }
            ?>
            <?php
              if (Authentication::login_check($db->getMysqli()) === true) {
                echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
                echo '<p>Do you want to change user? <a href="includes/perform_logout.php">Log out</a>.</p>';
              } else {
                echo '<p>Currently logged ' . $logged . '.</p>';
                }
            ?>
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
      </div>
  </div>
  </div>
</div>

<!-- student schedule exam-->
<div id="student-schedule-exam" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Schedule Exam</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Exam ID">
            </div>
            <div class="form-group">
              <button class="btn btn-danger btn-lg btn-block">Search</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
      </div>
  </div>
  </div>
</div>

<div class="modal fade" id="contactUsModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Contact DoIT!</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Your Name</label>
            <input class="form-control" id="name" placeholder="Your name here" type="text">
          </div>
          <div class="form-group">
            <label for="email">Your E-mail</label>
            <input class="form-control" id="exampleEmail" placeholder="YourEmail@domain" type="email">
          </div>
          <div class="form-group">
            <label for="message">Enter A Message</label>
            <input class="form-control" id="messageBody" placeholder="Your message here" type="text">
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Cancel</a>
          <a href="#" class="btn btn-primary">Submit</a>
        </div>
      </div>
    </div>
</div>
<!-- /.container -->

<!--cancel_pending modal-->
<div id="cancel_pending" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h1 class="text-center"> Cancel Pending Exam</h1>
        </div>
        <div class="modal-body">
            <form class="form col-md-12 center-block" action="facultyexamdelete.php" method="post" name="cancel_pending_exam" id="cancel_pending_form" >

              <div class="form-group">
              <input type="text" name="examtodelete" class="form-control input-lg" >
            </div>
              <div class="form-group">
                <button class="btn btn-danger btn-lg btn-block" value="confirm_cancel-exam" onclick="handle_cancel_exam(this.form, this.form.examtodelete);" >Confirm</button>
              </div>
          </form>
        </div>
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
  </div>
</div>


<!--view appt details modal-->
<?php
include_once('classes/User.php'); ?>
<div id="view_attendance" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
          <form class="form col-md-12 center-block" action="faculty.php" method="post" name="view_exam_attendance" id="view_exam_attendance" >
          <div class="form-group">
            <input type="text" id="examtoviewattendance" name="examtoviewattendance" class="hidden" >
          </div>
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
  </div>
</div>
</div>

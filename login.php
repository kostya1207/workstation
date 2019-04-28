
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Financial - v1.0</title>

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/core.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/components.css" rel="stylesheet" type="text/css">
  <link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script src="global_assets/js/plugins/loaders/pace.min.js"></script>
  <script src="global_assets/js/core/libraries/jquery.min.js"></script>
  <script src="global_assets/js/core/libraries/bootstrap.min.js"></script>
  <script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script src="global_assets/js/plugins/forms/validation/validate.min.js"></script>
  <script src="global_assets/js/plugins/forms/styling/uniform.min.js"></script>

  <script src="assets/js/app.js"></script>
  <script src="global_assets/js/demo_pages/login_validation.js"></script>
  <script src="global_assets/js/plugins/notifications/pnotify.min.js"></script>
  <!-- /theme JS files -->
  <script type="text/javascript">
    <?php
      if(isset($_GET["user_register"])){
      $user_register = $_GET["user_register"];
        if ($user_register == 1) {
    ?>
      $(document).ready(function(){
        new PNotify({
            title: 'Register success',
            text: 'Your account register is successed',
            addclass: 'bg-success'
        });
      });
    <?php
        }else{
    ?>
      $(document).ready(function(){
        new PNotify({
            title: 'Register failed',
            text: 'Your account register is failed',
            addclass: 'bg-danger'
        });
      }); 
    <?php      
        }
      }
    ?>

    <?php
      if(isset($_GET["login_error"])){
      $login_error = $_GET["login_error"];
        if ($login_error == 1) {
    ?>
      $(document).ready(function(){
        new PNotify({
            title: 'Login Failed',
            text: 'Your account login is failed',
            addclass: 'bg-danger'
        });
      });
    <?php
        }
      }
    ?>

    <?php
      if(isset($_GET["user_repeat"])){
      $user_repeat = $_GET["user_repeat"];
        if ($user_repeat == 0) {
    ?>
      $(document).ready(function(){
        new PNotify({
            title: 'Register failed',
            text: 'Your email aleady exist!',
            addclass: 'bg-danger'
        });
      });
    <?php
        }
      }
    ?>
  </script>
</head>

<body class="login-container login-cover">
  <div class="navbar navbar-inverse">
    <div class="navbar-header">
      <!-- <a class="navbar-brand" href="index.php?page=index"><i class="icon-book3" style="font-size:26px;color:#fff;margin-left: 16px;"></i><span style="font-size:18px;color:#fff;position: absolute;margin-left: 16px;margin-top: 2px;">   Financial </span></a> -->
    </div>
  </div>
  <!-- Page container -->
  <div class="page-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">

        <!-- Content area -->
        <div class="content pb-20">
          <div class="back_red">
            <div class="login_text">Login</div>
          </div>
          <div class="back_blue"></div>
          
          <div class="back_form">
            <!-- Form with validation -->
            <form action="login_confirm.php" method="post" class="form-validate">
              <div class="back_login panel panel-body login-form" style="border: 10px; border-color: #045c94; border-style: solid;">
                <div class="text-center">
                  <div class="login_title"></div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                  <label>E-Mail</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" required="required">
                  <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                  </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                  <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                  </div>
                </div>
                <div class="form-group login-options">
                  <div class="col-sm-12">
                    <label class="checkbox-inline">
                      <div><span class="checked"><input type="checkbox" class="styled" checked="checked"></span></div>
                      Remember
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn bg-blue btn-block" style="margin: 0 auto 20px auto;width: 150px;"><i class="icon-enter" style="padding-right: 4px;"></i> Login </button>
                </div>
              </div>
            </form>
            <!-- /form with validation -->
          </div>

        </div>
        <!-- /content area -->

      </div>
      <!-- /main content -->

    </div>
    <!-- /page content -->

  </div>
  <!-- /page container -->

</body>
</html>

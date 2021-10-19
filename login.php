<!DOCTYPE html>
<html class="loading"
      lang="de"
      data-textdirection="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="o8fJey108zKiNJKpW8AkixcrE4m36b7Mybg3ipI2">

    <title>User Login | Materialize - Material Design Admin Template</title>
    <link rel="apple-touch-icon" href="images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon/favicon-32x32.png">

    <!-- Include core + vendor Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendors/vendors.min.css">
    <!-- BEGIN: VENDOR CSS-->
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="css/themes/vertical-dark-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css"
          href="css/themes/vertical-dark-menu-template/style.css">


    <link rel="stylesheet" type="text/css" href="css/pages/login.css">

    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/laravel-custom.css">
    <link rel="stylesheet" type="text/css" href="css/custom/custom.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<?php
include_once ("database.php");
// Inialize session
//session_start();
if (isset($_SESSION['username'])) {

}

if($_SERVER['REQUEST_METHOD'] == 'POST' )
{


// Collect the data from post method of form submission //
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=md5(mysqli_real_escape_string($con,$_POST['password']));

    $query = "SELECT * from users where email='$email' and password='$password'";
//    $query= "SELECT * FROM `admin` WHERE email='$email' and password='$password'";
    $result = $con->query($query);
    $count = mysqli_num_rows($result);
//    echo $count;
//    return;

// If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        $result = mysqli_query($con, $query);

        $_SESSION['email'] = $email;
        $_SESSION['login_user']=$email;
        print "
                    <script language='javascript'>
                     let message = 'login Successfully';
                                    alert(message);
                        window.location = 'dashboard.php';
                    </script>
                    ";
//        }
    } else {
        $errormsg = "<div class='card-alert card pink lighten-5'>
                <div class='card-content pink-text darken-1'>
                  <span class='card-title pink-text darken-1'>Some Message</span>
    <i class='fa fa-ban-circle'></i><strong>Incorrect login details </br></strong></div>
     <div class='card-action pink lighten-4'>
                  <a href='login.php' class='pink-text'>Ok</a>
                  <a href='login.php' class='pink-text'>Cancel</a>
                </div>
                <button type='button' class='close pink-text' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
              </div>
    "; //printing error if found in validation
    }

}

?>


<body
    class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns  login-bg "
    data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
<div class="row">
    <div class="col s12">
        <div class="container">
            <!--  main content -->
            <div id="login-page" class="row">
                <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
                    <div class="row">
                            <div class="input-field col s12">
                                <h5 class="ml-4">Sign in</h5>
                            </div>
                        </div>
                        <?php
                        if(!empty($errormsg))
                        {
                            print $errormsg;

                        }
                        ?>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input name="email" id="email" type="email" required>
                                <label for="email" class="center-align">email</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock_outline</i>
                                <input name="password" id="password" type="password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 ml-2 mt-1">
                                <p>
                                    <label>
                                        <input type="checkbox" />
                                        <span>Remember Me</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit"
                                   class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <p class="margin medium-small"><a href="reg.php">Register Now!</a></p>
                            </div>
                            <div class="input-field col s6 m6 l6">
                                <p class="margin right-align medium-small"><a href="user-forgot-password.html">Forgot password ?</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="content-overlay"></div>
    </div>
</div>

<!-- BEGIN VENDOR JS-->
<script src="js/vendors.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="js/plugins.js"></script>
<script src="js/search.js"></script>
<script src="js/custom/custom-script.js"></script>
<script src="js/scripts/customizer.js"></script>
<script src="js/scripts/ui-alerts.js"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->

</body>


<!-- Mirrored from www.pixinvent.com/materialize-material-design-admin-template/laravel/demo-4/user-login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Sep 2021 18:42:28 GMT -->
</html>
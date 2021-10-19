<!DOCTYPE html>
<html class="loading"
      lang="de"
      data-textdirection="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="o8fJey108zKiNJKpW8AkixcrE4m36b7Mybg3ipI2">

    <title>User Register |User Admob Dashboard</title>
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


    <link rel="stylesheet" type="text/css" href="css/pages/register.css">

    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/laravel-custom.css">
    <link rel="stylesheet" type="text/css" href="css/custom/custom.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->
<?php require'database.php';
//if (isset($_GET['refer'])) {
//
//
//    $id=$_GET['refer'];
//}else{
//    $id="";
//}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
// Collect the data from post method of form submission //
$password = mysqli_real_escape_string($con, $_POST['password']);
$password2 = mysqli_real_escape_string($con, $_POST['password2']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$username = mysqli_real_escape_string($con, $_POST['username']);
//$refer=mysqli_real_escape_string($con, $_POST['refer']);
$password3=md5($password);
    $status = "OK";
    $msg = "";
//validation starts
// if userid is less than 6 char then status is not ok

    if (!isset($username) or strlen($username) < 6) {
        $msg = $msg . "Username Should Contain Minimum 6 CHARACTERS.<br />";
        $status = "NOTOK";
    }

    if (!ctype_alnum($username)) {
        $msg = $msg . "Username Should Contain Alphanumeric Chars Only.<br />";
        $status = "NOTOK";
    }

    $remail = mysqli_query($con, "SELECT COUNT(*) FROM users WHERE email = '$email'");
    $re = mysqli_fetch_row($remail);
    $nremail = $re[0];
    if ($nremail == 1) {
        $msg = $msg  .  "E-Mail Id Already Registered. Please try another one<br />";
        $status = "NOTOK";
    }

    if (strlen($password) < 8) {
        $msg = $msg . "Password Must Be More Than 8 CHARACTERS Length.<br />";
        $status = "NOTOK";
    }

    if (strlen($email) < 1) {
        $msg = $msg . "Please Enter Your Email Id.<br />";
        $status = "NOTOK";
    }

    if ($password <> $password2) {
        $msg = $msg . "Both Passwords Are Not Matching.<br />";
        $status = "NOTOK";
    }
    $sql = "SELECT username FROM users WHERE username='{$username}'";
    $result = mysqli_query($con,$sql) or die("Query unsuccessful") ;
    if (mysqli_num_rows($result) > 0) {
        $msg = $msg . "user id already Registered. please try another one<br />";
        $status = "NOTOK";
    }
     if ($status == "OK") {
//echo mysqli_query($con,"insert into `users`(`active`,`username`,`password`,`fname`,`email`,`ipaddress`,`mobile`,`country`) values(1,'$username','$passmd','$name','$email','$ip','$phone','$country')");
        mysqli_query($con, "INSERT INTO `users` (`username`, `email` ,`password`) VALUES ('$username', '$email', '$password3')");
//        mysqli_query($con,"insert into wallet(username,balance) values('$username',0)");
//        mysqli_query($con,"INSERT INTO referal (`username`, `newuserid`, amount) value ('$refer', '$username', 10)");

         $suss= "<div class='card-alert card cyan'>
                <div class='card-content white-text'>
                  <span class='card-title white-text darken-1'>Some Message</span>
                    <i class='fa fa-ban-circle'></i><strong>Account Registration successful : </br></strong>A mail has been sent to $email containing your login details for record purpose. Check your spam folder if message is not found in your inbox. $password</div>
                    <div class='card-action cyan darken-2'>
                  <a href='login.php' class='waves-effect waves-light mb-2 btn white-text'>Ok</a>
                  <a href='reg.php' class='waves-effect waves-light mb-2 btn white-text'>Cancel</a>
                </div>
                <button type='button' class='close white-text' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
              </div>
                    ";
         //printing error if found in validation
         print "
				<script language='javascript'>
//window.location = 'login.php';
</script>
";
     }else{
         $errormsg= "<div class='card-alert card pink lighten-5'>
                <div class='card-content pink-text darken-1'>
                  <span class='card-title pink-text darken-1'>Some Message</span>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>
                    <div class='card-action pink lighten-4'>
                  <a href='reg.php' class='pink-text'>Ok</a>
                  <a href='#' class='pink-text'>Cancel</a>
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
    class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns  register-bg "
    data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
<div class="row">
    <div class="col s12">
        <div class="container">
            <!--  main content -->
            <div id="register-page" class="row">
                <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>"method="post">
                    <div class="row">
                            <div class="input-field col s12">
                                <h5 class="ml-4">Register</h5>
                                <p class="ml-4">Join to our community now !</p>
                            </div>
                        </div>
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="NOTOK"))
                        {
                            print $errormsg;

                        }
                        ?>

                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="OK"))
                        {
                            print $suss;

                        }
                        ?>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input name="username" id="username" type="text" required>
                                <label for="username" class="center-align">Username</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">mail_outline</i>
                                <input name="email" id="email" type="email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock_outline</i>
                                <input name="password" id="email" type="password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock_outline</i>
                                <input name="password2" id="password-again" type="password" required>
                                <label for="password-again">Password again</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit"
                                   class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Register</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <p class="margin medium-small"><a href="login.php">Already have an account? Login</a></p>
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


<!-- Mirrored from www.pixinvent.com/materialize-material-design-admin-template/laravel/demo-4/user-register by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Sep 2021 18:44:20 GMT -->
</html>
<?php require 'database.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="o8fJey108zKiNJKpW8AkixcrE4m36b7Mybg3ipI2">

    <title>Dashboard Modern | Materialize - Material Design Admin Template</title>
    <link rel="apple-touch-icon" href="images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon/favicon-32x32.png">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendors/vendors.min.css">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="vendors/animate-css/animate.css">
    <link rel="stylesheet" type="text/css" href="vendors/chartist-js/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/chartist-js/chartist-plugin-tooltip.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="css/themes/vertical-dark-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css"
          href="css/themes/vertical-dark-menu-template/style.css">


    <link rel="stylesheet" type="text/css" href="css/pages/dashboard-modern.css">
    <link rel="stylesheet" type="text/css" href="css/pages/intro.css">

    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/laravel-custom.css">
    <link rel="stylesheet" type="text/css" href="css/custom/custom.css">
    <!-- END: Custom CSS-->
</head>
<body
    class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns  "
    data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed ">
        <nav
            class="navbar-main navbar-color nav-collapsible sideNav-lock  navbar-light ">
            <div class="nav-wrapper">
                <div class="header-search-wrapper hide-on-med-and-down">
                    <i class="material-icons">search</i>
                    <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Explore Searching"
                           data-search="template-list">
                    <ul class="search-list collection display-none"></ul>
                </div>
                <button type="button" class="btn gradient-45deg-indigo-light-blue"><a href="out.php">Log-Out</a> </button>
            </div>
        </nav>
            </div>
            <nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form id="navbarForm">
                        <div class="input-field search-input-sm">
                            <input class="search-box-sm mb-0" type="search" required="" placeholder='Search' id="search"
                                   data-search="template-list">
                            <label class="label-icon" for="search">
                                <i class="material-icons search-sm-icon">search</i>
                            </label>
                            <i class="material-icons search-sm-close">close</i>
                            <ul class="search-list collection search-list-sm display-none"></ul>
                        </div>
                    </form>
                </div>
            </nav>
    </div>
</header>
<!-- END: Header-->
<!-- BEGIN: SideNav-->
<aside
        class="sidenav-main nav-expanded nav-lock nav-collapsible  sidenav-active-rounded  sidenav-dark">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="dashboard.php">
                <img class="show-on-medium-and-down hide-on-med-and-up" src="images/logo/materialize-logo-color.png"
                     alt="materialize logo" />
                <img class="hide-on-med-and-down" src="images/logo/materialize-logo.png" alt="materialize logo" />
                <span class="logo-text hide-on-med-and-down">
                    5Star
                  </span>
                <?php

                $query="SELECT * FROM  users where  email = '" . $_SESSION['email'] . "'";
                $result = mysqli_query($con,$query);

                while($row = mysqli_fetch_array($result)){
                    $username=$row["username"];
                    $email=$row["email"];

                }
                ?>

            </a>
            <a class="navbar-toggler" href="javascript:void(0)"><i class="material-icons">radio_button_checked</i></a></h1>

    </div>

    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="menu-accordion">

        <li class="bold ">
            <a class="waves-effect waves-cyan "
               href="javascript:void(0) "
            >
                <span class="bold"> <?php echo $username; ?></span>

                <i class="material-icons">settings_input_svideo</i>
                <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
<!--                <span class="badge pill orange float-right mr-10">3</span>-->
            </a>
        </li>
        <li class="bold ">
            <a class=" waves-effect waves-cyan "
               href="javascript:void(0) "
            >
                <i class="material-icons">dvr</i>
                <span class="menu-title" data-i18n="Templates">Templates</span>
            </a>
        </li>



        <li class="bold ">
            <a class="waves-effect waves-cyan "
               href="https://pixinvent.ticksy.com/"
               target=&quot;_blank&quot;>
                <i class="material-icons">help_outline</i>
                <span class="menu-title" data-i18n="Support">Support</span>
            </a>
        </li>
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
       href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>  <!-- END: SideNav-->
























<!-- BEGIN VENDOR JS-->
<script src="js/vendors.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="vendors/chartjs/chart.min.js"></script>
<script src="vendors/chartist-js/chartist.min.js"></script>
<script src="vendors/chartist-js/chartist-plugin-tooltip.js"></script>
<script src="vendors/chartist-js/chartist-plugin-fill-donut.min.js"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="js/plugins.js"></script>
<script src="js/search.js"></script>
<script src="js/custom/custom-script.js"></script>
<script src="js/scripts/customizer.js"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="js/scripts/dashboard-modern.js"></script>
<script src="js/scripts/intro.js"></script>
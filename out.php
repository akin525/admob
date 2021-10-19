<?php include "database.php";
//session_start();
session_destroy();{
    print "
                    <script>
                        window.location = 'login.php';
                    </script>
                    ";
}
?>
<?php 
session_start();
require "../../../cengFiles/includes/functions.php";
$ceng = new Ceng();
$ceng->checkIfAdminLoggedIn2();
?>
<!DOCTYPE html>
<html lang="en">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TE 461 | </title>
    
    <?php include "../../../cengFiles/includes/admin/scripts.php"; ?>
</head>

<body style="background-color: #3a3a3a;">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "../../../cengFiles/includes/admin/navbar.php"; ?>

        <div id="page-wrapper">
                <?php 
                    $ceng->loadContentAdmin(); 
                ?>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->



<?php 
include "../../../cengFiles/includes/modals.php";
?>

</body>

</html>

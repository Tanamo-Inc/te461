<?php 
session_start();
require "../cengFiles/includes/functions.php";
$ceng= new Ceng();
$ceng->checkIfLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TE 461 |  Log In</title>
	<?php include "../cengFiles/includes/scripts.php"; ?>
</head>

<body>
    <div class="row" style="background-color: #3a3a3a;">
        <center><h4 href="#" style="color: #fff; font-size: 20px;"><span style="color: #fff; font-weight: bold;"><img src="images/logo.png" style="width: 30px; height: 30px; padding: 0px; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;" class="rotMe" />&nbsp;&nbsp;TE 461&nbsp;&nbsp;&nbsp; </span>| &nbsp;&nbsp;&nbsp;Students' Portal <span class="glyphicon glyphicon-education" style="width: 50px;"></span></h4></center>
    </div>

	<div class="row">
		<br/><br/><br/>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="background-color: #3a3a3a; color: #fff;">
                        <h3 class="panel-title" style="font-size: 15px; font-weight: bold;"><center><img src="images/logo.png" style="width: 60px; height: 60px; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;" class="rotMe1" /></center></h3>
                    </div>
                    <div class="panel-body">
                         <div class="row" id="displayRes"></div>
                        <div class="row">
                        <br/>
                        </div>
                        <form role="form" method="post" action="#" class="form" id="loginForm">
                            <legend style="font-size: 15px; color: red;"><center>*Enter <u>Index Number</u> and <u>Password</u> to proceed</center></legend>
                            <fieldset>
                                <div class="form-group input-group input-group-md">
                                 <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-pencil"></span>
                                 </span>
                                    <input class="form-control" id="username" placeholder="Index Number" name="username" type="text" autofocus required>
                                </div>

                                <div class="form-group input-group input-group-md">
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-lock"></span>
                                 </span>
                                    <input class="form-control" id="password" placeholder="Password" name="password" type="password" required>
                                </div>
                                <center><button type="submit" class="btn btn-xs btn-success tooltip-bottom" title="Click to Log In" style="background-color: #3a3a3a; border: 1px solid #3a3a3a; border-radius: 10px; -webkit-border-radius: 10px; -webkit-border-radius: 10px;"><span class="glyphicon glyphicon-log-in"></span> Log In</button></center>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
 $ceng->verifyStudent();
?>
<script type="text/javascript">
    $(function(){
        $('#loginForm').bootstrapValidator({
            message: 'This is not valid',
            feedbackIcons:{
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields:{
                username:{
                    validators:{
                        notEmpty:{
                            message: 'Index Number can\'t be empty'
                        },
                        stringLength:{
                            min: 5,
                            max: 20,
                            message: 'Invalid field length'
                        },
			            regexp:{
				            regexp: /^[0-9\ ]+$/,
				            message: 'Invalid input'
			            }
                    }
                },
                password:{
                    validators:{
                        notEmpty:{
                            message: 'Password can\'t be empty'
                        },
                        stringLength:{
                            min: 2,
                            max: 20,
                            message: 'Invalid field length'
                        },
                        regexp:{
                            regexp: /^[0-9A-Za-z\ \-\+\_$]+$/,
                            message: 'Invalid input'
                        }
                    }
                }
            }
        });
    });
</script>
</body>

</html>

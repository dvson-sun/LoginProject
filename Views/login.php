<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/custome.css">

    <style>
    body{background-color: #dddddd;}
    </style>

</head>

<body>
    <div class="row" style="margin-top : 100px;" >
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading" style="text-align: center; margin-bottom: 50px; color: #000; font-size: 30px; background-color: #428BCA;">Login </div>
                <div class="panel-body">
                    <?php
                        if(isset($errors)){
                            foreach($errors as $item){
                                echo '<div class="alert alert-danger">'.$item.'</div>';
                            }
                        }
                    ?>
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control"  placeholder="E-mail" required name="mail" type="email"  autofocus value="<?php if(isset($old)){ echo $old['user_mail'];} ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control"  placeholder="Password" required name="password" min ="3" max ="255" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"> Remember
                                </label>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</body>

</html>
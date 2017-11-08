<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <img src="img/logo.png" alt="logo" class="logo">

                <form method="post" action="">

                    <span class="search">
                        <button type="submit" name="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <input type="text" name="input-search" />
                    </span>

                </form>

            </div>

        </div>

        <div class="row">

            <nav class="navbar navbar-default">

                <div class="navbar-header">

                    <a class="navbar-brand" href="#">WebSiteName</a>

                </div>

                <ul class="nav navbar-nav">
                    <li id="home"><a href="index.php">Home</a></li>
                    <li><a href="melden.php">Incident melden</a></li>
                    <li><a href="inzage.php">Incident inzien</a></li>
                    <li><a href="afhandeling.php">Incident afhandeling</a></li>
                    <li><a href="gebruikersbeheer.php">Gebruikersbeheer</a></li>
                    <li><a href="configuratiebeheer.php">Configuratiebeheer</a></li>
                </ul>

                <ul class="nav navbar-nav pull-right">
                    <li><a href="users/login" data-toggle="modal" data-target="#login-modal1">Login</a></li>
                </ul>

                <div class="modal" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                    <div class="modal-dialog">

                        <div class="loginmodal-container" id="hide">

                            <h1>Login to Your Account</h1><br>

                            <form method="post" action="../users/login">
                                <input type="text" name="user" placeholder="Username" />
                                <input type="password" name="password" placeholder="Password" />
                                <input type="submit" name="" class="login loginmodal-submit" value="Login" />
                            </form>

                            <div class="login-help">
                                <a data-dismiss="modal" data-toggle="modal" data-target="#login-modal2" href="../views/users/signup.volt">Register</a> - <a href="#">Forgot Password</a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal" id="login-modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                    <div class="modal-dialog">

                        <div class="loginmodal-container">

                            <h1>Register</h1><br>

                            <form method="post" action="../users/signup">
                                <input type="text" name="user" placeholder="Username" />
                                <input type="password" name="password" placeholder="Password" />
                                <input type="email" name="email" placeholder="E-Mail" />
                                <input type="submit" name="login" class="login loginmodal-submit" value="Register" />
                            </form>

                            <div class="login-help">
                                Already have an account? <a data-dismiss="modal" data-toggle="modal" data-target="#login-modal1">Sign in</a>
                            </div>

                        </div>

                    </div>

                </div>

            </nav>

        </div>

        <div class="row">

<?php include 'melden.php' ?>

        </div>

    </div>

    <script src="https://use.fontawesome.com/fa107fe55c.js"></script>
</body>
</html>
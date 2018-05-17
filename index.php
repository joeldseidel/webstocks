<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Stocks</title>
    <!--Local style sheet reference-->
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <!--Chart.js CDN reference-->
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!--Bootstrap CDN references-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <!--Login form-->
    <div id="login_modal_form" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Login to Web Stocks</h2>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="username_field">Username:</label>
                            <input type="text" class="form-control" id="username_field">
                        </div>
                        <div class="form-group">
                            <label for="password_field">Password:</label>
                            <input type="password" class="form-control" id="password_field">
                        </div>
                        <button type="submit" class="btn btn-default">Log In</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Not a member? <a href="#">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

    <!--Sign up form-->
    <div id="signup_modal_form" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Register for Web Stocks</h2>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="register_firstname_field">First Name: </label>
                            <input type="text" class="form-control" id="register_firstname_field">
                        </div>
                        <div class="form-group">
                            <label for="register_lastname_field">Last Name: </label>
                            <input type="text" class="form-control" id="register_lastname_field">
                        </div>
                        <div class="form-group">
                            <label for="register_username_field">Username: </label>
                            <input type="text" class="form-control" id="register_username_field">
                        </div>
                        <div class="form-group">
                            <label for="register_password_field">Password: </label>
                            <input type="password" class="form-control" id="register_password_field">
                        </div>
                        <div class="form-group">
                            <label for="register_confirmpassword_field">Confirm Password: </label>
                            <input type="password" class="form-control" id="register_confirmpassword_field">
                        </div>
                        <div class="form-group">
                            <label for="register_emailaddress_field">Email Address: </label>
                            <input type="email" class="form-control" id="register_emailaddress_field">
                        </div>
                        <button type="submit" class="btn btn-default">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Page content-->
    <header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1>Header Placeholder</h1>
                <p>I wish I had a better name for this web app, but bootstrap</p>
            </div>
        </div>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">My Stocks</a></li>
                    <li><a href="#">Market Overview</a></li>
                    <li><a href="#">All Stocks</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#login_modal_form" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="#signup_modal_form" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div id="chartContainer"></div>
            </div>
            <div class="col-sm-8">
                <p>Column of shame</p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="home_page_main_chart.js"></script>
</body>
</html>
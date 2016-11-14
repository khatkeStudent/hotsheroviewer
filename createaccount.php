<html>
<head>
	<title>Heroes Little Black Book</title>
	<link rel="stylesheet" type="text/css" href="css\style.css" />
	<link rel="stylesheet" type="text/css" href="css\createaccount.css" />
    
    <?php include 'scripts/webapi.php';?>
    <?php @session_start(); ?>
</head>

<body>
    <?php include 'scripts/navbar.php' ?>
	<div class="divContent">
        <form action="scripts\createaccount_handler.php" method="post">
        <div id="divErrors"><?php if (isset($_SESSION['error'])) { echo '<ul>' . $_SESSION['error'] . '</ul>'; } ?></div>
        <fieldset>
            <legend>New User</legend>
            <div>
                <h3>Name</h3>
                <input name="txtName" type="text" value="<?php if (isset($_SESSION['txtName'])) { echo htmlentities($_SESSION['txtName']); } ?>" />
            </div>
            <div>
                <h3>E-mail Address</h3>
                <input name="txtEmailAddress" type="text" value="<?php if (isset($_SESSION['txtEmailAddress'])) { echo htmlentities($_SESSION['txtEmailAddress']); } ?>" />
            </div>
            <div>
                <h3>Username</h3>
                <input name="txtUsername" type="text" value="<?php if (isset($_SESSION['txtUsername'])) { echo htmlentities($_SESSION['txtUsername']); } ?>" autocomplete="off"  />
            </div>
            <div>
                <h3>Password</h3>
                <input name="txtPassword" type="password" />
            </div>
            <div>
                <h3>Confirm Password</h3>
                <input name="txtConfirmPassword" type="password" />
            </div>
            <input name="btnSubmit" class="btnsubmit" type="submit" value="Submit" />
        </fieldset>
        </form>
	</div>
</body
</html>
<html>
<head>
	<title>Heroes Little Black Book</title>
    <?php
        include 'templates/commonheaderstemplate.php'; 
    ?> 	
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
                <label for="txtName">Name</label>
                <input name="txtName" type="text" value="<?php if (isset($_SESSION['txtName'])) { echo htmlentities($_SESSION['txtName']); } ?>" />
            </div>
            <div>
                <label for="txtEmailAddress">E-mail Address</label>
                <input name="txtEmailAddress" type="text" value="<?php if (isset($_SESSION['txtEmailAddress'])) { echo htmlentities($_SESSION['txtEmailAddress']); } ?>" />
            </div>
            <div>
                <label for="txtUsername">Username</label>
                <input name="txtUsername" type="text" value="<?php if (isset($_SESSION['txtUsername'])) { echo htmlentities($_SESSION['txtUsername']); } ?>" autocomplete="off"  />
            </div>
            <div>
                <label for="txtPassword">Password</label>
                <input name="txtPassword" type="password" />
            </div>
            <div>
                <label for="txtConfirmPassword">Confirm Password</label>
                <input name="txtConfirmPassword" type="password" />
            </div>
            <input name="btnSubmit" class="btnsubmit" type="submit" value="Submit" />
        </fieldset>
        </form>
	</div>
</body
</html>
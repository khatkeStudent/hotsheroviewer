<html>
<head>
	<title>Heroes Little Black Book</title>
    <?php
        include 'templates/commonheaderstemplate.php'; 
    ?> 	
	<link rel="stylesheet" type="text/css" href="css\login.css" />
</head>

<body>
    <?php
        @session_start();
        include 'scripts/navbar.php' ?> 	
	<div class="divContent">
    <div id="divErrors"><?php if (isset($_SESSION['error'])) { echo '<ul>' . $_SESSION['error'] . '</ul>'; unset($_SESSION['error']); } ?></div>
    <form action="scripts\login_handler.php" method="post">
	<fieldset>
		<legend>Login</legend>
		<h3>Username</h3>
		<input name="txtUsername" type="Text" value="<?php if (isset($_SESSION["tempusername"])) { echo htmlentities($_SESSION["tempusername"]); unset($_SESSION["tempusername"]); } ?>" />
		<h3>Password</h3>
		<input name="txtPassword" type="Password" />
		<input class="btnLogin" name="btnSubmit" type="Submit" value="Login" />
	</fieldset>
    </form>
    <div>
        New user? <a href="createaccount.php">create account</a>
    </div>
	</div>
    
    <footer>
        <p>Copyright &copy; Kenneth Hatke</p>
    </footer>
</body>
</html>
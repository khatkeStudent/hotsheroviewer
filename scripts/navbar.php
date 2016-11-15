<?php
if (isset($_SESSION["username"])) {
    echo '<div class="divToolBar">
	<ul>
		<li id="liHeroes" class="navoption"><a href="index.php">Heroes</a></li>
		<li id="liNews" class="navoption"><a href="news.php">News</a></li>
        <li>
		<image id="liLogo" class="logo" src="images/nexus.jpg" />
        </li>
		<li id="liBuilds" class="navoption"><a href="builds.php">Builds</a></li>
		<li id="liHome" class="navoption"><a href="home.php">Home</a></li>
	</ul>
	</div>';
} else {
    echo '<div class="divToolBar">
	<ul>
		<li id="liHeroes" class="navoption"><a href="index.php">Heroes</a></li>
		<li id="liNews" class="navoption"><a href="news.php">News</a></li>
        <li>
		<image id="liLogo" class="logo" src="images/nexus.jpg" />
        </li>
		<li id="liBuilds" class="navoption"><a href="builds.php">Builds</a></li>
		<li id="liLogin" class="navoption"><a href="login.php">Login</a></li>
	</ul>
	</div>';
}
?>
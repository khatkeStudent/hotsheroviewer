<html>
<head>
	<title>Heroes Little Black Book</title>
    <?php
        include 'templates/commonheaderstemplate.php'; 
    ?> 	
	<link rel="stylesheet" type="text/css" href="css\news.css" />
</head>

<body>
    <?php
        @session_start();
        include 'scripts/navbar.php' ?> 	
	
	<div class="divContent">
        <?php 
            include 'scripts/Database.inc';
            $db = new Database();
            $table = $db->getNews();
            
            echo '<ul id="news">';
                
            foreach ($table as &$row) {
                echo '<li><div class="divTitle">'. 
                    htmlentities($row["title"]).
                    '</div><div class="divDate">'.
                    htmlentities($row["date"]). 
                    '</div><div class="divArticle">'.
                    htmlentities($row["article"]).
                    '</div>';
            }      
            
            echo '</ul>';
        ?>
	</div>
    
    <footer>
        <p>Copyright &copy; Kenneth Hatke</p>
    </footer>
</body>
</html>
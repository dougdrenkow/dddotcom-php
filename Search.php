<?php	

include("etc.inc");

$cxn = mysqli_connect($host,$user,$password,$database)
or die ("Could not connect to server.");

?>

<!doctype html>
<html>

    <head>
    
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />        
        
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Douglas Drenkow: Front-End Developer / Web Designer</title>
        
		<meta name="Description" content="On my own or in teams, I have designed, developed, produced, and distributed digital and traditional communications for major corporations, iconic buildings, elected officials, government agencies, prestigious universities, and respected professionals for over 25 years." />
        
        <link rel="shortcut icon" href="favicon.ico">
        
		<link rel="apple-touch-icon" href="apple-touch-icon.png" />
            
        <link rel="stylesheet" href="css/dd.css">
        
		<script src="https://use.typekit.net/opl4hma.js"></script><!-- Sofia Pro -->
		<script>try{Typekit.load({ async: false });}catch(e){}</script>

    </head>
    
    <body id="searchPage" onload="preload(['images/ddlogoWhiteNavy-96x96.png','images/caretWhiteE-32x40.png','images/arrowBlueN-48x48.png','images/ddlogoBlueDk-96x96.png','images/addThis-16x16.png'])">
    
		<?php	
        
        include("header.php");        
        
        ?>
        
        <div id="mainContent">
        
            <div id="mainContent-intro">
            
                <h2>Search Results</h2>
                
                <?php
                
                $searchTerm="";
                
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                
                    if (empty($_POST["searchTerm"])) {
                        
                        echo "<p class='errorMessage'>Please enter a Search term.</p>";
                        
                    } else {
                        
                        $searchTerm=$_POST["searchTerm"];
                        
                        echo "<h4>For &ldquo;".$searchTerm."&rdquo;</h4>\n";
                        
                        $searchTerm = trim($searchTerm);
                        
                        $searchTerm = stripslashes($searchTerm);
                        
                        $searchTerm = htmlspecialchars($searchTerm);
                        
                        if (!preg_match("/^[a-z0-9 -]+$/i",$searchTerm)) {
                            
                            echo "<p class='errorMessage'>Please enter a valid Search term &mdash;<br>with only letters, numbers, hyphens, or blank spaces.</p>";
                            
                        } else {
                            
                            $querySearchMedia="SELECT * FROM Media WHERE
    mediaTitle LIKE \"%$searchTerm%\" OR
    mediaSubtitle LIKE \"%$searchTerm%\" OR
    mediaImageAlt LIKE \"%$searchTerm%\" OR 
    mediaImageCaption LIKE \"%$searchTerm%\" OR 
    mediaText LIKE \"%$searchTerm%\" ORDER BY mediaSortOrder";
                            
                            $resultSearchMedia=mysqli_query($cxn,$querySearchMedia)
                            or die ("Couldn't execute querySearchMedia.");
                            
                            echo
							"<h5>In Media</h5>\n
                            
                            <ul class='searchResultsList'>\n";
                            
                            if(mysqli_num_rows($resultSearchMedia) > 0 ) {
                            
                                while($rowSearchMedia=mysqli_fetch_assoc($resultSearchMedia))
                                {
                            
                                    extract ($rowSearchMedia);
                                                
                                    $mediaTitleURL=urlencode($mediaTitle);
                                
                                    echo "<li class='more'><a href='Media.php?mediaTitle=$mediaTitleURL'>$mediaTitle</a></li>\n";
                                    
                                } 
                            
                            } else {
                                
                                echo "<li class='noResults' >No results found.</li>\n";
                                
                            }
                            
                            echo "</ul>\n";							
                            
                            $querySearchMarket="SELECT * FROM Market WHERE
    marketTitle LIKE \"%$searchTerm%\" OR
    marketSubtitle LIKE \"%$searchTerm%\" OR
    marketImageAlt LIKE \"%$searchTerm%\" OR 
    marketImageCaption LIKE \"%$searchTerm%\" OR 
    marketText LIKE \"%$searchTerm%\" ORDER BY marketSortOrder";

                            $resultSearchMarket=mysqli_query($cxn,$querySearchMarket)
                            or die ("Couldn't execute querySearchMarket.");
                            
                            echo "<h5>In Markets</h5>\n
                            
                            <ul class='searchResultsList'>\n";
                            
                            if(mysqli_num_rows($resultSearchMarket) > 0 ) {
                            
                                while($rowSearchMarket=mysqli_fetch_assoc($resultSearchMarket))
                                {
                            
                                    extract ($rowSearchMarket);
                                                
                                    $marketTitleURL=urlencode($marketTitle);
                                
                                    echo "<li class='more'><a href='Market.php?marketTitle=$marketTitleURL'>$marketTitle</a></li>\n";
                                    
                                } 
                            
                            } else {
                                
                                echo "<li class='noResults' >No results found.</li>\n";
                                
                            }
                            
                            echo "</ul>\n";							
                            
                            $querySearchCareer="SELECT * FROM Career WHERE
    careerTitle LIKE \"%$searchTerm%\" OR
    careerSubtitle LIKE \"%$searchTerm%\" OR
    careerImageAlt LIKE \"%$searchTerm%\" OR 
    careerImageCaption LIKE \"%$searchTerm%\" OR 
    careerText LIKE \"%$searchTerm%\" ORDER BY careerSortOrder";
                            
                            $resultSearchCareer=mysqli_query($cxn,$querySearchCareer)
                            or die ("Couldn't execute querySearchCareer.");
                            
                            echo "<h5>In Career</h5>\n
                            
                            <ul class='searchResultsList'>\n";
                            
                            if(mysqli_num_rows($resultSearchCareer) > 0 ) {
                            
                                while($rowSearchCareer=mysqli_fetch_assoc($resultSearchCareer))
                                {
                            
                                    extract ($rowSearchCareer);
                                                
                                    $careerTitleURL=urlencode($careerTitle);
                                
                                    echo "<li class='more'><a href='Career.php?careerTitle=$careerTitleURL'>$careerTitle</a></li>\n";
                                    
                                } 
                            
                            } else {
                                
                                echo "<li class='noResults' >No results found.</li>\n";
                                
                            }
                            
                            echo "</ul>\n";							
                            
                            $querySearchWork="SELECT * FROM Work WHERE
    workTitle LIKE \"%$searchTerm%\" OR
    workSubtitle LIKE \"%$searchTerm%\" OR
    workImageAlt LIKE \"%$searchTerm%\" OR 
    workImageCaption LIKE \"%$searchTerm%\" OR 
    workSidebar LIKE \"%$searchTerm%\" OR
    workText LIKE \"%$searchTerm%\" ORDER BY workSortOrder";
                            
                            $resultSearchWork=mysqli_query($cxn,$querySearchWork)
                            or die ("Couldn't execute querySearchWork.");
                            
                            echo "<h5>In Works</h5>\n
                            
                            <ul class='searchResultsList'>\n";
                            
                            if(mysqli_num_rows($resultSearchWork) > 0 ) {
                            
                                while($rowSearchWork=mysqli_fetch_assoc($resultSearchWork))
                                {
                            
                                    extract ($rowSearchWork);
                                                
                                    $workTitleURL=urlencode($workTitle);
                                
                                    echo "<li class='more'><a href='Work.php?workTitle=$workTitleURL'>$workTitle</a></li>\n";
                                    
                                } 
                            
                            } else {
                                
                                echo "<li class='noResults' >No results found.</li>\n";
                                
                            }
                            
                            echo "</ul>\n";	
                            
                        }
                        
                    }
                
                }
                
                ?>                
                
                <div class="clearFloat"></div>
            
            </div><!-- end of #mainContent-intro -->
                    
			<div class="clearFloat"></div>
        
        	<?php
        
        	include("copyright.php");
			
			?>
        
        </div><!-- #mainContent -->
    
		<?php	
        
		include("footer.php");
        
        ?>
		
		<script src="js/jquery-1.11.2.min.js"></script>
        
        <!-- Need to put dd.js jQuery script at bottom of document, otherwise IN WINDOWS 10 (regardless of the browser) the slideDown() / slideUp() lists do a "double take": One click on the trigger makes the list not only slideDown() but also, then, slideUp() -- with the state of the trigger going from not selected to selected and then back to not selected! Not even inserting a stopPropagation() method stops this behavior, which I found no record of in searching the Internet. -->
		
		<script src="js/dd.js"></script>
        
		<script src="http://s7.addthis.com/js/300/addthis_widget.js"></script>
        
    </body>

</html>
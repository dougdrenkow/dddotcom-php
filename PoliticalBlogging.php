<?php

include("etc.inc");

$cxn = mysqli_connect($host,$user,$password,$database)
or die ("Couldn't connect to server.");

$politicalBloggingTitleCurrent="{$_GET['politicalBloggingTitle']}"; //Superglobals are already decoded.

$queryPoliticalBlogging="SELECT * FROM PoliticalBlogging WHERE politicalBloggingTitle=\"$politicalBloggingTitleCurrent\"";

$resultPoliticalBlogging=mysqli_query($cxn,$queryPoliticalBlogging)
or die ("Couldn't execute queryPoliticalBlogging.");

$rowPoliticalBlogging=mysqli_fetch_assoc($resultPoliticalBlogging);

extract ($rowPoliticalBlogging);

$mediaTitleCurrent=$mediaTitle; // For marking Media on nav dropdown as "selected"

$marketTitleCurrent=$marketTitle; // For marking Market on nav dropdown as "selected"

$careerTitleCurrent=$careerTitle; // For marking Career on nav dropdown as "selected"

$mediaTitleCurrentURL=urlencode($mediaTitleCurrent); // For breadcrumbs

$marketTitleCurrentURL=urlencode($marketTitleCurrent); // For breadcrumbs

$careerTitleCurrentURL=urlencode($careerTitleCurrent); // For breadcrumbs

?>

<!doctype html>
<html>
    
    <head>
    
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />        
        
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        
        <title>Douglas Drenkow | Digital Communications</title>
        
<meta name="Description" content="On my own or in teams, I have designed, developed, produced, and distributed digital and traditional communications for major corporations, iconic buildings, elected officials, government agencies, prestigious universities, and respected professionals for over 25 years." />
        
        <link rel="shortcut icon" href="favicon.ico">
        
		<link rel="apple-touch-icon" href="apple-touch-icon.png" />
            
        <link rel="stylesheet" href="css/dd.css">
        
		<script src="https://use.typekit.net/opl4hma.js"></script><!-- Sofia Pro -->
		<script>try{Typekit.load({ async: false });}catch(e){}</script>

    </head>
    
    <body id="politicalBloggingPage" onload="preload(['images/ddlogoWhiteNavy-96x96.png','images/caretWhiteE-32x40.png','images/caretBlueE-32x40.png','images/ddlogoBlack-12x12.png','images/arrowBlueN-48x48.png','images/pdficon_small.png','images/publ/faviconbg16x16.JPG','images/publ/faviconflf16x16.JPG','images/publ/favicondk16x16.JPG','images/publ/faviconyng16x16.JPG','images/publ/faviconem16x10.JPG','images/publ/favicon/huffpost16x16.JPG','images/publ/faviconmbo16x16.JPG','images/publ/faviconoen16x16.JPG','images/ddlogoBlueDk-96x96.png','images/addThis-16x16.png'])">
    
		<?php	
        
        include("header.php");        
        
        ?>
        
        <div id="mainContent">
        
            <div id="mainContent-intro">
            
            	<p class="breadcrumb">

				<?php
                
                echo
                "<a href='Media.php?mediaTitle=$mediaTitleCurrentURL'>$mediaTitleCurrent</a> for <a href='Market.php?marketTitle=$marketTitleCurrentURL'>$marketTitleCurrent</a> from <a href='Career.php?careerTitle=$careerTitleCurrentURL'>$careerTitleCurrent</a>\n";
            
                ?>
            
            	</p><!-- .breadcrumb -->
        
                <?php
                
                echo
                "<h2>$politicalBloggingTitle</h2>\n 
				
				<div id='sidebar'>
				
					<div class='mainContent-intro-imageBox'>
					
						<img class='image' src='$politicalBloggingImagePath' alt='$politicalBloggingImageAlt'>\n
					
						<div class='imageCaption'>$politicalBloggingImageCaption</div>\n
					
					</div>\n
					
					$politicalBloggingSidebar
				
				</div>\n
			
				<h5>$politicalBloggingSubtitle</h5>\n
				
                <div>$politicalBloggingText</div>\n
                
                <div class='clearFloat'></div>\n
        
			</div><!-- #mainContent-intro -->\n";
		
            ?>
			
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
<?php	

/* NotFound.php: 404 requests redirected here by .htaccess file. User is informed of file not found, then instructed to use menu or search. */

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
        
        <title>File Not Found | Douglas Drenkow: Front-End Developer / Web Designer</title>
        
		<meta name="Description" content="On my own or in teams, I have designed, developed, produced, and distributed digital and traditional communications for major corporations, iconic buildings, elected officials, government agencies, prestigious universities, and respected professionals for over 25 years." />
        
        <link rel="shortcut icon" href="favicon.ico">
            
        <link rel="stylesheet" href="http://douglasdrenkow.com/css/dd.css">
        
        <script src="https://use.typekit.net/opl4hma.js"></script><!-- Sofia Pro -->
		<script>try{Typekit.load({ async: false });}catch(e){}</script>
        		
    </head>
    
    <body id="notFoundPage" onload="preload(['images/ddlogoWhiteNavy-96x96.png','images/caretWhiteE-32x40.png','images/arrowBlueN-48x48.png','images/ddlogoBlueDk-96x96.png','images/addThis-16x16.png'])">
    
		<?php	
        
        include("header.php");        
        
        ?>
        
        <div id="mainContent">
        
            <div id="mainContent-intro">
            
                <h2>Sorry, that Page was not found.</h2>
                
                <h5 class='errorMessage'>Please explore a Menu, above.</h5>
                
                <h5 class='errorMessage'>Or enter a Search term, below.</h5>
                
                <div class="clearFloat"></div>
            
            </div><!-- end of #mainContent-intro -->
                    
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
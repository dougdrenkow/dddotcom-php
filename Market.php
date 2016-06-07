<?php
	
include("etc.inc");

$cxn = mysqli_connect($host,$user,$password,$database)
or die ("Could not connect to server.");
	
$marketTitleCurrent="{$_GET['marketTitle']}"; //Superglobals are already decoded.

$queryMarket="SELECT * FROM Market WHERE marketTitle=\"$marketTitleCurrent\"";

$resultMarket=mysqli_query($cxn,$queryMarket)
or die ("Couldn't execute queryMarket.");

$rowMarket=mysqli_fetch_assoc($resultMarket);

extract ($rowMarket);

$marketTitleCurrent=$marketTitle;

$marketSubtitleCurrent=$marketSubtitle;

$marketImagePathCurrent = $marketImagePath;

$marketImageAltCurrent=$marketImageAlt;

$marketImageCaptionCurrent=$marketImageCaption;

$marketTextCurrent=$marketText;

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
    
    <body id="marketPage" onload="preload(['images/ddlogo-96x96-WhTransp.png','images/caretWhiteE-32x40.png','images/arrowBlueN-48x48.png','images/ddlogoBlueDk-96x96.png','images/addThis-16x16.png'])">
    
		<?php	
        
        include("header.php");        
        
        ?>
        
        <div id="mainContent">
        
            <div id="mainContent-intro">
            
				<?php
            
                /* Display marketTitle, marketImage, marketSubtitle, marketText, and index of Market (bookmarked below). */
                
                echo
                "<h2>$marketTitleCurrent</h2>\n
                
				<div id='sidebar'>\n
				
					<div class='mainContent-intro-imageBox'>
					
						<img class='image' src='$marketImagePathCurrent' alt='$marketImageAltCurrent'>\n
					
						<div class='imageCaption'>$marketImageCaptionCurrent</div>\n
					
					</div>\n
					
					<div class='mainContent-intro-indexBox'>\n";
						
						$queryMedia="SELECT * FROM Media ORDER BY mediaSortOrder";
						
						$resultMedia=mysqli_query($cxn,$queryMedia)
						or die ("Couldn't execute queryMedia.");
						
						echo
						"<h5>Works</h5>\n
						
						<ul class='index'>\n";
									
						while($rowMedia=mysqli_fetch_assoc($resultMedia))
						{
							
							extract ($rowMedia);
	
							$mediaTitleCurrent=$mediaTitle;
	
							$queryWorkMedia="SELECT * FROM Work WHERE marketTitle=\"$marketTitleCurrent\" AND mediaTitle=\"$mediaTitle\" ORDER BY workSortOrder";
							
							$resultWorkMedia=mysqli_query($cxn,$queryWorkMedia)
							or die ("Couldn't execute queryWorkMedia.");
							
							$rowCountWorkMedia=mysqli_num_rows($resultWorkMedia);
							
							if ($rowCountWorkMedia > 0) {

								$mediaTitleNav='Nav'.$mediaTitle; /* See dd.js for discussion of methods and limitations for smooth scrolling using links on the same page */
								
								echo
								"<li><a href='#$mediaTitle' id='$mediaTitleNav' class='samePageNavBttn'>$mediaTitle</a></li>\n";
								
							}
														
						}
							
						echo
						"</ul>\n
					
					</div><!-- .mainContent-intro-indexBox -->\n
					
					<div class='clearFloat'></div>\n
			
				</div><!-- #sidebar -->\n
				
                <h5>$marketSubtitleCurrent</h5>\n
                
                $marketTextCurrent\n";
                
                ?>
                
                <div class="clearFloat"></div>
            
			</div><!-- #mainContent-intro -->
            
			<?php
			
			/* Display Works of the given Market selection sorted by Media */
			
			$queryMedia="SELECT * FROM Media ORDER BY mediaSortOrder";
			
			$resultMedia=mysqli_query($cxn,$queryMedia)
			or die ("Couldn't execute queryMedia.");
			
			while($rowMedia=mysqli_fetch_assoc($resultMedia))
			{
				
				extract ($rowMedia);
						
				$queryWorkMedia="SELECT * FROM Work WHERE marketTitle=\"$marketTitleCurrent\" AND mediaTitle=\"$mediaTitle\" ORDER BY workSortOrder";
				
				$resultWorkMedia=mysqli_query($cxn,$queryWorkMedia)
				or die ("Couldn't execute queryWorkMedia.");
				
				$rowCountWorkMedia=mysqli_num_rows($resultWorkMedia);
				
				if ($rowCountWorkMedia > 0) {

					echo
					"<a class='bookmark' id='$mediaTitle' name='$mediaTitle'></a>\n
					
					<h4 class='mediaSection'>$mediaTitle for</h4>\n
						
					<h4 class='marketSection forSection'>$marketTitleCurrent</h4>\n
			
					<div class='displayBox-box-box'>\n";
					
					while($rowWorkMedia=mysqli_fetch_assoc($resultWorkMedia))
					{
				
						extract ($rowWorkMedia);
				
						echo 
						"<div class='displayBox-box'>\n
						
							<div class='displayBox'>\n";
								
							if($mediaTitle=='Web Sites'){
								
								echo 
								"<h4><a href='$workExternalURL' target='_blank'>$workTitle</a></h4>\n
								
								<div class='displayBox-imageBox'>\n
								
									<a href='$workExternalURL' target='_blank'><img class='image' src='$workImagePath' alt='$workImageAlt' ></a>
				
								</div><!-- *.displayBox-imageBox -->\n

								<div class='displayBox-textBox'>\n
								
									$workSubtitle\n
										
									<p class='more'><a href='$workExternalURL' target='_blank'>Explore more</a></p>\n	
									
									<div class='imageCaption'>$workImageCaption</div>\n
								
								</div><!-- *.displayBox-textBox -->\n";

							} else {
								
								$workTitleURL=urlencode($workTitle);
							
								echo 
								"<h4><a href='Work.php?workTitle=$workTitleURL'>$workTitle</a></h4>\n
								
								<div class='displayBox-imageBox'>\n
								
									<a href='Work.php?workTitle=$workTitleURL'><img class='image' src='$workImagePath' alt='$workImageAlt' ></a>
				
								</div><!-- *.displayBox-imageBox -->\n

								<div class='displayBox-textBox'>\n
								
									$workSubtitle\n
										
									<p class='more'><a href='Work.php?workTitle=$workTitleURL'>Explore more</a></p>\n	
									
									<div class='imageCaption'>$workImageCaption</div>\n
								
								</div><!-- *.displayBox-textBox -->\n";
								
							}
							
							echo
							"</div><!-- *.displayBox -->\n
							
						</div><!-- .displayBox-box -->\n";
						
						} /* while($rowMedia=mysqli_fetch_assoc($resultMedia)) */
					
						echo
						"<div class='clearFloat'></div>\n
										
					</div><!-- .displayBox-box-box -->\n
				
					<br>\n";
				
				}
				
			}
			
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
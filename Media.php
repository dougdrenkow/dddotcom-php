<?php
	
include("inc.inc");

$cxn = mysqli_connect($host,$user,$password,$database)
or die ("Could not connect to server.");
	
$mediaTitleCurrent="{$_GET['mediaTitle']}"; //Superglobals are already decoded.

$queryMedia="SELECT * FROM Media WHERE mediaTitle=\"$mediaTitleCurrent\"";

$resultMedia=mysqli_query($cxn,$queryMedia)
or die ("Couldn't execute queryMedia.");

$rowMedia=mysqli_fetch_assoc($resultMedia);

extract ($rowMedia);

$mediaTitleCurrent=$mediaTitle;

$mediaSubtitleCurrent=$mediaSubtitle;

$mediaImagePathCurrent = $mediaImagePath;

$mediaImageAltCurrent=$mediaImageAlt;

$mediaImageCaptionCurrent=$mediaImageCaption;

$mediaTextCurrent=$mediaText;

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
        
    <body id="mediaPage" onload="preload(['images/ddlogo-96x96-WhTransp.png','images/caretWhiteE-32x40.png','images/plusBlue-48x48.png','images/minusBlue-48x48.png','images/ddlogoBlack-12x12.png','images/arrowBlueN-48x48.png','images/ddlogoBlueDk-96x96.png','images/addThis-16x16.png'])">
    
		<?php	
        
        include("header.php");        
        
        ?>
        
        <div id="mainContent">
        
            <div id="mainContent-intro">
            
				<?php
            
                /* Display mediaTitle, mediaImage, mediaSubtitle, mediaText, and index of Markets (bookmarked below). */
                
                echo
                "<h2>$mediaTitleCurrent</h2>\n 
                
				<div id='sidebar'>\n
				
					<div class='mainContent-intro-imageBox'>
					
						<img class='image' src='$mediaImagePathCurrent' alt='$mediaImageAltCurrent'>\n
					
						<div class='imageCaption'>$mediaImageCaptionCurrent</div>\n
					
					</div>\n
					
					<div class='mainContent-intro-indexBox'>\n";
						
						$queryMarket="SELECT * FROM Market ORDER BY marketSortOrder";
						
						$resultMarket=mysqli_query($cxn,$queryMarket)
						or die ("Couldn't execute queryMarket.");
						
						echo
						"<h5>$mediaTitleCurrent for</h5>\n
						
						<ul class='index'>\n";
						
						while($rowMarket=mysqli_fetch_assoc($resultMarket))
						{
							
							extract ($rowMarket);
							
							$queryWorkMarket="SELECT * FROM Work WHERE mediaTitle=\"$mediaTitleCurrent\" AND marketTitle=\"$marketTitle\" ORDER BY workSortOrder";
							
							$resultWorkMarket=mysqli_query($cxn,$queryWorkMarket)
							or die ("Couldn't execute queryWorkMarket.");
							
							$rowCountWorkMarket=mysqli_num_rows($resultWorkMarket);
							
							if ($rowCountWorkMarket > 0) {

								$marketTitleNav='Nav'.$marketTitle; /* See dd.js for discussion of methods and limitations for smooth scrolling using links on the same page */
								
								echo
								"<li><a href='#$marketTitle' id='$marketTitleNav' class='samePageNavBttn'>$marketTitle</a></li>\n";
									
							}
														
						}
							
						echo
						"</ul>\n
				
					</div><!-- .mainContent-intro-indexBox -->\n";
					
					// Display clientTitles of the given Media selection sorted by clientSummary
						
    				if ($mediaTitleCurrent=="Software &amp; Databases") {
					
					echo
					"<div class='mainContent-intro-accordionBox'>\n
        
    					<h5>Selected Clients</h5>\n";

						$clientSummaryCurrent='';
						
						$queryClients="SELECT * FROM ClientsSoftware ORDER BY clientSummary";
						
						$resultClients=mysqli_query($cxn,$queryClients)
						or die ("Couldn't execute queryClients.");
						
						while($rowClients=mysqli_fetch_assoc($resultClients))
						{
							
							$clientSummaryOld=$clientSummaryCurrent;
							
							extract ($rowClients);
							
							$clientSummaryCurrent=$clientSummary;
							
							if($clientSummaryCurrent!=$clientSummaryOld)
							{
								
								$queryClientsSoftwareClientSummary="SELECT * FROM ClientsSoftware WHERE clientSummary=\"$clientSummaryCurrent\" ORDER BY clientTitle";
								
								$resultClientsSoftwareClientSummary=mysqli_query($cxn,$queryClientsSoftwareClientSummary)
								or die ("Couldn't execute queryClientsSoftwareClientSummary.");
								
								$rowCountClientsSoftwareClientSummary=mysqli_num_rows($resultClientsSoftwareClientSummary);
								
								if ($rowCountClientsSoftwareClientSummary > 0)
								{
			
									echo
									"<div class='mainContent-intro-accordion'>\n
						
										<h6 class='slideDivTrigger'>$clientSummaryCurrent</h6>\n
										
										<ul class='slideDiv'>\n";
										
										while($rowClientsSoftwareClientSummary=mysqli_fetch_assoc($resultClientsSoftwareClientSummary))
										{
												
											extract ($rowClientsSoftwareClientSummary);
											
											$clientTitleCurrent=$clientTitle;
											
											echo
											"<li>$clientTitleCurrent</li>\n";
											
										}
									
										echo
										"</ul><!-- .slideDiv -->\n
									
									</div><!-- .mainContent-intro-accordion -->\n";
									
									}
	
								}
							
							}
								
						echo
						"</div><!-- .mainContent-intro-accordionBox -->\n";
					
					}
					else
					{
					
    				echo
					"<div class='mainContent-intro-accordionBox'>\n
        
    					<h5>As Valued by</h5>\n";

						$clientSummaryCurrent='';
						
						$queryClients="SELECT * FROM Clients ORDER BY clientSummary";
						
						$resultClients=mysqli_query($cxn,$queryClients)
						or die ("Couldn't execute queryClients.");
						
						while($rowClients=mysqli_fetch_assoc($resultClients))
						{
							
							$clientSummaryOld=$clientSummaryCurrent;
							
							extract ($rowClients);
							
							$clientSummaryCurrent=$clientSummary;
							
							if($clientSummaryCurrent!=$clientSummaryOld)
							{
								
								$queryClientsMediaClientSummary="SELECT * FROM Clients WHERE mediaTitle=\"$mediaTitleCurrent\" AND clientSummary=\"$clientSummaryCurrent\" ORDER BY clientTitle";
								
								$resultClientsMediaClientSummary=mysqli_query($cxn,$queryClientsMediaClientSummary)
								or die ("Couldn't execute queryClientsMediaClientSummary.");
								
								$rowCountClientsMediaClientSummary=mysqli_num_rows($resultClientsMediaClientSummary);
								
								if ($rowCountClientsMediaClientSummary > 0)
								{
			
									echo
									"<div class='mainContent-intro-accordion'>\n
						
										<h6 class='slideDivTrigger'>$clientSummaryCurrent</h6>\n
										
										<ul class='slideDiv'>\n";
										
										while($rowClientsMediaClientSummary=mysqli_fetch_assoc($resultClientsMediaClientSummary))
										{
												
											extract ($rowClientsMediaClientSummary);
											
											$clientTitleCurrent=$clientTitle;
											
											echo
											"<li>$clientTitleCurrent</li>\n";
											
										}
									
										echo
										"</ul><!-- .slideDiv -->\n
									
									</div><!-- .mainContent-intro-accordion -->\n";
									
									}
	
								}
							
							}
								
						echo
						"</div><!-- .mainContent-intro-accordionBox -->\n";
					
						}
						
						echo
						"<div class='clearFloat'></div>\n
			
				</div><!-- #sidebar -->\n
				
                <h5>$mediaSubtitleCurrent</h5>\n
                
                $mediaTextCurrent\n";
                
                ?>
                
                <div class="clearFloat"></div>
            
			</div><!-- #mainContent-intro -->
            
			<?php
			
			/* Display Works of the given Media selection sorted by Markets */
			
			$queryMarket="SELECT * FROM Market ORDER BY marketSortOrder";
			
			$resultMarket=mysqli_query($cxn,$queryMarket)
			or die ("Couldn't execute queryMarket.");
			
			while($rowMarket=mysqli_fetch_assoc($resultMarket))
			{
				
				extract ($rowMarket);
						
				$queryWorkMarket="SELECT * FROM Work WHERE mediaTitle=\"$mediaTitleCurrent\" AND marketTitle=\"$marketTitle\" ORDER BY workSortOrder";
				
				$resultWorkMarket=mysqli_query($cxn,$queryWorkMarket)
				or die ("Couldn't execute queryWorkMarket.");
				
				$rowCountWorkMarket=mysqli_num_rows($resultWorkMarket);
				
				if ($rowCountWorkMarket > 0) {
				
					$marketTitleURL=urlencode($marketTitle);
					
					echo
					"<a class='bookmark' id='							$marketTitle' name='$marketTitle'></a>\n
				
					<h4 class='marketSection'>$mediaTitleCurrent for</h4>\n
						
					<h4 class='marketSection forSection'>$marketTitle</h4>\n
		
					<div class='displayBox-box-box'>\n";
			
					while($rowWorkMarket=mysqli_fetch_assoc($resultWorkMarket))
					{
				
						extract ($rowWorkMarket);
				
						echo 
						"<div class='displayBox-box'>\n
						
							<div class='displayBox'>\n";
									
								if($mediaTitleCurrent=='Web Sites'){
									
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

<?php

include("etc.inc");

$cxn = mysqli_connect($host,$user,$password,$database)
or die ("Couldn't connect to server.");

$careerTitleCurrent="{$_GET['careerTitle']}"; //Superglobals are already decoded.

$queryCareer="SELECT * FROM Career WHERE careerTitle=\"$careerTitleCurrent\"";

$resultCareer=mysqli_query($cxn,$queryCareer)
or die ("Couldn't execute queryCareer.");

$rowCareer=mysqli_fetch_assoc($resultCareer);

extract ($rowCareer);

$careerTitleCurrent=$careerTitle;

$careerSubtitleCurrent=$careerSubtitle;

$careerPlaceDatesCurrent=$careerPlaceDates;

$careerImagePathCurrent=$careerImagePath;

$careerImageAltCurrent=$careerImageAlt;

$careerImageCaptionCurrent=$careerImageCaption;

$careerTextCurrent=$careerText;

?>

<!doctype html>
<html>
    
    <head>
    
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />        
        
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        
        <title>Douglas Drenkow | Digital Communications</title>
        
<meta name="Description" content="On my own or in teams, I have designed, developed, produced, and distributed digital and traditional communications for major corporations, iconic buildings, elected officials, government agencies, prestigious universities, and respected professionals for over 25 years." />
        
        
		<link rel="apple-touch-icon" href="apple-touch-icon.png" />
            
        <link rel="stylesheet" href="css/dd.css">
        
		<script src="https://use.typekit.net/opl4hma.js"></script><!-- Sofia Pro -->
		<script>try{Typekit.load({ async: false });}catch(e){}</script>

    </head>
    
    <body id="careerPage" onload="preload(['images/ddlogo-96x96-WhTransp.png','images/caretWhiteE-32x40.png','images/pdficon_small.png','images/Word-icon-16x16.png','images/text16x16.PNG','images/linkedin-16x23.png','images/plusBlue-48x48.png','images/minusBlue-48x48.png','images/ddlogoBlack-12x12.png','images/arrowBlueN-48x48.png','images/ddlogoBlueDk-96x96.png','images/addThis-16x16.png'])">
    
		<?php	
        
        include("header.php");        
        
        ?>
        
        <div id="mainContent">
        
            <div id="mainContent-intro">
            
				<?php

                echo
                "<div class='careerLinks'>R&eacute;sum&eacute;:&nbsp;\n 
                
                    <a href='pdfs/DrenkowResume.pdf' target='_blank'><img src='images/pdficon_small.png' alt='Adobe PDF icon' width='16' height='16'></a>&nbsp;&nbsp;\n
                    
                    <a href='docs/DrenkowResume.docx' target='_blank'><img src='images/Word-icon-16x16.png' alt='Microsoft Word icon' width='16' height='16'></a>&nbsp;&nbsp;\n
                    
                    <a href='text/DrenkowResume.txt' target='_blank'><img src='images/text16x16.PNG' alt='Plain Text icon' width='16' height='16'></a>&nbsp;&nbsp;\n
                    
                    <a href='http://www.linkedin.com/pub/douglas-drenkow/1/818/a21' target='_blank'><img src='images/linkedin-16x23.png' alt='LinkedIn icon' width='23' height='16'></a>\n
                
                </div><!-- #careerLinks -->\n					
                
                <h2>$careerTitleCurrent</h2>\n 
				
				<div id='sidebar'>\n";
				
				if($careerTitleCurrent=='Objectives')
				{
				
					echo
					"<div class='mainContent-intro-imageBox'>\n
					
						<img class='image' src='$careerImagePathCurrent' alt='$careerImageAltCurrent'>
						
						<div class='imageCaption'>$careerImageCaptionCurrent</div>
					
					</div><!-- .mainContent-intro-imageBox -->\n
				
					<div class='sidebar-quote'>\n
					
						&ldquo;I do the very best I know how &mdash; the very best I can; and I mean to keep on doing so until the end.&rdquo;<br>\n

						<div class='citation'>&mdash; <a href='http://rogerjnorton.com/Lincoln78.html' target='_blank'>Abraham Lincoln</a></div>\n
												
					</div><!-- .sidebar-quote -->\n				
				
                	<div class='clearFloat'></div>\n
			
				</div><!-- #sidebar -->\n
				
				<h5>$careerSubtitleCurrent</h5>\n";
				
				// Note no careerPlaceDates (blank line).
				
				}
				else if($careerTitleCurrent=='University of California, Davis') 
				{
				
					echo
					"<div class='mainContent-intro-imageBox'>\n
					
						<img class='image' src='$careerImagePath' alt='$careerImageAlt'>
						
						<div class='imageCaption'>$careerImageCaption</div>
					
					</div><!-- .mainContent-intro-imageBox -->\n
					
					<div class='clearFloat'></div>\n
			
				</div><!-- #sidebar -->\n
                
				<h5>$careerSubtitle</h5>\n";
				
				// Note no careerPlaceDates (blank line).
				
				}
				else if($careerTitleCurrent=='D.E.D. Electronic Publishing')
				{
				
					echo
					"<div class='mainContent-intro-imageBox'>\n
					
						<img class='image' src='$careerImagePathCurrent' alt='$careerImageAltCurrent'>
						
						<div class='imageCaption'>$careerImageCaptionCurrent</div>
					
					</div><!-- .mainContent-intro-imageBox -->\n
				
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
							
							$queryWorkCareerMedia="SELECT * FROM Work WHERE careerTitle=\"$careerTitleCurrent\" AND mediaTitle=\"$mediaTitleCurrent\" ORDER BY workSortOrder";
							
							$resultWorkCareerMedia=mysqli_query($cxn,$queryWorkCareerMedia)
							or die ("Couldn't execute queryWorkCareerMedia.");
							
							$rowCountWorkCareerMedia=mysqli_num_rows($resultWorkCareerMedia);
							
							if ($rowCountWorkCareerMedia > 0) {

								$mediaTitleCurrentNav="Nav".$mediaTitleCurrent; /* See dd.js for discussion of methods and limitations for smooth scrolling using links on the same page */
		
								echo
								"<li><a href='#$mediaTitleCurrent' id='$mediaTitleCurrentNav' class='samePageNavBttn'>$mediaTitleCurrent</a></li>\n";

							}
														
						}
							
						echo
						"</ul>\n
					
					</div><!-- .mainContent-intro-indexBox -->\n";
				
					// Display clientTitles of the given Career selection sorted by clientSummary.
						
    				echo
					"<div class='mainContent-intro-accordionBox'>\n
        
    					<h5>Clients &amp; Resellers Worldwide</h5>\n";

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
								
								$queryClientsCareerClientSummary="SELECT * FROM ClientsSoftware WHERE careerTitle=\"$careerTitleCurrent\" AND clientSummary=\"$clientSummaryCurrent\" ORDER BY clientTitle";
								
								$resultClientsCareerClientSummary=mysqli_query($cxn,$queryClientsCareerClientSummary)
								or die ("Couldn't execute queryClientsCareerClientSummary.");
								
								$rowCountClientsCareerClientSummary=mysqli_num_rows($resultClientsCareerClientSummary);
								
								if ($rowCountClientsCareerClientSummary > 0)
								{
			
									echo
									"<div class='mainContent-intro-accordion'>\n
						
										<h6 class='slideDivTrigger'>$clientSummaryCurrent</h6>\n
										
										<ul class='slideDiv'>\n";
										
										while($rowClientsCareerClientSummary=mysqli_fetch_assoc($resultClientsCareerClientSummary))
										{
												
											extract ($rowClientsCareerClientSummary);
											
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
						"</div><!-- .mainContent-intro-accordionBox -->\n
					
                	<div class='clearFloat'></div>\n
			
				</div><!-- #sidebar -->\n
                
				<h5>$careerSubtitleCurrent</h5>\n
				
				<h6 class='careerPlaceDates'>$careerPlaceDatesCurrent</h6>\n";
				
				}
				else
				{
				
					echo
					"<div class='mainContent-intro-imageBox'>\n
					
						<img class='image' src='$careerImagePathCurrent' alt='$careerImageAltCurrent'>
						
						<div class='imageCaption'>$careerImageCaptionCurrent</div>
					
					</div><!-- .mainContent-intro-imageBox -->\n
				
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
							
							$queryWorkCareerMedia="SELECT * FROM Work WHERE careerTitle=\"$careerTitleCurrent\" AND mediaTitle=\"$mediaTitleCurrent\" ORDER BY workSortOrder";
							
							$resultWorkCareerMedia=mysqli_query($cxn,$queryWorkCareerMedia)
							or die ("Couldn't execute queryWorkCareerMedia.");
							
							$rowCountWorkCareerMedia=mysqli_num_rows($resultWorkCareerMedia);
							
							if ($rowCountWorkCareerMedia > 0)
							{

								$mediaTitleNav='Nav'.$mediaTitle; /* See dd.js for discussion of methods and limitations for smooth scrolling using links on the same page */
								
								echo
								"<li><a href='#$mediaTitle' id='$mediaTitleNav' class='samePageNavBttn'>$mediaTitle</a></li>\n";
								
							}
														
						}
							
						echo
						"</ul>\n
					
					</div><!-- .mainContent-intro-indexBox -->\n";
				
					// Display clientTitles of the given Career selection sorted by clientSummary
						
    				echo
					"<div class='mainContent-intro-accordionBox'>\n
        
    					<h5>Works for</h5>\n";

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
								
								$queryClientsCareerClientSummary="SELECT * FROM Clients WHERE careerTitle=\"$careerTitleCurrent\" AND clientSummary=\"$clientSummaryCurrent\" ORDER BY clientSortOrder";
								
								$resultClientsCareerClientSummary=mysqli_query($cxn,$queryClientsCareerClientSummary)
								or die ("Couldn't execute queryClientsCareerClientSummary.");
								
								$rowCountClientsCareerClientSummary=mysqli_num_rows($resultClientsCareerClientSummary);
								
								if ($rowCountClientsCareerClientSummary > 0)
								{
			
									echo
									"<div class='mainContent-intro-accordion'>\n
						
										<h6 class='slideDivTrigger'>$clientSummaryCurrent</h6>\n
										
										<ul class='slideDiv'>\n";
										
										while($rowClientsCareerClientSummary=mysqli_fetch_assoc($resultClientsCareerClientSummary))
										{
												
											extract ($rowClientsCareerClientSummary);
											
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
						"</div><!-- .mainContent-intro-accordionBox -->\n
					
                	<div class='clearFloat'></div>\n
			
				</div><!-- #sidebar -->\n
                
				<h5>$careerSubtitleCurrent</h5>\n
				
				<h6 class='careerPlaceDates'>$careerPlaceDatesCurrent</h6>\n";
				
				} // End of all if-else-if's
				
				echo
				"<div>$careerTextCurrent</div>\n
				
				<div class='clearFloat'></div>\n
			
			</div><!-- #mainContent-intro -->\n";
		   
		    ?>
            
			<?php
			
			/* Display Works of the given Career selection sorted by Media */
			
			$queryMedia="SELECT * FROM Media ORDER BY mediaSortOrder";
			
			$resultMedia=mysqli_query($cxn,$queryMedia)
			or die ("Couldn't execute queryMedia.");
			
			while($rowMedia=mysqli_fetch_assoc($resultMedia))
			{
				
				extract ($rowMedia);
						
				$queryWorkMedia="SELECT * FROM Work WHERE careerTitle=\"$careerTitleCurrent\" AND mediaTitle=\"$mediaTitle\" ORDER BY workSortOrder";
				
				$resultWorkMedia=mysqli_query($cxn,$queryWorkMedia)
				or die ("Couldn't execute queryWorkMedia.");
				
				$rowCountWorkMedia=mysqli_num_rows($resultWorkMedia);
				
				if ($rowCountWorkMedia > 0) {
		
					echo
					"<a class='bookmark' id='$mediaTitle' name='$mediaTitle'></a>\n
					
					<h4 class='mediaSection'>$mediaTitle</h4>\n
			
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
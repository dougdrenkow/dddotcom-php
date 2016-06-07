<?php
	
$fileCurrent="{$_SERVER['PHP_SELF']}"; /* for adding the "selected" class to the current h5.navMenuTrigger */

if($fileCurrent=='/Media.php') {
	$summaryTitleCurrent='Media';
}
else if($fileCurrent=='/Market.php') {
	$summaryTitleCurrent='Markets';
}
else if($fileCurrent=='/Career.php') {
	$summaryTitleCurrent='Career';
}
else if($fileCurrent=='/Work.php') {
	$summaryTitleCurrent='Work';
}
else if($fileCurrent=='/PoliticalBlogging.php') {
	$summaryTitleCurrent='PoliticalBlogging';
}

/* The following code is for adding the "selected" class to the current *.nav-box li -- as shown in the code within the header, below, this is a bit more involved than simply finding the current menu heading, above, since we need to track which was the last anchor picked overall, not simply the last anchor picked in any given summaryTitle -- which would highlight one entry per Media, Markets, or Career menu) */
 
$mediaTitleSelected="{$_GET['mediaTitle']}"; //Superglobals are already decoded.

$marketTitleSelected="{$_GET['marketTitle']}"; //Superglobals are already decoded.

$careerTitleSelected="{$_GET['careerTitle']}"; //Superglobals are already decoded.

?>

<div id="header">
    
    <a href="/">
    
    	<div id="ddSiteTitle-ddLogo-box">
        
            <img id="ddSiteTitle" src="images/ddlogo-320x57.png" alt="Douglas Drenkow | Digital Communications">
        
            <img id="ddLogo" src="images/ddlogo-96x96-WhTransp.png" alt="DD Logo">
         	
        </div><!-- #ddSiteTitle-ddLogo-box -->
        
  	</a>
    
    <div id="nav-box-box-box">
        
        <?php	
            
        /*Select Summarys (BTW, that is not the same as 'summaries') for navbar */
        
        $querySummary="SELECT * FROM Summary ORDER BY summarySortOrder";
        
        $resultSummary=mysqli_query($cxn,$querySummary)
        or die ("Couldn't execute querySummary.");
		
        while($rowSummary=mysqli_fetch_assoc($resultSummary))
        {
    
			extract ($rowSummary);
			
			/* Display each Summary, with title and Media, Marketing, or Career records */
			
			echo 
			"<div class='nav-box-box'>\n
			
				<div class='nav-box'>\n";
				
					if($summaryTitle==$summaryTitleCurrent) {
						
						echo 
						"<div class='navMenuTrigger-box selected'>\n
						
							<h5 class='navMenuTrigger'>$summaryTitle</h5>\n
							
						</div>\n";
						
					} else {
					
						echo 
						"<div class='navMenuTrigger-box'>\n
						
							<h5 class='navMenuTrigger'>$summaryTitle</h5>\n
							
						</div>\n";
						
					}
								
					if($summaryTitle=='Media') {
						
						$queryMedia="SELECT * FROM Media ORDER BY mediaSortOrder";
						
						$resultMedia=mysqli_query($cxn,$queryMedia)
						or die ("Couldn't execute queryMedia.");
						
						/* Create selection list */
					   
						echo 
						"<ul class='navMenu' id='menu$summarySortOrder'>\n";
					
						while($rowMedia = mysqli_fetch_assoc($resultMedia))
						{
							
							extract($rowMedia);
							
							$mediaTitleURL=urlencode($mediaTitle);
							
							if(($summaryTitle==$summaryTitleCurrent && $mediaTitle==$mediaTitleSelected) || ($summaryTitleCurrent=='Work' && $mediaTitle==$mediaTitleCurrent) || ($summaryTitleCurrent=='PoliticalBlogging' && $mediaTitle==$mediaTitleCurrent)) {
								
								echo 
								"<li class='selected'><a href='Media.php?mediaTitle=$mediaTitleURL'>$mediaTitle</a></li>\n";
								
							} else {
							
								echo 
								"<li><a href='Media.php?mediaTitle=$mediaTitleURL'>$mediaTitle</a></li>\n";
								
							}
							
						}
						
					} else
					
					if($summaryTitle=='Markets') {
						
						$queryMarket="SELECT * FROM Market ORDER BY marketSortOrder";
						
						$resultMarket=mysqli_query($cxn,$queryMarket)
						or die ("Couldn't execute queryMarket.");
						
						/* Create selection list */
					   
						echo 
						"<ul class='navMenu' id='menu$summarySortOrder'>\n";
					
						while($rowMarket = mysqli_fetch_assoc($resultMarket))
						{
							
							extract($rowMarket);
							
							$marketTitleURL=urlencode($marketTitle);
							
							if(($summaryTitle==$summaryTitleCurrent && $marketTitle==$marketTitleSelected) || ($summaryTitleCurrent=='Work' && $marketTitle==$marketTitleCurrent) || ($summaryTitleCurrent=='PoliticalBlogging' && $marketTitle==$marketTitleCurrent)) {
								
								echo 
								"<li class='selected'><a href='Market.php?marketTitle=$marketTitleURL'>$marketTitle</a></li>\n";
								
							} else {
							
								echo 
								"<li><a href='Market.php?marketTitle=$marketTitleURL'>$marketTitle</a></li>\n";
								
							}
							
						}
						
					} else
					
					if($summaryTitle=='Career') {
						
						$queryCareer="SELECT * FROM Career ORDER BY careerSortOrder";
						
						$resultCareer=mysqli_query($cxn,$queryCareer)
						or die ("Couldn't execute queryCareer.");
						
						/* Create selection list */
					   
						echo 
						"<ul class='navMenu' id='menu$summarySortOrder'>\n";
					
						while($rowCareer = mysqli_fetch_assoc($resultCareer))
						{
							
							extract($rowCareer);
							
							$careerTitleURL=urlencode($careerTitle);
							
							if(($summaryTitle==$summaryTitleCurrent && $careerTitle==$careerTitleSelected) || ($summaryTitleCurrent=='Work' && $careerTitle==$careerTitleCurrent) || ($summaryTitleCurrent=='PoliticalBlogging' && $careerTitle==$careerTitleCurrent)) {
								
								echo 
								"<li class='selected'><a href='Career.php?careerTitle=$careerTitleURL'>$careerTitle</a></li>\n";
								
							} else {
							
								echo 
								"<li><a href='Career.php?careerTitle=$careerTitleURL'>$careerTitle</a></li>\n";
								
							}
							
						}
						
					}
						
					echo 
					"</ul><!-- .navMenu -->\n
					
				</div><!-- .nav-box -->\n
			
			</div><!-- .nav-box-box -->\n";
			
		}
		
        ?>
        
        <div class="clearFloat"></div>
    
    </div><!-- #nav-box-box-box -->
    
    <div class="clearFloat"></div>

</div><!-- header -->

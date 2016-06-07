<?php	

/* index.php [must be lower case]: Displays site intro, media examples (with images and links for user to click), and summary text. Displays a list of records (manually selected, below) from the Markets and Career tables.

Overall, prioritize experience (particularly for small viewports) -- 1) Show work, 2) Show "big name" clients, and then 3) Tell about me -- show value I bring to the table. */

include("etc.inc");

$cxn = mysqli_connect($host,$user,$password,$database)
or die ("Could not connect to server.");

?>

<!doctype html>
<html lang="en">

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
    
    <body id="homePage" onload="preload(['images/ddlogo-96x96-WhTransp.png','images/caretGrayW-32x40.png','images/caretWhiteW-32x40.png','images/caretGrayE-32x40.png','images/caretWhiteE-32x40.png','images/pdficon_small.png','images/Word-icon-16x16.png','images/text16x16.PNG','images/linkedin-16x23.png','images/addThis-16x16.png'])">
    
		<?php	
        
        include("header.php");        
        
        ?>
        
        <div id="mainContent">
            
            <div id="homeMedia-box" class="homeSlide-box">
            
                <h1 class="homeSlideHeading">Media</h1>
                
                <div id="prevMedia" class="prevSlide"></div>
                
                <div id="nextMedia" class="nextSlide"></div>
                
                <div class="cycle-slideshow"
                    data-cycle-fx="carousel"
                    data-cycle-delay="0"
                    data-cycle-timeout="4500"
                    data-cycle-swipe="true"
                    data-cycle-swipe-fx="carousel"
                    data-cycle-prev="#prevMedia"
                    data-cycle-next="#nextMedia"
                    data-cycle-slides="> div"
                    >
                        
                <?php
                
                /*Select Media Summarys */
                        
                $queryMedia="SELECT * FROM Media ORDER BY mediaSortOrder";
                
                $resultMedia=mysqli_query($cxn,$queryMedia)
                or die ("Couldn't execute queryMedia.");
                
                while($rowMedia=mysqli_fetch_assoc($resultMedia))
                    {
            
                    extract ($rowMedia);
                    
                    $mediaTitleURL=urlencode($mediaTitle);
                    
                    echo
                    "<div class='cycle-slide-div'>\n
                            
                    <div class='cycle-slide-div-imageCell'>\n
                        
                        <a href='Media.php?mediaTitle=$mediaTitleURL'><img class='image' src='$mediaImagePath' alt='$mediaImageAlt' > </a>\n
                    
                        </div><!-- .cycle-slide-div-imageCell -->\n
                    
                        <div class='cycle-slide-div-textCell'>\n
                            
                            <h4><a href='Media.php?mediaTitle=$mediaTitleURL'>$mediaTitle</a></h4>\n
                            
                            <div class='cycle-slide-div-textBox'>$mediaSubtitle</div>\n
                            
                            <p class='more'><a href='Media.php?mediaTitle=$mediaTitleURL'>Explore more</a></p>\n                     
                        
                        </div><!-- .cycle-slide-div-textCell -->\n
                    
                    </div><!-- .cycle-slide-div -->\n";
                    
                    } 
        
                echo
                "</div><!-- .cycle-slideshow -->\n
            
            </div><!-- #homeMedia-box -->\n";
    
            ?>     
                   
            <div id="homeMarket-box" class="homeSlide-box">
            
                <h1 class="homeSlideHeading">Markets</h1>
                
                <div id="prevMarket" class="prevSlide"></div>
                
                <div id="nextMarket" class="nextSlide"></div>
                
                <div class="cycle-slideshow"
                    data-cycle-fx="carousel"
                    data-cycle-delay="2250"
                    data-cycle-timeout="4500"
                    data-cycle-swipe="true"
                    data-cycle-swipe-fx="carousel"
                    data-cycle-prev="#prevMarket"
                    data-cycle-next="#nextMarket"
                    data-cycle-slides="> div"
                    >
                                 
                <?php
                
                /*Select Market Summarys */
                        
                $queryMarket="SELECT * FROM Market ORDER BY marketSortOrder";
                
                $resultMarket=mysqli_query($cxn,$queryMarket)
                or die ("Couldn't execute queryMarket.");
                
                while($rowMarket=mysqli_fetch_assoc($resultMarket))
                    {
            
                    extract ($rowMarket);
                    
                    $marketTitleURL=urlencode($marketTitle);
                    
                    echo
                    "<div class='cycle-slide-div'>\n
                            
                        <div class='cycle-slide-div-imageCell'>\n
                            <a href='Market.php?marketTitle=$marketTitleURL'><img class='image' src='$marketImagePath' alt='$marketImageAlt' ></a>\n
                        
                        </div><!-- .cycle-slide-div-imageCell -->\n
                    
                        <div class='cycle-slide-div-textCell'>\n
                            
                            <h4><a href='Market.php?marketTitle=$marketTitleURL'>$marketTitle</a></h4>\n
                            
                            <div class='cycle-slide-div-textBox'>$marketSelectedClients</div>\n
                            
                            <p class='more'><a href='Market.php?marketTitle=$marketTitleURL'>Explore more</a></p>\n                     
                        
                        </div><!-- .cycle-slide-div-textCell -->\n
                    
                    </div><!-- .cycle-slide-div -->\n";
                    
                    } 
        
                echo
                "</div><!-- .cycle-slideshow -->\n
            
            </div><!-- #homeMarket-box -->\n";
    
            ?>     
                
            <div id="homeCareer-box" class="homeSlide-box">
            
                <h1 class="homeSlideHeading">Career</h1>
                
                <div id="prevCareer" class="prevSlide"></div>
                
                <div id="nextCareer" class="nextSlide"></div>
                
                <div class="cycle-slideshow"
                    data-cycle-fx="carousel"
                    data-cycle-delay="0"
                    data-cycle-timeout="4500"
                    data-cycle-swipe="true"
                    data-cycle-swipe-fx="carousel"
                    data-cycle-prev="#prevCareer"
                    data-cycle-next="#nextCareer"
                    data-cycle-slides="> div"
                    >
                       
                <?php
                
                /*Select Career Summarys */
                        
                $queryCareer="SELECT * FROM Career ORDER BY careerSortOrder";
                
                $resultCareer=mysqli_query($cxn,$queryCareer)
                or die ("Couldn't execute queryCareer.");
                
                while($rowCareer=mysqli_fetch_assoc($resultCareer))
                    {
            
                    extract ($rowCareer);
                    
                    $careerTitleURL=urlencode($careerTitle);
                    
                    echo
                    "<div class='cycle-slide-div'>\n
                            
                        <div class='cycle-slide-div-imageCell'>\n
                        
                            <a href='Career.php?careerTitle=$careerTitleURL'><img class='image' src='$careerImagePath' alt='$careerImageAlt' ></a>\n
                            
                        </div><!-- .cycle-slide-div-imageCell -->\n
                    
                        <div class='cycle-slide-div-textCell'>\n
                            
                            <h4><a href='Career.php?careerTitle=$careerTitleURL'>$careerTitle</a></h4>\n
                            
                            <div class='cycle-slide-div-textBox'>$careerSubtitle</div>\n
                            
                            <p class='more'><a href='Career.php?careerTitle=$careerTitleURL'>Explore more</a></p>\n                     
                        
                        </div><!-- .cycle-slide-div-textCell -->\n
                    
                    </div><!-- .cycle-slide-div -->\n";
                
                } 
    
                echo
                "</div><!-- .cycle-slideshow -->\n
            
            </div><!-- #homeCareer-box -->\n";
    
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
        
		<script src="js/jquery.cycle2.min.js"></script>
        
        <script src="js/jquery.cycle2.carousel.min.js"></script>
        
        <script src="js/jquery.cycle2.swipe.min.js"></script>
        
		<script src="http://s7.addthis.com/js/300/addthis_widget.js"></script>
        
    </body>

</html>
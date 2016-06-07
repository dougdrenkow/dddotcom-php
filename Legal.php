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
        
        <title>Douglas Drenkow | Digital Communications</title>
        
<meta name="Description" content="On my own or in teams, I have designed, developed, produced, and distributed digital and traditional communications for major corporations, iconic buildings, elected officials, government agencies, prestigious universities, and respected professionals for over 25 years." />
        
        <link rel="shortcut icon" href="favicon.ico">
        
		<link rel="apple-touch-icon" href="apple-touch-icon.png" />
            
        <link rel="stylesheet" href="css/dd.css">
        
		<script src="https://use.typekit.net/opl4hma.js"></script><!-- Sofia Pro -->
		<script>try{Typekit.load({ async: false });}catch(e){}</script>

    </head>
    
    <body id="legalPage" onload="preload(['images/ddlogoWhiteNavy-96x96.png','images/caretWhiteE-32x40.png','images/arrowBlueN-48x48.png','images/ddlogoBlueDk-96x96.png','images/addThis-16x16.png'])">
    
		<?php	
        
        include("header.php");        
        
        ?>
        
        <div id="mainContent">
        
            <div id="mainContent-intro">
            
                <h2>Legal Notices</h2>
                
                <p>This Web site is &copy; 2016 Douglas Drenkow. All Rights Reserved.</p>
        
                <p>All other original material is protected by additional copyrights.</p>
        
                <p>All material published by others is reproduced here in Fair Use.</p>
        
                <p>All opinions expressed in this Web site are those of the author. No affiliations or endorsements by any other parties are implied.</p>
        
                <p>Adobe, Dreamweaver, Flash, Illustrator, PageMaker, Photoshop, and Reader are either registered trademarks or trademarks of Adobe Systems Incorporated in the United States and/or other countries.</p>
        
                <p>Apple and iTunes are trademarks of Apple Inc., registered in the United States and other countries.</p>
        
                <p>Microsoft, Access, FrontPage, Internet Explorer, Outlook, PowerPoint, and Windows are either registered trademarks or trademarks of Microsoft Corporation in the United States and/or other countries.</p>
        
                <p>All other trademarks and brands in this Web site are the property of their respective owners. No affiliations or endorsements are implied. Companies, institutions, government entities, political candidates, and any other individuals or organizations identified by name, trademark, or other text and/or graphical element in any video or other content within this Web site as &ldquo;clients,&rdquo; &ldquo;sponsors,&rdquo; &ldquo;patrons,&rdquo; etc. have either paid for products or services or received them on a complimentary or voluntary basis from Douglas Drenkow, operating either as an individual or as a company (Douglas Drenkow Communications, Drenkow Media, etc.); no further endorsements or affiliations are implied.</p>
        
                <p>To protect the privacy of visitors to this Web site, appropriate electronic,  physical, and administrative procedures have been put in place to maintain data security, safeguard and help prevent unauthorized access, and correctly use any information  collected online. At no time will any information collected be sold or distributed.</p>
        
                <p> The links in this Web site will let you access sites that are not under the control of the owner of this site, who is not responsible for the contents of any linked site, or any link contained in a linked site, or any changes or updates to such sites. The owner of this site is not responsible for any form of transmission received from any linked site. The owner of this site is providing these links to you only as a convenience, and the inclusion of any link does not imply endorsement of that linked site by the owner of this site. </p>
        
                <p>Thanks again to those who allowed me to be photographed with them, proudly.</p>
                    
            </div><!-- #mainContent-intro -->
                    
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
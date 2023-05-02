<?php
include('ingia.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
	<meta name="author" content="Steve Firsake"/>
	
	<link rel="shortcut icon" href="saveme.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="siterg.css"/>
	<link rel="stylesheet" type="text/css" href="stylerg.css" />
	<title>LOGIN</title>
    </head>

 <body class="info-page-layout-offset  info-page-content-overlay     tagline-and-contact-info-show-all site-border-none social-icon-style-round     gallery-design-slideshow aspect-ratio-auto lightbox-style-dark gallery-navigation-bullets gallery-info-overlay-show-on-hover gallery-aspect-ratio-32-standard gallery-arrow-style-no-background gallery-transitions-fade gallery-show-arrows gallery-auto-crop   product-list-titles-under product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square  show-product-price show-product-item-nav product-social-sharing   event-thumbnails event-thumbnail-size-32-standard event-date-label  event-list-show-cats event-list-date event-list-time event-list-address     event-excerpts  event-item-back-link     hide-opentable-icons opentable-style-dark newsletter-style-dark small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square button-style-default button-corner-style-square native-currency-code-usd collection-type-template-page collection-layout-default collection-50b2e4a9e4b054abacd8c2a6 homepage view-list mobile-style-available">

    <div id="outerWrapper">

      <div id="bgOverlay"></div>
    

      <div id="innerWrapper">
        <div style="margin-top: -291.5px;" class="show" id="title-area">
          
            
			   
               <img src="saveme.png" alt="Invasive Species System">
              
            
			<div class="wrapper">
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
		<form class="login active" action="" method="post">
<div>
						 <select name="orgaa" >
                        <option value= "Select Organisation" >Select Organisation</option>
                        <option value= "Northern Rangelands Trust">Northern Rangelands Trust</option>
                        <option value= "Laikipia Wildlife Forum">Laikipia Wildlife Forum</option>
<option value= "Maasai Mara Game Reserve"> Maasai Mara Game Reserve</option>

                        <option value= "Other">Other</option>
        </select>
</div>
						<div>
							<input name="stimail" type="text" placeholder="User ID"/>
						</div>
						<div>
							<input name="rupurupu" type="password" placeholder="Password" />
						</div>
						
							<div>
								<input id="submitA" name="submit" type="submit" value="LOGIN"/>
								<input id="submitB" name="submit2" type="submit" value="CANCEL"/>
							</div>
							 
							<div class="clear"></div>
						</div>
						<B style="color:white"><?php echo $error; ?></B>
					</form>
			
          
        
                    
        </div>
    
    </div> <!-- end #innerWrapper -->
    </div> <!-- end #outerWrapper -->
 

</body></html>

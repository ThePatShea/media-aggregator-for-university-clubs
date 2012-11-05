<?php 
	$post[0]	= getSinglePost("SELECT * FROM videos WHERE postYouTubeID = 'TksrHxdo7eA' ");
	$post[1]	= getSinglePost("SELECT * FROM events WHERE postFacebookID = '227918700568366' ");
	$post[2]	= getSinglePost("SELECT * FROM videos WHERE postYouTubeID = 'pOVNNlRjJfI' ");
	$post[3]	= getSinglePost("SELECT * FROM videos WHERE postYouTubeID = 'PHlVPbVAajo' ");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Tabbed jQuery slideshow</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.cycle.js"></script>
        <script type="text/javascript" src="lib/js/slideshow.js"></script>
            
<div class='largeBox'>
    <div class='featuredSlider'>
        <div id="slideshow">
            <div class="slides" style="position: relative">
                <ul>
                    <li id="slide-one" style="position: absolute">
                       
                       	<a href='<?php echo $post[0][0]['link']; ?>'>
                       		
                       		<div class='crop2' style='width:948px; height:  240px; border-radius: 4px; -moz-border-radius: 4px; position: relative; z-index: 10;'>
                       			<img style='width:948px; position: relative; top:  -100px;' src='<?php echo $post[0][0]['image']; ?>'>
                       		</div>
                       		
                       		<div class='featuredSlider_label' style='position: absolute; top: 80; z-index: 11;'> <div class='labelTopLine'> <?php echo $post[0][0]['name']; ?> </div> <div class='labelBottomLine'> <?php echo $post[0][0]['accountName']; ?> </div> </div>
                       	</a>
                       	
                       
                        
                    </li>
                    <li id="slide-two" style="position: absolute">
                        
                        <a href='<?php echo $post[1][0]['link']; ?>'>
                        	
                        	<div class='crop2' style='width:948px; height:  240px; border-radius: 4px; -moz-border-radius: 4px;'>
                        		<img style='width:948px; position: relative; top:  -100px;' src='<?php echo $post[1][0]['image']; ?>'>
                        	</div>
                        	
                        	<div class='featuredSlider_label' style='position: absolute; top: 80;'> <div class='labelTopLine'> <?php echo $post[1][0]['name']; ?> </div> <div class='labelBottomLine'> <?php echo $post[1][0]['accountName']; ?> </div> </div>
                        
                        </a>
                        
                    </li>   
                    <li id="slide-three" style="position: absolute">
                        
                        <a href='<?php echo $post[2][0]['link']; ?>'>
                        	
                        	<div class='crop2' style='width:948px; height:  240px; border-radius: 4px; -moz-border-radius: 4px;'>
                        		<img style='width:948px; position: relative; top:  -100px;' src='<?php echo $post[2][0]['image']; ?>'>
                        	</div>
                        	
                        	<div class='featuredSlider_label' style='position: absolute; top: 80;'> <div class='labelTopLine'> <?php echo $post[2][0]['name']; ?> </div> <div class='labelBottomLine'> <?php echo $post[2][0]['accountName']; ?> </div> </div>
                        
                        </a>
                        
                    </li>
                    <li id="slide-four" style="position: absolute">
                        
                        <a href='<?php echo $post[3][0]['link']; ?>'>
                        	
                        	<div class='crop2' style='width:948px; height:  240px; border-radius: 4px; -moz-border-radius: 4px;'>
                        		<img style='width:948px; position: relative; top:  -100px;' src='<?php echo $post[3][0]['image']; ?>'>
                        	</div>
                        	
                        	<div class='featuredSlider_label' style='position: absolute; top: 80;'> <div class='labelTopLine'> <?php echo $post[3][0]['name']; ?> </div> <div class='labelBottomLine'> <?php echo $post[3][0]['accountName']; ?> </div> </div>
                        
                        </a>
                        
                    </li>                
                </ul>
            </div>
            <ul class="slides-nav tabBox">
                <li class="circle on"><a href="#slide-one"></a></li>
                <li class="circle"><a href="#slide-two"></a></li>
                <li class="circle"><a href="#slide-three"></a></li>
                <li class="circle"><a href="#slide-four"></a></li>
            </ul>
        </div>
    </div>
</div>

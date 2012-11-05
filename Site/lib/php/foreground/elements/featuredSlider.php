<?php 
	
	$post[0][0]['link'] = 'article.php?id=14387';
	$post[1]	= getSinglePost("SELECT * FROM videos WHERE postYouTubeID = '_KWie8688vg' ");
	$post[2][0]['link'] = 'article.php?id=14389';
	$post[3]	= getSinglePost("SELECT * FROM videos WHERE postYouTubeID = 'pr9wCwNL7F8' ");
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
                       			<img style='width:948px;' src='lib/images/featuredSliderImages/new1.gif'>
                       		</div>
                       	</a>
                        
                    </li>
                    <li id="slide-two" style="position: absolute">
                        
                        <a href='<?php echo $post[1][0]['link']; ?>'>
                        	
                        	<div class='crop2' style='width:948px; height:  240px; border-radius: 4px; -moz-border-radius: 4px;'>
                        		<img style='width:948px;' src='lib/images/featuredSliderImages/artsclub.jpg'>
                        	</div>
                        	
                        </a>
                        
                    </li>   
                    <li id="slide-three" style="position: absolute">
                        
                        <a href='<?php echo $post[2][0]['link']; ?>'>
                        	
                        	<div class='crop2' style='width:948px; height:  240px; border-radius: 4px; -moz-border-radius: 4px;'>
                        		<img style='width:948px;' src='lib/images/featuredSliderImages/new2.jpg'>
                        	</div>
                        </a>
                        
                    </li>
                    <li id="slide-four" style="position: absolute">
                        
                        <a href='<?php echo $post[3][0]['link']; ?>'>
                        	
                        	<div class='crop2' style='width:948px; height:  240px; border-radius: 4px; -moz-border-radius: 4px;'>
                        		<img style='width:948px;' src='lib/images/featuredSliderImages/orchestra.jpg'>
                        	</div>
                        	
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

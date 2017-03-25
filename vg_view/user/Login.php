<?php require_once(View."header.php");?>






<div class="loginwrapper">
	<div class="loginwrap zindex100 animate2 bounceInDown">
	<h1 class="logintitle"><span class="iconfa-lock"></span> Sign In <span class="subtitle">Hello! Sign in to get you started!</span></h1>
        <div class="loginwrapperinner">
            <form id="loginform" action="" method="post">
                <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" /></p>
                <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
                <p class="animate6 bounceIn"><button name="action" id="submit" class="btn btn-default btn-block">Submit</button></p>
                <p class="animate7 fadeIn"><a href="#"><span class="icon-question-sign icon-white"></span> Forgot Password?</a></p>
            </form>
            
            
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.loginwrap').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	
	jQuery('#username,#password').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	jQuery('#loginform button').click(function(){
		if(!jQuery.browser.msie) {
			if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
				if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
				if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
				jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
					jQuery(this).removeClass('animate0 wobble');
				});
			} else {
				
				jQuery.post("<?php echo BASE_URL?>?User_LoginCheck",{ userID: jQuery('#username').val(), PassWord:jQuery('#password').val()},
				
				function(data){
							
						if(data=="false"){
							jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
					jQuery(this).removeClass('animate0 wobble');
				});
							}else{
								jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
					window.location= "<?php echo BASE_URL?>?User_Profile";
								});
								
								}
					}
				
				
				);
								
			
			}
			return false;
		}
	});
});
</script>


<?php require_once(View."footer.php");?>



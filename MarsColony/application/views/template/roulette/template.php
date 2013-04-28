<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<?php echo $head; ?>
<body>
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
          appId      : '319361548192549', // App ID from the App Dashboard
          channelUrl : '//localhost/personal/marscolony/', // Channel File for x-domain communication
          status     : true, // check the login status upon init?
          cookie     : true, // set sessions cookies to allow your server to access the session?
          xfbml      : true  // parse XFBML tags on this page?
        });

        // Additional initialization code such as adding Event Listeners goes here

      };

      // Load the SDK's source Asynchronously
      // Note that the debug version is being actively developed and might 
      // contain some type checks that are overly strict. 
      // Please report such bugs using the bugs tool.
      (function(d, debug){
         var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
         ref.parentNode.insertBefore(js, ref);
       }(document, /*debug*/ false));
    </script>
    <div id='template-background' style='position:absolute;z-index:0;left:0;top:0;width:100%;'>
      <img src='<?php echo IMAGE_PATH;?>template/background.jpg' style='width:100%;height:100%' alt='[]' />
    </div>
    <div class="message" style='position:relative;'><?php echo $message; ?></div>
  	<div class="main"  style='position:relative;'><?php echo $content; ?></div>
  
</body>
</html>
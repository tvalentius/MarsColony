<div class='home-wrapper'>
    <div>
        Selamat Datang, <?php echo $this->playername ?>
        <img src="<?php echo $this->FB->fbpropic ?>" />
    </div>

    <div>
        <button onclick="postToFeed()">Click to Share Status</button>
        <div id="msg"></div>
    </div>

    <div><a href="<?php echo $this->FB->fb_logout_url ?>">Mari Logout</a></div>
</div>

<script type="text/javascript">
    //Function to post wall facebook
    function getBasePath() {

        return "<?php echo base_url(); ?>"
    }

    function postToFeed() {
        // calling the API ...
        var obj = {
            method: 'feed',
            link: 'https://developers.facebook.com/docs/reference/dialogs/',
            picture: 'http://fbrell.com/f8.jpg',
            name: 'Facebook Dialogs',
            caption: 'Reference Documentation',
            description: 'Using Dialogs to interact with users.'
        };
        function callback(response) {
            //If wall posted, add the bonus score here
            if( response != null ) 
                wallReward(response["post_id"]);
            //If not
        }
        FB.ui(obj, callback);
    }
    
    function wallReward(postid) {
        ajaxData = {};
	    ajaxData.post_id = postid;
        $.ajax({
    		type : 'POST',
    		url : current_path+'/wall_reward/'+postid,
    		dataType : 'json',
    		data: ajaxData,
    		beforeSend : function() {
    		},
    		success : function(data){
    			alert(data);
    		},
    		error : function(XMLHttpRequest, textStatus, errorThrown) {
    			console.log(XMLHttpRequest.errorThrown);
    		}
    	});
    }
</script>

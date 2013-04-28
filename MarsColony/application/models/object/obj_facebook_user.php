<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obj_facebook_user extends Root_model {

    //User Data
    var $fbid;
    var $fbpropic;
    var $fbdata;
    var $fbfriend;
    
    //Facebook URL
    var $fb_login_url;
    var $fb_logout_url;
    
    //Checking Variable
    var $is_fb_login = FALSE;
    
    //Config
    var $scope    =    'email, user_location, user_birthday';
    var $redirect_uri = 'home/do_login_fb/';
    
	public function __construct($config = array())
	{
        //Configurating Facebook
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$this->config->load("facebook",TRUE);
		$this->app_fb_config = $this->config->item('facebook');
		$this->load->library('fb/Facebook', $this->app_fb_config);
        //Set Config Variable
        foreach($config as $var):
            $this->$var = $var;
        endforeach;
        $this->redirect_uri = base_url().$this->redirect_uri;
	    
        // Try to get the user's id on Facebook
        $this->fbid = $this->facebook->getUser();
        
        // If user is not yet authenticated, the id will be zero
        if($this->fbid == 0):
            
            $this->set_login_data();

        else:
                                    
            try {

                /* Get user's data from facebook */
                $this->fbdata = $this->facebook->api('/me');

                /* Get user's profile picture
    			$dataparams = array(
    				'method'=>'fql.query',
    				'query'=>'
    					SELECT uid, name, pic_small
    					FROM user
    					WHERE uid = '.$this->fbid.'
    				'
    			);
    			$temp_propic = $this->facebook->api($dataparams); */
    			$this->fbpropic = "https://graph.facebook.com/".$this->fbid."/picture";
                
    			/* Get user's friend that also play
    			$friendparams = array(
    				'method'=>'fql.query',
    				'query'=>'
    				    SELECT uid, name, pic_small
    					FROM user
    					WHERE
    						is_app_user = 1
    						AND uid IN (SELECT uid2 FROM friend WHERE uid1 = me())
    				'
    			);
    			$this->fbfriend = $this->facebook->api($friendparams); */
                
                /*Generate Facebook Apps Logout url */
        		$logoutparams = array('next'=>base_url().'home/logout/');
        		$this->fb_logout_url = $this->facebook->getLogoutUrl($logoutparams);

                //The User success with Facebook
                $this->is_fb_login = TRUE;
            
            } catch(FacebookApiException $e) {
                
                $this->set_login_data();
                //The User has not login with Facebook
                $this->is_fb_login = FALSE;
                
            }
        endif;
        
	}
    
    private function set_login_data()
    {
        //The User hasn't login with Facebook
        $this->is_fb_login = FALSE;
	    //Generate Facebook Apps Login url
		$loginparams = array(
			'scope'=> $this->scope,
			'redirect_uri'=> $this->redirect_uri,
		);
        $this->fb_login_url = $this->facebook->getLoginUrl($loginparams);
    }
}

/* End of file */
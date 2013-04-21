<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Session extends CI_Session {

	var $general = '';
	var $error = '';
	var $success = '';

	public function __construct()
	{
		//session_start();
		parent::__construct();
		define('SESS_LANGUAGE','language');
		define('SESS_GENERAL','msg_general');
		define('SESS_ERROR','msg_error');
		define('SESS_SUCCESS','msg_success');
		define('SESS_USER','userdata');
		define('SESS_PLAYER','playerdata');
		define('SESS_FORM','formdata');
		define('SESS_BOOL','booldata');
		define('SESS_REDIRECT','sesredirect');
	}

	function general($value=FALSE, $ovr = TRUE, $line=TRUE)
	{
		return $this->message($value, $ovr, $line, "general");
	}

	function error($value=FALSE, $ovr = TRUE, $line=TRUE)
	{
		return $this->message($value, $ovr, $line, "error");
	}

	function success($value=FALSE, $ovr = TRUE, $line=TRUE)
	{
		return $this->message($value, $ovr, $line, "success");
	}
	
	private function message($value, $ovr, $line, $type)
	{
		switch($type):
			case "general"	:	$sessname = SESS_GENERAL;	break;
			case "error"	:	$sessname = SESS_ERROR;		break;
			case "success"	:	$sessname = SESS_SUCCESS;	break;
		endswitch;
		if($value==TRUE):
			if($line==TRUE):
				$value = "<p>".$value."</p>";
			endif;
			switch($type):
				case "general"	:
					if($ovr==TRUE): $this->general = $value; 		else: $this->general .= $value; endif;
					$var = $this->general;
				break;
				case "error"	:
					if($ovr==TRUE): $this->error = $value; 		else: $this->error .= $value; endif;
					$var = $this->error;
				break;
				case "success"	:
					if($ovr==TRUE): $this->success = $value; 	else: $this->success .= $value; endif;
					$var = $this->success;
				break;
			endswitch;
			$this->set_flashdata($sessname, $value);
		else:
			return $this->flashdata($sessname);		
		endif;
	}

	function form_data($value=FALSE, $extra='')
	{
		if($value==TRUE):
			$this->set_flashdata(SESS_FORM.$extra, $value);
		else:
			return $this->flashdata(SESS_FORM.$extra);
		endif;
	}

	function user($value=FALSE)
	{
		if($value==TRUE):
			$this->set_userdata(SESS_USER, $value);
		else:
			return $this->userdata(SESS_USER);
		endif;
	}
    
	function player($value=FALSE)
	{
		if($value==TRUE):
			$this->set_userdata(SESS_PLAYER, $value);
		else:
			return $this->userdata(SESS_PLAYER);
		endif;
	}

	function boolean($value=TRUE)
	{
		$this->set_flashdata(SESS_BOOL, $value);
	}

	function get_boolean()
	{
		return $this->flashdata(SESS_BOOL);
	}

	function redirect($value=FALSE)
	{
		if($value==TRUE):
			$this->set_userdata(SESS_REDIRECT, $value);
		else:
			$value = $this->userdata(SESS_REDIRECT);
			$this->unset_userdata(SESS_REDIRECT);
			return $value;
		endif;
	}
	

	//>  makes dw cs4 happy
	
	/**
	* Session class using native PHP session features and hardened against session fixation.
	*
	* @package     CodeIgniter
	* @subpackage  Libraries
	* @category    Sessions
	* @author      Dariusz Debowczyk, Matthew Toledo
	* @link        http://www.philsbury.co.uk/index.php/blog/code-igniter-sessions/
	*/
	/*
	var $flashdata_key     = 'flash'; // prefix for "flash" variables (eg. flash:new:message)
    function CI_Session()
    {
        $this->object =& get_instance();
        log_message('debug', "Native_session Class Initialized");
        $this->_sess_run();
    }

    //Regenerates session id
    function regenerate_id()
    {
        // copy old session data, including its id
        $old_session_id = session_id();
        $old_session_data = $_SESSION;

        // regenerate session id and store it
        session_regenerate_id();
        $new_session_id = session_id();

        // switch to the old session and destroy its storage
        session_id($old_session_id);
        session_destroy();

        // switch back to the new session id and send the cookie
        session_id($new_session_id);
        session_start();

        // restore the old session data into the new session
        $_SESSION = $old_session_data;

        // update the session creation time
        $_SESSION['regenerated'] = time();

        // session_write_close() patch based on this thread
        // http://www.codeigniter.com/forums/viewthread/1624/
        // there is a question mark ?? as to side affects

        // end the current session and store session data.
        session_write_close();
    }

    //Destroys the session and erases session storage
    function destroy()
    {
        unset($_SESSION);
        if ( isset( $_COOKIE[session_name()] ) )
        {
            setcookie(session_name(), '', time()-42000, '/');
        }
        session_destroy();
    }

    //Alias for destroy(), makes 1.7.2 happy.
    function sess_destroy()
    {
        $this->destroy();
    }

    //Reads given session attribute value
    function userdata($item)
    {
        if($item == 'session_id'){ //added for backward-compatibility
            return session_id();
        }else{
            return ( ! isset($_SESSION[$item])) ? false : $_SESSION[$item];
        }
    }

    //Sets session attributes to the given values
    function set_userdata($newdata = array(), $newval = '')
    {
        if (is_string($newdata))
        {
            $newdata = array($newdata => $newval);
        }

        if (count($newdata) > 0)
        {
            foreach ($newdata as $key => $val)
            {
                $_SESSION[$key] = $val;
            }
        }
    }

    //Erases given session attributes
    function unset_userdata($newdata = array())
    {
        if (is_string($newdata))
        {
            $newdata = array($newdata => '');
        }

        if (count($newdata) > 0)
        {
            foreach ($newdata as $key => $val)
            {
                unset($_SESSION[$key]);
            }
        }
    }

    //Starts up the session system for current request
    function _sess_run()
    {
        session_start();

        $session_id_ttl = $this->object->config->item('sess_expiration');

        if (is_numeric($session_id_ttl))
        {
            if ($session_id_ttl > 0)
            {
                $this->session_id_ttl = $this->object->config->item('sess_expiration');
            }
            else
            {
                $this->session_id_ttl = (60*60*24*365*2);
            }
        }

        // check if session id needs regeneration
        if ( $this->_session_id_expired() )
        {
            // regenerate session id (session data stays the
            // same, but old session storage is destroyed)
            $this->regenerate_id();
        }

        // delete old flashdata (from last request)
        $this->_flashdata_sweep();

        // mark all new flashdata as old (data will be deleted before next request)
        $this->_flashdata_mark();
    }

    //Checks if session has expired
    function _session_id_expired()
    {
        if ( !isset( $_SESSION['regenerated'] ) )
        {
            $_SESSION['regenerated'] = time();
            return false;
        }

        $expiry_time = time() - $this->session_id_ttl;

        if ( $_SESSION['regenerated'] <=  $expiry_time )
        {
            return true;
        }

        return false;
    }

    //Sets "flash" data which will be available only in next request (then it will
    //be deleted from session). You can use it to implement "Save succeeded" messages
    //after redirect.
    function set_flashdata($newdata = array(), $newval = '')
    {
        if (is_string($newdata))
        {
            $newdata = array($newdata => $newval);
        }

        if (count($newdata) > 0)
        {
            foreach ($newdata as $key => $val)
            {
                $flashdata_key = $this->flashdata_key.':new:'.$key;
                $this->set_userdata($flashdata_key, $val);
            }
        }
    }


    //Keeps existing "flash" data available to next request.
    function keep_flashdata($key)
    {
        $old_flashdata_key = $this->flashdata_key.':old:'.$key;
        $value = $this->userdata($old_flashdata_key);

        $new_flashdata_key = $this->flashdata_key.':new:'.$key;
        $this->set_userdata($new_flashdata_key, $value);
    }

    //Returns "flash" data for the given key.
    function flashdata($key)
    {
        $flashdata_key = $this->flashdata_key.':old:'.$key;
        return $this->userdata($flashdata_key);
    }

    //PRIVATE: Internal method - marks "flash" session attributes as 'old'
    function _flashdata_mark()
    {
        foreach ($_SESSION as $name => $value)
        {
            $parts = explode(':new:', $name);
            if (is_array($parts) && count($parts) == 2)
            {
                $new_name = $this->flashdata_key.':old:'.$parts[1];
                $this->set_userdata($new_name, $value);
                $this->unset_userdata($name);
            }
        }
    }

    //PRIVATE: Internal method - removes "flash" session marked as 'old'
    function _flashdata_sweep()
    {
        foreach ($_SESSION as $name => $value)
        {
            $parts = explode(':old:', $name);
            if (is_array($parts) && count($parts) == 2 && $parts[0] == $this->flashdata_key)
            {
                $this->unset_userdata($name);
            }
        }
    }*/
}
/* End of file */
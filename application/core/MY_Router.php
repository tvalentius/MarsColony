<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MY_Router Class
 *
 * @author Damien K.
 */
class MY_Router extends CI_Router
{
     function __construct()
     {
         parent::__construct();
     }

    // --------------------------------------------------------------------

    /**
     * OVERRIDE
     */
    function _validate_request($segments)
    {
        // Does the requested controller exist in the root folder?
        if (file_exists(APPPATH.'controllers/'.$segments[0].EXT))
        {
            return $segments;
        }

        // Is the controller in a sub-folder?
        if (is_dir(APPPATH.'controllers/'.$segments[0]))
        {
            // EDIT:
            $dir = '';
            do
            {
                if (strlen($dir) > 0)
                {
                    $dir .= '/';
                }
                $dir .= $segments[0];
                $segments = array_slice($segments, 1);
				if(!empty($segments[0]))
				{
					$temp_segs = $segments[0];
				}
				else
				{
					$temp_segs = $segments;
				}
                if($temp_segs==FALSE) $temp_segs = "";
            }
			while ((is_dir(APPPATH.'controllers/'.$dir .'/'.$temp_segs)) && (!empty($segments)));
            // Set the directory and remove it from the segment array
            $this->set_directory($dir);
            // END EDIT:

            if (count($segments) > 0)
            {
                // Does the requested controller exist in the sub-folder?
                if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].EXT))
                {
                    show_404($this->fetch_directory().$segments[0]);
                }
            }
            else
            {
                $this->set_class($this->default_controller);
                $this->set_method('index');

                // Does the default controller exist in the sub-folder?
                if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.EXT))
                {
                    $this->directory = '';
                    return array();
                }

            }

            return $segments;
        }

        // Can't find the requested controller...
        show_404($segments[0]);
    }
	
	function set_directory($dir)
	{ $this->directory = $dir.'/'; }

}

// END MY_Router class

/* End of file MY_Router.php */
/* Location: ./system/application/libraries/MY_Router.php */ 
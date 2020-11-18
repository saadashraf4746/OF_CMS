<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('admin_not_logged_in'))
{
    function admin_not_logged_in()
    {
    	$ci=& get_instance();
	    $ci->load->database();

    	if(!$ci->session->userdata('is_admin_logged_in'))
    	{
    		return FASLE;
    	}
    	else
    	{
    		return FALSE;
    	}
    } 
}

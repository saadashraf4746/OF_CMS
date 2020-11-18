<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Karachi');


if ( ! function_exists('strCleaner'))
{
    function strCleaner($str)
    {
 		$db = get_instance()->db->conn_id;
    	$one = trim($str);
    	$two = mysqli_real_escape_string($db,$one);
    	return $return_clean = htmlentities($two);
    } 
}

if ( ! function_exists('amount_in_KMBT'))
{
	function amount_in_KMBT($n, $precision = 2) {
	        if ($n < 900) {
	        // Default
	         $n_format = number_format($n);
	        } else if ($n < 900000) {
	        // Thausand
	        $n_format = number_format($n / 1000, $precision). 'K';
	        } else if ($n < 900000000) {
	        // Million
	        $n_format = number_format($n / 1000000, $precision). 'M';
	        } else if ($n < 900000000000) {
	        // Billion
	        $n_format = number_format($n / 1000000000, $precision). 'B';
	        } else {
	        // Trillion
	        $n_format = number_format($n / 1000000000000, $precision). 'T';
	    }
	    return $n_format;
	    }   
}

if ( ! function_exists('LAP_detail'))
{
	function LAP_detail()
	{
	    $ci=& get_instance();
	    $ci->load->database();

		$ci->db->select('*');
		$ci->db->where('email',$ci->session->userdata('LAP_identity'));
		$query = $ci->db->get('users');
		return $query->row();
	}   
}

if ( ! function_exists('dateConvertDMY'))
{
	function dateConvertDMY($date)
	{
		return $newDate = date("d M Y", strtotime($date));
	}   
}

if ( ! function_exists('dateToYMD'))
{
	function dateToYMD($date)
	{
		return $newDate = date("Y-m-d", strtotime($date));
	}   
}

if ( ! function_exists('dateToDMY'))
{
	function dateToDMY($date)
	{
		return $newDate = date("d-m-Y", strtotime($date));
	}   
}

if ( ! function_exists('dateToDMY'))
{
	function dateToDMY($date)
	{
		return $newDate = date("d-m-Y", strtotime($date));
	}   
}

if ( ! function_exists('removeCommas'))
{
	function removeCommas($string)
	{
		return $string = str_replace(",", "", $string);
	}   
}

if ( ! function_exists('attendanceStatistics'))
{
	function attendanceStatistics($id,$role)
	{
	    $ci=& get_instance();
	    $ci->load->database();

	    $query = $ci->db->query("SELECT 
	    	(SELECT count(*) FROM `daily_attendance` WHERE `managing` = '$role' AND `attendanceOfId` = '$id') as totalDays ,
	    	(SELECT count(*) FROM `daily_attendance` WHERE `managing` = '$role' AND `attendanceOfId` = '$id' AND `attendance` = 1) as totalPresent,
	    	(SELECT count(*) FROM `daily_attendance` WHERE `managing` = '$role' AND `attendanceOfId` = '$id' AND `attendance` = 0) as totalAbsent,
	    	(SELECT SUM(perDayAmount) FROM `daily_attendance` WHERE `managing` = '$role' AND `attendanceOfId` = '$id' AND `attendance` = 1) as totalToPaid ");
		return $query->row();
	}   
}

if ( ! function_exists('checkItem'))
{
	function checkItem($param)
	{
		if($param == 1)
		{
			return 'Bardana';
		}
		else if($param == 2)
		{
			return 'Radi';
		}
		else if($param == 3)
		{
			return 'Keel';
		}
		else if($param == 4)
		{
			return 'Sticker';
		}
		else if($param == 5)
		{
			return 'Sheet';
		}
		else if($param == 6)
		{
			return 'Cotton';
		}
	}   
}

if ( ! function_exists('numberFormat'))
{
	function numberFormat($number)
	{
		if (strpos($number,'.') !== false)
		{
			$afterPoint =  strlen(substr(strrchr($number, "."), 1));
			return number_format($number, ($afterPoint<=3?$afterPoint:3), '.', ',');
		}
		else
		{
			return number_format($number);
		}
	}   
}

if ( ! function_exists('todayDate'))
{
	function todayDate()
	{
		return date('d-m-Y');
	}   
}


if ( ! function_exists('foremanLabourIds'))
{
	function foremanLabourIds($foremanId)
	{
	    $ci=& get_instance();
	    $ci->load->database();

	    $query = $ci->db->query("SELECT * FROM staff WHERE foremanId = '$foremanId' AND status = 1 ");
        return $query->num_rows() > 0 ? $query->result() : array();
	}   
}

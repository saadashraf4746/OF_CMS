<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('site_lang');
        if ($siteLang) {
            $ci->lang->load('multiple',$siteLang);
        } else {
            $ci->lang->load('multiple','english');
        }
    }
}
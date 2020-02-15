<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('ms')){
	function ms($array){
		print_r(json_encode($array));
		exit(0);
	}
}

if (!function_exists('l')) {
	function l($slug = ""){
		$CI =& get_instance();
		$lang =$CI->config->item('language');
		$xml = simplexml_load_file("language/".$lang.".xml") or die("Error: Cannot create object ".$slug);
		$text = $slug;
		foreach ($xml->lang as $key => $row) {
			if(xml_attribute($row,"slug") == $slug){
				$text = html_entity_decode(ucfirst($row->text));
			}
		}
		return $text;
	}
}

if (!function_exists('xml_attribute')) {
	function xml_attribute($object, $attribute)
	{
	    if(isset($object[$attribute]))
	        return (string) $object[$attribute];
	}
}

if (!function_exists('format_number')) {
	function format_number($number = ""){
		return number_format($number, 0, ',',',');
	}
}

if (!function_exists('pr')) {
    function pr($data, $type = 0) {
        print '<pre>';
        print_r($data);
        print '</pre>';
        if ($type != 0) {
            exit();
        }
    }
}

if (!function_exists('segment')){
	function segment($index){
		$CI = &get_instance();
        if($CI->uri->segment($index)){
		  return $CI->uri->segment($index);
        }else{
            return false;
        }
	}
}

if (!function_exists('post')){
	function post($input,$check=true){
		$CI = &get_instance();
        if($check){
		  return $CI->input->post($input);
        }else{
            return $CI->input->post($input);
        }
	}
}

if (!function_exists('get')){
	function get($input){
		$CI = &get_instance();
		return $CI->input->get($input);
	}
}

if (!function_exists('session')){
	function session($input){
		$CI = &get_instance();
		return $CI->session->userdata($input);
	}
}

if (!function_exists('set_session')){
	function set_session($name,$input){
		$CI = &get_instance();
		return $CI->session->set_userdata($name,$input);
	}
}

if (!function_exists('unset_session')){
	function unset_session($name){
		$CI = &get_instance();
		return $CI->session->unset_userdata($name);
	}
}

if (!function_exists('destroy_session')){
	function destroy_session(){
		$CI = &get_instance();
		return $CI->session->sess_destroy();
	}
}

function Delete($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            Delete(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
}

if (!function_exists('config_table')){
	function config_table(){
		$CI = &get_instance();
		$CI->db->from("config");
		$query = $CI->db->get();

		return $query->row();
	}
}

if (!function_exists('get_admin')){
	function get_admin(){
		$CI = &get_instance();
		$CI->db->select("a.id, a.id_level, a.email, a.name, a.username, l.name as level");
		$CI->db->from("admin a");
		$CI->db->join("level l", "l.id_level = a.id_level");
		$CI->db->where("a.is_active = 1");
		$query = $CI->db->get();

		return $query->result();
	}
}
?>
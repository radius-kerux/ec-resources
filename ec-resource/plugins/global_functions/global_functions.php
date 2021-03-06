<?php 

function pin ( $template, $params = array () )
{
	extract( $params );
	ob_start();
	file_exists( $template ) ? include $template : FALSE ;
	$template	=	ob_get_contents();
	ob_end_clean();
	
	echo	$template;
}

//------------------------------------------------------------------------------------

function pinHtmlData ( $html_data )
{
	echo	$html_data;
}

//------------------------------------------------------------------------------------

function getUserId ( $if_not_set = NULL )
{
	return isset ( $_GET['id'] ) ? $_GET['id'] : $if_not_set;
}

//------------------------------------------------------------------------------------

function hashPassword ( $string )
{
	return sha1( md5 ( $string ) );
}

//------------------------------------------------------------------------------------

function get ( $index, $if_not_set = NULL )
{
	return isset ( $_GET[$index] ) ? $_GET[$index] : $if_not_set;
}

//------------------------------------------------------------------------------------

function base64Convert ( $path )
{
	$profile_pic	=	file_exists ( $path ) ? file_get_contents ( $path ) : FALSE;
	
	if ( $profile_pic )
		return base64_encode ( $profile_pic );
	else 
		return  FALSE;
}

//------------------------------------------------------------------------------------

function zeroFillZip ( $zipcode )
{
	return str_pad ( $zipcode, 5, '0', STR_PAD_LEFT );
}

//------------------------------------------------------------------------------------

function ifNull ( $var, $return = '' )
{
	return is_null( $var ) ? $return : $var;
}

//------------------------------------------------------------------------------------

function dumpData ( $data )
{
	echo '<pre>';
	var_dump ( $data );
	die;
}

//------------------------------------------------------------------------------------

function getCurrentURI ()
{
	return $_SERVER['REQUEST_URI'];
}

//------------------------------------------------------------------------------------

function formatDate ( $date )
{
	return date ( 'Y-m-d H:i:s', $date );
}

//------------------------------------------------------------------------------------

function getController ()
{
	return str_replace ( 'Controller', '', Spine_GlobalRegistry::getRegistryValue('route', 'controller') );
}

//------------------------------------------------------------------------------------

function registerOutput( $output )
{
	Spine_GlobalRegistry::register('response', 'rest_output', $output);
}

//------------------------------------------------------------------------------------

function retrieveOutput()
{
	return	Spine_GlobalRegistry::getRegistryValue('response', 'rest_output');
}

//------------------------------------------------------------------------------------

function output($output)
{
	return	is_array($output)?json_encode($output):$output;
}

//------------------------------------------------------------------------------------

function form_safe_json($json) 
{
   $json = empty($json) ? '[]' : $json ;
   $search = array('\\',"\n","\r","\f","\t","\b","'") ;
   $replace = array('\\\\',"\\n", "\\r","\\f","\\t","\\b", "&#039");
   $json = str_replace($search,$replace,$json);
   return $json;                          
}         

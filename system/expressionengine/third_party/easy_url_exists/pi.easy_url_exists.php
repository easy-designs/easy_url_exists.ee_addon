<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Easy_gzip_alternatives Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			Jeff Bridgforth
 * @copyright		Copyright (c) Easy! Designs, LLC
 * @link			http://www.easy-designs.net/
 */

$plugin_info = array(
	'pi_name'			=> 'Easy URL Exists',
	'pi_version'		=> '1.0',
	'pi_author'			=> 'Jeff Bridgforth',
	'pi_author_url'		=> 'http://easy-designs.net/',
	'pi_description'	=> 'Checks to see if a file exists',
	'pi_usage'			=> Easy_url_exists::usage()
);

class Easy_url_exists {

#	var $cache;
#	var $return_data = '';
	# Define global variables I want to use in the plugin
	
	/**
	 * Easy_url_exists constructor
	 * Check to see if file url exists
	 */
	function __construct( $url = '' )
	{
		$url = ee()->TMPL->fetch_param( 'url', $url );
		$this->return_data = 'no';
		if ( !empty($url) )
		{
			# init cURL
			$ch = curl_init();
			
			# setup request
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt( $ch, CURLOPT_HEADER, true );
			
			# make request
			curl_exec($ch);
			
			# get a response
			$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close( $ch );
			
			if( $response == 200 )
			{
				$this->return_data = 'yes';
			}
		}
	
		return $this->return_data;
		
		
	} # end Easy_url_exists constructor
	
	/**
	 * Easy_url_exists::usage()
	 * Describes how the plugin is used
	 */
	function usage()
	{
		ob_start(); ?>
This script allows you to check to see if a resource URL exists. It returns a value of yes or no. A common use of this plugin would be to check if the URL exists within a conditional to set up an alternative if the resource comes back with a 404.

Here’s an example:

// Setting a variable using the plugin syntax
{preload_replace:has_photo="{exp:easy_file_exists url='{photo}'}"}

<img src="{if has_photo='yes'}{photo}{if:else}{default_avatar}{/if}" class="user-avatar" />


<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	} # end Easy_gzip_alternatives::usage()
	
} # end Easy_url_exists

/* End of file pi.easy_url_exists.php */ 
/* Location: ./system/expressionengine/third_party/easy_url_exists/pi.easy_url_exists.php */
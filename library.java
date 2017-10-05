using namespace Imagify;

using System;

using System.Linq;

using System.Text;

import java.lang.*;

import java.io.*;

import java.util.*;

import java.util.Arrays;

import java.util.String;

import java.applet.*;

import java.awt.*;

import java.util.Scanner;

import java.util.LinkedList;

public class Optimizer

{

	// STATIC VARIABLES

	// The Imagify API endpoint

	public static final String API_ENDPOINT = 'https://app.imagify.io/api';

	// MEMBER VARIABLES

	public Optimizer()

	{

		// CONSTRUCTOR

		return();

	}

	// INTERFACE

	public void delete()

	{

		return();

	}

	public String toString()

	{

		return super.toString() + "["+ "]";

	}

	// DEVELOPER CODE - PROVIDED AS-IS

	// line 11 ../../../../ump/tmp334259/model.ump

	private $api_key = '' ;

	// line 15 ../../../../ump/tmp334259/model.ump

	private $headers = array() ;

	// line 21 ../../../../ump/tmp334259/model.ump

	public function __construct ( $api_key = '' )

	{

		if ( ! empty( $api_key ) )

		{

			$this->api_key = $api_key;

		}

		// Check if php-curl is enabled

		if ( ! function_exists( 'curl_init' ) || ! function_exists( 'curl_exec' ) )

		{

			die('cURL isn\'t installed on the server.');

		}

		$this->headers['Authorization'] = 'Authorization: token ' . $this->api_key;

	}

	// line 47 ../../../../ump/tmp334259/model.ump

	public function optimize ( $image, $options = array() )

	{

		if ( !is_string($image) || !is_file($image) )

		{

			return (object) array('success' => false, 'message' => 'Image incorrect!');

		}

			else

		if ( !is_readable($image) )

		{

			return (object) array('success' => false, 'message' => 'Image not readable!');

		}

			$default = array('level' => 'aggressive','resize' => array(),'keep_exif' => false,'timeout' => 45);

			$options = array_merge( $default, $options );

			$data = array('image' => curl_file_create( $image ),'data' => json_encode (array('aggressive' => ( 'aggressive' === $options['level'] ) ? true : false,'ultra' => ( 'ultra' === $options['level'] ) ? true : false,'resize' => $options['resize'],'keep_exif' => $options['keep_exif'],)));

			return $this->request( '/upload/', array('post_data' => $data,'timeout' => $options["timeout"]));

	}

	// line 85 ../../../../ump/tmp334259/model.ump

	private function request ( $url, $options = array() )

	{

		$default = array('method' => 'POST','post_data' => null);

		$options = array_merge( $default, $options );

		try

		{

			$ch = curl_init();

			$is_ssl = ( isset( $_SERVER['HTTPS'] ) && ( 'on' == strtolower( $_SERVER['HTTPS'] ) || '1' == $_SERVER['HTTPS'] ) ) || ( isset( $_SERVER['SERVER_PORT'] ) && ( '443' == $_SERVER['SERVER_PORT'] ) );

			if ( 'POST' === $options['method'] )

			{

				curl_setopt( $ch, CURLOPT_POST, true );

				curl_setopt( $ch, CURLOPT_POSTFIELDS, $options['post_data'] );

			}

			curl_setopt( $ch, CURLOPT_URL, self::API_ENDPOINT . $url );

			curl_setopt( $ch, CURLOPT_USERAGENT, 'Imagify PHP Class');

			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

			curl_setopt( $ch, CURLOPT_HTTPHEADER, $this->headers );

			curl_setopt( $ch, CURLOPT_TIMEOUT, $options['timeout'] );

			@curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );

			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, $is_ssl );

			$response = json_decode( curl_exec( $ch ) );

			$error = curl_error( $ch );

			$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

			curl_close( $ch );

		}

		catch( \Exception $e )

		{

			return (object) array('success' => false, 'message' => 'Unknown error occurred');

		}

		if ( 200 !== $http_code && isset( $response->code, $response->detail ) )

		{

			return $response;

		}

		else if ( 200 !== $http_code )

		{

			return (object) array('success' => false, 'message' => 'Unknown error occurred');

		}

			return $response;

	}

}
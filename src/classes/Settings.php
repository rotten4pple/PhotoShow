<?php
/**
 * This file implements the class Settings.
 * 
 * PHP versions 4 and 5
 *
 * LICENSE:
 * 
 * This file is part of PhotoShow.
 *
 * PhotoShow is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PhotoShow is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PhotoShow.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  Website
 * @package   Photoshow
 * @author    Thibaud Rohmer <thibaud.rohmer@gmail.com>
 * @copyright 2011 Thibaud Rohmer
 * @license   http://www.gnu.org/licenses/
 * @link      http://github.com/thibaud-rohmer/PhotoShow-v2
 */

/**
 * Settings
 *
 * Reads all of the settings files and stores them.
 *
 * @category  Website
 * @package   Photoshow
 * @author    Thibaud Rohmer <thibaud.rohmer@gmail.com>
 * @copyright Thibaud Rohmer
 * @license   http://www.gnu.org/licenses/
 * @link      http://github.com/thibaud-rohmer/PhotoShow-v2
 */

class Settings
{

	/// Directory where the photos are stored
	static public $photos_dir;
	
	/// Directory where the thumbs are stored
	static public $thumbs_dir;
	
	/**
	 * Read the settings in the files.
	 * If a settings file is missing, raise an exception.
	 *
	 * @return void
	 * @author Thibaud Rohmer
	 */
	public function init(){

		/// Settings already created
		if(Settings::$photos_dir !== NULL) return;

		/// Set TimeZone
		date_default_timezone_set("Europe/Paris");

		/// Parse conf.ini file 
		$ini_file		=	realpath(dirname(__FILE__)."/../../conf.ini");
		$ini_settings	=	parse_ini_file($ini_file);
		
		/// Setup variables
		Settings::$photos_dir	=	$ini_settings['photos_dir'];
		Settings::$thumbs_dir	=	$ini_settings['thumbs_dir'];

		// Now, check that this stuff exists.
		if(!file_exists(Settings::$photos_dir)){
			throw new Exception("Photos dir doesn't exist !");
		}

		if(!file_exists(Settings::$thumbs_dir)){
			throw new Exception("Thumbs dir doesn't exist !");
		}
	}

}
?>
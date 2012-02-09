<?php

/**
* jsminplus engine
*
* @package    OpenBuildings/asset-merger
* @author     Ivan Kerin
* @copyright  (c) 2011 OpenBuildings Inc.
* @license    http://creativecommons.org/licenses/by-sa/3.0/legalcode
*/
class Asset_Processor_Jsminplus
{
	static public function process($content)
	{
		include_once Kohana::find_file('vendor', 'jsminplus/jsminplus');
		
		return jsminplus::minify($content);
	}	
}
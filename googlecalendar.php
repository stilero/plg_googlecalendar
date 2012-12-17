<?php
/**
 * Description of GoogleCalendar
 *
 * @version  1.0
 * @author Daniel Eliasson (joomla@stilero.com)
 * @copyright  (C) 2012-dec-17 Stilero Webdesign (www.stilero.com)
 * @category Plugins
 * @license	GPLv2
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 
define('GCAL_CLASSES', JPATH_PLUGINS.'/system/googlecalendar/googlecalendar/');
JLoader::register('Googlecalendar', GCAL_CLASSES.'googlecalendar.php');
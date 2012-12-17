<?php
/**
 * GoogleCalendar
 *
 * @version  1.0
 * @package Stilero
 * @subpackage GoogleCalendar
 * @author Daniel Eliasson (joomla@stilero.com)
 * @copyright  (C) 2012-dec-17 Stilero Webdesign (www.stilero.com)
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

class Googlecalendar{
    
    private static $url = 'http://www.google.com/calendar/event?';
    private static $imageSrcPath = '/media/plg_system_googlecalendar/images/plus_google.gif';
    private $title;
    private $startDate;
    private $endDate;
    private $location;
    private $description;
    private $websiteName;
    private $websiteUrl;
    private $imageSrc;
    
    public function __construct($title, $startDate, $endDate, $location='', $description='', $websiteName='', $websiteUrl='') {
        $this->imageSrc = JPATH_ROOT.self::$imageSrcPath;
        $this->title = $title;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->location = $location;
        $this->description = $description;
        $this->websiteName = $websiteName;
        $this->websiteUrl = $websiteUrl;
    }
    
    public function eventLink(){
        $html = '<a title="Add to Google Calendar" class="addgooglecal" target="_blank" href="'.
                self::$url.'action=TEMPLATE'.
                '&text='.$this->title.
                '&dates='.$this->startDate.'/'.$this->endDate.
                '&location='.$this->location.
                '&details='.$this->description.
                '&trp=true'.
                '&sprop=website:'.$this->websiteUrl.
                '&sprop=name:'.$this->websiteName.
                '">'.
                '<img src="'.$this->imageSrc.'">'.
                '</a>';
        return $html;
                
    }
}

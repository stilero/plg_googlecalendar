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
        $this->imageSrc = JURI::base().self::$imageSrcPath;
        $this->title = $title;
        $this->startDate = $this->formatDate($startDate);
        $this->endDate = $this->formatDate($endDate);
        $this->location = $location;
        $this->description = $description;
        $this->websiteName = $websiteName;
        $this->websiteUrl = $websiteUrl;
    }
    
    public function eventLink(){
        $html = '<a title="Add to Google Calendar" class="addgooglecal" target="_blank" href="'.
                self::$url.'action=TEMPLATE'.
                '&text='.urlencode($this->title).
                '&dates='.$this->startDate.'/'.$this->endDate.
                '&location='.urlencode($this->location).
                '&details='.urlencode(strip_tags($this->description)).
                '&trp=true'.
                '&sprop=website:'.urlencode($this->websiteUrl).
                '&sprop=name:'.urlencode($this->websiteName).
                '">'.
                '<img src="'.$this->imageSrc.'">'.
                '</a>';
        return $html;
    }
    
    private function formatDate($date){
        $date =& JFactory::getDate($date);
        $formattedDate = $date->toISO8601();
        $dateWithoutSlashes = str_replace('-', '', $formattedDate);
        $dateWithoutSemicolon = str_replace(':', '', $dateWithoutSlashes);
        $dateWithoutTimeAdd = str_replace('+0000', '', $dateWithoutSemicolon);
        return $dateWithoutTimeAdd.'';
        
    }
}

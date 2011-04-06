<?php
/**
 * Podcast Manager for Joomla!
 *
 * @copyright	Copyright (C) 2011 Michael Babker. All rights reserved.
 * @license		GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 */

// Restricted access
defined('_JEXEC') or die();

$params->def('text', '');
$params->def('urischeme', 'http');
$params->def('plainlink', 1);

$plainlink	= $params->get('otherlink', '');
$img		= $params->get('otherimage', '');

if (!$plainlink) {
	$plainlink = JRoute::_(JURI::root().'index.php?option=com_podcastmanager&view=feed&format=raw');
}

if ($img) {
	$img = JHtml::_('image', $img, JText::_('MOD_PODCASTMANAGER_PODCASTFEED'));
} else {
	$img = JHtml::_('image', 'modules/mod_podcastmanager/media/images/podcast-mini2.png', JText::_('MOD_PODCASTMANAGER_PODCASTFEED'));
}

if ($params->get('urischeme') == 'http') {
	$link = $plainlink;
} else {
	$link = str_replace(array('http:', 'https:'), $params->get('urischeme').':', $plainlink);
}

require(JModuleHelper::getLayoutPath('mod_podcastmanager'));
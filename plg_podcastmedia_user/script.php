<?php
/**
 * Podcast Manager for Joomla!
 *
 * @package     PodcastManager
 * @subpackage  plg_podcastmedia_user
 *
 * @copyright   Copyright (C) 2011 Michael Babker. All rights reserved.
 * @license     GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * Podcast Manager is based upon the ideas found in Podcast Suite created by Joe LeBlanc
 * Original copyright (c) 2005 - 2008 Joseph L. LeBlanc and released under the GPLv2 license
 */

/**
 * Installation class to perform additional changes during install/uninstall/update
 *
 * @package     PodcastManager
 * @subpackage  plg_podcastmedia_user
 * @since       2.0
 */
class PlgPodcastMediaUserInstallerScript
{
	/**
	 * Function to act prior to installation process begins
	 *
	 * @param   string  $type    The action being performed
	 * @param   string  $parent  The function calling this method
	 *
	 * @return  boolean  True on success, false on error
	 *
	 * @since   2.0
	 */
	function preflight($type, $parent)
	{
		// Requires Joomla! 1.7.3 + Platform 11.3
		//@TODO: Revert version check to CMS version on 2.5 Alpha/Beta release
		$jversion = new JVersion;
		$jplatform = new JPlatform;
		if (version_compare($jplatform->getShortVersion(), '11.3', 'lt'))
		{
			JError::raiseNotice(null, JText::_('PLG_PODCASTMEDIA_USER_ERROR_INSTALL_J17'));
			return false;
		}

		return true;
	}
}
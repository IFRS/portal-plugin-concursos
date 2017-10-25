<?php
defined('ABSPATH') or die('No script kiddies please!');
/*
Plugin Name: IFRS Portal Concursos
Plugin URI:  https://github.com/IFRS/portal-plugin-concursos
Description: Plugin para gerenciar Concursos.
Version:     1.1.0
Author:      Ricardo Moro
Author URI:  https://github.com/ricardomoro
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
Text Domain: ifrs-portal-plugin-concursos
Domain Path: /lang
*/

require_once('taxonomy-single-term/class.taxonomy-single-term.php');
require_once('concurso-status.php');
require_once('concurso.php');
require_once('roles.php');

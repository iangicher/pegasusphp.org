<?php

/**
 * Checks whether an extended file has been modified, and if so recompiles the current template. This is for internal use only, do not use.
 *
 * This software is provided 'as-is', without any express or implied warranty.
 * In no event will the authors be held liable for any damages arising from the use of this software.
 *
 * This file is released under the LGPL
 * "GNU Lesser General Public License"
 * More information can be found here:
 * {@link http://www.gnu.org/copyleft/lesser.html}
 *
 * @author     Jordi Boggiano <j.boggiano@seld.be>
 * @copyright  Copyright (c) 2008, Jordi Boggiano
 * @license    http://www.gnu.org/copyleft/lesser.html  GNU Lesser General Public License
 * @link       http://dwoo.org/
 * @version    0.9.1
 * @date       2008-05-30
 * @package    Dwoo
 */
function Dwoo_Plugin_extendsCheck_compile(Dwoo_Compiler $compiler, $file, $uid)
{
	preg_match('#^["\']([a-z]{2,}):(.*?)["\']$#i', $file, $m);
	$resource = $m[1];
	$identifier = $m[2];

	return '// checking for modification in '.$resource.':'.$identifier.'
try {
	$tpl = $this->templateFactory("'.$resource.'", "'.$identifier.'");
} catch (Dwoo_Exception $e) {
	$this->triggerError(\'Extends : Resource <em>'.$resource.'</em> was not added to Dwoo, can not include <em>'.$identifier.'</em>\', E_USER_WARNING);
}
if ($tpl === null)
	$this->triggerError(\'Extends : Resource "'.$resource.':'.$identifier.'" was not found.\', E_USER_WARNING);
elseif ($tpl === false)
	$this->triggerError(\'Extends : Resource "'.$resource.'" does not support extends.\', E_USER_WARNING);
if ($tpl->getUid() != "'.substr($uid, 1, -1).'") { ob_end_clean(); return false; }';
}

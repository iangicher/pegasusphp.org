<?php

/**
 * Adds spaces (or the given character(s)) between every character of a string
 * <pre>
 *  * value : the string to process
 *  * space_char : the character(s) to insert between each character
 * </pre>
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
function Dwoo_Plugin_spacify_compile(Dwoo_Compiler $compiler, $value, $space_char=' ')
{
	return 'implode('.$space_char.', str_split('.$value.', 1))';
}

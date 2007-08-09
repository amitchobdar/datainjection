<?php
/*
 ----------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2005 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org/
 ----------------------------------------------------------------------

 LICENSE

	This file is part of GLPI.

    GLPI is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    GLPI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GLPI; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 ------------------------------------------------------------------------
*/

// Original Author of file: Walid Nouh (walid.nouh@atosorigin.com)
// Purpose of file:
// ----------------------------------------------------------------------

/*
 * Common backend to read files to import
 */
class Backend{
	
	var $file = "";
	var $injectionDatas;
	
	/*
	 * Constructor
	 * @param file input file to read
	 */
    function Backend($file) {
    }

	/*
	 * Read datas from the input file
	 */
	function read()
	{		
	}
	
	/*
	 * Read n lines from the input files
	 */
	function readLinesFromTo($start_line, $end_line)
	{
		
	}
	
	/*
	 * Get datas read from the input file
	 * @return array with all the datas from the file
	 */
	function getDatas()
	{
		return $this->injectionDatas;
	}

	/*
	 * Get header of the file
	 * @return array with the datas from the header
	 */
	function getHeader()
	{
		return $this->injectionDatas->getDataAtLine(0);
	}
		
	/*
	 * get datas from the file at line
	 * @param line_id the id of the line
	 * @return array with datas from this line
	 */	
	function getDataAtLine($line_id)
	{
		return $this->injectionDatas->getDataAtLine($line_id);
	}
	
	function getDatasFromLineToLine($start_line,$end_line)
	{
		$tmp = array();
		for ($i=$start_line;$i <= $end_line;$i++)
			$tmp[] = $this->injectionDatas->getDataAtLine($i);
		return $tmp;	
	}
}

/*
 * Class to map datas from the import file
 */
class InjectionDatas
{
	var $injectionDatas = array();
	
	function setDatas($newDatas)
	{
		$this->injectionDatas = $newDatas;
	}
	
	function addToDatas($newData)
	{
		$this->injectionDatas[] = $newData;
	}
	
	function getDatas()
	{
		return $this->injectionDatas;
	}
	
	function getDataAtLine($line_id)
	{
		if (count($this->injectionDatas) >= $line_id)
			return $this->injectionDatas[$line_id][0];
		else
			return array();	
	}
	
}
?>
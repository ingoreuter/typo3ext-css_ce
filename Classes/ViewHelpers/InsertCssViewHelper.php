<?php
namespace ingoreuter\CssCe\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Ingo Reuter <mail@ingoreuter>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
 
 /**
 *
 * Example
 * {namespace oh=ingoreuter\OpeningHours\ViewHelpers}
 * <cc:insertCss content="some CSS" />
 * or: <cc:insertCss> some css </cc:insertCss>
 *
 * @package ingoreuter
 * @subpackage css_ce
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class InsertCssViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	  * Renders some classic dummy content: Lorem Ipsum...
	  *
	  * @param \string $content css content
	  * @return \string header css
	  * @author Ingo Reuter <mail@ingoreuter.de>
	  */
	public function render($content = NULL) {
		$content = ($content == NULL) ? $this->renderChildren() : $content;
		if($content == NULL) {return '';}
		
		$cssContent = "<style> \n";
		$cssContent.= "/* \n * \n * style generated by css_ce \n * (c) Ingo Reuter, 2014 \n * \n */ \n";
		$cssContent.= $content;
		$cssContent.= "</style>";
		
		$cssContent = preg_replace("/(\n(\s*)\n(\s*)){2,}/m", "\n\n", $cssContent);
		$cssContent = preg_replace("/\t/", "", $cssContent);
		$GLOBALS['TSFE']->additionalHeaderData['tx_cssce_style'] = $cssContent;
	}
}
 
 ?>
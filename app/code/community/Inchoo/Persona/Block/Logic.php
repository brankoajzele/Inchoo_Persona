<?php
/**
 * @author Branko Ajzele <ajzele@gmail.com>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class Inchoo_Persona_Block_Logic extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('inchoo/persona/logic.phtml');
    }
    
    protected function _toHtml()
    {
        if (!$this->helper('inchoo_persona')->isModuleOutputEnabled()) {
            return '';
        }
        
        return parent::_toHtml();
    }    
}

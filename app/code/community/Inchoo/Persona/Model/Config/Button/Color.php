<?php
/**
 * @author Branko Ajzele <ajzele@gmail.com>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class Inchoo_Persona_Model_Config_Button_Color
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'black', 'label'=>Mage::helper('inchoo_persona')->__('Black')),
            array('value' => 'blue', 'label'=>Mage::helper('inchoo_persona')->__('Blue')),
            array('value' => 'red', 'label'=>Mage::helper('inchoo_persona')->__('Red')),
        );
    }
}
<?php
/**
 * @author Branko Ajzele <ajzele@gmail.com>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class Inchoo_Persona_Helper_Data extends Mage_Core_Helper_Data 
{
    const CONFIG_XML_PATH_SETTINGS_ACTIVE = 'inchoo_persona/settings/active';
    const CONFIG_XML_PATH_SETTINGS_BUTTON_LABEL = 'inchoo_persona/settings/button_label';
    const CONFIG_XML_PATH_SETTINGS_BUTTON_POSITION = 'inchoo_persona/settings/button_position';
    const CONFIG_XML_PATH_SETTINGS_BUTTON_COLOR = 'inchoo_persona/settings/button_color';
    const CONFIG_XML_PATH_SETTINGS_MOZILLA_VERIFIER_SERVICE_URL = 'inchoo_persona/settings/mozilla_verifier_service_url';
    
    public function isModuleEnabled($moduleName = null)
    {
        if (Mage::getStoreConfig(self::CONFIG_XML_PATH_SETTINGS_ACTIVE) == '0') {
            return false;
        }
        
        return parent::isModuleEnabled($moduleName = null);
    }
    
    public function isModuleOutputEnabled($moduleName = null)
    {   
        return parent::isModuleOutputEnabled($moduleName);
    }  
    
    public function getLoginUrl()
    {
        return Mage::getUrl('persona/system/login', array('_secure'=>true));
    }
    
    public function getLogoutUrl()
    {
        return Mage::getUrl('persona/system/logout', array('_secure'=>true));
    }     
    
    public function getMozilaVerifierServiceUrl()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_SETTINGS_MOZILLA_VERIFIER_SERVICE_URL);
    }
    
    public function getButtonLabel()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_SETTINGS_BUTTON_LABEL);
    } 
    
    public function getButtonPosition()
    {
        return (int)Mage::getStoreConfig(self::CONFIG_XML_PATH_SETTINGS_BUTTON_POSITION);
    }   
    
    public function getButtonColor()
    {
        return Mage::getStoreConfig(self::CONFIG_XML_PATH_SETTINGS_BUTTON_COLOR);
    }
}

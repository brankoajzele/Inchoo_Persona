<?php
/**
 * @author Branko Ajzele <ajzele@gmail.com>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class Inchoo_Persona_SystemController extends Mage_Core_Controller_Front_Action
{
    public function loginAction()
    {
        $helper = Mage::helper('inchoo_persona');
        
        $client = new Zend_Http_Client();
        $client->setUri($helper->getMozilaVerifierServiceUrl());
        $client->setMethod(Zend_Http_Client::POST);
        $client->setParameterPost('assertion', $this->getRequest()->getParam('assertion'));
        $client->setParameterPost('audience', Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB));
        
        $response = $client->request();
        
        if ($response->isSuccessful()) {

            $_reponse = json_decode($response->getBody());
            
            if (is_object($_reponse) && ((string)$_reponse->status === 'okay')) {
                
                $customer = Mage::getModel('customer/customer');
                
                $email = $_reponse->email;
                $customer->setWebsiteId(Mage::app()->getWebsite()->getId());
                $customer->loadByEmail($email);
                
                if(!$customer->getId()) {
                    $customer->setEmail($email);
                    $customer->setFirstname('Persona');
                    $customer->setLastname('Customer');
                    $customer->setPassword($customer->generatePassword());
                    
                    try {
                        $customer->save();
                        $customer->sendNewAccountEmail('registered', '', Mage::app()->getStore()->getId());
                    } catch (Exception $e) {
                        Mage::logException($e);
                    }               
                }

                if ($customer->getId()) {
                    Mage::getSingleton('customer/session')->loginById($customer->getId());
                }
                
            }
        }
    }
    
    public function logoutAction()
    {
        Mage::getSingleton('customer/session')->logout();
    }
}
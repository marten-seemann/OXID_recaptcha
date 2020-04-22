<?php
namespace SeemannIT\Recaptcha\Application\Controller;

class ContactController extends ContactController_parent {
  public function send() {
    if(!$this->_check_repatcha($_POST['g-recaptcha-response'])) {
      \OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay('MESSAGE_WRONG_VERIFICATION_CODE');
      return false;
    }
    
    return parent::send();
  }

  private function _check_repatcha($sMac) {
    $secret = \OxidEsales\Eshop\Core\Registry::getConfig()->getReCaptchaSecretKey();
    $recaptcha = new \ReCaptcha\ReCaptcha($secret);
    $resp = $recaptcha->verify($sMac);
    if ($resp->isSuccess()) return true;

    // error codes see https://developers.google.com/recaptcha/docs/verify?hl=en
    $errors = $resp->getErrorCodes();

    // throw oxException if the error was caused by incorrect configuration of the module
    foreach($errors as $error) {
      if($error == "missing-input-secret") throw oxNew("oxException", "ReCaptcha request failed: missing-input-secret");
      if($error == "invalid-input-secret") throw oxNew("oxException", "ReCaptcha request failed: invalid-input-secret");
    }
    return false;
  }
}

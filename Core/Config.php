<?php
namespace SeemannIT\Recaptcha\Core;

class Config extends Config_parent {

  /**
  * return g-recaptcha-response if asked for c_mac
  *
  * that way, all the code in the controllers can go unmodified and we just have to extend oxcaptcha
  */
  public function getRequestParameter($sName, $blRaw = false) {
    if($sName == "c_mac") return parent::getRequestParameter('g-recaptcha-response');
    return parent::getRequestParameter($sName, $blRaw);
  }

  public function getReCaptchaSiteKey() {
    return $this->getConfigParam('recaptcha_site_key');
  }

  public function getReCaptchaSecretKey() {
    return $this->getConfigParam('recaptcha_secret_key');
  }

}

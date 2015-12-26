<?php
class oxcaptcha_ext extends oxcaptcha_ext_parent {

  /**
  * perform the ReCaptcha check with the Google server
  *
  * @return bool
  * @throws oxException if module configuration is incorrect
  */
  public function pass($sMac, $sMacHash) {
    require(dirname(__FILE__)."/../vendor/autoload.php");
    $secret = oxRegistry::getConfig()->getReCaptchaSecretKey();

    $recaptcha = new \ReCaptcha\ReCaptcha($secret);
    $resp = $recaptcha->verify($sMac);

    if ($resp->isSuccess()) return true;
    else {
      // error codes see https://developers.google.com/recaptcha/docs/verify?hl=en
      $errors = $resp->getErrorCodes();

      // throw oxException if the error was caused by incorrect configuration of the module
      foreach($errors as $error) {
        if($error == "missing-input-secret") throw oxNew("oxException", "ReCaptcha request failed: missing-input-secret");
        if($error == "invalid-input-secret") throw oxNew("oxException", "ReCaptcha request failed: invalid-input-secret");
      }

      // for missing or invalid captchas just return false
      return false;
    }
  }

}

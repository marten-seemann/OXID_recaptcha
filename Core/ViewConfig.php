<?php
namespace SeemannIT\Recaptcha\Core;

class ViewConfig extends ViewConfig_parent {
  public function getReCaptchaSiteKey() {
    return \OxidEsales\Eshop\Core\Registry::getConfig()->getReCaptchaSiteKey();
  }
}

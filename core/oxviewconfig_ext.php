<?php
class oxviewconfig_ext extends oxviewconfig_ext_parent {
  public function getReCaptchaSiteKey() {
    return oxRegistry::getConfig()->getReCaptchaSiteKey();
  }
}

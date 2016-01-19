# ReCaptcha for OXID

Implements [Google's ReCaptcha](https://www.google.com/recaptcha) into OXID eShops.


## Installation

Download the [latest release](../../releases/latest) and copy the contents of the folder `copy_this` to your server. **Do NOT** download the source files and just upload them to your server, that won't work.

Generate a key pair on [https://www.google.com/recaptcha/admin](https://www.google.com/recaptcha/admin) and set the values in the module settings in the OXID backend. Then activate the module.

### for ROXID users

No further action required.


### for users of other templates

In addition to that, for users of other templates, some additional blocks to the template. The following files have to be modified:

* `form/contact.tpl`
* `form/pricealarm.tpl`
* `form/suggest.tpl`
* `form/privatesales/invite.tpl`

Enclose the label in a block named *captcha_label*, for example in the `form/contact.tpl`, replace (around line 56)

```html
<label class="req">[{ oxmultilang ident="VERIFICATION_CODE" suffix="COLON" }]</label>
```

by

```html
<label class="req">[{block name="captcha_label"}][{ oxmultilang ident="VERIFICATION_CODE" suffix="COLON" }][{/label}]</label>
```

and the actual captcha in a block named *captcha_body*

```html
[{assign var="oCaptcha" value=$oView->getCaptcha() }]
[{if $oCaptcha->isImageVisible()}]
    <img src="[{$oCaptcha->getImageUrl()}]" alt="">
[{else}]
    <span class="verificationCode" id="verifyTextCode">[{$oCaptcha->getText()}]</span>
[{/if}]
<input type="text" data-fieldsize="verify" name="c_mac" value="" class="js-oxValidate js-oxValidate_notEmpty">
<p class="oxValidateError">
    <span class="js-oxError_notEmpty">[{ oxmultilang ident="ERROR_MESSAGE_INPUT_NOTALLFIELDS" }]</span>
</p>
```

by

```html
[{block name="captcha_body"}]
    [{assign var="oCaptcha" value=$oView->getCaptcha() }]
    [{if $oCaptcha->isImageVisible()}]
        <img src="[{$oCaptcha->getImageUrl()}]" alt="">
    [{else}]
        <span class="verificationCode" id="verifyTextCode">[{$oCaptcha->getText()}]</span>
    [{/if}]
    <input type="text" data-fieldsize="verify" name="c_mac" value="" class="js-oxValidate js-oxValidate_notEmpty">
    <p class="oxValidateError">
        <span class="js-oxError_notEmpty">[{ oxmultilang ident="ERROR_MESSAGE_INPUT_NOTALLFIELDS" }]</span>
    </p>
[{/block}]
```

Similar modifications have to be performed for the other three files listed above.

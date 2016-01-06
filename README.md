# ReCaptcha for OXID

Implements [Google's ReCaptcha](https://www.google.com/recaptcha) into OXID eShops.


## Installation

### for ROXID users

Just upload the `recaptcha` folder to the `modules` directory and activate the module in the OXID backend.


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

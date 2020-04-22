[{assign var="language" value=""}]
[{foreach from=$oxcmp_lang item=_lng}]
  [{if $_lng->selected}]
    [{assign var="language" value=$_lng->abbr}]
  [{/if}]
[{/foreach}]

<div class="g-recaptcha" data-sitekey="[{$oViewConf->getReCaptchaSiteKey()}]" data-theme="light" ></div>
<script src="https://www.google.com/recaptcha/api.js[{if $language|count_characters > 0}]?hl=[{$language}][{/if}]" async defer></script>

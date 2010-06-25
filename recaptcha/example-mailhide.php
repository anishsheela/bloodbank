<html><body>
<?
require_once ("recaptchalib.php");

// get a key at http://www.google.com/recaptcha/mailhide/apikey
$mailhide_pubkey = '6Lcd87oSAAAAAIjpzZC74bCCtSOMVRRiHnmTy2Mb';
$mailhide_privkey = '6Lcd87oSAAAAADrp5eUYCPPjX518FWsr87RfU9L5';

?>

The Mailhide version of example@example.com is
<? echo recaptcha_mailhide_html ($mailhide_pubkey, $mailhide_privkey, "example@example.com"); ?>. <br>

The url for the email is:
<? echo recaptcha_mailhide_url ($mailhide_pubkey, $mailhide_privkey, "example@example.com"); ?> <br>

</body></html>

<?php
/**
 * =======================================
 * ###################################
 * MagnusBilling
 *
 * @package MagnusBilling
 * @author Adilson Leffa Magnus.
 * @copyright Copyright (C) 2005 - 2016 MagnusBilling. All rights reserved.
 * ###################################
 *
 * This software is released under the terms of the GNU Lesser General Public License v2.1
 * A copy of which is available from http://www.gnu.org/copyleft/lesser.html
 *
 * Please submit bug reports, patches, etc to https://github.com/magnusbilling/mbilling/issues
 * =======================================
 * Magnusbilling.com <info@magnusbilling.com>
 *
 */
?>
<div id="load" ><?php echo Yii::t('yii','Please wait while loading...') ?></div>

<script languaje="JavaScript">
window.onload = function () {
        var form = document.getElementById("buyForm");
        form.submit();
    };

    function OnFormSubmit() {
        alert("Submitting form.");
    }
</script>

<?php

if($_SESSION['currency'] == 'U$S')
	$currency = 'USD';
else if ($_SESSION['currency'] == 'R$')
	$currency = 'BRL';
elseif ($_SESSION['currency'] == '€') 
    $currency ='EUR';
else
    $currency = $_SESSION['currency'];


 if ($_SESSION['language'] == 'pt_BR')
	$language = 'pt';
 if ($_SESSION['language'] == 'es')
	$language = 'es';
else
	$language ='en';


$firstname = isset($card->firstname) ? $card->firstname : '';
$lastname  = isset($card->lastname) ? $card->lastname : '';
$address   = isset($card->address) ? $card->address : '';

$city      = isset($card->city) ? $card->city : '';
$state     = isset($card->state) ? $card->state : '';
$zipcode   = isset($card->zipcode) ? $card->zipcode : '';
$phone     = isset($card->phone) ? $card->phone : '';
$email     = isset($card->email) ? $card->email : '';


?>


<form method="POST" action="<?php echo $methodPay->url ?>" target="_parent" id="buyForm">
	<input type="hidden" name="merchantId" value="<?php echo $methodPay->username ?>">
	<input type="hidden" name="referenceCode" value="<?php echo $_SESSION['username'].'-'.date("ymdHis")?>">
	<input type="hidden" name="description" value="Voip Credit">
	<input type="hidden" name="ApiKey" value="<?php echo $methodPay->username ?>">
	<input type="hidden" name="amount" value="<?php echo $_GET['amount']?>">
	<input type="hidden" name="currency" value="<?php echo $currency?>">
	<input type="hidden" name="lng" value="<?php echo $language?>">
	<input type="hidden" name="return" value="http://<?php echo $_SERVER['HTTP_HOST']?>/index.php">
	<input type="hidden" name="buyerEmail" value="<?php echo $email;?>">
	<input type="hidden" name="buyerFullName" value="<?php echo $firstname. ' ' . $lastname;?>">
	<input type="hidden" name="payerPhone" value="<?php echo $phone;?>">
</form>

 <style type="text/css">
#load{
position:absolute;
z-index:1;
border:3px double #999;
background:#f7f7f7;
width:300px;
height:100px;
margin-top:-150px;
margin-left:-150px;
top:50%;
left:50%;
text-align:center;
line-height:100px;
font-family:"Trebuchet MS", verdana, arial,tahoma;
font-size:12pt;
}
</style>

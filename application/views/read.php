<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CipherDrop!</title>

	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/design.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/sjcl.js" ></script>
        
        <script type="text/javascript">
           
            function decrypt() {
               var pwd = document.getElementById("name").value;
               var cipher = document.getElementById("message").value;
               var msg = sjcl.decrypt(pwd, cipher);
               document.getElementById("message").value = msg;
               
            }
        </script>
</head>
<body>

    <header>
	<h1>cipherDrop</h1>
    </header>


<div id="form">

<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div>

<form id="waterform">

<div class="formgroup" id="name-form">
    <label for="name">Your password</label>
    <input type="text" id="name" name="name" onkeypress="decrypt()" oninput="decrypt()"/>
</div>

<div class="formgroup" id="message-form">
    <label for="message">Your message</label>
    <textarea id="message" name="message" disabled="true"><?=$msg?></textarea>
</div>

<input type="button" value="Decrypt your message!" onclick="decrypt()" />
</form>


</body>
</html>
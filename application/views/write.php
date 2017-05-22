<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/design.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/sjcl.js" ></script>
        
</head>
<body>


        <header>
	<h1>cipherDrop</h1>
        </header>

        <div id="form"> 
        
        
        <div class="fish" id="fish2"></div>    
        
        <div class="fish" id="fish"></div>
        
            <form id="waterform" method="post">
        <div class="formgroup" id="name-form">
            <label for="name"><b>Hash:</b><?=$hash?></label>
        </div>
        
        
         <div class="formgroup" id="name-form">
            <label for="name"><h1>Link:</h1> <a href="http://cdrop.ysx.in/index.php/Msg/r/<?=$link?>" id="msg">http://cdrop.ysx.in/index.php/Msg/r/<?=$link?></label>
        </div>
        
        </form>
            
        </div>

</body>
</html>
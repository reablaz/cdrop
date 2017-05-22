<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to cipherDrop!</title>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/design.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/sjcl.js" ></script>
        <script type="text/javascript">
           
            function encrypt() {
               var pwd = document.getElementById("password").value;
               var msg = document.getElementById("message").value;
               var cipher = sjcl.encrypt(pwd, msg);
               document.getElementById("message").value = cipher;
               
               //var dc = sjcl.decrypt(pwd, cipher);
               
               //alert(dc);
               
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

            
                <?php
               
                $attr = array(
                    'id' => 'waterform'
                );
                
                echo form_open('Msg/send',$attr);
                ?>
        <div class="formgroup" id="email-form">
                <?php
                $attr = array(
                    'for' => 'password',
                );
                echo form_label('Your password','password',$attr);
                $attr = array(
                    'name' => 'password',
                    'type' => 'text',
                    'id' => 'password'
                );
                echo form_input($attr);
                ?>
        </div>
        <div class="formgroup" id="message-form">
                <?php
                        
                $attr = array(
                    'for' => 'message',
                );
                echo form_label('Your message','message',$attr);
                
                 $attr = array(
                    'id' => 'message'
                );        
                echo form_textarea('message', 'message', $attr);
                ?>
        </div>
                <?php
                $js = 'onClick="encrypt()"';

                echo form_submit('ok', 'write data!', $js);

                echo form_close();
                ?>
         
        </div>
           

    </body>
</html>
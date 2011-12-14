<style>
.box_onbile{
	overflow:hidden;
}
.box_onbile *{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:19px;
	color:#333;
}
.box_onbile ul{ margin:0; padding:0; }
.box_onbile ul li{
	padding:20px 0;
	border-bottom:1px dotted #ccc;
	overflow:hidden;
}
.box_onbile ul li span{
	float:left;
	display:block;
	width:33px;
	height:33px;
	line-height:33px;
	margin-right:15px;
	background:#ccc;
	font-size:18px;
	text-align:center;
	color:#fff;
}
.box_onbile ul li strong{
	float:left;
	display:block;
	width:260px;
	height:33px;
	line-height:33px;
	font-size:14px;
}
.box_onbile ul li p{
	float:left;
	display:block;
	width:250px;
	height:33px;
	margin:0;
	font-size:15px;
}
.box_onbile a{ text-decoration:none; }
.box_onbile a.boton{
	display:block;
	width:170px;
	height:33px;
	text-align:center;
	-webkit-border-radius:5px;	-moz-border-radius:5px; border-radius:5px;
}
.box_onbile .input{
	width:400px;
	height:33px;
}

.boton{ padding:0 20px; background:#1ABDF6; line-height:33px; color:#fff; }
.boton:hover{ background:#ccc; color:#fff; }

.redondo{ -webkit-border-radius: 2em;	-moz-border-radius: 2em; border-radius: 2em; }

.logo img{ margin-right:25px; }

.piconbile{ float:left; width:250px; height:250px; background:#ccc; margin-right:25px; }

.tit{ font-size:28px; font-weight:bold; line-height:150%; }
.tit em{ font-size:28px; color:#EBD916; }

.azul { color:#1ABDF6; }
.verde { color:#EBD916; }
</style>
<?php
$msg = get_option("Onbile_response");
if($_POST["acc"]== "save") {
    global $json;

    $method = "active_account";
    $params['id'] = $_POST["Onbile_code"];
    $params['url'] =  plugins_url();
    $params['apikey'] =  md5(uniqid(rand(),1));
    $result = Onbile_post_request($method, $params);
    if ($result == "connected"){
        update_option("Onbile_response","Connected");
        $msg = "Connected";
    }else{;
        update_option("Onbile_response","Not connected");
        $msg = "Not connected";
    }
;
    update_option("Onbile_code", $_POST["Onbile_code"]);
    update_option("Onbile_apikey", $params['apikey']);
}
$Onbilecode = get_option("Onbile_code");

?>
<div class="wrap">

<h2><?php echo __("Onbile Configuration", 'onbile'); ?></h2>

<form id="senderForm" name="senderForm" action="?page=onbile/configonbile.php" enctype="multipart/form-data" method="post">

<div class="box_onbile">

<p class="logo"><img src="http://www.onbile.com/images/logo3.png" width="140" height="50" /><?php echo __("Wordpress for mobile devices", 'onbile'); ?> (iPhone, Android and Blackberry)</p>

<p><img src="http://www.onbile.com/images/wordpress.png" width="432" height="221" alt="Wordpress" /></p>

<p><span class="tit"><?php echo __("Create a <em>free</em> mobile version for your wordpress,<br />In just 5 minutes in only 2 steps.", 'onbile'); ?></span></p>

<ul>

<li>
<span class="redondo">1</span>
<strong><?php echo __("Create your account at Onbile.com", 'onbile'); ?></strong>
<p><a href="http://www.onbile.com/manager/" target="_blank" class="boton"><?php echo __("Create your account", 'onbile'); ?></a></p>
</li>

<li>
<span class="redondo">2</span>
<strong><?php echo __("Insert your code", 'onbile'); ?> (idcode)</strong>
<p><input type="text" name="Onbile_code" id="Onbile_code" class="input" value="<?php echo $Onbilecode; ?>" /></p>

</li>
<li style="float:none">
<span class="redondo">3</span>
<strong><?php echo __("Onbile Connect", 'onbile'); ?></strong>
<p><?php echo $msg; ?> </p>
</li>
</ul>

<div class="submit">
<input name="acc" id="acc" type="hidden" value="save" />
<input name="send" type="submit" value="<?php echo __("Save configuration", 'onbile'); ?>" style="float:left;margin-left:10px" />
<div id="showsender"></div>
</div>

</div> <!--/ box_onbile-->

</form>
    
</div> <!--/ wrap -->



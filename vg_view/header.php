
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php if($this->title){echo $this->title;}else{echo "VAIOGIT";}?></title>

<?php
if(@$css_header):

foreach($css_header as $cssH):
echo '<link rel="stylesheet" href="'.BASE_URL.$cssH.'" type="text/css" />';
endforeach;

endif;
?>


<?php
if(@$js_heaser):

foreach($js_heaser as $jsH):
echo '<script type="text/javascript" src="'.BASE_URL.$jsH.'"></script>';
endforeach;

endif;
?>

<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script>
<![endif]-->
</head>

<body <?php if(@$bodyCalss):?>class="loginbody"<?php endif;?> onLoad="startTime();">
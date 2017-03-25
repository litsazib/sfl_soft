<?php
if(@$css_footer):

foreach($css_footer as $cssF):
echo '<link rel="stylesheet" href="'.BASE_URL.$cssF.'" type="text/css" />';
endforeach;

endif;
?>


<?php
if(@$js_footer):

foreach($js_footer as $jsF):
echo '<script type="text/javascript" src="'.BASE_URL.$jsF.'"></script>';
endforeach;

endif;
?>


</body>
</html>

<?php
	include_once("parsecss.class.php");
	
	$oCSS = new CSS();
	$oCSS->parse_file("style.css");
    
    var_dump($oCSS);
?>

<html>
<body>

<h3>Parse CSS file</h3>

<?php
    debugbreak();			
	foreach($oCSS->get_css() as $prop => $attrs) {
		echo "$prop\n<ul>";
		foreach($attrs as $attr => $value) {
			echo "\t<li>$attr: $value\n";
		}
        echo "</ul>";
	}
?>

<hr>

<h3>Generate new CSS content</h3>

<?php
	$oCSS->set_value("body", "background-image", 'url("background2.gif")');
	$oCSS->set_value("body", "font-family", '"Times New Roman"');
	$oCSS->set_value("body.bottom", "font-size", "12px");
	echo "<pre>". $oCSS->build_css(true). "</pre>";
?>

<hr>

<h3>Write to new CSS file</h3>

<?php $oCSS->write_file("style1.css", true); ?>

<hr>

<h3>What Tags are currently in our array?</h3>

<ul>
	<?php
		foreach($oCSS->get_properties() as $value0) {
			echo "<li>$value0</li>\n";
		}
	?>
</ul>

</body>
</html>
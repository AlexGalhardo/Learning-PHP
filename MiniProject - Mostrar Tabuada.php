<h1>Tabuada</h1>

<table border="1" width="300">
<?php
for($q=1;$q<=9;$q++) {

	echo '<tr>';
	for($w=1;$w<=9;$w++) {
		echo '<td>'.($q*$w).'</td>';
	}
	echo '</tr>';

}
?>
</table>
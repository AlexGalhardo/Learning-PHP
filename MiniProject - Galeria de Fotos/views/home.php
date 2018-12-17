<?php foreach($fotos as $foto) :?>

	<img href="assets/images/galeria/<?php echo $foto['url']; ?>" width='300' height='0'><br>
	<?php echo $foto['titulo']; ?>
	</hr>

<?php endforeach; ?>
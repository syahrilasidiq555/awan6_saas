<script src="assets/js/pdfobject.js"></script>

<?php 
	if ($nama_file != "") {
		?>
		<div id="example1"></div>
			<script>PDFObject.embed("file/surat-masuk/<?php echo $nama_file ?>", "#example1");</script>
		<?php
	}else {
		echo "File tidak ada";
	}

?>

<style>
	/* Only resize the element if PDF is embedded */
	.pdfobject-container {
	   width: 100%;
	   height: 900px;
	}
</style>

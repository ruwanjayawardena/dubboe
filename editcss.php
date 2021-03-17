

<form method="POST" action="#">

	<textarea id="css-example" name="css-example" rows="10" style="width: 100%">
		<?php
		$template_file = "assets/css/edit.css";
		$file_handle = fopen($template_file, "rb");
		echo fread($file_handle, filesize($template_file));
		fclose($file_handle);
		?>
	</textarea>

	<div class="form-actions">
		<input type="hidden" name="section" value="css-example">
		<input type="submit" name="updatesettings" value="Update">
	</div>
</form>
<?php
if (isset($_POST['css-example'])) {
	echo $_POST['css-example'];
	$myfile = fopen($template_file, "w") or die("Unable to open file!");
	$css = $_POST['css-example'];
	fwrite($myfile, $css);
	fclose($myfile);
	header('Location: editcss.php');
}
?>
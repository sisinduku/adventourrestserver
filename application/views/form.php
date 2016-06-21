<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('coba/do_upload');?>

<input type="text" name="id_user">
<input type="text" name="id_layout">
<input type="text" name="orign">
<input type="text" name="date_orign">
<input type="text" name="destination">
<input type="text" name="date_return">
<input type="text" name="gambar">
<input type="text" name="nama_gambar">
<input type="text" name="last_ip">
<input type="text" name="last_location_x">
<input type="text" name="last_location_y">
<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>
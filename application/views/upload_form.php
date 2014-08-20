 <strong></strong><html>
<head>
<title><?=$title?></title>
</head>
<body>


<?php echo form_open_multipart('./upload/uploading/');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" name="sub" value="upload" />

</form>

</body>
</html>

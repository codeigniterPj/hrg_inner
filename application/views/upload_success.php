<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3><?php $file_name=$upload_data['file_name'];echo "$file_name"; ?>&nbsp; was successfully uploaded!</h3>

<!--<ul>
/*<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
*/</ul>-->

<p><?php echo anchor('http://localhost/index.php/upload', 'Upload Another File!'); ?></p>
<p><?php echo anchor('http://localhost/index.php/turnto/index', '回到主页'); ?></p>


</body>
</html>
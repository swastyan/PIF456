<html>
<head>
<title>Data Checkbox</title>
</head>
<body>

<form action="
	<?php $_SERVER['PHP_SELF'];?>" method="post">
		List Barang bawaan untuk piknik :
		<input type="checkbox" name="hobby[]" value="makanan cek" checked /> makanan
		<input type="checkbox" name="hobby[]" value="minuman cek "/>minuman
		<input type="checkbox" name="hobby[]" value="tikar cek"/>tikar
		<input type="checkbox" name="hobby[]" value="obat-obatan cek"/>obat
		
		<br/>
		<input type="submit" value="OK"/>
</form>
	<?php
	if (isset($_POST['hobby'])){
		foreach ($_POST['hobby'] as $key =>$val){
			echo $key. '->' .$val. '<br/>';
		}
	}
	?>
</body>
</html>
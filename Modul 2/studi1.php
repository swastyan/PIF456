<html>

	<head>

		<title>Tugas Seleksi dengan Preselecting </title>

	</head>

<body>


	<form action="
	<?php $_SERVER['PHP_SELF'];?>" method="post">
 Tipe Pahlawan Kesukaan<select name ="nama_pahlawan"> <option value="Kamen Rider Rx, Agito, dll">Kamen Rider	<option value="Power Ranger Jurassic, dll" >Power Ranger <option value="Robocop, Jiban"> Robot <option value="Superman"> Manusia Super <option value="Jiraiya, dll">Ninja
 </select> 
	<br/>

	<input type="submit" value="OK"/>

	</form>
	
	<?php
 if (isset($_POST['nama_pahlawan']))
		{

 		echo $_POST['nama_pahlawan'];

		}

	?>

</body>

</html>
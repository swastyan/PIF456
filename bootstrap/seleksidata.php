<html>
<head>
	<title> Seleksi</title>
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- CSS just for the tests page -->
    <link href="css-tests.css" rel="stylesheet">
</head>

<body>
<?php
require "koneksi.php";
echo "<br/>";
$res = mysql_query("SELECT * FROM maha");
if ($res) {
        if (mysql_num_rows($res)) { ?>
		<div class="inner">
                <table border=1 cellspacing=1 cellpadding=5 class="table table-striped">
                        <tr>
                                <th>#</th>
                                <th width=100>NIM</th>
                                <th width=150>Nama</th>
                                <th>Alamat</th>
                        </tr>
                        <?php
                        $i = 1;
                        while ($row = mysql_fetch_row($res)) { ?>
                                <tr>
                                        <td>
                                                <?php echo $i; ?>
                                        </td>
                                        <td>
                                                <?php echo $row[0]; ?>
                                        </td>
                                        <td>
                                                <?php echo $row[1]; ?>
                                        </td>
                                        <td>
                                                <?php echo $row[2]; ?>
                                        </td>
                                </tr>
                                <?php
                                $i++;
                                }
                        ?>
                </table>
				<div>
                <?php        
                        } else {
                                echo 'Data Tidak Ditemukan';
                        }
                mysql_close();
}
?>
</body>
</html>
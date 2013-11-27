<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
  <title>Pencarian Data</title>
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- CSS just for the tests page -->
    <link href="css-tests.css" rel="stylesheet">
</head> 
 
<body> 
 
<form action="<?php $_SERVER['PHP_SELF'];?>" method="get"> 
  Nama <input type="text" name="nama" size=40 /> 
  <input type="submit" value="CARI" /> 
</form> 
 
<?php 
if (isset($_GET['nama'])) { 
  require_once './koneksi.php'; 
 
  // Kata kunci pencarian 
  $key = $_GET['nama']; 
 
  // Variabel $sql berisi pernyataan SQL pencarian 
  $sql = "SELECT * FROM maha 
          WHERE nama = '$key'"; 
 
  $res = mysql_query($sql); 
 
  if ($res) { 
    $num = mysql_num_rows($res); 
    if ($num) { 
      ?> 
 
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
            <?php echo $i;?> 
          </td> 
          <td> 
            <?php echo $row[0];?> 
          </td> 
          <td> 
            <?php echo $row[1];?> 
          </td> 
          <td> 
            <?php echo $row[2];?>
          </td> 
        </tr> 
        <?php 
        $i++; 
      } 
      ?> 
      </table> 
    <?php 
    } else { 
      echo '<br/> Data Tidak Ditemukan'; 
    } 
  } 
 
} else { 
  echo 'Masukkan kata kunci pencarian'; 
} 
 
?> 
 
</body> 
</html> 
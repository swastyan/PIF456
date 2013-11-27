<!DOCTYPE HTML>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- CSS just for the tests page -->
    <link href="css-tests.css" rel="stylesheet">
 <title>Limitasi Data</title>

</head>
<body>
        <form method="post" action="" name="frm_select">
                Tampilkan
                <?php
                $halaman = array(
            "Pilih", 1, 5, 10, 20
                  ); ?>
                <select name="row_page"
onchange="document.frm_select.selectedIndex=0;
document.frm_select.submit();">
<?php foreach ($halaman as $hal): ?>
<?php
                  if ($_POST["row_page"] == $hal) $selected1 = "selected";
                  else $selected1 = ""; ?>
<option value="<?php echo $hal;?>" <?php echo $selected1; ?>>
<?php echo strtoupper($hal); ?>
</option>
<?php endforeach ?>
</select>
                ?>
        </form>
<?php
if (isset($_POST['row_page']) && $_POST['row_page']) {
        require "koneksi.php";
        $row = $_POST['row_page'];
        $sql = "SELECT * FROM maha LIMIT $row";
        $res = mysql_query($sql);
        if($res) {
        $num = mysql_num_rows($res);
        if($num) { ?>

<div class = "row">
<div class = "span6">              
<table border=1 cellspacing=1 cellpadding=5 class="table table-bordered">
                        <tr>
                                <th>#</th>
                                <th width=100>NIM</th>
                                <th width=150>Nama</th>
                                <th>Alamat</th>
                        </tr>
                        <?php
                        $i=1;
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
</div>
</div>
        <?php
        } else {
                echo 'Data tidak ditemukan';
        }
}
}
?>
</body>

</html>
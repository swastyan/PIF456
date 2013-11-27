<html>
<head>
        <title>Paging Data</title>
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
        $sql = 'SELECT * FROM maha';
        $self = $_SERVER['PHP_SELF'];
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $link_num = 5;
        $record_num = 1;
        $offset = $page ? ($page - 1) * $record_num : 0;
        $total_rows = mysql_num_rows(mysql_query($sql));
        $query = 'SELECT nim, nama, alamat FROM maha LIMIT $link_num, $record_num';
        $result = mysql_query($sql);
        $max_page = ceil($total_rows/$record_num);

        if($page > $max_page || $page <= 0) {
                $page = 1;
        }
        $paging = '';
        if($max_page > 1) {
                if($page > 1) {
                        $paging .= '<a href="'.$self.'?page='.($page-1).'">prefious</a>';
                } else {
                        $paging .= 'previous';
                }
                for($counter = 1; $counter <= $max_page; $counter += $link_num) {
                        if($page >= $counter) {
                                $start = $counter;
                        }
                }
                if($max_page > $link_num) {
                        $end = $start + $link_num;
                        if($end > $max_page) {
                                $end = $max_page + 1;
                        }
                } else {
                        $end = $max_page;
                }
                for ($counter = $start; $counter < $end; $counter++) {
                        if($counter == $page) {
                                $paging.=$counter;
                        } else {
                                $paging .= '<a href="'.$self.'?page='.$counter.'">'.$counter.'</a>';
                        }
                }
                if ($page < $max_page) {
                        $paging.='<a href="' .$self.'?page'.($page+1).'">next</a>';
                } else {
                        $paging.='next';
                }
        }
?>
<table border=1 cellspacing=1 callpadding=5 class="table table-striped">
<tr>
        <th>#</th>
        <th width=100>NIM</th>
        <th width=150>NIM</th>
        <th>Alamat</th>
</tr>
<?php
$i=1;
while ($row = mysql_fetch_row($result)) {
        ?>
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
<?php
echo $paging;
?>
</body>
</html>
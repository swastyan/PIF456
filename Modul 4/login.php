<?php
defined('VALID') or die('not allowed');
function init_login() {
        $nama = "ses";
        $pass = "pedro";
require "data_handler.php";
        if (isset($_POST['nama']) && isset($_POST['pass'])) {
                $n = trim($_POST['nama']);
                $p = trim($_POST['pass']);

                if(($n === $nama) && ($p === $pass)) {
                        setcookie('nlogin', $n);
                        setcookie('time', time());
                        ?>
                        <script type="text/javascript">
                        document.location.href="./";
                        </script>
                <?php
                } else {
                        echo 'Nama/Password tidak sesuai';
                        return false;
                }
        }
}

function validate() {
        if(!isset($_COOKIE['nlogin']) || !isset($_COOKIE['time'])) { ?>
                <div class="inner">
                <form action="" method="post">
                <table border=0 cellpadding=5>
                        <tr>
                                <td>Nama</td>
                                <td><input type="text" name="nama" /></td>
                        </tr>
                        <tr>
                                <td>Password</td>
                                <td><input type="password" name="pass" /></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td><input type="submit" name="masuk" value="Masuk"/></td>
                        </tr>
                </table>
                </form>
                </div>
                <?php
                exit;
        }
        if (isset($_GET['m']) && $_GET['m'] == 'logout') {
                if(isset($_COOKIE['nlogin'])) {
                setcookie('nlogin', '', time() - 3 *3600);
                }
                if(isset($_COOKIE['time'])) {
                setcookie('time', '', time() - 3 *3600);
                }
                ?>
                <script type="text/javascript">
                document.location.href="./tugas.php";
                </script>
                <?php
        }
}
?>
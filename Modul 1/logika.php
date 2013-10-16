<html>
<?php
$akun = "ses";
$pas = "root";
if($akun=="ses" && $pas=="root")
{
echo "Anda Benar <br>";
}
else
{
echo "Anda Salah <br>";
}

if($akun=="ses" || $pas=="root")
{
echo "Anda Benar <br>";
}
else
{
echo "Anda Salah <br>";
}

?>
</html>
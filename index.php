<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");

/*echo "<pre>";
print_r($_POST);
echo"</pre>";  */


if (!isset($_SESSION["login"]))
	{
	// ��������� ����
    // ����� ��� ���� ����� � ������ � ������ �������
    if (isset($_COOKIE["login"]) && isset($_COOKIE["pass"])) {
    	// ���� �� ����� �������
        // �� ������� ������������ ������������ �� ���� ������ � ������
        include ("MySQL/MysqlConnect.php");
        $login = mysql_real_escape_string($_COOKIE["login"]);
        $pass = mysql_real_escape_string($_COOKIE["pass"]);
        // ������ ������ � ��
        // � ���� ����� � ����� ������� � �������
        $query = "SELECT * FROM `users` WHERE `login`='".$login."' AND `pass`='".$pass."' LIMIT 1";
        $sql = mysql_query($query) or die(mysql_error());
        if (mysql_num_rows($sql) == 1)
        	{
            $row = mysql_fetch_assoc($sql);
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["login"] = $row["login"];
            $_SESSION["user_name"] = $row["user_name"];
        	$_SESSION["status"] = $row["status"];
        	$_SESSION['banned'] = $row['banned'];

        	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
			exit();
        	}
        else
        	{
        	//���� ����������� �� ����� �� �������, �������� ����� �����������
            include ("Parts/LoginForm.php");
        	}
    }
    else
    {//���� ���� � ������� � ������� ����������, �������� ����� �����������
    include ("Parts/LoginForm.php");
    }
}

else
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
	exit();
	}


include ("Parts/Footer.php")?>




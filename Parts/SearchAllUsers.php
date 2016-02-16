<?php
	if (isset($_POST['users_list'])) $selected=$_POST['users_list'];
		else $selected="...";
// ������ ������ � �� � ���� ���� ������������ ������ ����� ROOT
   	$query = "SELECT `login` FROM `users` WHERE `login`!='root' ORDER BY `login`";
   	$sql = mysql_query($query) or die(mysql_error());
   	if (mysql_num_rows($sql)>0)
   		{
   		//������� ���������� ������  ������������ �������������
		$list_of_users='<p><label for="users_list" class="top">������� ��������� ��� �����������:</label></br>
                   		<select name="users_list" id="users_list" class="combo" onChange="findUser(this.value)">
                     		<option id="login" tabindex="1" value="'.$selected.'">'.$selected.'</option>
                     		';
   		while ($row = mysql_fetch_assoc($sql))
   			{
        	$list_of_users=$list_of_users."<option value=".$row["login"].">".$row["login"]."</option>";
            }
    	//������ ��������� �� �����	��������������
    	$list_of_users=$list_of_users."</select></p>";
   		}
   	else
   		{
   		$list_of_users="";
   		$message_edit_user="��������� �� �������!";
		$color="red";
		$border_color="subcontent-unit-border-red";
   		}
?>
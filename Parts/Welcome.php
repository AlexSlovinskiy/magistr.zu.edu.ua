<!-- Navigation Level 1 -->
        		<div class="nav1">
          			<ul>
          				<li><p style="color:">
          					<?php
          						if ($_SESSION['user_name']==$_SESSION['user_patronymic']) echo "³����, ".$_SESSION['user_name']."!";
          							else echo "³����, ".$_SESSION['user_name']." ".$_SESSION['user_patronymic']."!";
          					?>
          					</p></li>
            			<li><a href="#" class='osx' title="�������� ���������� �� ������������">-�� �����������-</a></li>
            			<li><a href="Logout.php" title="����� �� �������">-�����-</a></li>

            		</ul>
        		</div>


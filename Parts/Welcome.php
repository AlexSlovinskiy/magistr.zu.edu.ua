<!-- Navigation Level 1 -->
        		<div class="nav1">
          			<ul>
          				<li><p style="color:">
          					<?php
          						if ($_SESSION['user_name']==$_SESSION['user_patronymic']) echo "Вітаємо, ".$_SESSION['user_name']."!";
          							else echo "Вітаємо, ".$_SESSION['user_name']." ".$_SESSION['user_patronymic']."!";
          					?>
          					</p></li>
            			<li><a href="#" class='osx' title="Перегляд повідомлень від адміністратора">-Мої повідомлення-</a></li>
            			<li><a href="Logout.php" title="Вихід із системи">-Вихід-</a></li>

            		</ul>
        		</div>


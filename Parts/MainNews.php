
            <?php
            	include ("MySQL/MysqlConnect.php");
            	$query="SELECT `mes_text` FROM messages WHERE mes_id = 2";
				$sql = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_assoc($sql);

            ?>

      		<div class="main-news">
			<!-- News Level -->
        		<div class="round-border-topright"></div>
        			<h1 class="first">������� �������</h1>
                    	<h3>�� ��� ���� ����� ������ � <?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?> ����
						</h3>
                    	<p style="text-align:justify; word-spacing: -0.3ex;">
                    	<?php echo $row['mes_text']; ?>
                    	</p>
                        <p>
							� ������ ����� ������ ������� �� ��� ���� ����� ������
							�� ������ ������������ �� ���������� ���� �����������
							<a href="http://zu.edu.ua/ymovu.html" title="������� ������� �� ��� ���� ����� ������">&gt;&gt;&gt;</a>
						</p>

        			<hr class="end-news" />
     		</div>
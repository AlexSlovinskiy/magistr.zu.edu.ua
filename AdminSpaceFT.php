<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");


if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}
?>


<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">���������� �� ����� �����</h1>
					<div class="column1-unit">

						<h3>���� ��������� 䳿: </h3>
                    	<ul>
            				<li><a href="AdminSpaceFaculty.php" title="����������">����������</a></li>
                  			<li><a href="AdminSpaceTraining.php" title="����� �����">����� �����</a></li>
							<li><a href="AdminSpaceTrainingBak.php" title="������� ����������">������� ����������</a></li>
         				</ul>
					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

<?php


include ("Parts/Footer.php");

?>

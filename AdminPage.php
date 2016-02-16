<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (($_SESSION["status"]=="user") || (!isset($_SESSION["status"])))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
	exit();
	}



//������� ���������� ����������	������������
    $unique_amount='<h1 class="block">� �������� ��������� �� ��� "���������" ������ �����: ';

	$query = "SELECT SQL_CALC_FOUND_ROWS DISTINCT `lastname` , `firstname` , `patronymic` FROM `abiturients` WHERE `qualification` = '��������' AND `type` = 'spc'";
	$sql = mysql_query($query) or die(mysql_error());
	$sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
   	$num_of_rows=mysql_fetch_assoc($sql_rows);
   	$num_of_rows=$num_of_rows["FOUND_ROWS()"];
    $unique_amount=$unique_amount.$num_of_rows." ������ <br />";

    $query = "SELECT SQL_CALC_FOUND_ROWS DISTINCT `lastname` , `firstname` , `patronymic` FROM `abiturients` WHERE `qualification` = '��������' AND `type` = 'mag'";
	$sql = mysql_query($query) or die(mysql_error());
	$sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
   	$num_of_rows=mysql_fetch_assoc($sql_rows);
   	$num_of_rows=$num_of_rows["FOUND_ROWS()"];
    $unique_amount=$unique_amount.'� �������� ��������� �� ��� "������" ������ �����: '.$num_of_rows.'  ������ <br />';

    $query = "SELECT SQL_CALC_FOUND_ROWS DISTINCT `lastname` , `firstname` , `patronymic` FROM `abiturients` WHERE `qualification` = '���������' AND `type` = 'mag'";
	$sql = mysql_query($query) or die(mysql_error());
	$sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
   	$num_of_rows=mysql_fetch_assoc($sql_rows);
   	$num_of_rows=$num_of_rows["FOUND_ROWS()"];
    $unique_amount=$unique_amount.'� �������� ���������� �� ��� "������" ������ �����: '.$num_of_rows.'  ������ <br />';

    $unique_amount=$unique_amount.'</h1>';
?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">������� ������������</h1>
					<div class="column1-unit">
						<?
						echo $unique_amount;
						echo $success;
						?>

						<script type="text/javascript">
      							var day1 = document.getElementById("day1");
                                day1.selectedIndex = <?echo date("d")?>;
             			</script>
             			<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;"><a href="Specialization.php">������� �� ��������������</a></span>
            				</li>
            			</ul>
                        <ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;"><a href="OrderAnnex.php">������� �� ������ ��� �����������</a></span>
            				<span style="color:rgb(80,80,80); font-weight:bold;"><a href="OrderAnnexExt.php">(��������� �����)</a></span>
            				</li>
            			</ul>
            			<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;"><a href="SomeStuff.php">��� ���� �������</a></span>
            				</li>
            			</ul>


						<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">³������ ����������� ����: </span>
            				</li>
            			</ul>
               			<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
                        	<form method="post" action="Statements.php">

                            	<p>
                            		<label for="search_study_type" class="left">����� ��������:</label>
                            		<select name="search_study_type" id="search_study_type" class="combo" tabindex="10" style="width:100px">
                   						<option value="�����"> ����� </option>
                                        <option value="������"> ������ </option>
                          			</select>
                          		</p>
                          		<p>
                          			<label for="search_type" class="left">���:</label>
                            		<select name="search_type" id="search_type" class="combo" tabindex="20" style="width:100px">
                   						<option value="mag"> ������ </option>
                                        <option value="spc"> ��������� </option>
                          			</select>
                          		</p>

                          		<p>
                          			<label for="day" class="left"> ������ ��: </label>
                          			<select name="day" id="day" class="combo" tabindex="30" style="width:50px;">
                                		<?
                     					for($i=1; $i<=31; $i++)
                     						{
                     						if ($i<10)
                     							{
                     							if (date('d')=="0".$i) echo '<option selected value="0'.$i.'"> 0'.$i.' </option>';
                     								else  echo '<option value="0'.$i.'"> 0'.$i.' </option>';
                     							}
                     							else
                     								{
                     								if (date('d')==$i) echo '<option selected value="'.$i.'"> '.$i.' </option>';
                     									else echo '<option value="'.$i.'"> '.$i.' </option>';
                     								}
                     						}
                     					?>
                     				</select>
                     					/
                     				<select name="month" id="month" class="combo" tabindex="40" style="width:100px; margin-left:2px;">
										<?php
										if (date('n')==7) echo
											'<option value="�����"> ����� </option>
											<option value="������"> ������ </option>
											<option value="�������"> ������� </option>';
										else if (date('n')==8) echo
											'<option value="������"> ������ </option>
											<option value="�����"> ����� </option>
											<option value="�������"> ������� </option>';
												else echo
											'<option value="�������"> ������� </option>
											<option value="�����"> ����� </option>
											<option value="������"> ������ </option>';
										?>
									</select>
                     					/
                                	<select name="year" id="year" class="combo" tabindex="50" style="width:65px; margin-left:2px;">
                                    	<option value="<? echo date('Y')?>"> <?echo date("Y"); ?> </option>
                                    	<option value="<? echo date('Y')-1?>"> <?echo date("Y")-1; ?> </option>
                     				</select>
                                </p>
                                <p>
									<input type="submit" name="statements" class="button" value="��" tabindex="10" style="margin-right:269px"/>
								</p>

                        	</form>
                        </div>

                        <ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">³������ ��������� ���� �� ��������: </span>
            				</li>
            			</ul>
               			<div class="contactform" style="margin-top:5px;">
                        	<form method="post" action="Contracts.php">

                            	<p>
                            		<label for="search_study_type" class="left">����� ��������:</label>
                            		<select name="search_study_type" id="search_study_type" class="combo" tabindex="10" style="width:100px">
                   						<option value="�����"> ����� </option>
                                        <option value="������"> ������ </option>
                          			</select>
                          		</p>
                          		<p>
                          			<label for="search_type" class="left">���:</label>
                            		<select name="search_type" id="search_type" class="combo" tabindex="20" style="width:100px">
                   						<option value="mag"> ������ </option>
                                        <option value="spc"> ��������� </option>
                          			</select>
                          		</p>

                          		<p>
                          			<label for="day" class="left"> ������ ��: </label>
                          			<select name="day" id="day" class="combo" tabindex="30" style="width:50px;">
                                		<?
                     					for($i=1; $i<=31; $i++)
                     						{
                     						if ($i<10)
                     							{
                     							if (date('d')=="0".$i) echo '<option selected value="0'.$i.'"> 0'.$i.' </option>';
                     								else  echo '<option value="0'.$i.'"> 0'.$i.' </option>';
                     							}
                     							else
                     								{
                     								if (date('d')==$i) echo '<option selected value="'.$i.'"> '.$i.' </option>';
                     									else echo '<option value="'.$i.'"> '.$i.' </option>';
                     								}
                     						}
                     					?>
                     				</select>
                     					/
                     				<select name="month" id="month" class="combo" tabindex="40" style="width:100px; margin-left:2px;">
										<?php
										if (date('n')==7) echo
											'<option value="�����"> ����� </option>
											<option value="������"> ������ </option>
											<option value="�������"> ������� </option>';
										else if (date('n')==8) echo
											'<option value="������"> ������ </option>
											<option value="�����"> ����� </option>
											<option value="�������"> ������� </option>';
												else echo
											'<option value="�������"> ������� </option>
											<option value="�����"> ����� </option>
											<option value="������"> ������ </option>';
										?>
                     				</select>
                     					/
                                	<select name="year" id="year" class="combo" tabindex="50" style="width:65px; margin-left:2px;">
                                    	<option value="<? echo date('Y')?>"> <?echo date("Y"); ?> </option>
                                    	<option value="<? echo date('Y')-1?>"> <?echo date("Y")-1; ?> </option>
                     				</select>
                                </p>
                                <p>
									<input type="submit" name="contracts" class="button" value="��" tabindex="10" style="margin-right:269px"/>
								</p>
							</form>
                        </div>

                        </div>
            		<hr class="clear-contentunit" />
                    <?
            		//include ("MySQL/Dumper.php");
            		?>

            	</div>

        	</div>

<?php
include ("Parts/Footer.php");
?>
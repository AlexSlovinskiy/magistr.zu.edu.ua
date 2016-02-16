<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (($_SESSION["status"]=="user") || (!isset($_SESSION["status"])))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
	exit();
	}


if (!isset($_SESSION['search_reg_faculty'])) $_SESSION['search_reg_faculty']="%";
if (!isset($_SESSION['search_reg_training'])) $_SESSION['search_reg_training']="%";
if (!isset($_SESSION['search_reg_study_type'])) $_SESSION['search_reg_study_type']="%";
?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">Формування списків попередньої реєстрації</h1>
					<div class="column1-unit">
						<?
						/*echo"<pre>";
						print_r($_SESSION);
						echo"</pre>";*/
						echo $unique_amount;
						echo $success;
						?>

						<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Списки на виготовлення дипломів бакалавра: </span>
            				</li>
            			</ul>
               			<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
                        	<form method="post" action="RegistredList.php">
                                <p><label for="search_faculty" class="left">Факультет:</label>
                   					<select name="search_faculty" id="search_faculty" class="combo" tabindex="10">
                     					<option value="<?echo $_SESSION['search_reg_faculty']?>"> <?if ($_SESSION['search_reg_faculty']!="%") echo $_SESSION['search_reg_faculty']; else echo "..."?> </option>
                     					<?php if ($_SESSION['search_reg_faculty']!="%") echo '<option value=""> ... </option>';?>
                     					<?php
                                    		$query = "SELECT `faculty_name` FROM `faculties`  ORDER BY `faculty_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													echo '<option value="'.$row['faculty_name'].'">'.$row['faculty_name'].'</option>';
   													}
   										?>
                     				</select>
                     			</p>
                            	<p><label for="search_training" class="left" >Напрям підготовки:</label>
                   					<select name="search_training" id="search_training" class="combo" tabindex="20">
                   						<option value="<?echo $_SESSION['search_reg_training']?>"> <?if ($_SESSION['search_reg_training']!="%") echo $_SESSION['search_reg_training']; else echo "..."?> </option>
                     					<?php if ($_SESSION['search_reg_training']!="%") echo '<option value=""> ... </option>';?>
                     					<?php
                                    		$query = "SELECT `training_name` FROM `trainings_bak`  ORDER BY `training_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													echo '<option value="'.$row['training_name'].'">'.$row['training_name'].'</option>';
   													}
   										?>
                     				</select>
                                </p>
                            	<p>
                            		<label for="search_study_type" class="left">Форма навчання:</label>
                            		<select name="search_study_type" id="search_study_type" class="combo" tabindex="30" style="width:100px">
                   						<option value="<?echo $_SESSION['search_reg_study_type']?>"> <?php if ($_SESSION['search_reg_study_type']!="%") echo $_SESSION['search_reg_study_type']; else echo "..."?> </option>
                     					<?php if ($_SESSION['search_reg_study_type']!="%") echo '<option value=""> ... </option>';?>
                   						<option value="Денна"> Денна </option>
                                        <option value="Заочна"> Заочна </option>
                          			</select>
                          		</p>

                                <p>
									<input type="submit" name="statements" class="button" value="ОК" tabindex="40" style="margin-right:269px"/>
								</p>

                        	</form>
                        </div>


                        </div>
                <?php
                	$query = "SELECT COUNT(*) FROM `registred`";
   					$sql = mysql_query($query) or die(mysql_error());
                    $all = mysql_fetch_assoc($sql);
                    $query = "SELECT COUNT(*) FROM `registred` WHERE `study_type`='Денна'";
   					$sql = mysql_query($query) or die(mysql_error());
                    $all_stc = mysql_fetch_assoc($sql);
                    $query = "SELECT COUNT(*) FROM `registred` WHERE `study_type`='Заочна'";
   					$sql = mysql_query($query) or die(mysql_error());
                    $all_zao = mysql_fetch_assoc($sql);
                ?>
                <h1 class="pagetitle">Кількість зареєстрованих по напрямах підготовки:</h1>

						<div class="column1-unit">

                        	<?php
                        	echo '<h3 class="pagetitle">Всього: '.$all["COUNT(*)"].' ('.$all_stc["COUNT(*)"].'/'.$all_zao["COUNT(*)"].')</h3>';

                          	$query = "SELECT `training_name` FROM `trainings_bak`  ORDER BY `training_name`";
   							$sql = mysql_query($query) or die(mysql_error());
                            	if (mysql_num_rows($sql)>0)
   									while ($row = mysql_fetch_assoc($sql))
   										{
   										$query1 = "SELECT COUNT(*) FROM `registred` WHERE `training`='".$row['training_name']."'";
   										$sql1 = mysql_query($query1) or die(mysql_error());
                                		$all = mysql_fetch_assoc($sql1);
                            			$query1 = "SELECT COUNT(*) FROM `registred` WHERE `training`='".$row['training_name']."' AND `study_type`='Денна'";
   										$sql1 = mysql_query($query1) or die(mysql_error());
                                		$stc = mysql_fetch_assoc($sql1);
                                		$query1 = "SELECT COUNT(*) FROM `registred` WHERE `training`='".$row['training_name']."' AND `study_type`='Заочна'";
   										$sql1 = mysql_query($query1) or die(mysql_error());
                                		$zao = mysql_fetch_assoc($sql1);
                                		echo '<ul style="margin-bottom:-5px;">
            									<li style="display:inline;">
            										<span style="color:rgb(80,80,80); font-weight:bold; font-size:95%;">'.$row['training_name'].':  '.$all["COUNT(*)"].' ('.$stc["COUNT(*)"].'/'.$zao["COUNT(*)"].')</span>
            									</li>
            						 		 </ul>';
   										}
                            ?>


						</div>
            	</div>
		</div>

<?php
include ("Parts/Footer.php");
?>
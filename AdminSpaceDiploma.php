<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (($_SESSION["status"]=="user") || (!isset($_SESSION["status"])))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
	exit();
	}

if (!isset($_SESSION['cur_okr']) || $_SESSION['cur_okr']=="" || !isset($_GET['type']))
	{	$_SESSION['cur_okr']="bak";
	$okr="&bdquo;бакалавр&ldquo;";
	}
if($_GET['type']==="bak")
	{	$_SESSION['cur_okr']="bak";
	$okr="&bdquo;бакалавр&ldquo;";
	}
if($_GET['type']==="spc")
	{	$_SESSION['cur_okr']="spc";
	$okr="&bdquo;спеціаліст&ldquo;";
	}
if($_GET['type']==="mag")
	{	$_SESSION['cur_okr']="mag";
	$okr="&bdquo;магістр&ldquo;";
	}

if (!isset($_SESSION['search_reg_faculty'])) $_SESSION['search_reg_faculty']="%";
if (!isset($_SESSION['search_reg_training'])) $_SESSION['search_reg_training']="%";
if (!isset($_SESSION['search_reg_study_type'])) $_SESSION['search_reg_study_type']="%";
?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->


                <h1 class="pagetitle">Заявки для імпорту до Education (ОКР <?php echo $okr;?>)</h1>

                        <ul style="display: inline; ">
							<li style="display: inline;"><a href="AdminSpaceDiploma.php?type=bak" class="<?php if ($_SESSION['cur_okr']=='bak') echo 'active';?>">Бакалавр</a></li>
							<li style="display: inline;"><a href="AdminSpaceDiploma.php?type=spc" class="<?php if ($_SESSION['cur_okr']=='spc') echo 'active';?>">Спеціаліст</a></li>
							<li style="display: inline;"><a href="AdminSpaceDiploma.php?type=mag" class="<?php if ($_SESSION['cur_okr']=='mag') echo 'active';?>">Магістр</a></li>
						</ul>

						<div class="column1-unit" style="margin-top:10px;">
                            <div style="overflow:auto">
								<table id="TSpecialities" style="width:100%;">
            						<tr>
            							<th class="top" scope="col">№ <br />з\п</th>
            							<?php
            							 	if ($_SESSION['cur_okr']=='bak') echo'<th class="top" scope="col">Напрям підготовки</th>';
            							 	if ($_SESSION['cur_okr']=='spc') echo'<th class="top" scope="col">Спеціальність</th>';
            							 	if ($_SESSION['cur_okr']=='mag') echo'<th class="top" scope="col">Спеціальність</th>';
            							?>

            							<th class="top" scope="col">Експорт <br />(денне/заочне)</th>
            						</tr>

                        <?php
                        if ($_SESSION['cur_okr']=='bak')
                            {
                        	$query = "SELECT `training_name` FROM `trainings_bak`  ORDER BY `training_name`";
   							$sql = mysql_query($query) or die(mysql_error());
                            	if (mysql_num_rows($sql)>0)
                            		{                            		$i=1;
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
                                		if ($i%2 == 0) $coloredRow="coloredRow";
				                 			else $coloredRow="";
                                		echo '<tr class='.$coloredRow.'>
            										<td><strong>'.$i.'.</strong></td>
            										<td  style="text-align:left;">
            											<strong>'.$row['training_name'].':  '.$all["COUNT(*)"].' ('.$stc["COUNT(*)"].'/'.$zao["COUNT(*)"].')</strong>&nbsp;&nbsp;
													</td>
													<td>
														<input type="button" title="'.$row['training_name'].' денне" name="get_export_stc" class="button" value="" onClick="GetExport(\''.$row['training_name'].'\',\'Денна\',\''.$_SESSION['cur_okr'].'\')" style="background:url(../img/export.png) no-repeat;">&nbsp;<b>/</b>
											            <input type="button" title="'.$row['training_name'].' заочне" name="get_export_zao" class="button" value="" onClick="GetExport(\''.$row['training_name'].'\',\'Заочна\',\''.$_SESSION['cur_okr'].'\')" style="background:url(../img/export.png) no-repeat;">
													</td>
            									</tr>';
   										$i++;
   										}
   									}
   							}
          				if ($_SESSION['cur_okr']=='mag')
                            {
                        	$query = "SELECT `speciality_name` FROM `specialities` ORDER BY `speciality_name`";
   							$sql = mysql_query($query) or die(mysql_error());
                            	if (mysql_num_rows($sql)>0)
                            		{
                            		$i=1;
   									while ($row = mysql_fetch_assoc($sql))
   										{
   										$query1 = "SELECT COUNT(*) FROM `abiturients` WHERE `speciality`='".$row['speciality_name']."' AND `apply`='+'";
   										$sql1 = mysql_query($query1) or die(mysql_error());
                                		$all = mysql_fetch_assoc($sql1);
                            			$query1 = "SELECT COUNT(*) FROM `abiturients` WHERE `speciality`='".$row['speciality_name']."' AND `study_type`='Денна' AND `apply`='+'";
   										$sql1 = mysql_query($query1) or die(mysql_error());
                                		$stc = mysql_fetch_assoc($sql1);
                                		$query1 = "SELECT COUNT(*) FROM `abiturients` WHERE `speciality`='".$row['speciality_name']."' AND `study_type`='Заочна' AND `apply`='+'";
   										$sql1 = mysql_query($query1) or die(mysql_error());
                                		$zao = mysql_fetch_assoc($sql1);
                                		if ($i%2 == 0) $coloredRow="coloredRow";
				                 			else $coloredRow="";
                                		if ((substr($row['speciality_name'],0,1)=="7" && $_SESSION['cur_okr']=='spc') || (substr($row['speciality_name'],0,1)=="8" && $_SESSION['cur_okr']=='mag'))
                                			{
                                			echo '<tr class='.$coloredRow.'>
            										<td><strong>'.$i.'.</strong></td>
            										<td  style="text-align:left;">
            											<strong>'.$row['speciality_name'].':  '.$all["COUNT(*)"].' ('.$stc["COUNT(*)"].'/'.$zao["COUNT(*)"].')</strong>&nbsp;&nbsp;
													</td>
													<td>
														<input type="button" title="'.$row['speciality_name'].' денне" name="get_export_stc" class="button" value="" onClick="GetExport(\''.$row['speciality_name'].'\',\'Денна\',\''.$_SESSION['cur_okr'].'\')" style="background:url(../img/export.png) no-repeat;">&nbsp;<b>/</b>
											            <input type="button" title="'.$row['speciality_name'].' заочне" name="get_export_zao" class="button" value="" onClick="GetExport(\''.$row['speciality_name'].'\',\'Заочна\',\''.$_SESSION['cur_okr'].'\')" style="background:url(../img/export.png) no-repeat;">
													</td>
            									</tr>';
   											$i++;
   											}
   										}
   									}
   							}
   						if ($_SESSION['cur_okr']=='spc')
                            {
                        	$query = "SELECT `specialization_name` FROM `specializations` ORDER BY `specialization_name`";
   							$sql = mysql_query($query) or die(mysql_error());
                            	if (mysql_num_rows($sql)>0)
                            		{
                            		$i=1;
   									while ($row = mysql_fetch_assoc($sql))
   										{
   										$query1 = "SELECT COUNT(*) FROM `abiturients` WHERE `specialization`='".$row['specialization_name']."' AND `apply`='+'";
   										$sql1 = mysql_query($query1) or die(mysql_error());
                                		$all = mysql_fetch_assoc($sql1);
                            			$query1 = "SELECT COUNT(*) FROM `abiturients` WHERE `specialization`='".$row['specialization_name']."' AND `study_type`='Денна' AND `apply`='+'";
   										$sql1 = mysql_query($query1) or die(mysql_error());
                                		$stc = mysql_fetch_assoc($sql1);
                                		$query1 = "SELECT COUNT(*) FROM `abiturients` WHERE `specialization`='".$row['specialization_name']."' AND `study_type`='Заочна' AND `apply`='+'";
   										$sql1 = mysql_query($query1) or die(mysql_error());
                                		$zao = mysql_fetch_assoc($sql1);
                                		if ($i%2 == 0) $coloredRow="coloredRow";
				                 			else $coloredRow="";
                                		if ((substr($row['specialization_name'],0,1)=="7" && $_SESSION['cur_okr']=='spc') || (substr($row['specialization_name'],0,1)=="8" && $_SESSION['cur_okr']=='mag'))
                                			{
                                			echo '<tr class='.$coloredRow.'>
            										<td><strong>'.$i.'.</strong></td>
            										<td  style="text-align:left;">
            											<strong>'.$row['specialization_name'].':  '.$all["COUNT(*)"].' ('.$stc["COUNT(*)"].'/'.$zao["COUNT(*)"].')</strong>&nbsp;&nbsp;
													</td>
													<td>
														<input type="button" title="'.$row['specialization_name'].' денне" name="get_export_stc" class="button" value="" onClick="GetExport(\''.$row['specialization_name'].'\',\'Денна\',\''.$_SESSION['cur_okr'].'\')" style="background:url(../img/export.png) no-repeat;">&nbsp;<b>/</b>
											            <input type="button" title="'.$row['specialization_name'].' заочне" name="get_export_zao" class="button" value="" onClick="GetExport(\''.$row['specialization_name'].'\',\'Заочна\',\''.$_SESSION['cur_okr'].'\')" style="background:url(../img/export.png) no-repeat;">
													</td>
            									</tr>';
   											$i++;
   											}
   										}
   									}
   							}
          				?>
                            	</table>

                            	<script type="text/javascript">
									//Подсветка при наведении мышки на ряд
									//highlightTableRows("TSpecialities","hoverRow");
									highlightSpeciality("TSpecialities","hoverRow","clickedRow",false);
								</script>
            				</div>

						</div>
            	</div>
		</div>
<input type="hidden" name="debug" id="debug" class="field" value=""/>


                   			<script language="JavaScript">
                       		function GetExport(training,study_type,type)
                       			{
                                JsHttpRequest.query
                       				(
                       				'DiplomaBackend.php',
                       					{
                       					'training' : training,
                       					'study_type' : study_type,
                       					'type' : type
                                       	},
                       				function (result, errors)
                       					{
                       					document.getElementById("debug").value = errors;
                       					if (result.done==1) window.location.assign('GetFile.php');
                       					if (result.done==0) alert("Не знайдено жодного запису!");
                       					},

                       				false
                       				);
                       			}
            			</script>
<?php
include ("Parts/Footer.php");
?>
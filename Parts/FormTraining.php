						<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Додати галузь знань: </span>
            				</li>
            			</ul>
						<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">

                                <p><label for="training" class="left">Нова галузь знань:</label>
                   					<input type="text" name="training" id="training" class="field" value="<?echo $_POST['training'];?>" tabindex="10" style="<?if ($_POST['training']=="" && isset($_POST['add_tr'])) echo $element_error?>"/>
                   				</p>
                   				<p><label for="faculties" class="left">Факультети:</label>
                   						<fieldset class="small">
                   						<?php
                                    		$query = "SELECT * FROM `faculties`  ORDER BY `faculty_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		$i=1;
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{   													$tab=20+$i;
													echo '<p style="margin-bottom:3px;">
                     										&nbsp;&nbsp;&nbsp;<input type="checkbox" name="faculty'.$i.'" id="faculty'.$i.'" class="checkbox"  size="1" tabindex="'.$tab.'" value="'.$row["faculty_id"].'"';
													if ($_POST["faculty".$i.""]==$row["faculty_id"]) echo 'checked="checked" />';
														else  echo '/>';
													echo '<label for="faculty'.$i.'" class="small">'.$row["faculty_name"].'</label></p>';
													$i++;
													}
   										?>
   										</fieldset>
                                </p>
   									<input name="num_of_fields" type="hidden" value="<?php echo $i;?>">
								<p>	<input type="submit" name="add_tr" id="submit" class="button" value="Зберегти" tabindex="50" /></p>

              				</form>
				    	</div>
                        <ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Редагувати галузь знань: </span>
            				</li>
            			</ul>




						<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
                                <p><label for="edit_training" class="left">Галузь знань:</label>
                   					<select name="edit_training" id="edit_training" class="combo" onChange="findFaculty(this.value)" tabindex="100" style="<?if ($_POST['edit_training']=="" && isset($_POST['edit_trn'])) echo $element_error?>">
                                    	<option value="<?echo $_POST['edit_training']?>"> <?if ($_POST['edit_training']!="") echo $_POST['edit_training']; else echo "..."?> </option>
                     					<?if (isset($_POST['edit_trn'])) echo '<option value=""> ... </option>';?>
                                        <?php
                                    		$query = "SELECT `training_name` FROM `trainings`  ORDER BY `training_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													echo '<option value="'.$row['training_name'].'">'.$row['training_name'].'</option>';
   													}
   										?>
									</select>
                     			</p>

                   					<input type="hidden" name="debug" id="debug" class="field" value="" tabindex="110" style="<?if ($_POST['new_training']=="" && isset($_POST['edit_trn'])) echo $element_error?>"/>
                   					<input type="hidden" name="list" id="list" class="field" />

                                <p><label for="new_training" class="left">Нова назва галузі:</label>
                   					<input type="text" name="new_training" id="new_training" class="field" value="<?echo $_POST['new_training'];?>" tabindex="110" style="<?if ($_POST['new_training']=="" && isset($_POST['edit_trn'])) echo $element_error?>"/>
                   				</p>
                                <p><label for="new_faculties" class="left">Факультети:</label>
                   						<fieldset class="small">
                   						<?php
                                    		$query = "SELECT * FROM `faculties`  ORDER BY `faculty_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		$i=1;
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													$tab=120+$i;
													echo '<p style="margin-bottom:3px;">
                     										&nbsp;&nbsp;&nbsp;<input type="checkbox" name="new_faculty'.$row["faculty_id"].'" id="new_faculty'.$row["faculty_id"].'" class="checkbox"  size="1" tabindex="'.$tab.'" value="'.$row["faculty_id"].'"';
													if ($_POST["new_faculty".$row["faculty_id"].""]==$row["faculty_id"]) echo 'checked="checked" />';
														else  echo '/>';
													echo '<label for="new_faculty'.$i.'" class="small">'.$row["faculty_name"].'</label></p>';
													$i++;
													}
   										?>
   										</fieldset>
                                </p>
								<p>	<input type="submit" name="edit_trn" id="submit" class="button" value="Зберегти" tabindex="200" /></p>

              				</form>
				    	</div>
				    	<script language="JavaScript">
                       		function findFaculty(tr)
                       			{       		                	var list=document.getElementById("edit_training");
								var new_cat=document.getElementById("new_training");
								new_cat.value= list.options[list.selectedIndex].value;
                       			JsHttpRequest.query
                       				(
                       				'FacultyBackend.php',
                       					{
                       					'training' : tr

                       					},
                       				function (result, errors)
                       					{
                       					document.getElementById("debug").value = errors;
										//document.getElementById("list").value=result.length;     //checked = true
                       					for (var i=0; i<result.faculty_number; i++)
                       						{
                       						var id="new_faculty"+result.faculty_ids[i];
                                           	if (document.getElementById(id).checked == true) document.getElementById(id).checked = false;
											}

                       					for (var i=1; i<=result.length; i++)
                       						{                       						var id="new_faculty"+result.list[i];
                                           	if (result.list[i]>0)
												document.getElementById(id).checked = true;
											}
                       					},
                       				false
                       				);
                       			}
            			</script>
                        <ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Видалити галузь знань: </span>
            				</li>
            			</ul>
						<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
								<p><label for="del_training" class="left">Галузь знань:</label>
                   					<select name="del_training" id="del_training" class="combo" tabindex="300" style="<?if ($_POST['del_training']=="" && isset($_POST['del_trn'])) echo $element_error?>">
                                    	<option value="<?echo $_POST['del_training']?>"> <?if ($_POST['del_training']!="") echo $_POST['del_training']; else echo "..."?> </option>
                     					<?if (isset($_POST['del_trn'])) echo '<option value=""> ... </option>';?>
                                    	<?php
                                    		$query = "SELECT `training_name` FROM `trainings`  ORDER BY `training_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													echo '<option value="'.$row['training_name'].'">'.$row['training_name'].'</option>';
   													}
   										?>
									</select>
                     			</p>
                     			<p><label for="del_trn_ok" class="left">Підтвердження видалення:</label>
                     					<input type="checkbox" name="del_trn_ok" id="del_trn_ok" class="checkbox"  size="1" tabindex="320" value="+"/>
								</p>
								<p>	<input type="submit" name="del_trn" id="submit" class="button" value="Видалити" tabindex="130" /></p>

              				</form>
				    	</div>

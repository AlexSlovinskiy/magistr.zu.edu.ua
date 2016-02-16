						<?php
                        $query = "SELECT * FROM `specialities`  ORDER BY `speciality_name`";
   						$sql = mysql_query($query) or die(mysql_error());
					   	?>
						<div class="contactform">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;Редагування спеціальностей&nbsp;</legend>
                                <p><label for="speciality" class="left">Спеціальність:</label>
                   					<select name="speciality" id="speciality" class="combo" tabindex="10" onChange="setNewSpc()" style="<?if ($_POST['faculty']=="" && isset($_POST['edit_spc'])) echo $element_error?>">
                                    	<option value="<?echo $_POST['speciality']?>"> <?if ($_POST['speciality']!="") echo $_POST['speciality']; else echo "..."?> </option>
                     					<?if (isset($_POST['edit_spc'])) echo '<option value=""> ... </option>';?>
                                    	<?php
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{   													echo '<option value="'.$row['speciality_name'].'">'.$row['speciality_name'].'</option>';
   													}
   										?>


                     				</select>
                     			</p>
                                <p><label for="faculty" class="left">Факультет:</label>
                   					<select name="faculty" id="faculty" class="combo" tabindex="20" style="<?if ($_POST['faculty']=="" && isset($_POST['edit_spc'])) echo $element_error?>">
                     					<option value="<?echo $_POST['faculty']?>"> <?if ($_POST['faculty']!="") echo $_POST['faculty']; else echo "..."?> </option>
                     					<?if (isset($_POST['edit_spc'])) echo '<option value=""> ... </option>';?>
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

                           		<p><label for="training" class="left">Напрям підготовки:</label>
                   					<select name="training" id="training" class="combo" tabindex="30" style="<?if ($_POST['training']=="" && isset($_POST['edit_spc'])) echo $element_error?>">
                   						<option value="<?echo $_POST['training']?>"> <?if ($_POST['training']!="") echo str_replace($_POST['faculty'],"",$_POST['training']); else echo "..."?> </option>
                     					<?if (isset($_POST['edit_spc'])) echo '<option value=""> ... </option>';?>
                   					</select>
                     			</p>
                               	<p><label for="new_name" class="left">Змінити назву:</label>
                     					<input type="checkbox" name="new_name" id="new_name" class="checkbox"  size="1" tabindex="35" value="+"  <?if ($_POST['new_name']=="+") echo 'checked="checked"'?> onClick="showNewSpc()"/>
								</p>
								<div id="new_spc"  <?php if ($_POST['new_name']=="+") echo 'style="display:block;"'; else echo 'style="display:none;"'?>>
                     				<p><label for="new_speciality" class="left">Нова назва спеціальності:</label>
                   						<input type="text" name="new_speciality" id="new_speciality" class="field" value="<?echo $_POST['new_speciality'];?>" tabindex="40" style="<?if ($_POST['new_speciality']=="" && isset($_POST['edit_spc'])) echo $element_error?>"/>
                   					</p>
                   				</div>
								<p>	<input type="submit" name="edit_spc" id="submit" class="button" value="Зберегти" tabindex="600" /></p>
                			</fieldset>
              				</form>
				    	</div>


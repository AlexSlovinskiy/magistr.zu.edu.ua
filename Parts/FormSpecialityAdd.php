						<div class="contactform">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;Нова спеціальність&nbsp;</legend>
                                <p><label for="faculty" class="left">Факультет:</label>
                   					<select name="faculty" id="faculty" class="combo" tabindex="10" style="<?if ($_POST['faculty']=="" && isset($_POST['add_spc'])) echo $element_error?>">
                     					<option value="<?echo $_POST['faculty']?>"> <?if ($_POST['faculty']!="") echo $_POST['faculty']; else echo "..."?> </option>
                     					<?if (isset($_POST['add_spc'])) echo '<option value=""> ... </option>';?>
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
                   					<select name="training" id="training" class="combo" tabindex="20" style="<?if ($_POST['training']=="" && isset($_POST['add_spc'])) echo $element_error?>">
                   						<option value="<?echo $_POST['training']?>"> <?if ($_POST['training']!="") echo str_replace($_POST['faculty'],"",$_POST['training']); else echo "..."?> </option>
                     					<?if (isset($_POST['add_spc'])) echo '<option value=""> ... </option>';?>
                   					</select>
                     			</p>

                     			<p><label for="speciality" class="left">Назва спеціальності:</label>
                   					<input type="text" name="speciality" id="speciality" class="field" value="<?echo $_POST['speciality'];?>" tabindex="30" style="<?if ($_POST['speciality']=="" && isset($_POST['add_spc'])) echo $element_error?>"/>
                   				</p>
								<p>	<input type="submit" name="add_spc" id="submit" class="button" value="Зберегти" tabindex="600" /></p>
                			</fieldset>
              				</form>
				    	</div>


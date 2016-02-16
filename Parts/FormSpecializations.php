						<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Нова спеціалізація: </span>
            				</li>
            			</ul>
						<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
                                <p><label for="speciality" class="left">Спеціальність:</label>
                   					<select name="speciality" id="speciality" class="combo" tabindex="10" style="<?if ($_POST['speciality']=="" && isset($_POST['add_sub_spc'])) echo $element_error?>">
                     					<option value="<?echo $_POST['speciality']?>"> <?if ($_POST['speciality']!="") echo $_POST['speciality']; else echo "..."?> </option>
                     					<?if (isset($_POST['add_sub_spc'])) echo '<option value=""> ... </option>';?>
                     					<?php
                                    		$query = "SELECT `speciality_name` FROM `specialities`  ORDER BY `speciality_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													echo '<option value="'.$row['speciality_name'].'">'.$row['speciality_name'].'</option>';
   													}
   										?>
                     				</select>
                     			</p>
                                <p><label for="specialization" class="left">Назва спеціалізації:</label>
                   					<input type="text" name="specialization" id="specialization" class="field" value="<?echo $_POST['specialization'];?>" tabindex="20" style="<?if ($_POST['specialization']=="" && isset($_POST['add_sub_spc'])) echo $element_error?>"/>
                   				</p>
								<p>	<input type="submit" name="add_sub_spc" id="submit" class="button" value="Зберегти" tabindex="40" /></p>

              				</form>
				    	</div>
                        <ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Редагувати спеціалізацію: </span>
            				</li>
            			</ul>
						<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
                                <p><label for="edit_specialization" class="left">Cпеціалізація:</label>
                   					<select name="edit_specialization" id="edit_specialization" class="combo" onChange="setNewSubSpc()" tabindex="45" style="<?if ($_POST['edit_specialization']=="" && isset($_POST['edit_sub_spc'])) echo $element_error?>">
                                    	<option value="<?echo $_POST['edit_specialization']?>"> <?if ($_POST['edit_specialization']!="") echo $_POST['edit_specialization']; else echo "..."?> </option>
                     					<?if (isset($_POST['edit_sub_spc'])) echo '<option value=""> ... </option>';?>
                                    	<?php
                                    		$query = "SELECT `specialization_name` FROM `specializations`  ORDER BY `specialization_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													echo '<option value="'.$row['specialization_name'].'">'.$row['specialization_name'].'</option>';
   													}
   										?>
									</select>
								<p><label for="edit_speciality" class="left">Спеціальність:</label>
                   					<select name="edit_speciality" id="edit_speciality" class="combo" tabindex="47" style="<?if ($_POST['edit_speciality']=="" && isset($_POST['edit_sub_spc'])) echo $element_error?>">
                     					<option value="<?echo $_POST['edit_speciality']?>"> <?if ($_POST['edit_speciality']!="") echo $_POST['edit_speciality']; else echo "..."?> </option>
                     					<?if (isset($_POST['edit_sub_spc'])) echo '<option value=""> ... </option>';?>
                     					<?php
                                    		$query = "SELECT `speciality_name` FROM `specialities`  ORDER BY `speciality_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													echo '<option value="'.$row['speciality_name'].'">'.$row['speciality_name'].'</option>';
   													}
   										?>
                     				</select>
                     			</p>
                     			</p>
                                <p><label for="new_specialization" class="left">Нова назва спеціалізації:</label>
                   					<input type="text" name="new_specialization" id="new_specialization" class="field" value="<?echo $_POST['new_specialization'];?>" tabindex="50" style="<?if ($_POST['new_specialization']=="" && isset($_POST['edit_sub_spc'])) echo $element_error?>"/>
                   				</p>
								<p>	<input type="submit" name="edit_sub_spc" id="submit" class="button" value="Зберегти" tabindex="70" /></p>

              				</form>
				    	</div>
                        <ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Видалити спеціалізацію: </span>
            				</li>
            			</ul>
						<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
								<p><label for="del_specialization" class="left">Cпеціалізація:</label>
                   					<select name="del_specialization" id="del_specialization" class="combo" tabindex="100" style="<?if ($_POST['del_specialization']=="" && isset($_POST['del_sub_spc'])) echo $element_error?>">
                                    	<option value="<?echo $_POST['del_specialization']?>"> <?if ($_POST['del_specialization']!="") echo $_POST['del_specialization']; else echo "..."?> </option>
                     					<?if (isset($_POST['del_fac'])) echo '<option value=""> ... </option>';?>
                                    	<?php
                                    		$query = "SELECT `specialization_name` FROM `specializations`  ORDER BY `specialization_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													echo '<option value="'.$row['specialization_name'].'">'.$row['specialization_name'].'</option>';
   													}
   										?>
									</select>
                     			</p>
                     			<p><label for="del_sub_spc_ok" class="left">Підтвердження видалення:</label>
                     					<input type="checkbox" name="del_sub_spc_ok" id="del_sub_spc_ok" class="checkbox"  size="1" tabindex="120" value="+"/>
								</p>
								<p>	<input type="submit" name="del_sub_spc" id="submit" class="button" value="Видалити" tabindex="130" /></p>

              				</form>
				    	</div>

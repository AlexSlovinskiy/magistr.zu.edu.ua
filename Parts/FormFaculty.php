						<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Новий факультет: </span>
            				</li>
            			</ul>
						<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">

                                <p><label for="faculty" class="left">Назва факультету:</label>
                   					<input type="text" name="faculty" id="faculty" class="field" value="<?echo $_POST['faculty'];?>" tabindex="30" style="<?if ($_POST['faculty']=="" && isset($_POST['add_fac'])) echo $element_error?>"/>
                   				</p>
								<p>	<input type="submit" name="add_fac" id="submit" class="button" value="Зберегти" tabindex="40" /></p>

              				</form>
				    	</div>
                        <ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Редагувати факультет: </span>
            				</li>
            			</ul>
						<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
                                <p><label for="edit_faculty" class="left">Факультет:</label>
                   					<select name="edit_faculty" id="edit_faculty" class="combo" onChange="setNewFac()" tabindex="45" style="<?if ($_POST['edit_faculty']=="" && isset($_POST['edit_fac'])) echo $element_error?>">
                                    	<option value="<?echo $_POST['edit_faculty']?>"> <?if ($_POST['edit_faculty']!="") echo $_POST['edit_faculty']; else echo "..."?> </option>
                     					<?if (isset($_POST['edit_fac'])) echo '<option value=""> ... </option>';?>
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
                                <p><label for="new_faculty" class="left">Нова назва факультету:</label>
                   					<input type="text" name="new_faculty" id="new_faculty" class="field" value="<?echo $_POST['new_faculty'];?>" tabindex="50" style="<?if ($_POST['new_faculty']=="" && isset($_POST['edit_fac'])) echo $element_error?>"/>
                   				</p>
								<p>	<input type="submit" name="edit_fac" id="submit" class="button" value="Зберегти" tabindex="60" /></p>

              				</form>
				    	</div>
                        <ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Видалити факультет: </span>
            				</li>
            			</ul>
						<div class="contactform" style="margin-top:5px; margin-bottom:15px;">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
								<p><label for="del_faculty" class="left">Факультет:</label>
                   					<select name="del_faculty" id="del_faculty" class="combo" tabindex="100" style="<?if ($_POST['del_faculty']=="" && isset($_POST['del_fac'])) echo $element_error?>">
                                    	<option value="<?echo $_POST['del_faculty']?>"> <?if ($_POST['del_faculty']!="") echo $_POST['del_faculty']; else echo "..."?> </option>
                     					<?if (isset($_POST['del_fac'])) echo '<option value=""> ... </option>';?>
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
                     			<p><label for="del_fac_ok" class="left">Підтвердження видалення:</label>
                     					<input type="checkbox" name="del_fac_ok" id="del_fac_ok" class="checkbox"  size="1" tabindex="120" value="+"/>
								</p>
								<p>	<input type="submit" name="del_fac" id="submit" class="button" value="Видалити" tabindex="130" /></p>

              				</form>
				    	</div>

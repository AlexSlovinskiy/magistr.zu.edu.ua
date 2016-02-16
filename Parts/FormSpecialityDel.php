						<?php
                        $query = "SELECT `speciality_name` FROM `specialities`  ORDER BY `speciality_name`";
   						$sql = mysql_query($query) or die(mysql_error());
					   	?>
						<div class="contactform">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;Видалення спеціальності&nbsp;</legend>
                                <p><label for="speciality" class="left">Спеціальність:</label>
                   					<select name="speciality" id="speciality" class="combo" tabindex="10" style="<?if ($_POST['faculty']=="" && isset($_POST['add_spc'])) echo $element_error?>">
                                    	<option value="<?echo $_POST['speciality']?>"> <?if ($_POST['speciality']!="") echo $_POST['speciality']; else echo "..."?> </option>
                     					<?if (isset($_POST['del_spc'])) echo '<option value=""> ... </option>';?>
                                    	<?php
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{   													echo '<option value="'.$row['speciality_name'].'">'.$row['speciality_name'].'</option>';
   													}
   										?>


                     				</select>
                     			</p>
                     			<p><label for="spc_del_ok" class="left">Підтвердження видалення:</label>
                     					<input type="checkbox" name="spc_del_ok" id="spc_del_ok" class="checkbox"  size="1" tabindex="20" value="+"/>
								</p>
								<p>	<input type="submit" name="del_spc" id="submit" class="button" value="Видалити" tabindex="600" /></p>
                			</fieldset>
              				</form>
				    	</div>


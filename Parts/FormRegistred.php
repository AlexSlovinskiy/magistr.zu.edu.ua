					<div class="contactform">
						<fieldset>
						    <legend>&nbsp;����� ���������� ���Ū��������� �����в��Ҳ�&nbsp;</legend>
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
								<p>
									<label for="registred" class="left">�����:</label>
                   					<input name="registred" id="registred" type="checkbox" value="yes" onClick="showRegistred()" <?php if (isset($_POST['regSearch'])) echo 'checked="checked"';?> >
                   				</p><br />

                   				<p>
                   					<div id="isRegistred" <?php if ($_POST['registred']=="yes" || isset($_POST['regSearch'])) echo 'style="display:block"'; else echo 'style="display:none"'?> >
                   						<fieldset class="small">
                   							<p>
                   								<label for="regLastname" class="small">�������:</label>
                                                <input type="text" name="regLastname" id="regLastname" class="field" value="<?echo $_POST['regLastname'];?>" style="width:250px;"/>
                   							</p>
                   							<p>
                   								<label for="regPassp" class="small">�������:</label>
                   								<label for="regPasspSerial" class="small">����:</label>
                                                <input type="text" name="regPasspSerial" id="regPasspSerial" class="field" value="<?echo $_POST['regPasspSerial'];?>" style="width:50px;"/>
                                                <label for="regPasspNumber" class="small">�</label>
                                                <input type="text" name="regPasspNumber" id="regPasspNumber" class="field" value="<?echo $_POST['regPasspNumber'];?>" style="width:95px;"/>
                                            </p>
                                            <p>
                                            	<input type="submit" name="regSearch" id="regSearch" class="button" value="�����" style="margin-right:10px;"/>
                                            </p>
                   						</fieldset>
                   				</p>

                   				<p><label for="searchRez" class="left">��������:</label>
                   					<select name="searchRez" id="searchRez" class="combo" onChange="findAb(this.value)">
                     					<option value="-">...</option>
                     					<?php
                                            if (isset($_POST['regSearch']))
                                            	{
                                    			$query = "SELECT * FROM `Registred`
                                    							WHERE   `lastname` like '".$regLastname."%' AND
                                    									`pasp_serial` like '%".$regPasspSerial."%' AND
                                    									`pasp_number` like '%".$regPasspNumber."%'
                                    							ORDER BY `lastname`";
   												$sql = mysql_query($query) or die(mysql_error());
                                    			if (mysql_num_rows($sql)>0)
   													while ($row = mysql_fetch_assoc($sql))
   														{
   														echo '<option value="'.$row['ab_id'].'">'.$row['lastname'].' '.substr($row['firstname'],0,1).'. '.substr($row['patronymic'],0,1).'.</option>';
   														}
   												}
   										?>
                     				</select>
                     			</p>

                   				</div>
                   			</form>
                   		</fieldset>
                   	</div>

                   		<script type="text/javascript">

							regLastname = document.getElementById("regLastname");
							regLastname.onkeyup = function()
								{
								regLastname.value = regLastname.value.replace(regLastname.value[0] , regLastname.value[0].toUpperCase());
                                }
							regPasspSerial = document.getElementById("regPasspSerial");
                            	{
                                var reg = /\d/; //�����
								regPasspSerial.value = regPasspSerial.value.toUpperCase();
                            	}

                            regPasspNumber = document.getElementById("regPasspNumber");
                            regPasspNumber.onkeyup = function()
                            	{
                                var reg=/\D/; //�� �����
								if (reg.test(regPasspNumber.value)) regPasspNumber.value = regPasspNumber.value.replace(regPasspNumber.value[regPasspNumber.value.length-1] , "");
                                }

				    	</script>
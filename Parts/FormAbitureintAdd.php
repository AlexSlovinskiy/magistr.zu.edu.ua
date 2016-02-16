						<div class="contactform">
							<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;�������ֲ� ��� �����в����&nbsp;</legend>
                                <p><label for="lastname" class="left">�������:</label>
                   					<input type="text" name="lastname" id="lastname" class="field" value="<?echo $_POST['lastname'];?>" tabindex="1" style="<?if ($_POST['lastname']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                   				</p>

                   				<p><label for="firstname" class="left">��'�:</label>
                   					<input type="text" name="firstname" id="firstname" class="field" value="<?echo $_POST['firstname'];?>" tabindex="20" style="<?if ($_POST['firstname']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                   				</p>

                   				<p><label for="patronymic" class="left">�� �������:</label>
                   					<input type="text" name="patronymic" id="patronymic" class="field" value="<?echo $_POST['patronymic'];?>" tabindex="30" style="<?if ($_POST['patronymic']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                   				</p>

                   				<p><label for="faculty" class="left">���������:</label>
                   					<select name="faculty" id="faculty" class="combo" tabindex="40" style="<?if ($_POST['faculty']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                     					<option value="<?echo $_POST['faculty']?>"> <?if ($_POST['faculty']!="") echo $_POST['faculty']; else echo "..."?> </option>
                     					<?if (isset($_POST['add_abit'])) echo '<option value=""> ... </option>';?>
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

                           		<p><label for="training" class="left">������ �����:</label>
                   					<select name="training" id="training" class="combo" tabindex="50" style="<?if ($_POST['training']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                   						<option value="<?echo $_POST['training']?>"> <?echo str_replace($_POST['faculty'],"",$_POST['training'])?> </option>
                   					</select>
                     			</p>

                     			<p><label for="speciality" class="left">������������:</label>
                   					<select name="speciality" id="speciality" class="combo" tabindex="60" style="<?if ($_POST['speciality']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                   						<option value="<?echo $_POST['speciality']?>"> <?echo $_POST['speciality']?> </option>
                   					</select>
                     			</p>

								<?php
								if (isset($_REQUEST["add"]))
									{
									$type=$_REQUEST["add"];
									}
									else
										{
										$query="SELECT `type` FROM `abiturients` WHERE `ab_id`='".$_REQUEST["id"]."'";
    									$sql = mysql_query($query) or die(mysql_error());
    									if (mysql_num_rows($sql)>0)
    										{
        									while ($row = mysql_fetch_assoc($sql))
   												{
   												$type=$row["type"];
   												}
   											}
   										}

								if($type!="mag")
									{
									echo '<p><label for="specialization" class="left">������������:</label>';
                   					echo '<select name="specialization" id="specialization" class="combo" tabindex="65" style="';
                   					if ($_POST["specialization"]=="" && isset($_POST["add_abit"])) echo $element_error.'">';
                   						else echo '">';
                   					echo '<option value="'.$_POST["specialization"].'">'.$_POST["specialization"].'</option>
                   						</select></p>';
                   					}
								?>


                                <p><label for="institution" class="left">���������� ������, �� ������� �������:</label>
                                	<fieldset class="small" style="margin-top:-45px; <?if ($_POST['institution']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                		<p> <input type="radio" name="institution" id="ZDU" class="inputRadio" value="ZDU" tabindex="70" style="margin:10px 0 0 15px" <?php if ($_POST['institution']=="ZDU") echo "checked=''";?> onClick="showInstitute()"/>
                        					<label for="institution" class="small" style="margin-left:-5px">��� ��. �. ������</label>
                        					<br /><input type="radio" name="institution" id="other" class="inputRadio" value="other" tabindex="80" style="margin:10px 0 0 15px" <?php if ($_POST['institution']=="other") echo "checked=''";?> onClick="showInstitute()"/>
                        					<label for="institution" class="small" style="margin-left:-6px">�����</label></p>
                               			<div id="otherInstitute" <?php if ($_POST['institution']=="other") echo 'style="display:block"'; else echo 'style="display:none"'?> >
                               			<p><label for="institution" class="small">������ ����� :</label>
                   							<textarea name="institution_oth" id="institution_oth" cols="20" rows="2" tabindex="90" style="width:300px; margin-left:15px; <?if ($_POST['institution_oth']=="" && isset($_POST['add_abit'])) echo $element_error?>"><?echo $_POST['institution_oth']?></textarea></p>
                   						</div>
                   					</fieldset>
                   				</p>

                                <p><label for="diplom" class="left">��������� ������:</label>
                                	<fieldset class="small">
                                		<p><label for="qualification" class="small" style="margin-left:14px"; >�����������: </label>
                        				<select name="qualification" id="qualification" class="combo" tabindex="100" style="width:170px; margin-left:2px; <?if ($_POST['qualification']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                     							<option value="<?echo $_POST['qualification']?>"> <?if ($_POST['qualification']!="") echo $_POST['qualification']; else echo "..."?> </option>
                     							<option value="��������"> �������� </option>
                     							<option value="���������"> ��������� </option>
                     							<option value="������"> ������ </option>
                     					</select>
                     					<p style=" <?php if ($_POST['dip_study_type']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                     						<label for="dip_study_type" class="small" style="margin-left:12px">�����:</label>
                        					<input type="radio" name="dip_study_type" id="dip_stc" class="inputRadio" value="�����" tabindex="101" style="margin-left:1px" <?if ($_POST['dip_study_type']=="�����") echo 'checked="checked"'?> />
                        					<label for="dip_study_type" class="small" style="margin-left:12px">������:</label>
          									<input type="radio" name="dip_study_type" id="dip_zao" class="inputRadio" value="������" tabindex="102" style="margin-left:1px" <?if ($_POST['dip_study_type']=="������") echo 'checked="checked"'?> />
                               			</p>
                               			<p style="<?php if ($_POST['dip_finans']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                               				<label for="dip_finans" class="small">������:</label>
                        					<input type="radio" name="dip_finans" id="dip_budg" class="inputRadio" value="������" tabindex="103" style="margin-left:1px" <?if ($_POST['dip_finans']=="������") echo 'checked="checked"'?> />
                        					<label for="dip_coast" class="small">��������:</label>
          									<input type="radio" name="dip_finans" id="dip_cont" class="inputRadio" value="��������" tabindex="104" style="margin-left:1px" <?if ($_POST['dip_finans']=="��������") echo 'checked="checked"'?> />
                               			</p>
              							<p><label for="dip_serial" class="small">���� �� ����� :</label>
                                			<input type="text" name="dip_serial" id="dip_serial" class="field" value="<?echo $_POST['dip_serial']?>" tabindex="105" maxlength="5" style="width:45px; text-align:center; <?if ($_POST['dip_serial']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                                   			<label for="dip_number">�</label>
                                   			<input type="text" name="dip_number" id="dip_number" class="field" value="<?echo $_POST['dip_number']?>" tabindex="110" maxlength="8" style="width:90px; text-align:center; <?if ($_POST['dip_number']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                                   		</p>
                                		<p><label for="dip_day" class="small">���� ������:</label></p>
                                		<p><select name="dip_day" id="dip_day" class="combo" tabindex="120" style="width:45px; margin-left:20px; <?if ($_POST['dip_day']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                				<option value="<?echo $_POST['dip_day']?>"> <?if ($_POST['dip_day']!="") echo $_POST['dip_day']; else echo "..."?> </option>
                     							<?
                     							for($i=1; $i<=31; $i++)
                     								if ($i<10) echo '<option value="0'.$i.'"> 0'.$i.' </option>';
                     									else echo '<option value="'.$i.'"> '.$i.' </option>';
                     							?>
                     						</select>
                     						<label for="dip_month">/</label>
                     						<select name="dip_month" id="dip_month" class="combo" tabindex="130" style="width:100px; margin-left:2px; <?if ($_POST['dip_month']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                                <option value="<?echo $_POST['dip_month']?>"> <?if ($_POST['dip_month']!="") echo $_POST['dip_month']; else echo "..."?> </option>
                     							<option value="����"> ���� </option>
                     							<option value="������"> ������ </option>
                     							<option value="�������"> ������� </option>
                     							<option value="�����"> ����� </option>
                     							<option value="������"> ������ </option>
                     							<option value="������"> ������ </option>
                     							<option value="�����"> ����� </option>
                     							<option value="������"> ������ </option>
                     							<option value="�������"> ������� </option>
                     							<option value="������"> ������ </option>
                     							<option value="���������"> ��������� </option>
                     							<option value="������"> ������ </option>
                     						</select>
                     						<label for="dip_year">/</label>
                                			<select name="dip_year" id="dip_year" class="combo" tabindex="140" style="width:80px; margin-left:2px; <?if ($_POST['dip_year']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                                <option value="<?echo $_POST['dip_year']?>"> <?if ($_POST['dip_year']!="") echo $_POST['dip_year']; else echo "..."?> </option>
                     							<?
                     							for($i=date("Y"); $i>=date("Y")-40; $i--) echo '<option value="'.$i.'"> '.$i.' </option>';
                     							?>
                     						</select></p>
                     					<p><label for="dip_average" class="small" >C������ ��� ������� �� �������:</label>
                                			<input type="text" name="dip_average" id="dip_average" class="field" value="<?if ($_POST['dip_average']>0) echo $_POST['dip_average']; else echo "";?>" style="width:50px; text-align:center; <?if ($_POST['dip_average']=="" && isset($_POST['add_abit'])) echo $element_error?>" tabindex="149" maxlength="5"/>
                                		</p>
                     					<p><label for="dip_honour" class="small">������ � ��������:</label>
                     						<input type="checkbox" name="dip_honour" id="dip_honour" class="checkbox" tabindex="150" <?if ($_POST['dip_honour']=="+") echo 'checked="checked"'?> size="1" value="+"/></p>
                     					<p><label for="dip_orig" class="small" style="margin-left:2px;">������� ���������:</label>
                     						<input type="checkbox" name="dip_orig" id="dip_orig" class="checkbox" tabindex="155" <?if ($_POST['dip_orig']=="+") echo 'checked="checked"'?> size="1" value="+"/></p>
                           				<?php
                           					echo '<p><label for="cross_enter" class="small">����������� �����:</label>
                     						<input type="checkbox" name="cross_enter" id="cross_enter" class="checkbox" tabindex="156"';
                     						if ($_POST['cross_enter']=="+") echo 'checked="checked"';
                     						echo ' size="1" value="+"/></p>' ;
                     						?>
                     				</fieldset>
                               	</p>
                                <?php
								if (isset($_REQUEST["add"]))
									{
									$type=$_REQUEST["add"];
									}
									else
										{
										$query="SELECT `type` FROM `abiturients` WHERE `ab_id`='".$_REQUEST["id"]."'";
    									$sql = mysql_query($query) or die(mysql_error());
    									if (mysql_num_rows($sql)>0)
    										{
        									while ($row = mysql_fetch_assoc($sql))
   												{
   												$type=$row["type"];
   												}
   											}
   										}

								if(1==1)
									{
									echo '<p><label for="language" class="left">�������� ����, ��� ������:</label>';
									echo '<fieldset class="small"><p>';
									echo '<select name="language" id="language" class="combo" tabindex="157" style="width:150px; margin-left:20px;';
                   					if ($_POST["language"]=="" && isset($_POST["add_abit"])) echo $element_error.'">';
                   						else echo '">';
									echo '<option value="';
									echo $_POST['language'].'">';
									if ($_POST['language']!="") echo $_POST['language']; else echo '...</option>';
                     				echo '<option value="���������"> ��������� </option>
                     					<option value="ͳ������"> ͳ������ </option>
                     					<option value="����������"> ���������� </option>
                     					<option value="���������"> ��������� </option>
                     					</select></p></fieldset></p>';
                   					}
								?>
                               	<p><label for="study_type" class="left">����� ��������:</label>
                               		<fieldset class="small" style="<?if ($_POST['study_type']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                               			<p><label for="study_type" class="small">�����:</label>
                        				<input type="radio" name="study_type" id="stc" class="inputRadio" value="�����" tabindex="160" style="margin-left:1px" <?if ($_POST['study_type']=="�����") echo 'checked="checked"'?> onClick="showTargetStudy()"/>
                        				<label for="study_type" class="small">������:</label>
          								<input type="radio" name="study_type" id="zao" class="inputRadio" value="������" tabindex="165" style="margin-left:1px" <?if ($_POST['study_type']=="������") echo 'checked="checked"'?> onClick="showTargetStudy()"/>
                               			</p>
                               			<div id="target_study" <?php /*if ($_POST['study_type']=="stc") echo 'style="display:block"'; else*/ echo 'style="display:none"'?> >
                                        	<p><label for="target" class="small">ֳ����� �����������:</label>
                                        	<input type="checkbox" name="target" id="target" class="checkbox" tabindex="170" <?if ($_POST['target']=="+") echo 'checked="checked"'?> size="1" value="+"/></p>
                               			</div>
                               		</fieldset>
                                </p>


                                <p><label for="passport" class="left">�������� ���:</label>
                                	<fieldset class="small">
                                		<p><label for="nationality" class="small" style="margin-left:3px"; >������������: </label>
                        				<select name="nationality" id="nationality" class="combo" tabindex="175" onChange="showCountry()" style="width:205px; margin-left:2px; <?if ($_POST['nationality']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                     							<option value="<?echo $_POST['nationality']?>"> <?if ($_POST['nationality']!="") echo $_POST['nationality']; else echo "..."?> </option>
                     							<option value="���������� ������"> ���������� ������ </option>
                     							<option value="���������"> ��������� </option>
                     							<option value="��� ������������"> ��� ������������ </option>
                     					</select>
                               			</p>
                               			<div id="other_country" <?php if ($_POST['nationality']=="���������") echo 'style="display:block"'; else echo 'style="display:none"'?> >
                                        	<p><label for="country" class="small" style="margin-left:55px">�����:</label>
                                        	<input type="text" name="country" id="country" class="field" value="<?echo $_POST['country']?>" tabindex="180"  style="width:200px; <?if ($_POST['country']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                   				    	</div>
              							<p><label for="pasp_serial" class="small">���� �� �����:</label>
                                			<input type="text" name="pasp_serial" id="pasp_serial" class="field" value="<?echo $_POST['pasp_serial']?>" tabindex="190" maxlength="6" style="width:70px; text-align:center; <?if ($_POST['pasp_serial']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                                   			<label for="pasp_number">�</label>
                                   			<input type="text" name="pasp_number" id="pasp_number" class="field" value="<?echo $_POST['pasp_number']?>" tabindex="200" maxlength="10" style="width:100px; text-align:center; <?if ($_POST['pasp_number']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                                		<p><label for="pasp_issue" class="small">������� �������:</label>
                                			<textarea name="pasp_issue" id="pasp_issue" cols="20" rows="2" tabindex="210" style="width:306px; margin-left:20px; <?if ($_POST['pasp_issue']=="" && isset($_POST['add_abit'])) echo $element_error?>"><?echo $_POST["pasp_issue"]?></textarea></p>
                                		<p><label for="pasp_day" class="small">���� ������:</label></p>
                                		<p><select name="pasp_day" id="pasp_day" class="combo" tabindex="220" style="width:45px; margin-left:20px; <?if ($_POST['pasp_day']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                				<option value="<?echo $_POST['pasp_day']?>"> <?if ($_POST['pasp_day']!="") echo $_POST['pasp_day']; else echo "..."?> </option>
                     							<?
                     							for($i=1; $i<=31; $i++)
                     								if ($i<10) echo '<option value="0'.$i.'"> 0'.$i.' </option>';
                     									else echo '<option value="'.$i.'"> '.$i.' </option>';
                     							?>
                     						</select>
                     						<label for="pasp_month">/</label>
                     						<select name="pasp_month" id="pasp_month" class="combo" tabindex="230" style="width:100px; margin-left:2px; <?if ($_POST['pasp_month']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                                <option value="<?echo $_POST['pasp_month']?>"> <?if ($_POST['pasp_month']!="") echo $_POST['pasp_month']; else echo "..."?> </option>
                     							<option value="����"> ���� </option>
                     							<option value="������"> ������ </option>
                     							<option value="�������"> ������� </option>
                     							<option value="�����"> ����� </option>
                     							<option value="������"> ������ </option>
                     							<option value="������"> ������ </option>
                     							<option value="�����"> ����� </option>
                     							<option value="������"> ������ </option>
                     							<option value="�������"> ������� </option>
                     							<option value="������"> ������ </option>
                     							<option value="���������"> ��������� </option>
                     							<option value="������"> ������ </option>
                     						</select>
                     						<label for="pasp_year">/</label>
                                			<select name="pasp_year" id="pasp_year" class="combo" tabindex="240" style="width:80px; margin-left:2px; <?if ($_POST['pasp_year']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                                <option value="<?echo $_POST['pasp_year']?>"> <?if ($_POST['pasp_year']!="") echo $_POST['pasp_year']; else echo "..."?> </option>
                     							<?
                     							for($i=date("Y"); $i>=date("Y")-50; $i--) echo '<option value="'.$i.'"> '.$i.' </option>';
                     							?>
                     						</select></p>
                     						<p><label for="birthday" class="small">���� ����������:</label></p>
                                			<p><select name="birth_day" id="birth_day" class="combo" tabindex="250" style="width:45px; margin-left:20px; <?if ($_POST['birth_day']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                				<option value="<?echo $_POST['birth_day']?>"> <?if ($_POST['birth_day']!="") echo $_POST['birth_day']; else echo "..."?> </option>
                     							<?
                     							for($i=1; $i<=31; $i++)
                     								if ($i<10) echo '<option value="0'.$i.'"> 0'.$i.' </option>';
                     									else echo '<option value="'.$i.'"> '.$i.' </option>';
                     							?>
                     						</select>
                     						<label for="birth_month">/</label>
                     						<select name="birth_month" id="birth_month" class="combo" tabindex="260" style="width:100px; margin-left:2px; <?if ($_POST['birth_month']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                     							<option value="<?echo $_POST['birth_month']?>"> <?if ($_POST['birth_month']!="") echo $_POST['birth_month']; else echo "..."?> </option>
                     							<option value="����"> ���� </option>
                     							<option value="������"> ������ </option>
                     							<option value="�������"> ������� </option>
                     							<option value="�����"> ����� </option>
                     							<option value="������"> ������ </option>
                     							<option value="������"> ������ </option>
                     							<option value="�����"> ����� </option>
                     							<option value="������"> ������ </option>
                     							<option value="�������"> ������� </option>
                     							<option value="������"> ������ </option>
                     							<option value="���������"> ��������� </option>
                     							<option value="������"> ������ </option>
                     						</select>
                     						<label for="birth_year">/</label>
                                			<select name="birth_year" id="birth_year" class="combo" tabindex="270" style="width:80px; margin-left:2px; <?if ($_POST['birth_year']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                				<option value="<?echo $_POST['birth_year']?>"> <?if ($_POST['birth_year']!="") echo $_POST['birth_year']; else echo "..."?> </option>
                     							<?
                     							for($i=date("Y")-15; $i>=date("Y")-60; $i--) echo '<option value="'.$i.'"> '.$i.' </option>';
                     							?>
											</select></p>
                     				</fieldset>
                               	</p>

                               	<p><label for="sex" class="left">�����:</label>
                                	<fieldset class="small" style="<?if ($_POST['sex']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                               	 			<p>	<label for="sex" class="small">�������</label>
                        						<input type="radio" name="sex" id="male" class="inputRadio" value="male" tabindex="280" style="margin-left:1px" <?php if ($_POST['sex']=="male") echo "checked=''";?>/>
                        						<label for="sex" class="small">Ƴ����</label>
          										<input type="radio" name="sex" id="female" class="inputRadio" value="female" tabindex="290" style="margin-left:1px" <?php if ($_POST['sex']=="female") echo "checked=''";?>/>
                               				</p>
                               		</fieldset>
                               	</p>

                                <p><label for="location" class="left">̳�������:</label>
                                	<fieldset class="small" style="<?if ($_POST['location']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                            <p>	<label for="location" class="small">�. �������</label>
                        						<input type="radio" name="location" id="location" class="inputRadio" value="city_zt" tabindex="300" style="margin-left:1px" <?php if ($_POST['location']=="city_zt") echo "checked=''";?>/>
                     					    	<label for="location" class="small">�����</label>
                        						<input type="radio" name="location" id="location" class="inputRadio" value="city" tabindex="310" style="margin-left:1px" <?php if ($_POST['location']=="city") echo "checked=''";?>/>
                        						<label for="location" class="small">�������</label>
          										<input type="radio" name="location" id="location" class="inputRadio" value="village" tabindex="320" style="margin-left:1px" <?php if ($_POST['location']=="village") echo "checked=''";?>/>
                               				</p>
                               		</fieldset>
                               	</p>

                               	<p><label for="ID_code" class="left">���������������� �����:</label>
                               		<fieldset class="small">
                               		<p>
                   					<input type="text" name="ID_code" id="ID_code" class="field" value="<?echo $_POST['ID_code']?>" tabindex="330" maxlength="10" style="text-align:center; width:100px; margin-left:20px; margin-bottom:-7px;"/>
                   				    </p>
                   				    </fieldset>
                   				</p>

                   				<p><label for="home_adress" class="left">������� ������:</label>
                               		<fieldset class="small">
                                    	<p><label for="street" class="small" style="padding-left:45px">������:</label>
                                			<input type="text" name="street" id="street" class="field" value="<?echo $_POST['street']?>" tabindex="340" style="width:235px;"/></p>
                                   		<p>	<label for="build_number" class="small"> ������� �:</label>
                                   			<input type="text" name="build_number" id="build_number" class="field" value="<?echo $_POST['build_number']?>" tabindex="350" style="width:60px; text-align:center; "/>
                                   			<label for="flat_number" class="small"> �������� �:</label>
                                   			<input type="text" name="flat_number" id="flat_number" class="field" value="<?echo $_POST['flat_number']?>" tabindex="360" style="width:55px; text-align:center"/></p>
                                   		<p><label for="city" class="small">̳���/����:</label>
                                			<input type="text" name="city" id="city" class="field" value="<?echo $_POST['city']?>" tabindex="370" style="width:235px; <?if ($_POST['city']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                                		<p><label for="district" class="small" style="padding-left:55px">�����:</label>
                                			<input type="text" name="district" id="district" class="field" value="<?echo $_POST['district']?>" tabindex="380" style="width:235px; <?if ($_POST['district']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                                		<p><label for="state" class="small" style="padding-left:40px">�������:</label>
                                			<input type="text" name="state" id="state" class="field" value="<?echo $_POST['state']?>" tabindex="390" style="width:235px; <?if ($_POST['state']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                                		<p><label for="phone" class="small" >���������� �������:</label>
                                			<input type="text" name="phone" id="phone" class="field" value="<?echo $_POST['phone']?>" tabindex="400" style="width:176px; <?if ($_POST['phone']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                               			<p><label for="hostel" class="small">������� ����������:</label>
                     						<input type="checkbox" name="hostel" id="hostel" class="checkbox" tabindex="405" <?if ($_POST['hostel']=="+") echo 'checked="checked"'?> size="1" value="+"/></p>
                     				</fieldset>
                               	</p>

                               	<p><label for="military" class="left">³������� ������:</label>
                                	<fieldset class="small">
                                        <p><label for="military" class="small" style="margin-left:31px;">³������������'������: </label>
                                		<input type="checkbox" name="military" id="military" class="checkbox" tabindex="410" size="1" value="+" <?if ($_POST['military']=="+") echo 'checked="checked"'?> onClick="showMilitary()"/></p>
                                		<div id="mil_block" <?php if ($_POST['military']=="+") echo 'style="display:block"'; else echo 'style="display:none"'?>>
                                			<p><label for="mil_doc" class="small">��� ���������:</label>
                                			<select name="mil_doc" id="mil_doc" class="combo" tabindex="420" style="width:200px; margin-left:2px; <?if ($_POST['mil_doc']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                     							<option value="<?echo $_POST['mil_doc']?>"> <?if ($_POST['mil_doc']!="") echo $_POST['mil_doc']; else echo "..."?> </option>
                     							<option value="�������� ����������"> �������� ���������� </option>
                     							<option value="³�������� ������"> ³�������� ������ </option>
									<option value="³�������� ������"> ���������� ���������� </option>
                     						</select>
                     						</p>
                                			<p><label for="mil_issue" class="small">�������:</label>
                                			<textarea name="mil_issue" id="mil_issue" cols="20" rows="2" tabindex="430" style="width:302px; margin-left:20px; <?if ($_POST['mil_issue']=="" && isset($_POST['add_abit'])) echo $element_error?>"><?echo $_POST["mil_issue"];?></textarea></p>
                                			<p><label for="mil_date" class="small">���� ������:</label></p>
                                			<p><select name="mil_day" id="mil_day" class="combo" tabindex="440" style="width:45px; margin-left:20px; <?if ($_POST['mil_day']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                     							<option value="<?echo $_POST['mil_day']?>"> <?if ($_POST['mil_day']!="") echo $_POST['mil_day']; else echo "..."?> </option>
                     							<?
                     							for($i=1; $i<=31; $i++)
                     								if ($i<10) echo '<option value="0'.$i.'"> 0'.$i.' </option>';
                     									else echo '<option value="'.$i.'"> '.$i.' </option>';
                     							?>
                     						</select>
                     						<label for="mil_month">/</label>
                     						<select name="mil_month" id="mil_month" class="combo" tabindex="450" style="width:100px; margin-left:2px; <?if ($_POST['mil_month']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                     							<option value="<?echo $_POST['mil_month']?>"> <?if ($_POST['mil_month']!="") echo $_POST['mil_month']; else echo "..."?> </option>
                     							<option value="����"> ���� </option>
                     							<option value="������"> ������ </option>
                     							<option value="�������"> ������� </option>
                     							<option value="�����"> ����� </option>
                     							<option value="������"> ������ </option>
                     							<option value="������"> ������ </option>
                     							<option value="�����"> ����� </option>
                     							<option value="������"> ������ </option>
                     							<option value="�������"> ������� </option>
                     							<option value="������"> ������ </option>
                     							<option value="���������"> ��������� </option>
                     							<option value="������"> ������ </option>
                     						</select>
                     						<label for="mil_year">/</label>
                                			<select name="mil_year" id="mil_year" class="combo" tabindex="460" style="width:80px; margin-left:2px; <?if ($_POST['mil_year']=="" && isset($_POST['add_abit'])) echo $element_error;?>">
                     							<option value="<?echo $_POST['mil_year']?>"> <?if ($_POST['mil_year']!="") echo $_POST['mil_year']; else echo "..."?> </option>
                     							<?
                     							for($i=date("Y"); $i>=date("Y")-50; $i--) echo '<option value="'.$i.'"> '.$i.' </option>';
                     							?>
                     						</select></p>
                     					</div>
                     				</fieldset>
                                </p>
                               	<p><label for="benefits" class="left">ϳ����:</label>
                               		<fieldset class="small">
                               			<p><label for="benefits" class="small" style="margin-left:80px">���� ���������: </label>
                                			<input type="checkbox" name="benefits" id="benefits" class="checkbox" tabindex="470" size="1" value="+" <?if ($_POST['benefits']=="+") echo 'checked="checked"'?> onClick="showBenefits()"/>
                                		</p>
                                		<div id="benefit_block"  <?php if ($_POST['benefits']=="+") echo 'style="display:block; margin-left:50px"'; else echo 'style="display:none; margin-left:50px"'?>>
                                			<fieldset style="margin-left:-15px; margin-right:5px; <?php if ($no_benefit==1) echo $element_error;?> ">
                                			<p><input type="checkbox" name="invalid" id="invalid" class="checkbox" tabindex="501" size="1" value="+" style="margin-left:5px;" <?if ($_POST['invalid']=="+") echo 'checked="checked"'?>/>
                                            	<label for="invalid" class="small">������� I � II ����� </label></p>
                                            <p><input type="checkbox" name="syrota" id="syrota" class="checkbox" tabindex="502" size="1" value="+" style="margin-left:5px;" <?if ($_POST['syrota']=="+") echo 'checked="checked"'?>/>
                                            	<label for="syrota" class="small">����� � ����� ���� ���� </label></p>
                                            <p><input type="checkbox" name="chornob" id="chornob" class="checkbox" tabindex="50" size="1" value="+" style="margin-left:5px;" <?if ($_POST['chornob']=="+") echo 'checked="checked"'?>/>
                                            	<label for="chornob" class="small">����������� I-II �������</label></p>
                                            <p><input type="checkbox" name="inozem" id="inozem" class="checkbox" tabindex="503" size="1" value="+" style="margin-left:5px;" <?if ($_POST['inozem']=="+") echo 'checked="checked"'?>/>
                                            	<label for="inozem" class="small">�������� (���������� ����) </label></p>
                                            <p><input type="checkbox" name="veteran" id="veteran" class="checkbox" tabindex="504" size="1" value="+" style="margin-left:5px;" <?if ($_POST['veteran']=="+") echo 'checked="checked"'?>/>
                                            	<label for="veteran" class="small">�������� ���� </label></p>
                                            <p><input type="checkbox" name="chacht" id="chacht" class="checkbox" tabindex="505" size="1" value="+" style="margin-left:5px;" <?if ($_POST['chacht']=="+") echo 'checked="checked"'?>/>
                                            	<label for="chacht" class="small">������� ���������� ����� </label></p>
                                            <p><input type="checkbox" name="zagybl" id="zagybl" class="checkbox" tabindex="506" size="1" value="+" style="margin-left:5px;" <?if ($_POST['zagybl']=="+") echo 'checked="checked"'?>/>
                                            	<label for="zagybl" class="small">ĳ�� �������� ��������� </label></p>
                                            <p><input type="checkbox" name="zasyadka" id="zasyadka" class="checkbox" tabindex="507" size="1" value="+" style="margin-left:5px;" <?if ($_POST['zasyadka']=="+") echo 'checked="checked"'?>/>
                                            	<label for="zasyadka" class="small">ѳ�'� ��������� �� ���� ��. ������� </label></p>
                               				<p><label for="benefit_doc" class="small">��������, �� ������� �����:</label>
                                			<textarea name="benefit_doc" id="benefit_doc" cols="20" rows="3" tabindex="510" style="width:270px; margin-left:20px; <?if ($_POST['benefit_doc']=="" && isset($_POST['add_abit'])) echo $element_error?>"><?echo $_POST["benefit_doc"];?></textarea></p>
                                			</fieldset>
                               			</div>
                               		</fieldset>
                				</p>
                				<p><label for="benefits" class="left">��� �������:</label>
                               		<fieldset class="small">
                               			<p><label for="chornob34" class="small">���������� III-IV �������: </label>
                                			<input type="checkbox" name="chornob34" id="chornob34" class="checkbox" tabindex="520" size="1" value="+"  <?if ($_POST['chornob34']=="+") echo 'checked="checked"'?>/>
                                		</p>
                                		<p><label for="invalid3" class="small" style="margin-left:67px;">������� III �����: </label>
                                			<input type="checkbox" name="invalid3" id="invalid3" class="checkbox" tabindex="530" size="1" value="+"  <?if ($_POST['invalid3']=="+") echo 'checked="checked"'?>/>
                                		</p>

                               		</fieldset>
                				</p>

								<p>	<input type="submit" name="add_abit" id="submit" class="button" value="��������" tabindex="600" /></p>
                			</fieldset>
              				</form>
				    	</div>

							<script type="text/javascript">

							function findAb(selected_Ab)
                       			{
       							//alert ("1");
       		                	var lastname=document.getElementById("lastname");
       		                	var firstname=document.getElementById("firstname");
       		                	var patronymic=document.getElementById("patronymic");
       		                	var ZDU=document.getElementById("ZDU");
       		                	var dip_day=document.getElementById("dip_day");
       		                	var dip_month=document.getElementById("dip_month");
       		                	var dip_year=document.getElementById("dip_year");
       		                	var dip_stc=document.getElementById("dip_stc");
       		                	var dip_zao=document.getElementById("dip_zao");
       		                	var dip_budg=document.getElementById("dip_budg");
       		                	var dip_cont=document.getElementById("dip_cont");
       		                	var nationality=document.getElementById("nationality");
       		                	var country=document.getElementById("country");
       		                	var other_country=document.getElementById("other_country");
       		                	var pasp_serial=document.getElementById("pasp_serial");
       		                	var pasp_number=document.getElementById("pasp_number");
       		                	var pasp_issue=document.getElementById("pasp_issue");
       		                	var pasp_day=document.getElementById("pasp_day");
       		                	var pasp_month=document.getElementById("pasp_month");
       		                	var pasp_year=document.getElementById("pasp_year");
       		                	var birth_day=document.getElementById("birth_day");
       		                	var birth_month=document.getElementById("birth_month");
       		                	var birth_year=document.getElementById("birth_year");
       		                	var female=document.getElementById("female");
       		                	var male=document.getElementById("male");
       		                	var ID_code=document.getElementById("ID_code");
       		                	var street=document.getElementById("street");
       		                	var build_number=document.getElementById("build_number");
       		                	var flat_number=document.getElementById("flat_number");
       		                	var city=document.getElementById("city");
       		                	var district=document.getElementById("district");
       		                	var state=document.getElementById("state");
       		                	var phone=document.getElementById("phone");
       		                	var language=document.getElementById("language");


       		                	JsHttpRequest.query
                       				(
                       				'AbBackend.php',
                       					{
                       					'selected_Ab' : selected_Ab

                       					},
                       				function (result, errors)
                       					{
                       					document.getElementById("debug").value = errors;
										lastname.value=result.lastname;
                                        firstname.value=result.firstname;
                                        patronymic.value=result.patronymic;
                                        ZDU.checked=true;
                                        dip_day.selectedIndex=30;
                                        dip_month.selectedIndex=6;
                                        dip_year.selectedIndex=1;
                                        if (result.study_type=='�����') dip_stc.checked=true;
                                        if (result.study_type=='������') dip_zao.checked=true;
                                        if (result.finans=='������') dip_budg.checked=true;
                                        if (result.finans=='��������') dip_cont.checked=true;
                                        nationality.selectedIndex=result.nationality;
                                        if (result.nationality==2)
                                        	{
                                        	other_country.style.display = "block";
                                        	country.value=result.country;
                                        	}
                                        	else other_country.style.display = "none";
                                        pasp_serial.value=result.pasp_serial;
                                        pasp_number.value=result.pasp_number;
                                        pasp_issue.value=result.pasp_issue;
                                        pasp_day.selectedIndex=result.pasp_day;
                                        pasp_month.selectedIndex=result.pasp_month;
                                        pasp_year.selectedIndex=result.pasp_year;
                                        birth_day.selectedIndex=result.birth_day;
                                        birth_month.selectedIndex=result.birth_month;
                                        birth_year.selectedIndex=result.birth_year;
                                        if (result.sex=='male') male.checked=true;
                                        if (result.sex=='female') female.checked=true;
                                        ID_code.value=result.ID_code;
                                        street.value=result.street;
                                        build_number.value=result.build_number;
                                        flat_number.value=result.flat_number;
                                        city.value=result.city;
                                        district.value=result.district;
                                        state.value=result.state;
                                        phone.value=result.phone;
										language.selectedIndex=result.language;
										},
                       				false
                       				);
                       			}

							lastname = document.getElementById("lastname");
							firstname = document.getElementById("firstname");
							patronymic = document.getElementById("patronymic");
                            country = document.getElementById("country");

       						lastname.onkeyup = firstname.onkeyup = patronymic.onkeyup = country.onkeyup = function()
								{
								//lastname.value = lastname.value.toLowerCase();
								lastname.value = lastname.value.replace(lastname.value[0] , lastname.value[0].toUpperCase());
								//firstname.value = firstname.value.toLowerCase();
								firstname.value = firstname.value.replace(firstname.value[0] , firstname.value[0].toUpperCase());
								//patronymic.value = patronymic.value.toLowerCase();
								patronymic.value = patronymic.value.replace(patronymic.value[0] , patronymic.value[0].toUpperCase());
								//country.value = country.value.toLowerCase();
								country.value = country.value.replace(country.value[0] , country.value[0].toUpperCase());
								}

							lastname.onkeypress=firstname.onkeypress = patronymic.onkeypress = function(e)
								{
								e = e || window.event;
								var keyCode = e.keyCode || e.which;

								if (keyCode == 13 || keyCode == 8 || keyCode == 9)
									{
									return;
									}

								var s = this.value;
								s += String.fromCharCode(keyCode);

								if (!(/^[�������ǲ�����������������٪����������賿��������������������`]+\-?\s?[�������ǲ�����������������٪����������賿��������������������`]*$/.test(s)))
									{
									s.length--;
									return false;
									}
								}

							dip_serial = document.getElementById("dip_serial");
							pasp_serial = document.getElementById("pasp_serial");
							dip_number = document.getElementById("dip_number");
							pasp_number = document.getElementById("pasp_number");
                            dip_number.onkeyup = pasp_number.onkeyup = dip_serial.onkeyup = pasp_serial.onkeyup = function()
       							{
                                var reg = /\d/ //�����
								//if (reg.test(dip_serial.value)) dip_serial.value = dip_serial.value.replace(dip_serial.value[dip_serial.value.length-1] , "");
                                //if (reg.test(pasp_serial.value)) pasp_serial.value = pasp_serial.value.replace(pasp_serial.value[pasp_serial.value.length-1] , "");
                                dip_serial.value = dip_serial.value.toUpperCase();
                                pasp_serial.value = pasp_serial.value.toUpperCase();
                                dip_number.value = dip_number.value.toUpperCase();
                                pasp_number.value = pasp_number.value.toUpperCase();
                            	}

                            ID_code = document.getElementById("ID_code");
                            phone = document.getElementById("phone");
                            ID_code.onkeypress=phone.onkeypress = function(e)
								{
								e = e || window.event;
								var keyCode = e.keyCode || e.which;

								if (keyCode == 13 || keyCode == 8 || keyCode == 9)
									{
									return;
									}

								var s = this.value;
								s += String.fromCharCode(keyCode);

								if (!(/^[0-9]*$/.test(s)))
									{
									s.length--;
									return false;
									}
								}

                            var average=document.getElementById("dip_average");
							average.onkeypress = function(e)
								{
								e = e || window.event;
								var keyCode = e.keyCode || e.which;

								if (keyCode == 13 || keyCode == 8 || keyCode == 9)
									{
									return;
									}

								var s = this.value;
								s += String.fromCharCode(keyCode);

								if (!(/^[0-9]{1,2}(\.([0-9]{0,2})?)?$/.test(s) || /^100$/.test(s)))
									{
									s.length--;
									return false;
									}
								}
				    	</script>
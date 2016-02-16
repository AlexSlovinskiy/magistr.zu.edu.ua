						<div class="contactform">
							<form method="post" id="RegForm" name="RegForm" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;ІНФОРМАЦІЯ ПРО СТУДЕНТА&nbsp;</legend>
                                <p><label for="lastname" class="left">Прізвище:</label>
                   					<input type="text" name="lastname" id="lastname" class="field" value="<?echo $_POST['lastname'];?>" tabindex="1" style="<?if ($_POST['lastname']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                   				</p>

                   				<p><label for="firstname" class="left">Ім'я:</label>
                   					<input type="text" name="firstname" id="firstname" class="field" value="<?echo $_POST['firstname'];?>" tabindex="20" style="<?if ($_POST['firstname']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                   				</p>

                   				<p><label for="patronymic" class="left">По батькові:</label>
                   					<input type="text" name="patronymic" id="patronymic" class="field" value="<?echo $_POST['patronymic'];?>" tabindex="30" style="<?if ($_POST['patronymic']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                   				</p>

								<p><label for="faculty" class="left">Факультет:</label>
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

                           		<p><label for="training" class="left">Напрям підготовки:</label>
                   					<select name="training" id="training" class="combo" tabindex="50" style="<?if ($_POST['training']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                   						<option value="<?echo $_POST['training'];?>"> <?echo $_POST['training'];?> </option>
									</select>
                     			</p>

                     			<p><label for="study_type" class="left">Нинішня форма навчання:</label>
                               		<fieldset class="small" style="<?if ($_POST['study_type']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                               			<p><label for="study_type" class="small">Денна:</label>
                        				<input type="radio" name="study_type" id="stc" class="inputRadio" value="Денна" tabindex="52" style="margin-left:1px" <?if ($_POST['study_type']=="Денна") echo 'checked="checked"'?> onClick="showTargetStudy()"/>
                        				<label for="study_type" class="small">Заочна:</label>
          								<input type="radio" name="study_type" id="zao" class="inputRadio" value="Заочна" tabindex="54" style="margin-left:1px" <?if ($_POST['study_type']=="Заочна") echo 'checked="checked"'?> onClick="showTargetStudy()"/>
                               			</p>
                               		</fieldset>
                                </p>

                                <p><label for="finans" class="left">Джерело фінансування:</label>
                               		<fieldset class="small" style="<?if ($_POST['finans']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                               			<p><label for="finans" class="small">Бюджет:</label>
                        				<input type="radio" name="finans" id="budg" class="inputRadio" value="Бюджет" tabindex="56" style="margin-left:1px" <?if ($_POST['finans']=="Бюджет") echo 'checked="checked"'?> />
                        				<label for="study_type" class="small">Контракт:</label>
          								<input type="radio" name="finans" id="cont" class="inputRadio" value="Контракт" tabindex="58" style="margin-left:1px" <?if ($_POST['finans']=="Котракт") echo 'checked="checked"'?> />
                               			</p>
                               		</fieldset>
                                </p>
                     			<?php

								if(1==1)
									{
									echo '<p><label for="language" class="left">Іноземна мова(не фахова):</label>';
									echo '<fieldset class="small"><p>';
									echo '<select name="language" id="language" class="combo" tabindex="157" style="width:150px; margin-left:20px;';
                   					if ($_POST["language"]=="" && isset($_POST["add_abit"])) echo $element_error.'">';
                   						else echo '">';
									echo '<option value="';
									echo $_POST['language'].'">';
									if ($_POST['language']!="") echo $_POST['language']; else echo '...</option>';
                     				echo '<option value="Англійська"> Англійська </option>
                     					<option value="Німецька"> Німецька </option>
                     					<option value="Французька"> Французька </option>
                     					<option value="Іспанська"> Іспанська </option>
                     					</select></p></fieldset></p>';
                   					}
								?>

                                <p><label for="passport" class="left">Паспортні дані:</label>
                                	<fieldset class="small">
                                		<p><label for="nationality" class="small" style="margin-left:3px"; >Громадянство: </label>
                        				<select name="nationality" id="nationality" class="combo" tabindex="175" onChange="showCountry()" style="width:205px; margin-left:2px; <?if ($_POST['nationality']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                     							<option value="<?echo $_POST['nationality']?>"> <?if ($_POST['nationality']!="") echo $_POST['nationality']; else echo "..."?> </option>
                     							<option value="Громадянин України"> Громадянин України </option>
                     							<option value="Іноземець"> Іноземець </option>
                     							<option value="Без громадянства"> Без громадянства </option>
                     					</select>
                               			</p>
                               			<div id="other_country" <?php if ($_POST['nationality']=="Іноземець") echo 'style="display:block"'; else echo 'style="display:none"'?> >
                                        	<p><label for="country" class="small" style="margin-left:55px">Країна:</label>
                                        	<input type="text" name="country" id="country" class="field" value="<?echo $_POST['country']?>" tabindex="180"  style="width:200px; <?if ($_POST['country']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                   				    	</div>
              							<p><label for="pasp_serial" class="small">Серія та номер:</label>
                                			<input type="text" name="pasp_serial" id="pasp_serial" class="field" value="<?echo $_POST['pasp_serial']?>" tabindex="190" maxlength="6" style="width:70px; text-align:center; <?if ($_POST['pasp_serial']=="" && isset($_POST['add_abit'])) echo $element_error?>"/>
                                   			<label for="pasp_number">№</label>
                                   			<input type="text" name="pasp_number" id="pasp_number" class="field" value="<?echo $_POST['pasp_number']?>" tabindex="200" maxlength="10" style="width:100px; text-align:center; <?if ($_POST['pasp_number']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                                		<p><label for="pasp_issue" class="small">Паспорт виданий:</label>
                                			<textarea name="pasp_issue" id="pasp_issue" cols="20" rows="2" tabindex="210" style="width:306px; margin-left:20px; <?if ($_POST['pasp_issue']=="" && isset($_POST['add_abit'])) echo $element_error?>"><?echo $_POST["pasp_issue"]?></textarea></p>
                                		<p><label for="pasp_day" class="small">Дата видачі:</label></p>
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
                     							<option value="січня"> січня </option>
                     							<option value="лютого"> лютого </option>
                     							<option value="березня"> березня </option>
                     							<option value="квітня"> квітня </option>
                     							<option value="травня"> травня </option>
                     							<option value="червня"> червня </option>
                     							<option value="липня"> липня </option>
                     							<option value="серпня"> серпня </option>
                     							<option value="вересня"> вересня </option>
                     							<option value="жовтня"> жовтня </option>
                     							<option value="листопада"> листопада </option>
                     							<option value="грудня"> грудня </option>
                     						</select>
                     						<label for="pasp_year">/</label>
                                			<select name="pasp_year" id="pasp_year" class="combo" tabindex="240" style="width:80px; margin-left:2px; <?if ($_POST['pasp_year']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                                                <option value="<?echo $_POST['pasp_year']?>"> <?if ($_POST['pasp_year']!="") echo $_POST['pasp_year']; else echo "..."?> </option>
                     							<?
                     							for($i=date("Y"); $i>=date("Y")-50; $i--) echo '<option value="'.$i.'"> '.$i.' </option>';
                     							?>
                     						</select></p>
                     						<p><label for="birthday" class="small">Дата народження:</label></p>
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
                     							<option value="січня"> січня </option>
                     							<option value="лютого"> лютого </option>
                     							<option value="березня"> березня </option>
                     							<option value="квітня"> квітня </option>
                     							<option value="травня"> травня </option>
                     							<option value="червня"> червня </option>
                     							<option value="липня"> липня </option>
                     							<option value="серпня"> серпня </option>
                     							<option value="вересня"> вересня </option>
                     							<option value="жовтня"> жовтня </option>
                     							<option value="листопада"> листопада </option>
                     							<option value="грудня"> грудня </option>
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

                               	<p><label for="sex" class="left">Стать:</label>
                                	<fieldset class="small" style="<?if ($_POST['sex']=="" && isset($_POST['add_abit'])) echo $element_error?>">
                               	 			<p>	<label for="sex" class="small">Чоловіча</label>
                        						<input type="radio" name="sex" id="male" class="inputRadio" value="male" tabindex="280" style="margin-left:1px" <?php if ($_POST['sex']=="male") echo "checked=''";?>/>
                        						<label for="sex" class="small">Жіноча</label>
          										<input type="radio" name="sex" id="female" class="inputRadio" value="female" tabindex="290" style="margin-left:1px" <?php if ($_POST['sex']=="female") echo "checked=''";?>/>
                               				</p>
                               		</fieldset>
                               	</p>

                                <p><label for="ID_code" class="left">Ідентифікаційний номер:</label>
                               		<fieldset class="small">
                               		<p>
                   					<input type="text" name="ID_code" id="ID_code" class="field" value="<?echo $_POST['ID_code']?>" tabindex="330" maxlength="10" style="text-align:center; width:100px; margin-left:20px; margin-bottom:-7px;"/>
                   				    </p>
                   				    </fieldset>
                   				</p>

                   				<p><label for="home_adress" class="left">Домашня адреса:</label>
                               		<fieldset class="small">
                                    	<p><label for="street" class="small" style="padding-left:45px">Вулиця:</label>
                                			<input type="text" name="street" id="street" class="field" value="<?echo $_POST['street']?>" tabindex="340" style="width:235px;"/></p>
                                   		<p>	<label for="build_number" class="small"> Будинок №:</label>
                                   			<input type="text" name="build_number" id="build_number" class="field" value="<?echo $_POST['build_number']?>" tabindex="350" style="width:60px; text-align:center; "/>
                                   			<label for="flat_number" class="small"> Квартира №:</label>
                                   			<input type="text" name="flat_number" id="flat_number" class="field" value="<?echo $_POST['flat_number']?>" tabindex="360" style="width:55px; text-align:center"/></p>
                                   		<p><label for="city" class="small">Місто/село/смт:</label>
                                			<input type="text" name="city" id="city" class="field" value="<?echo $_POST['city']?>" tabindex="370" style="width:203px; <?if ($_POST['city']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                                		<p><label for="district" class="small" style="padding-left:55px">Район:</label>
                                			<input type="text" name="district" id="district" class="field" value="<?echo $_POST['district']?>" tabindex="380" style="width:235px"/></p>
                                		<p><label for="state" class="small" style="padding-left:40px">Область:</label>
                                			<input type="text" name="state" id="state" class="field" value="<?echo $_POST['state']?>" tabindex="390" style="width:235px"/></p>
                                		<p><label for="phone" class="small" >Контактний телефон:</label>
                                			<input type="text" name="phone" id="phone" class="field" value="<?echo $_POST['phone']?>" tabindex="400" style="width:176px; <?if ($_POST['phone']=="" && isset($_POST['add_abit'])) echo $element_error?>"/></p>
                               		</fieldset>
                               	</p>
                                <div id='confirm-dialog'>
                               		<p>
                               			<input type="button" name="confirm" class="button" value="Зберегти" tabindex="600" />
                                        <input type="submit" name="add_abit" id="submit" class="button1" value="Зберегти1" tabindex="700" style="display:none;"/>
                               		</p>
                                </div>
                               	<!-- modal content -->
									<div id='confirm'>
										<div class='header'><span>Підтвердження вводу</span></div>
										<div class='message'></div>
										<div class='buttons'>
											<div class='no simplemodal-close'>Назад</div><div class='yes'>Так</div>
										</div>
									</div>
								<!-- preload the images -->
									<div style='display:none'>
										<img src='img/confirm/header.gif' alt='' />
										<img src='img/confirm/button.gif' alt='' />
									</div>

        						<!-- Load JavaScript files -->
									<script type='text/javascript' src='js/jquery.js'></script>
									<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
									<script type='text/javascript' src='js/confirm.js'></script>
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
								var stc=document.getElementById("stc");
       		                	var zao=document.getElementById("zao");
       		                	var budg=document.getElementById("budg");
       		                	var cont=document.getElementById("cont");
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
										if (result.study_type=='Денна') stc.checked=true;
                                        if (result.study_type=='Заочна') zao.checked=true;
                                        if (result.finans=='Бюджет') _budg.checked=true;
                                        if (result.finans=='Контракт') cont.checked=true;
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

								if (!(/^[АБВГДЕЖЗІЇЙКЛМНОПРСТУФХЦЧШЩЄЮЯабвгдежзиіїйклмнопрстуфхцчшщьєюя`]+\-?\s?[АБВГДЕЖЗІЇЙКЛМНОПРСТУФХЦЧШЩЄЮЯабвгдежзиіїйклмнопрстуфхцчшщьєюя`]*$/.test(s)))
									{
									s.length--;
									return false;
									}
								}

							pasp_serial = document.getElementById("pasp_serial");
                            pasp_serial.onkeyup = function()
       							{
                                var reg = /\d/ //цыфра
								//if (reg.test(dip_serial.value)) dip_serial.value = dip_serial.value.replace(dip_serial.value[dip_serial.value.length-1] , "");
                                //if (reg.test(pasp_serial.value)) pasp_serial.value = pasp_serial.value.replace(pasp_serial.value[pasp_serial.value.length-1] , "");
                                pasp_serial.value = pasp_serial.value.toUpperCase();
                            	}

                            pasp_number = document.getElementById("pasp_number");
                            ID_code = document.getElementById("ID_code");
                            phone = document.getElementById("phone");
                            pasp_number.onkeyup = ID_code.onkeyup = phone.onkeyup = function()
                            	{
                                var reg=/\D/ //не цыфра
								if (reg.test(pasp_number.value)) pasp_number.value = pasp_number.value.replace(pasp_number.value[pasp_number.value.length-1] , "");
                                if (reg.test(ID_code.value)) ID_code.value = ID_code.value.replace(ID_code.value[ID_code.value.length-1] , "");
                                if (reg.test(phone.value)) phone.value = phone.value.replace(phone.value[phone.value.length-1] , "");
                            	}

				    	</script>
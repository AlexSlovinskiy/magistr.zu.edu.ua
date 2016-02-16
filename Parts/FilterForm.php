                        <script type="text/javascript">
            				function resetFilter()
								{								var study_type = document.getElementById("search_study_type");
								var type = document.getElementById("search_type");
								var speciality = document.getElementById("search_speciality");
								var faculty = document.getElementById("search_faculty");
								var specialization = document.getElementById("search_specialization");
								var day = document.getElementById("search_day");
								var month = document.getElementById("search_month");
								var year = document.getElementById("search_year");
								var day_edit = document.getElementById("search_day_edit");
								var month_edit = document.getElementById("search_month_edit");
								var year_edit = document.getElementById("search_year_edit");
								var dip_year = document.getElementById("search_dip_year");
								var dip_type = document.getElementById("search_dip_type");
								var dip_honour = document.getElementById("search_dip_honour");
								var dip_study_type = document.getElementById("search_dip_study_type");
								var dip_finans = document.getElementById("search_dip_finans");
								var finans = document.getElementById("search_finans");
								var benefit = document.getElementById("search_benefit");
								var benefit_list = document.getElementById("search_benefit_list");
								var chornob34 = document.getElementById("search_chornob34");
								var pact = document.getElementById("search_pact");
								var target = document.getElementById("search_target");
								var dip_orig = document.getElementById("search_dip_orig");
								var recommend = document.getElementById("search_recommend");
								var apply = document.getElementById("search_apply");
								var take_away = document.getElementById("search_take_away");
								var cross_enter = document.getElementById("search_cross_enter");
								var location = document.getElementById("search_location");
								var nationality = document.getElementById("search_nationality");
								var sex = document.getElementById("search_sex");
                                var language = document.getElementById("search_language");
                                var institution = document.getElementById("search_institution");
                                var hostel = document.getElementById("search_hostel");

								document.getElementById("search_lastname").value = "";

								if (study_type.options[0].value != "%") study_type.selectedIndex = 1;
                                	else study_type.selectedIndex = 0;

                                if (type.options[0].value != "%") type.selectedIndex = 1;
                                	else type.selectedIndex = 0;

                                if (speciality.options[0].value != "%") speciality.selectedIndex = 1;
                                	else speciality.selectedIndex = 0;

                                if (faculty.options[0].value != "%") faculty.selectedIndex = 1;
                                	else faculty.selectedIndex = 0;

                                if (specialization.options[0].value != "%") specialization.selectedIndex = 1;
                                	else specialization.selectedIndex = 0;

                                if (day.options[0].value != "%") day.selectedIndex = 1;
                                	else day.selectedIndex = 0;

                                if (month.options[0].value != "%") month.selectedIndex = 1;
                                	else month.selectedIndex = 0;

                                if (year.options[0].value != "%") year.selectedIndex = 1;
                                	else year.selectedIndex = 0;

                                if (day_edit.options[0].value != "%") day_edit.selectedIndex = 1;
                                	else day_edit.selectedIndex = 0;

                                if (month_edit.options[0].value != "%") month_edit.selectedIndex = 1;
                                	else month_edit.selectedIndex = 0;

                                if (year_edit.options[0].value != "%") year_edit.selectedIndex = 1;
                                	else year_edit.selectedIndex = 0;

                                if (finans.options[0].value != "%") finans.selectedIndex = 1;
                                	else finans.selectedIndex = 0;

                                if (dip_finans.options[0].value != "%") dip_finans.selectedIndex = 1;
                                	else dip_finans.selectedIndex = 0;

                                if (dip_year.options[0].value != "%") dip_year.selectedIndex = 1;
                                	else dip_year.selectedIndex = 0;

                                if (dip_type.options[0].value != "%") dip_type.selectedIndex = 1;
                                	else dip_type.selectedIndex = 0;

                                if (dip_study_type.options[0].value != "%") dip_study_type.selectedIndex = 1;
                                	else dip_study_type.selectedIndex = 0;

                                if (dip_honour.options[0].value != "%") dip_honour.selectedIndex = 1;
                                	else dip_honour.selectedIndex = 0;

                                if (institution.options[0].value != "%") institution.selectedIndex = 1;
                                	else institution.selectedIndex = 0;

                                if (benefit.options[0].value != "%") benefit.selectedIndex = 1;
                                	else benefit.selectedIndex = 0;

                                if (benefit_list.options[0].value != "%") benefit_list.selectedIndex = 1;
                                	else benefit_list.selectedIndex = 0;

								if (chornob34.options[0].value != "%") chornob34.selectedIndex = 1;
                                	else chornob34.selectedIndex = 0;

                                if (pact.options[0].value != "%") pact.selectedIndex = 1;
                                	else pact.selectedIndex = 0;

    							if (target.options[0].value != "%") target.selectedIndex = 1;
                                	else target.selectedIndex = 0;

           	                    if (dip_orig.options[0].value != "%") dip_orig.selectedIndex = 1;
                                	else dip_orig.selectedIndex = 0;

                                if (recommend.options[0].value != "%") recommend.selectedIndex = 1;
                                	else recommend.selectedIndex = 0;

    							if (apply.options[0].value != "%") apply.selectedIndex = 1;
                                	else apply.selectedIndex = 0;

           						if (cross_enter.options[0].value != "%") cross_enter.selectedIndex = 1;
                                	else cross_enter.selectedIndex = 0;

                                if (take_away.options[0].value != "%") take_away.selectedIndex = 1;
                                	else take_away.selectedIndex = 0;

           						if (location.options[0].value != "%") location.selectedIndex = 1;
                                	else location.selectedIndex = 0;

                                if (nationality.options[0].value != "%") nationality.selectedIndex = 1;
                                	else nationality.selectedIndex = 0;

                                if (sex.options[0].value != "%") sex.selectedIndex = 1;
                                	else sex.selectedIndex = 0;

    							if (language.options[0].value != "%") language.selectedIndex = 1;
                                	else language.selectedIndex = 0;

								if (hostel.options[0].value != "%") hostel.selectedIndex = 1;
                                	else hostel.selectedIndex = 0;
    							}


							search_lastname = document.getElementById("search_lastname");
							search_lastname.onkeyup = function()
								{
								search_lastname.value = search_lastname.value.toLowerCase();
								search_lastname.value = search_lastname.value.replace(search_lastname.value[0] , search_lastname.value[0].toUpperCase());
								}
            			</script>
                        	<ul>
            					<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">Фільтри: </span>
            					</li>
            				</ul>
                        <div class="filterform">
                        	<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
                         		<p><label for="search_lastname" class="left">Прізвище:</label>
                   					<input type="text" name="search_lastname" id="search_lastname" class="field" value="<?if ($_SESSION['search_lastname']!="%") echo stripslashes($_SESSION['search_lastname']);?>" tabindex="10" style="width:169px"/>
                   					<label for="search_study_type" class="left">Форма навчання:</label>
                   					<select name="search_study_type" id="search_study_type" class="combo" tabindex="20" style="width:120px">
                   						<option value="<?echo $_SESSION['search_study_type']?>"> <?if ($_SESSION['search_study_type']!="%") echo $_SESSION['search_study_type']; else echo "..."?> </option>
                     					<?if ($_SESSION['search_study_type']!="%") echo '<option value=""> ... </option>';?>
                     					<option value="Денна"> Денна </option>
                                        <option value="Заочна"> Заочна </option>
                          			</select>
                          			<input type="button" value="Очистити фільтри" class="button" tabindex="300" onClick="resetFilter()"/>
                          		</p>
                          		<p>
                          			<label for="search_date" class="left">Дата подання: </label>
                          			<select name="search_day" id="search_day" class="combo" tabindex="40" style="width:55px;">
                                		<option value="<?echo $_SESSION['search_day']?>"> <?if ($_SESSION['search_day']!="%") echo $_SESSION['search_day']; else echo "..."?> </option>
                     					<?
                     					if ($_SESSION['search_day']!="%") echo '<option value=""> ... </option>';
                                		for($i=1; $i<=31; $i++)
                     						if ($i<10) echo '<option value="0'.$i.'"> 0'.$i.' </option>';
                     							else echo '<option value="'.$i.'"> '.$i.' </option>';
                     					?>
                     				</select>
                     					/
                     				<select name="search_month" id="search_month" class="combo" tabindex="50" style="width:92px; margin-left:2px;">
										<option value="<?echo $_SESSION['search_month']?>"> <?if ($_SESSION['search_month']!="%") echo $_SESSION['search_month']; else echo "..."?> </option>
                     					<?
                     					if ($_SESSION['search_month']!="%") echo '<option value=""> ... </option>';
                                		?>
										<option value="липня"> липня </option>
										<option value="серпня"> серпня </option>
										<option value="вересня"> вересня </option>
                     				</select>
                     					/
                                	<select name="search_year" id="search_year" class="combo" tabindex="60" style="width:80px; margin-left:2px;">
                                    	<option value="<?echo $_SESSION['search_year']?>"> <?if ($_SESSION['search_year']!="%") echo $_SESSION['search_year']; else echo "..."?> </option>
                     					<?
                     					if ($_SESSION['search_year']!="%") echo '<option value=""> ... </option>';
                                		?>
                                    	<option value="<? echo date('Y')?>"> <?echo date("Y"); ?> </option>
                                    	<option value="<? echo date('Y')-1?>"> <?echo date("Y")-1; ?> </option>
                     				</select>

                     				<label for="search_type" class="left">ОКР:</label>
                            		<select name="search_type" id="search_type" class="combo" tabindex="20" style="width:100px">
                   						<option value="<?echo $_SESSION['search_type']?>"> <?if ($_SESSION['search_type']!="%") echo $_SESSION['search_type']; else echo "..."?> </option>
                     					<?
                     					if ($_SESSION['search_type']!="%") echo '<option value=""> ... </option>';
                                		?>
                   						<option value="Магістр"> Магістр </option>
                                        <option value="Спеціаліст"> Спеціаліст </option>
                          			</select>
                          			<input type="submit" name="search" id="search" class="button" value="Пошук" tabindex="310" />
								</p>
								<p>
                          			<label for="search_date_edit" class="left">Дата останнього редагування: </label>
                          			<select name="search_day_edit" id="search_day_edit" class="combo" tabindex="40" style="width:55px;">
                                		<option value="<?echo $_SESSION['search_day_edit']?>"> <?if ($_SESSION['search_day_edit']!="%") echo $_SESSION['search_day_edit']; else echo "..."?> </option>
                     					<?
                     					if ($_SESSION['search_day_edit']!="%") echo '<option value=""> ... </option>';
                                		for($i=1; $i<=31; $i++)
                     						if ($i<10) echo '<option value="0'.$i.'"> 0'.$i.' </option>';
                     							else echo '<option value="'.$i.'"> '.$i.' </option>';
                     					?>
                     				</select>
                     					/
                     				<select name="search_month_edit" id="search_month_edit" class="combo" tabindex="50" style="width:92px; margin-left:2px;">
										<option value="<?echo $_SESSION['search_month_edit']?>"> <?if ($_SESSION['search_month_edit']!="%") echo $_SESSION['search_month_edit']; else echo "..."?> </option>
                     					<?
                     					if ($_SESSION['search_month_edit']!="%") echo '<option value=""> ... </option>';
                                		?>
										<option value="липня"> липня </option>
										<option value="серпня"> серпня </option>
										<option value="вересня"> вересня </option>
                     				</select>
                     					/
                                	<select name="search_year_edit" id="search_year_edit" class="combo" tabindex="60" style="width:80px; margin-left:2px;">
                                    	<option value="<?echo $_SESSION['search_year_edit']?>"> <?if ($_SESSION['search_year_edit']!="%") echo $_SESSION['search_year_edit']; else echo "..."?> </option>
                     					<?
                     					if ($_SESSION['search_year_edit']!="%") echo '<option value=""> ... </option>';
                                		?>
                                    	<option value="<? echo date('Y')?>"> <?echo date("Y"); ?> </option>
                                    	<option value="<? echo date('Y')-1?>"> <?echo date("Y")-1; ?> </option>
                     				</select>
                     			</p>
                   				<p><label for="search_faculty" class="left" style="margin-left:57px">Факультет:</label>
                   					<select name="search_faculty" id="search_faculty" class="combo" tabindex="30" style="width:377px">
                     					<option value="<?echo $_SESSION['search_faculty']?>"> <?if ($_SESSION['search_faculty']!="%") echo $_SESSION['search_faculty']; else echo "..."?> </option>
                     					<?if ($_SESSION['search_faculty']!="%") echo '<option value=""> ... </option>';?>
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
                     			<p><label for="search_speciality" class="left">Спеціальність:</label>
                   					<select name="search_speciality" id="search_speciality" class="combo" tabindex="30" style="width:377px">
                   						<option value="<?echo $_SESSION['search_speciality']?>"> <?if ($_SESSION['search_speciality']!="%") echo $_SESSION['search_speciality']; else echo "..."?> </option>
                     					<?if ($_SESSION['search_speciality']!="%") echo '<option value=""> ... </option>';?>
                     					<?php
                     					$query = "SELECT `speciality_name` FROM `specialities`";
                     					if ($_SESSION['status']=="user") $query=$query."WHERE `operator_stc` = '".$_SESSION['user_id']."' OR `operator_zao` = '".$_SESSION['user_id']."'";
                     					$query=$query."ORDER BY `speciality_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
   													echo '<option value="'.$row['speciality_name'].'">'.$row['speciality_name'].'</option>';
   													}
   										?>
                     				</select>
                                </p>
								<p> <label for="additional" class="left">Додаткові фільтри:</label>
									<input type="checkbox" name="additional" id="additional" class="checkbox" tabindex="40" size="1" value="+" <?if ($_SESSION["additional_search"]=="+") echo 'checked="checked"'?> onClick="showAdditional()"/></p>
                                		<div id="add_block" <?php if ($_SESSION["additional_search"]=="+") echo 'style="display:block"'; else echo 'style="display:none"'?>>

											<p><label for="search_specialization" class="left" style="margin-right:10px;">Спеціалізація:</label>
                   								<select name="search_specialization" id="search_specialization" class="combo" tabindex="30" style="width:545px">
                   									<option value="<?echo $_SESSION['search_specialization']?>"> <?if ($_SESSION['search_specialization']!="%") echo $_SESSION['search_specialization']; else echo "..."?> </option>
                     								<?if ($_SESSION['search_specialization']!="%") echo '<option value=""> ... </option>';?>
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

                                        	<p>
                                            	<label for="search_dip_year" class="left">Рік видачі диплома:</label>
                   								<select name="search_dip_year" id="search_dip_year" class="combo" tabindex="20" style="width:85px">
                   									<option value="<?echo $_SESSION['search_dip_year']?>"> <?if ($_SESSION['search_dip_year']!="%") echo $_SESSION['search_dip_year']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_dip_year']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="<?echo date("Y");?>"> <?echo date("Y");?> </option>
                                        			<option value="<?echo date("Y")-1;?>"> <?echo date("Y")-1;?> </option>
                                        			<option value="<?echo 'до ';echo date("Y")-1;?>"> <?echo 'до '; echo date("Y")-1;?> </option>
                          						</select>
                          						<label for="search_dip_type" class="left">Тип диплома:</label>
                   								<select name="search_dip_type" id="search_dip_type" class="combo" tabindex="20" style="width:100px">
                   									<option value="<?echo $_SESSION['search_dip_type']?>"> <?if ($_SESSION['search_dip_type']!="%") echo $_SESSION['search_dip_type']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_dip_type']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Бакалавр"> Бакалавр </option>
                                        			<option value="Спеціаліст"> Спеціаліст </option>
                                        			<option value="Магістр"> Магістр </option>
                          						</select>
                          						<label for="search_dip_honour" class="left" >Відзнака:</label>
                   								<select name="search_dip_honour" id="search_dip_honour" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_dip_honour']?>"> <?if ($_SESSION['search_dip_honour']!="%") echo $_SESSION['search_dip_honour']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_dip_honour']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                          					</p>
                          					<p>
                          						<label for="search_dip_study_type" class="left" >Диплом, форма навчання:</label>
                   								<select name="search_dip_study_type" id="search_dip_study_type" class="combo" tabindex="20" style="width:80px">
                   									<option value="<?echo $_SESSION['search_dip_study_type']?>"> <?if ($_SESSION['search_dip_study_type']!="%") echo $_SESSION['search_dip_study_type']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_dip_study_type']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Денна"> Денна </option>
                                        			<option value="Заочна"> Заочна </option>
                          						</select>
                          						<label for="search_dip_finans" class="left">Диплом, фінансування:</label>
                   								<select name="search_dip_finans" id="search_dip_finans" class="combo" tabindex="20" style="width:155px">
                   									<option value="<?echo $_SESSION['search_dip_finans']?>"> <?if ($_SESSION['search_dip_finans']!="%") echo $_SESSION['search_dip_finans']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_dip_finans']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="З бюджету"> З бюджету </option>
                                        			<option value="За кошти фіз. осіб"> За кошти фіз. осіб </option>
                          						</select>
                          					</p>
                          					<p>

                          						<label for="search_institution" class="left" >ВНЗ, що закінчив:</label>
                   								<select name="search_institution" id="search_institution" class="combo" tabindex="20" style="width:80px">
                   									<option value="<?echo $_SESSION['search_institution']?>"> <?if ($_SESSION['search_institution']!="%") echo $_SESSION['search_institution']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_institution']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="ЖДУ"> ЖДУ </option>
                                        			<option value="інший"> інший </option>
                          						</select>
                          						<label for="search_language" class="left" >Іноземна мова, яку вивчав:</label>
                   								<select name="search_language" id="search_language" class="combo" tabindex="20" style="width:120px">
                   									<option value="<?echo $_SESSION['search_language']?>"> <?if ($_SESSION['search_language']!="%") echo $_SESSION['search_language']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_language']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Англійська"> Англійська </option>
                     								<option value="Німецька"> Німецька </option>
                     								<option value="Французька"> Французька </option>
                     								<option value="Іспанська"> Іспанська </option>
                     							</select>

                          					</p>
                          					<p>
                                            	<label for="search_nationality" class="left">Громадянство:</label>
                   								<select name="search_nationality" id="search_nationality" class="combo" tabindex="20" style="width:150px">
                   									<option value="<?echo $_SESSION['search_nationality']?>"> <?if ($_SESSION['search_nationality']!="%") echo $_SESSION['search_nationality']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_nationality']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Україна"> Україна </option>
                                        			<option value="Іноземець"> Іноземець </option>
                                        			<option value="Без громадянства"> Без громадянства </option>
                          						</select>
                                            	<label for="search_location" class="left">Місцевість проживання:</label>
                   								<select name="search_location" id="search_location" class="combo" tabindex="20" style="width:93px">
                   									<option value="<?echo $_SESSION['search_location']?>"> <?if ($_SESSION['search_location']!="%") echo $_SESSION['search_location']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_location']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Житомир"> Житомир </option>
                                        			<option value="Місто"> Місто </option>
                                        			<option value="Село"> Село </option>
                          						</select>

                          					</p>

                          					<p>
                          						<label for="search_sex" class="left">Стать:</label>
                   								<select name="search_sex" id="search_sex" class="combo" tabindex="20" style="width:100px">
                   									<option value="<?echo $_SESSION['search_sex']?>"> <?if ($_SESSION['search_sex']!="%") echo $_SESSION['search_sex']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_sex']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Чоловіча"> Чоловіча </option>
                                        			<option value="Жіноча"> Жіноча </option>
                          						</select>
                          						<label for="search_hostel" class="left">Потребує гуртожиток:</label>
                   								<select name="search_hostel" id="search_hostel" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_hostel']?>"> <?if ($_SESSION['search_hostel']!="%") echo $_SESSION['search_hostel']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_hostel']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                          					</p>
                                            <p>
                          						<label for="search_dip_orig" class="left">Подав оригінали документів:</label>
                   								<select name="search_dip_orig" id="search_dip_orig" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_dip_orig']?>"> <?if ($_SESSION['search_dip_orig']!="%") echo $_SESSION['search_dip_orig']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_dip_orig']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                          						<label for="search_take_away" class="left" style="margin-left:27px;">Забрав документи:</label>
                   								<select name="search_take_away" id="search_take_away" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_take_away']?>"> <?if ($_SESSION['search_take_away']!="%") echo $_SESSION['search_take_away']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_take_away']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                          					</p>

                                        	<p>
                                            	<label for="search_finans" class="left">Фінансування:</label>
                   								<select name="search_finans" id="search_finans" class="combo" tabindex="20" style="width:150px">
                   									<option value="<?echo $_SESSION['search_finans']?>"> <?if ($_SESSION['search_finans']!="%") echo $_SESSION['search_finans']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_finans']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="З бюджету"> З бюджету </option>
                                        			<option value="За кошти фіз. осіб"> За кошти фіз. осіб </option>
                          						</select>
                                                <label for="search_pact" class="left" style="margin-left:47px;">Уклав угоду/договір:</label>
                   								<select name="search_pact" id="search_pact" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_pact']?>"> <?if ($_SESSION['search_pact']!="%") echo $_SESSION['search_pact']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_pact']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                          					</p>
                          					<div style="display:none">
                          					<p>

                          						<label for="search_target" class="left">Цільове направлення:</label>
                   								<select name="search_target" id="search_target" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_target']?>"> <?if ($_SESSION['search_target']!="%") echo $_SESSION['search_target']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_target']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                          					</p>
                          					</div>

                          					<p>
                          						<label for="search_recommend" class="left">Рекомендовано до зарахування:</label>
                   								<select name="search_recommend" id="search_recommend" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_recommend']?>"> <?if ($_SESSION['search_recommend']!="%") echo $_SESSION['search_recommend']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_recommend']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                                                <label for="search_apply" class="left">Зараховано:</label>
                   								<select name="search_apply" id="search_apply" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_apply']?>"> <?if ($_SESSION['search_apply']!="%") echo $_SESSION['search_apply']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_apply']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
											</p>
                          					<p>
                          						<label for="search_benefit" class="left">Позаконкурсом:</label>
                   								<select name="search_benefit" id="search_benefit" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_benefit']?>"> <?if ($_SESSION['search_benefit']!="%") echo $_SESSION['search_benefit']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_benefit']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                                            	<label for="search_benefit_list" class="left">Пільги:</label>
                   								<select name="search_benefit_list" id="search_benefit_list" class="combo" tabindex="20" style="width:265px">
                   									<option value="<?echo $_SESSION['search_benefit_list']?>"> <?if ($_SESSION['search_benefit_list']!="%") echo $_SESSION['search_benefit_list']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_benefit_list']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Інваліди I і II групи"> Інваліди I і II групи </option>
                                        			<option value="Особи з числа дітей сиріт"> Особи з числа дітей сиріт </option>
                                        			<option value="Чорнобильці I-II категорії"> Чорнобильці I-II категорії </option>
                                        			<option value="Іноземці (міжнародний обмін)"> Іноземці (міжнародний обмін) </option>
                                        			<option value="Ветерани війни"> Ветерани війни </option>
                                        			<option value="Престиж шахтарської праці"> Престиж шахтарської праці </option>
                                        			<option value="Діти загиблих військових"> Діти загиблих військових </option>
                                        			<option value="Сім'я заглиблих на шахті ім. Засядка"> Сім'я заглиблих на шахті ім. Засядка </option>
                          						</select>
                          					</p>
                          					<p>
                          					   	<label for="search_chornob34" class="left">Чорнобильці ІІІ-IV категорії:</label>
                   								<select name="search_chornob34" id="search_chornob34" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_chornob34']?>"> <?if ($_SESSION['search_chornob34']!="%") echo $_SESSION['search_chornob34']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_chornob34']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                                                <label for="search_cross_enter" class="left">Перехресний вступ:</label>
                   								<select name="search_cross_enter" id="search_cross_enter" class="combo" tabindex="20" style="width:55px">
                   									<option value="<?echo $_SESSION['search_cross_enter']?>"> <?if ($_SESSION['search_cross_enter']!="%") echo $_SESSION['search_cross_enter']; else echo "..."?> </option>
                   									<?if ($_SESSION['search_cross_enter']!="%") echo '<option value=""> ... </option>';?>
                     								<option value="Так"> Так </option>
                                        			<option value="Ні"> Ні </option>
                          						</select>
                          					</p>
                                		</div>
								</p>
							</form>
            			</div>

					<script type="text/javascript">
					search_lastname = document.getElementById("search_lastname");
							search_lastname.onkeyup = function()
								{
								search_lastname.value = search_lastname.value.toLowerCase();
								search_lastname.value = search_lastname.value.replace(search_lastname.value[0] , search_lastname.value[0].toUpperCase());
								}
					</script>
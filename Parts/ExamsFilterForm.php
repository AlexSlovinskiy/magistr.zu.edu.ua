                        <script type="text/javascript">
            				function resetFilter()
								{								var study_type = document.getElementById("search_study_type");
								var speciality = document.getElementById("search_speciality");
								document.getElementById("search_lastname").value = "";

								if (study_type.options[0].value != "%") study_type.selectedIndex = 1;
                                	else study_type.selectedIndex = 0;

                                if (speciality.options[0].value != "%") speciality.selectedIndex = 1;
                                	else speciality.selectedIndex = 0;
    							}
            			</script>

						<?php
						if ($_SESSION["status"]=="admin")
						echo'
						<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;"><a href="ExamsForeignLangAmount.php">Розподіл за іноземною мовою (магістратура)</a></span>
            				</li>
            			</ul>';
            			?>
            			<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Результати вcтупних іспитів / Рекомендовані до зарахування: </span>
            				</li>
            			</ul>

                        <div class="filterform">
                        	<form method="post" action="ExamsResult.php">
                        		<p>
                                	<label for="search_study_type" class="left">Форма навчання:</label>
                            		<select name="search_study_type" id="search_study_type" class="combo" tabindex="10" style="width:100px">
                   						<option value="Денна"> Денна </option>
                                        <option value="Заочна"> Заочна </option>
                          			</select>

                                </p>
                         		<p><label for="search_speciality" class="left" style="margin-left:47px;">Спеціальність:</label>
                   					<select name="search_speciality" id="search_speciality" class="combo" tabindex="20">
                   						<option value=""> ... </option>
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
                                <p>
									<input type="submit" name="ExamsResult" class="button" value="Результати" tabindex="30" style="margin-left:180px;"/>
									<input type="submit" name="ExamsRating" class="button" value="Рейтингові списки" tabindex="40" style="margin-left:10px;"/>
									<input type="submit" name="ExamsRecomend" class="button" value="Рекомендовані" tabindex="50" style="margin-left:10px;"/>
								</p>
        						<p>
									<input type="submit" name="ExamsRecomendEx" class="button" value="Розширений список рекомендованих" tabindex="60" style="margin-left:180px; width:330px;"/>
								</p>
								<?php
								if ($_SESSION["status"]=="admin")
									echo'<p>
									<input type="submit" name="ExamsRecomendAuto" class="button" value="Автоматичний список рекомендованих" tabindex="65" style="margin-left:180px; width:330px;"/>
									</p>';
								?>
							</form>
            			</div>

            			<ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Екзаменаційна відомість / Списки груп: </span>
            				</li>
            			</ul>

                        <div class="filterform">
                        	<form method="post" action="ExamsBlank.php">
                        		<p>
                                	<label for="search_study_type" class="left">Форма навчання:</label>
                            		<select name="search_study_type" id="search_study_type" class="combo" tabindex="70" style="width:100px">
                   						<option value="Денна"> Денна </option>
                                        <option value="Заочна"> Заочна </option>
                          			</select>
                          			<label for="search_language" class="left" >Іноземна мова:</label>
                          			<select name="search_language" id="search_language" class="combo" tabindex="80" style="width:117px">
                   						<option value=""> ... </option>
                   						<option value="Англійська"> Англійська </option>
                     					<option value="Німецька"> Німецька </option>
                     					<option value="Французька"> Французька </option>
                     					<option value="Іспанська"> Іспанська </option>
                     				</select>

                                </p>
                         		<p><label for="search_speciality" class="left" style="margin-left:47px;">Спеціальність:</label>
                   					<select name="search_speciality" id="search_speciality" class="combo" tabindex="90">
                   						<option value=""> ... </option>
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
                                <p>
									<input type="submit" name="ExamsBlank" class="button" value="Відомість" tabindex="100" style="margin-left:180px;"/>
									<input type="submit" name="ExamsList" class="button" value="Список" tabindex="110" style="margin-left:10px;"/>
								</p>
							</form>
            			</div>
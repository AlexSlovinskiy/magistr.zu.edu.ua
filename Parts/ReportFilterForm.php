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


                        <ul>
            				<li style="display:inline;">
            				<span style="color:rgb(80,80,80); font-weight:bold;">Журнал реєстрації: </span>
            				</li>
            			</ul>

                        <div class="filterform">
                        	<form method="post" action="Registration.php">
                        		<p>
                                	<label for="search_study_type" class="left">Форма навчання:</label>
                            		<select name="search_study_type" id="search_study_type" class="combo" tabindex="100" style="width:100px">
                   						<option value="Денна"> Денна </option>
                                        <option value="Заочна"> Заочна </option>
                          			</select>

                                </p>
                         		<p><label for="search_speciality" class="left" style="margin-left:47px;">Спеціальність:</label>
                   					<select name="search_speciality" id="search_speciality" class="combo" tabindex="110">
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
                          			<label for="dip_date" class="left" style="margin-left:136px;">За: </label>
                          			<select name="day" id="day" class="combo" tabindex="120" style="width:55px;">
                                		<?
                     					for($i=1; $i<=31; $i++)
                     						{
                     						if ($i<10)
                     							{
                     							if (date('d')=="0".$i) echo '<option selected value="0'.$i.'"> 0'.$i.' </option>';
                     								else  echo '<option value="0'.$i.'"> 0'.$i.' </option>';
                     							}
                     							else
                     								{
                     								if (date('d')==$i) echo '<option selected value="'.$i.'"> '.$i.' </option>';
                     									else echo '<option value="'.$i.'"> '.$i.' </option>';
                     								}
                     						}
                     					?>
                     				</select>
                     					/
                     				<select name="month" id="month" class="combo" tabindex="130" style="width:100px; margin-left:2px;">
										<option value="липня"> липня </option>
                     					<option value="серпня"> серпня </option>
                     					<option value="вересня"> вересня </option>
                     				</select>
                     					/
                                	<select name="year" id="year" class="combo" tabindex="140" style="width:80px; margin-left:2px;">
                                    	<option value="<? echo date('Y')?>"> <?echo date("Y"); ?> </option>
                                    	<option value="<? echo date('Y')-1?>"> <?echo date("Y")-1; ?> </option>
                     				</select>
                                </p>
								<p>
									<label for="all_date" class="left" style="margin-left:43px;">За весь період: </label>
                                	<input type="checkbox" name="all_date" id="all_date" class="checkbox" tabindex="520" size="1" value="+"/>
                                </p>
								<p>
									<input type="submit" name="Registration" class="button" value="ОК" tabindex="10" style="margin-left:180px;"/>
								</p>
							</form>
            			</div>

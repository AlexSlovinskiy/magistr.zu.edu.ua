                            <div style="overflow:auto">
								<table id="TSpecialities">
            						<tr>
            							<th class="top" scope="col">� <br />�\�</th>
            							<th class="top" scope="col">������������</th>
            							<th class="top" scope="col">˳�. �����<br />����. ����<br />����� ����<br />�����/������</th>
            							<th class="top" scope="col" width="120px">���� ��������� ��������<br />(dd.mm.yyyy)<br />�����/������</th>
            							<th class="top" scope="col">������� ��������, ���.<br />�����/������</th>
            							<th class="top" scope="col">������� ��������� <br />�����/������</th>
            							<th class="top" scope="col"></th>
            						</tr>
            						<?php
                                    	$query = "SELECT * FROM `specialities` ORDER BY `speciality_name`";
   											$sql = mysql_query($query) or die(mysql_error());
                                    		$i=1;
                                    		if (mysql_num_rows($sql)>0)
   												while ($row = mysql_fetch_assoc($sql))
   													{
                                                    if ($i%2 == 0) $coloredRow="coloredRow";
				                 					else $coloredRow="";
				                 					$id=$row["speciality_id"];
				                 					$day_stc=date("d", $row["ending_date_stc"]);
				                 					$month_stc=date("m", $row["ending_date_stc"]);
				                 					$year_stc=date("Y", $row["ending_date_stc"]);
				                 					$day_zao=date("d", $row["ending_date_zao"]);
				                 					$month_zao=date("m", $row["ending_date_zao"]);
				                 					$year_zao=date("Y", $row["ending_date_zao"]);
                 									echo"
                 										<form method='post' action='".$_SERVER['SCRIPT_NAME']."'>
            											<tr class='".$coloredRow."'>
            												<td><strong>".$i."</strong></td>
            												<td width='220px' style='text-align:left;'>
            													<input name='spc_id' type='hidden' value='".$row["speciality_id"]."'>
            													<input name='spc_name' type='hidden' value='".$row["speciality_name"]."'>
            													<a href='AdminSpaceSpec.php?act=edit'>".$row["speciality_name"]."</a>
            												</td>
            												<td>
            													<input name='lic_stc' id='lic_stc".$id."' type='text' value='".$row["lic_stc"]."' style='width:30px; margin-top:1px;' maxlength='3'><strong>/</strong><input name='lic_zao' id='lic_zao".$id."' type='text' value='".$row["lic_zao"]."' style='width:30px;' maxlength='3'>
            													<input name='budg_stc' id='budg_stc".$id."' type='text' value='".$row["budg_stc"]."' style='width:30px; margin-top:1px;' maxlength='3'><strong>/</strong><input name='budg_zao' id='budg_zao".$id."' type='text' value='".$row["budg_zao"]."' style='width:30px;' maxlength='3'>
            													<input name='quota_stc' id='quota_stc".$id."' type='text' value='".$row["quota_stc"]."' style='width:30px; margin-top:1px;' maxlength='3'><strong>/</strong><input name='quota_zao' id='quota_zao".$id."' type='text' value='".$row["quota_zao"]."' style='width:30px;' maxlength='3'>
            												</td>
            												<td>
                                                            	<input name='day_stc' id='day_stc".$id."' type='text' value='".$day_stc."' style='width:25px; margin-top:1px;' maxlength='2'><strong>.</strong><input name='month_stc' id='month_stc".$id."' type='text' value='".$month_stc."' style='width:25px; margin-top:1px;' maxlength='2'><strong>.</strong><input name='year_stc' id='year_stc".$id."' type='text' value='".$year_stc."' style='width:40px; margin-top:1px;' maxlength='4'>
																<input name='day_zao' id='day_zao".$id."' type='text' value='".$day_zao."' style='width:25px; margin-top:1px;' maxlength='2'><strong>.</strong><input name='month_zao' id='month_zao".$id."' type='text' value='".$month_zao."' style='width:25px; margin-top:1px;' maxlength='2'><strong>.</strong><input name='year_stc' id='year_zao".$id."' type='text' value='".$year_zao."' style='width:40px; margin-top:1px;' maxlength='4'>
															</td>
            												<td style='width:165px;'>
            													<input name='price_stc' id='price_stc".$id."' type='text' value='".$row["price_stc"]."' style='width:45px;' maxlength='5'><strong>/</strong><input name='price_zao' id='price_zao".$id."' type='text' value='".$row["price_zao"]."' style='width:45px;' maxlength='5'>
            												    <input type='checkbox' id='prices".$id."' name='prices' class='checkbox' size='1' value='+' onClick='showPrices(".$id.")'/>
                                                                <div id='prices_block".$id."' style='display:none;'>
                                                                	<input name='price_stc_p' id='price_stc_p".$id."' type='text' value='".$row["price_stc_p"]."' style='width:160px; margin-top:1px;'>
                                                                	<input name='price_zao_p' id='price_zao_p".$id."' type='text' value='".$row["price_zao_p"]."' style='width:160px; margin-top:1px;'>

            												    <div>
            												</td>
															<td>";
															// ������ ������ � �� � ���� ���� ������������ ������ ����� ROOT
   																	$query1 = "SELECT * FROM `users` WHERE `login`!='root' AND `login`!='Admin' AND `user_id`!='".$row["operator"]."' ORDER BY `user_surname`";
												   					$sql1 = mysql_query($query1) or die(mysql_error());
   																	if (mysql_num_rows($sql1)>0)
   																		{
   																		//������� ���������� ������  ������������ �������������
																		$list_of_users='<select name="operator_stc" id="operator_stc'.$id.'" class="combo" style="width:150px;margin-bottom:2px;">';
																		$list_of_users1='<select name="operator_zao" id="operator_zao'.$id.'" class="combo" style="width:150px;margin-bottom:2px;">';
																		//������ � ������ ������ ������ ���������
																		$query2 = "SELECT * FROM `users` WHERE `user_id`='".$row["operator_stc"]."' LIMIT 1";
												   						$sql2 = mysql_query($query2) or die(mysql_error());
												   						$row2 = mysql_fetch_assoc($sql2);
												   						$list_of_users=$list_of_users.'<option value="'.$row2["user_id"].'">'.$row2["user_surname"].' '.substr($row2["user_name"],0,1).'. '.substr($row2["user_patronymic"],0,1).'.</option>
                     													<option value="...">...</option>';
																		$query2 = "SELECT * FROM `users` WHERE `user_id`='".$row["operator_zao"]."' LIMIT 1";
												   						$sql2 = mysql_query($query2) or die(mysql_error());
												   						$row2 = mysql_fetch_assoc($sql2);
																		$list_of_users1=$list_of_users1.'<option value="'.$row2["user_id"].'">'.$row2["user_surname"].' '.substr($row2["user_name"],0,1).'. '.substr($row2["user_patronymic"],0,1).'.</option>
                     													<option value="...">...</option>';
   																		while ($row1 = mysql_fetch_assoc($sql1))
   																			{
        																	$list_of_users=$list_of_users."<option value=".$row1["user_id"].">".$row1["user_surname"]." ".substr($row1["user_name"],0,1).". ".substr($row1["user_patronymic"],0,1).".</option>";
            																$list_of_users1=$list_of_users1."<option value=".$row1["user_id"].">".$row1["user_surname"]." ".substr($row1["user_name"],0,1).". ".substr($row1["user_patronymic"],0,1).".</option>";
            																}
    																	$list_of_users=$list_of_users."</select>";
																		$list_of_users1=$list_of_users1."</select>";
   																		}
															echo $list_of_users."<br />".$list_of_users1."</td>
			                                                <td><input type='button' name='save' class='button' value='' onClick='SaveSpc(".$row["speciality_id"].")' ></td>
            											</tr>
            											</form>";
            										$i++;
   													}
            						?>
	            				</table>

							<script type="text/javascript">
							//��������� ��� ��������� ����� �� ���
							//highlightTableRows("TSpecialities","hoverRow");
							highlightSpeciality("TSpecialities","hoverRow","clickedRow",false);
							function showPrices(price_id)
								{
                                if (document.getElementById("prices"+price_id).checked)
        							document.getElementById("prices_block"+price_id).style.display = "block";
       							else
									document.getElementById("prices_block"+price_id).style.display = "none";
								}
							</script>
							</div>



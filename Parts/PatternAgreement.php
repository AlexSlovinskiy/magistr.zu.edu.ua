	<table align=center width="900px" class="examsblank1" cellspacing=0 cellpadding=0 border=0>

			<tr style="font-family:times;font-size:20px;">
				<td style="border:none; padding-top:20px;" align=center><strong>�����</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px; padding-top:15px;">
				<td style="border:none; " align=center>��� ��������� �������� � ����� ������ <br />�. �������</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:35px 0 0 50px;" align=left> �____________
					<span style="padding-left:520px;">
						<?php
							echo '&laquo;<span style="text-decoration:underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&raquo;';
							echo '&nbsp;&nbsp;<span style="text-decoration:underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;';
							echo '&nbsp;<span style="text-decoration:underline">&nbsp;20&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;�.';
						?>
					</span>
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;text-align:justify;">
				<td style="border:none;padding:50px 0 0 50px; " align=left>
					������������ ��������� ���������� ���� ����� ������ ̳��������� ����� � ����� ������, � ���� �������
				</td>
				</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>
				    ����� ����� ��������
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:15px 0 0 0" align=left>
                	�� �������: <u><?php echo "&nbsp;&nbsp;<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>&nbsp;&nbsp;";?></u>
				</td>
			</tr>
           <tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>
					���������/��������, ����&nbsp; <u><b>
						<?php echo "&nbsp;".$row['faculty'].", &nbsp;";
							$kourse=substr($row['speciality'],0,1)-2;
							echo $kourse."-� ����;&nbsp;";
						?></b></u>&nbsp;<br />
					�������-�������������� �����&nbsp; <u><b>
						<?php
							if ($row["type"]=="spc") $okr="���������";
							if ($row["type"]=="mag") $okr="������";
							echo "&nbsp;".$okr;
						?>;</b></u><br />
				    ������ �����&nbsp; <u><b><?php echo $trainings[substr($row['training'],0,4)]; ?>;</b></u><br />
				    c�����������&nbsp; <u><b><?php echo $row['speciality']; ?>,</b></u>&nbsp;&nbsp;������ �� �����.
				</td>
			</tr>

            <tr style="font-family:times;font-size:17px;">
				<td style="border:none; text-align:justify; padding:30px 0 0 50px" >
                 	<b>����� ���������� ������ �����'������� �����������:</b>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- ����� ���������� � ��������� ��������� ������� � ����� ������ ����� � ����������� �������
                 	�� ���������� � �������� �������������� ������������� �������;
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- ���� ��������� �������� �� ��������� �������� ����������� ����� ����������������
                 	� ���������� ������ ��������� ������������, �� �� �����'������ ����������� �� ����� ����� ����.
                </td>
            </tr>
            <tr style="font-family:times;font-size:17px;">
				<td style="border:none; text-align:justify; padding:30px 0 0 50px" >
                 	<b>������� �����'�������:</b>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:3px 0 0 0" >
                 	- ��������   ����  ������   ���������  ��������,
                 	������������� ��������� �������������� ��������������� ������� �� ������� �����
                    &nbsp; <u><b><?php echo $trainings[substr($row['training'],0,4)]; ?>,</b></u>
                    &nbsp;&nbsp;c�����������&nbsp; <u><b><?php echo $row['speciality']; ?>.</b></u>&nbsp;&nbsp;

                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:3px 0 0 0" >
                 	- ������� ���� ��������� ������ ����������� ������� �� ���� ����������� � ����������� �� ����� ����� ����;
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- � ��� ������ ����� �� ������������ ����������� �� ���������� ������� ������� �������� � ������������� �������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:17px;">
				<td style="border:none; text-align:justify; padding:30px 0 0 50px" >
                 	<b>���� ���������:</b>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- ���� �� ���������� �� ���� ����� ��������� ������ ��������� ���������� ����;
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- �� ����� ������������ �� ������ ����� (������������ ����������);
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                	- �� �����, �� ������ �������� �� ���������, ���������� � �������� �������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:20px 0 0 50px" >
                 	����� ������ ������� � ������� ��������� � 䳺 ��
                 		<u><b>&nbsp;
                 		<?php
                 			if ($row['study_type']=="�����")
								$query2 = "SELECT `ending_date_stc` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
							if ($row['study_type']=="������")
								$query2 = "SELECT `ending_date_zao` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
							$sql2 = mysql_query($query2) or die(mysql_error());
							if (mysql_num_rows($sql2)>0) $row2 = mysql_fetch_assoc($sql2);

       						if ($row['study_type']=="�����")
       							echo date("d",$row2['ending_date_stc'])." ".$months[date("m",$row2['ending_date_stc'])]." ".date("Y",$row2['ending_date_stc'])." ����.";
       						if ($row['study_type']=="������")
                 				echo date("d",$row2['ending_date_zao'])." ".$months[date("m",$row2['ending_date_zao'])]." ".date("Y",$row2['ending_date_zao'])." ����.";
                 		?>
                 		&nbsp;</b></u>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	����� �������� � ���� ����������, �� ����������� � ����� �� ����� � ����� �������� �������� ����.
                 </td>
            </tr>
            <tr style="font-family:times;font-size:17px;">
				<td style="border:none; text-align:justify; padding:30px 0 0 50px" >
                 	<b>������� ������ �����:</b>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:10px 0 0 50px" >
                 	<b>����� ���������� ������:</b> ������������ ��������� ���������� ���� ����� ������</b><br />
                 	��� ������ 02125208, 10008, ������, �. �������, ���. �. ������������, 40, ���. (0412)37-27-63,<br />
					������������ ������� 35218001000089 � ����C� � ����������� ������ ��� 811039.
				</td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:10px 0 0 50px" >
                 	<b>�������:</b>
                 	 <u><b>
                 	<?php
                 		echo $row['nationality'].", ".$row['city'].", ".$row['street']." ".$row['build_number'];
                 		if ($row['flat_number']!="") echo ", ��. ".$row['flat_number'];
                 		echo ".&nbsp;&nbsp;���.&nbsp;".$row['phone'].".";
                 	?>
                </b></u>
                </td>
            </tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:0 0 0 50px" align=left>

    				������� <u><b>&nbsp; <?php echo $row['pasp_serial']." ".$row['pasp_number']; ?>, ������� &nbsp; <?php echo $row['pasp_issue']."   ".date("d.m.Y", $row['pasp_date']).".";?>
				</b></u>
				</td>
			</tr>

			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:70px 0 0 50px; " align=left>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;
					������ ________________ �. �. ����
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					������� ________________
					<?php echo substr($row['firstname'],0,1).". ".substr($row['patronymic'],0,1).". ".$row['lastname'];?>
				</td>

			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:50px 0 0 50px;" align=left> �������� ��������� ________________ �. �. ������ </td>
			</tr>

		</table>
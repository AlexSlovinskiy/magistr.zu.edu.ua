	<table align=center width="900px" class="examsblank1" cellspacing=0 cellpadding=0 border=0>

			<tr style="font-family:times;font-size:20px;">
				<td style="border:none; padding-top:20px;" align=center><strong>����²�</strong>_________</td>
			</tr>
			<tr style="font-family:times;font-size:16px; padding-top:15px;">
				<td style="border:none; " align=center>��� ��������, ���������, �������������, ��������� ����������� ��� ��� ������� ���������� <br />������ ������ ���������� ��������</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:35px 0 0 50px;" align=left>�. �������
					<span style="padding-left:500px;">
						<?php
							echo '&laquo;<span style="text-decoration:underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&raquo;';
							echo '&nbsp;&nbsp;<span style="text-decoration:underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;';
							echo '&nbsp;<span style="text-decoration:underline">20&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;�.';
						?>
					</span>
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;text-align:justify;">
				<td style="border:none;padding:50px 0 0 50px; " align=left>
					������������ ��������� ���������� ���� ����� ������ </span>(��� ���) � ���� ������� ����� ����� ��������, �� 䳺
				</td>
				</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>
				    �� ������ �������, ����� ���������� � ����������, ��
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0); padding:10px 0 0 50px" align=center>
                	<?php echo "<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>";?>
				</td>
			</tr>
			<tr style="font-family:times;font-size:12px;">
				<td style="border:none;" align=center>
				    (�������, ��'�, �� ������� ������� ����� ��� ����� ����� �������� �����,
				</td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0); padding:10px 0 0 50px" align=left>
                	������� &nbsp; <b><?php echo $row['pasp_serial']." ".$row['pasp_number']; ?></b>, ������� &nbsp; <b><?php echo $row['pasp_issue']."   ".date("d.m.Y", $row['pasp_date']);;?>
				</td>
			</tr>
			<tr style="font-family:times;font-size:12px;">
				<td style="border:none;" align=center>
				    ����� ���������, �� ���������� ������������� ���� �����)
				</td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:10px 0 0 0" align=left>
                 	��� � ��������, ����� �� ������� ������� ������ ��� ������ ��� ����:
                </td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>�. ������� ��������:</strong></td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 50px" align=left>
                 	1.1. ���������� ���� �� ���� �����'������ �� ������� ����� ��������� �������� ��������, ��� � ������ �������, � ����:
                </td>
            </tr>
    		<tr style="font-family:times;font-size:16px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0); padding:10px 0 0 50px" align=center>
                	<?php echo "<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>";?>
				</td>
			</tr>
			<tr style="font-family:times;font-size:12px;">
				<td style="border:none;" align=center>
				    (�������, ��'�, �� �������)
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:10px 0 0 0" align=left>
                	�� &nbsp;
                	<span style="text-decoration:underline">
                		<?php
                			if ($row['study_type']=="�����") echo "<strong>&nbsp;������&nbsp;</strong>";
                			if ($row['study_type']=="������") echo "<strong>&nbsp;�������&nbsp;</strong>";
                		?>
                	</span>&nbsp;
                	������ ��������, �� �������-�������������� ����� &nbsp;
                	<span style="text-decoration:underline">
                		<?php
                			if ($row['type']=="mag") echo "<strong>&nbsp;������&nbsp;</strong>";
                			if ($row['type']=="spc") echo "<strong>&nbsp;���������&nbsp;</strong>";
                		?>
                	</span>&nbsp;
				</td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 0" align=left> �� ��������/������������&nbsp;
					<span style="text-decoration:underline">
						<b><?php echo "&nbsp;".$row['speciality']."&nbsp;"; ?></b></td>
					</span>
			</tr>
			 <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 0"" align=left> �� ���������/��������&nbsp;
					<span style="text-decoration:underline">
						<b><?php echo "&nbsp;".$row['faculty']."&nbsp;"; ?></b></td>
					</span>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 0;" align=left> �
						<?php
							if ($row['study_type']=="�����")
								$query2 = "SELECT `ending_date_stc` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
							if ($row['study_type']=="������")
								$query2 = "SELECT `ending_date_zao` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
							$sql2 = mysql_query($query2) or die(mysql_error());
							if (mysql_num_rows($sql2)>0) $row2 = mysql_fetch_assoc($sql2);


							echo '&laquo;<span style="text-decoration:underline"><b>&nbsp;01&nbsp;</b></span>&raquo;';
							echo '&nbsp;&nbsp;<span style="text-decoration:underline"><b>&nbsp;�������&nbsp;</b></span>&nbsp;&nbsp;';
							echo '&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.date("Y").'&nbsp;</b></span>&nbsp;���� ��&nbsp;';
							if ($row['study_type']=="�����")
								{
								echo '&laquo;<span style="text-decoration:underline"><b>&nbsp;'.date("d",$row2['ending_date_stc']).'&nbsp;</b></span>&raquo;';
								echo '&nbsp;&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.$months[date("m",$row2['ending_date_stc'])].'&nbsp;</b></span>&nbsp;&nbsp;';
								echo '&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.date("Y",$row2['ending_date_stc']).'&nbsp;</b></span>&nbsp;����.';
								}
							if ($row['study_type']=="������")
								{
								echo '&laquo;<span style="text-decoration:underline"><b>&nbsp;'.date("d",$row2['ending_date_zao']).'&nbsp;</b></span>&raquo;';
								echo '&nbsp;&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.$months[date("m",$row2['ending_date_zao'])].'&nbsp;</b></span>&nbsp;&nbsp;';
								echo '&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.date("Y",$row2['ending_date_zao']).'&nbsp;</b></span>&nbsp;����.';
								}
						?>
				</td>
			</tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>�I. ������� ���������:</strong></td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 50px" align=left>
                 	2.1. ������ ���������&nbsp;
                 	<span style="text-decoration:underline">&nbsp;
                 	<?php echo "<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>";?>
                	&nbsp;</span> &nbsp;
                	������ ������� �� ��� ��������� ��������� �����.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:0 0 0 50px" align=left>
                 	2.2. ����������� ���������� ���� �������� ����������� ������� �������� �� ������� �������������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:0 0 0 50px" align=left>
                 	2.3. ������ ���������&nbsp;
                 	<span style="text-decoration:underline">&nbsp;
                 	<?php echo "<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>";?>
                	&nbsp;</span> &nbsp;
                	�������� ��� ����� ���������� ������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	2.4. ����������� ��������� ��� ������� �� ������ ���� ���������� ������� ������� �������,
                 	�� ����� �� �����, ���
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	����� � �������� ����� ��  ��� ������� �� ��������� ����� ������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	2.5. � ��� ������������ ���������� 䳿 �������� ( ��������� �� ������ ��� ������ ���������� )
                 	� ������ � ����������
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	��������� ������� ������� � ��������� ������� �������������� �����,
                 	�� ���� ������ ���������� �� ��������� ����� �� ������� ������� �������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>��I. ������� ���������:</strong></td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:5px 0 0 50px" >
                 	3.1. ���������� ������ ������������� ������, ������� ��� � ���������� ������� ������ ������ ��
                 	��������
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	����������� ���������� ��ӻ.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	3.2. �������� ������� ����� �� �������� ������ ������� � ������� �� � ������ , �� ���������� ��� ���������.
                 </td>
            </tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>�V. ����� �� ������� ��²���ί ������� �� ������� ��������ʲ�:</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:5px 0 0 50px" >
                 	4.1. ����� ����� �������������� �� ���� ����� ������� ������� ������� � �� ���� ����������.
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	4.2. �������� ������� ������� ������� ���������
                 	&nbsp;
                 	<span style="text-decoration:underline">&nbsp;
                 	<?php
                 		if ($row['study_type']=="�����")
                 			echo "<b>".$row1['price_stc'].",00</b>";
						if ($row['study_type']=="������")
							echo "<b>".$row1['price_zao'].",00</b>";
                 	?>
                	&nbsp;</span> &nbsp;���.
                	&nbsp;(
                 	<span style="text-decoration:underline">&nbsp;
                 	<?php
                 		if ($row['study_type']=="�����")
                 			echo "<b>".$row1['price_stc_p']."</b>";
						if ($row['study_type']=="������")
							echo "<b>".$row1['price_zao_p']."</b>";
                 	?>
                	&nbsp;</span> &nbsp;������� 00 ���.)
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	4.3. �������� ������� ����� �������  ��� ����������� �� 1-� ���� �� ����������� � ����� ��������,
                 	�� ������� ��������
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	����: �� 01 ������� �� ������ �������, �� 01 ������ �� ������ �������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>V. ²���²����Ͳ��� ���в�:</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:5px 0 0 50px" >
                 	5.1. �� ����������� ��� ��������� ��������� ���������� �� ��� ��������� ������� ������ ������������ ����� �
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	������ �������������� ������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	5.2. �� ���������� �������� ����� �� ������� ������ ������ �������� � �������� ����� ������ ��������� ����
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	� ����� ������� ������� ������ ������������� ����� ������ �� ���� ������������� �� ����� ���� �������������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	5.3. � ��� ���������� ���������� ������������ ������� ������������ � ���.
                 </td>
            </tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>VI. ���������� ��������:</strong></td>
			</tr>
             <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:5px 0 0 50px" >
                 	6.1. ĳ� �������� ������������: �� ������ �����; ���� ��������� ���� � ����� ���� ���������� � ���������� �
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	������ � ���������� ����������-�������� ����, �� ������ �����, ���������� ��� ��������� ���� ������� �������,
                 	� ����-��� �� ����� �� ����������� ��� �������� ��� �� ����� ��������;
                 	� ��� �������� �������� ����� � ��������� ��� ���������, ���� �� ��������� �������� �����,
                 	�� � ���������������� ��������� �������; � ��� ����������� ��������� � ������� ����� � ���
                 	����� � ��������������; �� ������� ���� � ��� �������������� ��������� ��� ����������� ���� ����� ��������.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	6.2. ĳ� �������� ����������� � ��� ������� ��������� ������� ��������� ����� �� �������������� �� ���� �����
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	���� �������.
                </td>
            </tr>
    	</table>
        <table align=center width="900px" class="examsblank1" cellspacing=0 cellpadding=0 border=0 >
            <tr  style="font-family:times;font-size:18px;">
				<td colspan="2" style="border:none; padding-top:15px;" align=center><strong>V�I. ������Ͳ ������ ���в�:</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-top:30px; width:450px" align=center> <b>��������</b> </td>
				<td style="border:none; padding-top:30px; width:450px" align=center> <b>����������</b> </td>
			</tr>
			<tr style="font-family:times;font-size:16px; ">
				<td style="border:none; padding-top:30px; width:450px" align=left>
					<b>
					<?php echo $row['lastname']." ".$row['firstname']." ".$row['patronymic'];?>
					</b>
				</td>
				<td style="border:none; padding-top:30px; width:450px" align=left> <b>������������ ��������� ����������</b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left>
					<?php if ($row['state']!="") echo $row['state']." ���., ";
						if ($row['district']!="")echo $row['district']." �-� ";?>
				</td>
				<td style="border:none; width:450px" align=left> <b>���� ����� ������</b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left>
					<?php
						echo $row['city'].", ���. ".$row['street']." ,".$row['build_number'];
						if ($row['flat_number']!="") echo ", ��. ".$row['flat_number'];?>
					</td>
				<td style="border:none; width:450px" align=left> ��� ������ 02125208</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left>
                	������� &nbsp; <?php echo $row['pasp_serial']." ".$row['pasp_number']; ?>,
				</td>
				<td style="border:none; width:450px" align=left> 10008, �. �������, ���. �.������������, 40, ���. (0412)37-27-63 </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px; padding-right:30px;" align=left>������� &nbsp; <?php echo $row['pasp_issue']."   ".date("d.m.Y", $row['pasp_date']);?></td>
				<td style="border:none; width:450px" align=left> �������� �������� ����������:  </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left> <?php if ($row['ID_code']!="") echo "���������������� ����� ".$row['ID_code']; ?></td>
				<td style="border:none; width:450px" align=left> �/� 31251272211947 </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left> ���. &nbsp; <?php echo $row['phone'];?> </td>
				<td style="border:none; width:450px" align=left> � ����C� � ����������� ������ </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left> </td>
				<td style="border:none; width:450px" align=left> ��� 811039 </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-top:30px; width:450px" align=left> ������� ____________________ <?php echo substr($row['firstname'],0,1).". ".substr($row['patronymic'],0,1).". ".$row['lastname'];?></td>
				<td style="border:none; padding-top:30px; width:450px" align=left> ������ ____________________ �. �. ���� </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-top:30px; width:450px" align=left> </td>
				<td style="border:none; padding-top:30px; width:450px" align=left> �������� ��������� ________________ �. �. ������ </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-top:20px; width:450px" align=left> </td>
				<td style="border:none; padding-top:20px; width:450px" align=left> �.�. </td>
			</tr>
		</table>
	<table align=center width="900px" class="examsblank1" cellspacing=0 cellpadding=0 border=0>

			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>������� ������������� ���������� ����������� <br />���� ����� ������ ����. ����� �.�.</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>�� ��. <b><?php echo $row['lastname']." ".substr($row['firstname'],0,1).". ".substr($row['patronymic'],0,1).".";?></b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>����(���) ������� <b><?php echo $row['city'].", ".$row['street']." ".$row['build_number']; if ($row['flat_number']!="") echo ", ��. ".$row['flat_number'];?></b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>�������(��) <b><?php echo $row['institution']; ?></b> � <b><?php echo date("Y", $row['dip_date']); ?></b> ����</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>�������(��) ������ <b><?php echo $row['qualification']."a"; ?></b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>�������� ����, �� ��������� � ��� <b><?php echo $row['language']; ?></b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>������� ��� ������� �� ������� <b><?php echo $row['dip_average']; ?></b></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:15px;" align=center><strong>�����</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; " align=left>����� ��������� ���� �� �������� ����������� �� ����� � ������� ��� ������ ��</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>
					���������/��������&nbsp; <b><?php echo $row['faculty']; ?></b>,&nbsp;
				    c�����������&nbsp; <b><?php echo $row['speciality']; ?></b>.
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>����� �������� &nbsp; <b><?php echo $row['study_type']; ?></b>.
				��� ������� � ����������: <?php if ($row['hostel']=="+") echo "<b>���<b>"; else echo "<b>HI<b>";?>.
				</td>
			</tr>

			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>����� <b><?php if ($row['sex']=="female") echo "�"; else "�"; ?></b>. &nbsp;&nbsp;&nbsp;������������  &nbsp; <b><?php echo $row['nationality']; ?>.</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>�������� ���: &nbsp; <b><?php echo $row['pasp_serial']." ".$row['pasp_number']; ?></b>, ������� &nbsp; <b><?php echo $row['pasp_issue']."   ".date("d.m.Y", $row['pasp_date']); ?></b> </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>���� ���������� <b><?php echo date("d.m.Y", $row['birth_date']); ?>.</b> &nbsp;&nbsp; ���������� �������: <b><?php echo $row['phone']; ?>.</b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>��� ���� ��������� ���������:</td>
			</tr>
			<tr style="font-family:times;font-size:14px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0);" align=left>&nbsp;</td>
			</tr>
			<tr style="font-family:times;font-size:14px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0);" align=left>&nbsp;</td>
			</tr>
			<tr style="font-family:times;font-size:14px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0);" align=left>&nbsp;</td>
			</tr>


		</table>
		<table align=center width="900px" class="examsblank1" cellspacing=0 cellpadding=0 border=0 style="margin-top:30px">

		    <tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left> <b><?php  echo date("d.m.Y", $row['date']) ?></b> <span style="margin-left:425px">ϳ����______________________________</span></td>
			</tr>
			<tr style="font-family:times;font-size:10px;">
				<td style="border:none;" align=left>&nbsp;</td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; " align=left>� ��������� �������, �������� ����糿 � ���������� ��� �������� ����������� �����������, �������� �������� ����������� ������������(�). �� ��������� ���� �������� ��� ������������ ����� �� ���� ����� ��������, � ����� �� ������������ � ������ ������ �� ���. </td>
			</tr>
			<tr style="font-family:times;font-size:10px;">
				<td style="border:none;" align=left>&nbsp;</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left> ϳ����______________________________</td>
			</tr>
		</table>
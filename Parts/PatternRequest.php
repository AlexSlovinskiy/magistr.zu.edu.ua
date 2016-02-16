	<table align=center width="900px" class="examsblank1" cellspacing=0 cellpadding=0 border=0>

			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>Ректору Житомирського державного університету <br />імені Івана Франка проф. Сауху П.Ю.</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>від гр. <b><?php echo $row['lastname']." ".substr($row['firstname'],0,1).". ".substr($row['patronymic'],0,1).".";?></b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>який(яка) проживає <b><?php echo $row['city'].", ".$row['street']." ".$row['build_number']; if ($row['flat_number']!="") echo ", кв. ".$row['flat_number'];?></b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>закінчив(ла) <b><?php echo $row['institution']; ?></b> у <b><?php echo date("Y", $row['dip_date']); ?></b> році</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>отримав(ла) диплом <b><?php echo $row['qualification']."a"; ?></b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>іноземна мова, що вивчалась у ВНЗ <b><?php echo $row['language']; ?></b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left>середній бал додатку до диплома <b><?php echo $row['dip_average']; ?></b></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:15px;" align=center><strong>ЗАЯВА</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; " align=left>Прошу допустити мене до вступних випробувань та участі в конкурсі для вступу на</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>
					Факультет/Інститут&nbsp; <b><?php echo $row['faculty']; ?></b>,&nbsp;
				    cпеціальність&nbsp; <b><?php echo $row['speciality']; ?></b>.
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>Форма навчання &nbsp; <b><?php echo $row['study_type']; ?></b>.
				Маю потребу в гуртожитку: <?php if ($row['hostel']=="+") echo "<b>ТАК<b>"; else echo "<b>HI<b>";?>.
				</td>
			</tr>

			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>Стать <b><?php if ($row['sex']=="female") echo "Ж"; else "Ч"; ?></b>. &nbsp;&nbsp;&nbsp;Громадянство  &nbsp; <b><?php echo $row['nationality']; ?>.</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>Паспортні дані: &nbsp; <b><?php echo $row['pasp_serial']." ".$row['pasp_number']; ?></b>, виданий &nbsp; <b><?php echo $row['pasp_issue']."   ".date("d.m.Y", $row['pasp_date']); ?></b> </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>Дата народження <b><?php echo date("d.m.Y", $row['birth_date']); ?>.</b> &nbsp;&nbsp; Контактний телефон: <b><?php echo $row['phone']; ?>.</b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>Про себе додатково повідомляю:</td>
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
				<td style="border:none;" align=left> <b><?php  echo date("d.m.Y", $row['date']) ?></b> <span style="margin-left:425px">Підпис______________________________</span></td>
			</tr>
			<tr style="font-family:times;font-size:10px;">
				<td style="border:none;" align=left>&nbsp;</td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; " align=left>З правилами прийому, наявністю ліцензії і посвідчення про державну акредитацію університету, графіком вступних випробувань ознайомлений(а). Не заперечую щодо внесення моїх персональних даних до бази даних абітурієнтів, а також їх використання в процесі вступу до ЖДУ. </td>
			</tr>
			<tr style="font-family:times;font-size:10px;">
				<td style="border:none;" align=left>&nbsp;</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-left:500px;" align=left> Підпис______________________________</td>
			</tr>
		</table>
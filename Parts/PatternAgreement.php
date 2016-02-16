	<table align=center width="900px" class="examsblank1" cellspacing=0 cellpadding=0 border=0>

			<tr style="font-family:times;font-size:20px;">
				<td style="border:none; padding-top:20px;" align=center><strong>УГОДА</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px; padding-top:15px;">
				<td style="border:none; " align=center>про підготовку фахівців з вищою освітою <br />м. Житомир</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:35px 0 0 50px;" align=left> №____________
					<span style="padding-left:520px;">
						<?php
							echo '&laquo;<span style="text-decoration:underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&raquo;';
							echo '&nbsp;&nbsp;<span style="text-decoration:underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;';
							echo '&nbsp;<span style="text-decoration:underline">&nbsp;20&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;р.';
						?>
					</span>
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;text-align:justify;">
				<td style="border:none;padding:50px 0 0 50px; " align=left>
					Житомирський державний університет імені Івана Франка Міністерства освіти і науки України, в особі ректора
				</td>
				</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>
				    Сауха Петра Юрійовича
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:15px 0 0 0" align=left>
                	та студент: <u><?php echo "&nbsp;&nbsp;<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>&nbsp;&nbsp;";?></u>
				</td>
			</tr>
           <tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>
					факультет/інститут, курс&nbsp; <u><b>
						<?php echo "&nbsp;".$row['faculty'].", &nbsp;";
							$kourse=substr($row['speciality'],0,1)-2;
							echo $kourse."-й курс;&nbsp;";
						?></b></u>&nbsp;<br />
					освітньо-кваліфікаційний рівень&nbsp; <u><b>
						<?php
							if ($row["type"]=="spc") $okr="спеціаліст";
							if ($row["type"]=="mag") $okr="магістр";
							echo "&nbsp;".$okr;
						?>;</b></u><br />
				    галузь знань&nbsp; <u><b><?php echo $trainings[substr($row['training'],0,4)]; ?>;</b></u><br />
				    cпеціальність&nbsp; <u><b><?php echo $row['speciality']; ?>,</b></u>&nbsp;&nbsp;уклали цю угоду.
				</td>
			</tr>

            <tr style="font-family:times;font-size:17px;">
				<td style="border:none; text-align:justify; padding:30px 0 0 50px" >
                 	<b>Вищий навчальний заклад зобов'язується забезпечити:</b>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- якісну теоретичну і практичну підготовку фахівця з вищою освітою згідно з навчальними планами
                 	та програмами і вимогами кваліфікаційних характеристик фахівця;
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- після закінчення навчання та одержання відповідної кваліфікації місцем працевлаштування
                 	в державному секторі народного господарства, де він зобов'язаний відпрацювати не менше трьох років.
                </td>
            </tr>
            <tr style="font-family:times;font-size:17px;">
				<td style="border:none; text-align:justify; padding:30px 0 0 50px" >
                 	<b>Студент зобов'язується:</b>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:3px 0 0 0" >
                 	- оволодіти   всіма  видами   професійної  діяльності,
                 	передбаченими відповідною кваліфікаційною характеристикою фахівця за галуззю знань
                    &nbsp; <u><b><?php echo $trainings[substr($row['training'],0,4)]; ?>,</b></u>
                    &nbsp;&nbsp;cпеціальністю&nbsp; <u><b><?php echo $row['speciality']; ?>.</b></u>&nbsp;&nbsp;

                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:3px 0 0 0" >
                 	- прибути після закінчення вищого навчального закладу на місце направлення і відпрацювати не менше трьох років;
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- у разі відмови їхати за призначенням відшкодувати до державного бюджету вартість навчання в установленому порядку.
                </td>
            </tr>
            <tr style="font-family:times;font-size:17px;">
				<td style="border:none; text-align:justify; padding:30px 0 0 50px" >
                 	<b>Інші положення:</b>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- зміни та доповнення до цієї угоди вносяться шляхом підписання додаткових угод;
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	- дія угоди припиняється за згодою сторін (оформляється протоколом);
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                	- усі спори, які можуть виникати між сторонами, вирішуються в судовому порядку.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:20px 0 0 50px" >
                 	Угода набирає чинності з моменту підписання і діє до
                 		<u><b>&nbsp;
                 		<?php
                 			if ($row['study_type']=="Денна")
								$query2 = "SELECT `ending_date_stc` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
							if ($row['study_type']=="Заочна")
								$query2 = "SELECT `ending_date_zao` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
							$sql2 = mysql_query($query2) or die(mysql_error());
							if (mysql_num_rows($sql2)>0) $row2 = mysql_fetch_assoc($sql2);

       						if ($row['study_type']=="Денна")
       							echo date("d",$row2['ending_date_stc'])." ".$months[date("m",$row2['ending_date_stc'])]." ".date("Y",$row2['ending_date_stc'])." року.";
       						if ($row['study_type']=="Заочна")
                 				echo date("d",$row2['ending_date_zao'])." ".$months[date("m",$row2['ending_date_zao'])]." ".date("Y",$row2['ending_date_zao'])." року.";
                 		?>
                 		&nbsp;</b></u>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	Угоду складено у двох примірниках, які зберігаються у кожної із сторін і мають однакову юридичну силу.
                 </td>
            </tr>
            <tr style="font-family:times;font-size:17px;">
				<td style="border:none; text-align:justify; padding:30px 0 0 50px" >
                 	<b>Юридичні адреси сторін:</b>
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:10px 0 0 50px" >
                 	<b>Вищий навчальний заклад:</b> Житомирський державний університет імені Івана Франка</b><br />
                 	код ЄДРПОУ 02125208, 10008, Україна, м. Житомир, вул. В. Бердичівська, 40, тел. (0412)37-27-63,<br />
					реєстраційний рахунок 35218001000089 в ГУДКCУ у Житомирській області МФО 811039.
				</td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:10px 0 0 50px" >
                 	<b>Студент:</b>
                 	 <u><b>
                 	<?php
                 		echo $row['nationality'].", ".$row['city'].", ".$row['street']." ".$row['build_number'];
                 		if ($row['flat_number']!="") echo ", кв. ".$row['flat_number'];
                 		echo ".&nbsp;&nbsp;тел.&nbsp;".$row['phone'].".";
                 	?>
                </b></u>
                </td>
            </tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:0 0 0 50px" align=left>

    				паспорт <u><b>&nbsp; <?php echo $row['pasp_serial']." ".$row['pasp_number']; ?>, виданий &nbsp; <?php echo $row['pasp_issue']."   ".date("d.m.Y", $row['pasp_date']).".";?>
				</b></u>
				</td>
			</tr>

			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:70px 0 0 50px; " align=left>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;
					Ректор ________________ П. Ю. Саух
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					Студент ________________
					<?php echo substr($row['firstname'],0,1).". ".substr($row['patronymic'],0,1).". ".$row['lastname'];?>
				</td>

			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:50px 0 0 50px;" align=left> Головний бухгалтер ________________ Л. М. Шевчук </td>
			</tr>

		</table>
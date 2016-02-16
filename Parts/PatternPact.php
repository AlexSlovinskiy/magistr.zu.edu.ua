	<table align=center width="900px" class="examsblank1" cellspacing=0 cellpadding=0 border=0>

			<tr style="font-family:times;font-size:20px;">
				<td style="border:none; padding-top:20px;" align=center><strong>ДОГОВІР</strong>_________</td>
			</tr>
			<tr style="font-family:times;font-size:16px; padding-top:15px;">
				<td style="border:none; " align=center>про навчання, підготовку, перепідготовку, підвищення кваліфікації або про надання додаткових <br />освітніх послуг навчальним закладом</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:35px 0 0 50px;" align=left>м. Житомир
					<span style="padding-left:500px;">
						<?php
							echo '&laquo;<span style="text-decoration:underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&raquo;';
							echo '&nbsp;&nbsp;<span style="text-decoration:underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;';
							echo '&nbsp;<span style="text-decoration:underline">20&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;р.';
						?>
					</span>
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;text-align:justify;">
				<td style="border:none;padding:50px 0 0 50px; " align=left>
					Житомирський державний університет імені Івана Франка </span>(далі ЖДУ) в особі ректора Сауха Петра Юрійовича, що діє
				</td>
				</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none;" align=left>
				    на підставі Статуту, надалі іменований – Виконавець, та
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0); padding:10px 0 0 50px" align=center>
                	<?php echo "<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>";?>
				</td>
			</tr>
			<tr style="font-family:times;font-size:12px;">
				<td style="border:none;" align=center>
				    (прізвище, ім'я, по батькові фізичної особи або повна назва юридичної особи,
				</td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0); padding:10px 0 0 50px" align=left>
                	Паспорт &nbsp; <b><?php echo $row['pasp_serial']." ".$row['pasp_number']; ?></b>, виданий &nbsp; <b><?php echo $row['pasp_issue']."   ".date("d.m.Y", $row['pasp_date']);;?>
				</td>
			</tr>
			<tr style="font-family:times;font-size:12px;">
				<td style="border:none;" align=center>
				    назва документа, що встановлює правоздатність такої особи)
				</td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:10px 0 0 0" align=left>
                 	далі – Замовник, разом за текстом Сторони уклали цей договір про таке:
                </td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>І. ПРЕДМЕТ ДОГОВОРУ:</strong></td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 50px" align=left>
                 	1.1. Виконавець бере на себе зобов'язання за рахунок коштів замовника здійснити навчання, далі – освітня послуга, а саме:
                </td>
            </tr>
    		<tr style="font-family:times;font-size:16px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0); padding:10px 0 0 50px" align=center>
                	<?php echo "<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>";?>
				</td>
			</tr>
			<tr style="font-family:times;font-size:12px;">
				<td style="border:none;" align=center>
				    (прізвище, ім'я, по батькові)
				</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:10px 0 0 0" align=left>
                	за &nbsp;
                	<span style="text-decoration:underline">
                		<?php
                			if ($row['study_type']=="Денна") echo "<strong>&nbsp;денною&nbsp;</strong>";
                			if ($row['study_type']=="Заочна") echo "<strong>&nbsp;заочною&nbsp;</strong>";
                		?>
                	</span>&nbsp;
                	формою навчання, за освітньо-кваліфікаційним рівнем &nbsp;
                	<span style="text-decoration:underline">
                		<?php
                			if ($row['type']=="mag") echo "<strong>&nbsp;магістр&nbsp;</strong>";
                			if ($row['type']=="spc") echo "<strong>&nbsp;спеціаліст&nbsp;</strong>";
                		?>
                	</span>&nbsp;
				</td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 0" align=left> за напрямом/спеціальністю&nbsp;
					<span style="text-decoration:underline">
						<b><?php echo "&nbsp;".$row['speciality']."&nbsp;"; ?></b></td>
					</span>
			</tr>
			 <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 0"" align=left> на факультеті/інституті&nbsp;
					<span style="text-decoration:underline">
						<b><?php echo "&nbsp;".$row['faculty']."&nbsp;"; ?></b></td>
					</span>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 0;" align=left> з
						<?php
							if ($row['study_type']=="Денна")
								$query2 = "SELECT `ending_date_stc` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
							if ($row['study_type']=="Заочна")
								$query2 = "SELECT `ending_date_zao` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
							$sql2 = mysql_query($query2) or die(mysql_error());
							if (mysql_num_rows($sql2)>0) $row2 = mysql_fetch_assoc($sql2);


							echo '&laquo;<span style="text-decoration:underline"><b>&nbsp;01&nbsp;</b></span>&raquo;';
							echo '&nbsp;&nbsp;<span style="text-decoration:underline"><b>&nbsp;вересня&nbsp;</b></span>&nbsp;&nbsp;';
							echo '&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.date("Y").'&nbsp;</b></span>&nbsp;року по&nbsp;';
							if ($row['study_type']=="Денна")
								{
								echo '&laquo;<span style="text-decoration:underline"><b>&nbsp;'.date("d",$row2['ending_date_stc']).'&nbsp;</b></span>&raquo;';
								echo '&nbsp;&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.$months[date("m",$row2['ending_date_stc'])].'&nbsp;</b></span>&nbsp;&nbsp;';
								echo '&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.date("Y",$row2['ending_date_stc']).'&nbsp;</b></span>&nbsp;року.';
								}
							if ($row['study_type']=="Заочна")
								{
								echo '&laquo;<span style="text-decoration:underline"><b>&nbsp;'.date("d",$row2['ending_date_zao']).'&nbsp;</b></span>&raquo;';
								echo '&nbsp;&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.$months[date("m",$row2['ending_date_zao'])].'&nbsp;</b></span>&nbsp;&nbsp;';
								echo '&nbsp;<span style="text-decoration:underline"><b>&nbsp;'.date("Y",$row2['ending_date_zao']).'&nbsp;</b></span>&nbsp;року.';
								}
						?>
				</td>
			</tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>ІI. ОБОВ’ЯЗКИ ВИКОНАВЦЯ:</strong></td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:5px 0 0 50px" align=left>
                 	2.1. Надати замовнику&nbsp;
                 	<span style="text-decoration:underline">&nbsp;
                 	<?php echo "<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>";?>
                	&nbsp;</span> &nbsp;
                	освітню послугу на рівні державних стандартів освіти.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:0 0 0 50px" align=left>
                 	2.2. Забезпечити дотримання прав учасників навчального процесу відповідно до чинного законодавства.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding:0 0 0 50px" align=left>
                 	2.3. Видати Замовнику&nbsp;
                 	<span style="text-decoration:underline">&nbsp;
                 	<?php echo "<strong>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</strong>";?>
                	&nbsp;</span> &nbsp;
                	документ про освіту державного зразка.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	2.4. Інформувати Замовника про правила та вимоги щодо організації надання освітньої послуги,
                 	її якості та змісту, про
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	права і обов’язки Сторін під  час надання та отримання таких послуг.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	2.5. У разі дострокового припинення дії договору ( незалежно від підстав для такого припинення )
                 	у зв’язку з ненаданням
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	Замовнику освітньої послуги – повернути частину невикористаних коштів,
                 	що були внесені Замовником як попередня плата за надання освітньої послуги.
                </td>
            </tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>ІІI. ОБОВ’ЯЗКИ ЗАМОВНИКА:</strong></td>
			</tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:5px 0 0 50px" >
                 	3.1. Виконувати вимоги законодавства України, Статуту ЖДУ з організації надання освітніх послуг та
                 	«Правила
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	внутрішнього розпорядку ЖДУ».
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	3.2. Своєчасно вносити плату за отриману освітню послугу у розмірах та у терміни , що встановлені цим договором.
                 </td>
            </tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>ІV. ПЛАТА ЗА НАДАННЯ ОСВІТНЬОЇ ПОСЛУГИ ТА ПОРЯДОК РОЗРАХУНКІВ:</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:5px 0 0 50px" >
                 	4.1. Розмір плати встановлюється за весь строк надання освітньої послуги і не може змінюватись.
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	4.2. Загальна вартість освітньої послуги становить
                 	&nbsp;
                 	<span style="text-decoration:underline">&nbsp;
                 	<?php
                 		if ($row['study_type']=="Денна")
                 			echo "<b>".$row1['price_stc'].",00</b>";
						if ($row['study_type']=="Заочна")
							echo "<b>".$row1['price_zao'].",00</b>";
                 	?>
                	&nbsp;</span> &nbsp;грн.
                	&nbsp;(
                 	<span style="text-decoration:underline">&nbsp;
                 	<?php
                 		if ($row['study_type']=="Денна")
                 			echo "<b>".$row1['price_stc_p']."</b>";
						if ($row['study_type']=="Заочна")
							echo "<b>".$row1['price_zao_p']."</b>";
                 	?>
                	&nbsp;</span> &nbsp;гривень 00 коп.)
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	4.3. Замовник вносить плату готівкою  або безготівково за 1-й курс до зарахування в число студентів,
                 	за наступні навчальні
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	роки: до 01 вересня за перший семестр, до 01 лютого за другий семестр.
                </td>
            </tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>V. ВІДПОВІДАЛЬНІСТЬ СТОРІН:</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:5px 0 0 50px" >
                 	5.1. За невиконання або неналежне виконання забов’язань за цим договором сторони несуть віповідальність згідно з
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	чинним законодавством України.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	5.2. За несвоєчасне внесення плати за надання освітніх послуг Замовник – юридична особа сплачує Виконавцю пеню
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	у розмірі подвійної облікової ставки Національного банку України від суми заборгованості за кожен день заборгованості.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	5.3. У разі припинення Замовником фінансування студент відраховується з ЖДУ.
                 </td>
            </tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:25px;" align=center><strong>VI. ПРИПИНЕННЯ ДОГОВОРУ:</strong></td>
			</tr>
             <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:5px 0 0 50px" >
                 	6.1. Дія договору припиняється: за згодою Сторін; якщо виконання однією з Сторін своїх зобов’язань є неможливим у
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	зв’язку з прийняттям нормативно-правових актів, що змінили умови, встановлені цим договором щодо освітньої послуги,
                 	і будь-яка із Сторін не погоджується про внесення змін до цього договору;
                 	у разі ліквідації юридичної особи – Замовника або Виконавця, якщо не визначена юридична особа,
                 	що є правонаступником ліквідованої Сторони; у разі відрахування Замовника – фізичної особи з ЖДУ
                 	згідно з законодавством; за рішенням суду в разі систематичного порушення або невиконання умов цього договору.
                </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 50px" >
                 	6.2. Дія договору зупиняється у разі надання академічної відпуски Замовнику згідно із законодавством на весь термін
                 </td>
            </tr>
            <tr style="font-family:times;font-size:16px;">
				<td style="border:none; text-align:justify; padding:0 0 0 0" >
                 	такої відпуски.
                </td>
            </tr>
    	</table>
        <table align=center width="900px" class="examsblank1" cellspacing=0 cellpadding=0 border=0 >
            <tr  style="font-family:times;font-size:18px;">
				<td colspan="2" style="border:none; padding-top:15px;" align=center><strong>VІI. ЮРИДИЧНІ АДРЕСИ СТОРІН:</strong></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-top:30px; width:450px" align=center> <b>Замовник</b> </td>
				<td style="border:none; padding-top:30px; width:450px" align=center> <b>Виконавець</b> </td>
			</tr>
			<tr style="font-family:times;font-size:16px; ">
				<td style="border:none; padding-top:30px; width:450px" align=left>
					<b>
					<?php echo $row['lastname']." ".$row['firstname']." ".$row['patronymic'];?>
					</b>
				</td>
				<td style="border:none; padding-top:30px; width:450px" align=left> <b>Житомирський державний університет</b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left>
					<?php if ($row['state']!="") echo $row['state']." обл., ";
						if ($row['district']!="")echo $row['district']." р-н ";?>
				</td>
				<td style="border:none; width:450px" align=left> <b>імені Івана Франка</b></td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left>
					<?php
						echo $row['city'].", вул. ".$row['street']." ,".$row['build_number'];
						if ($row['flat_number']!="") echo ", кв. ".$row['flat_number'];?>
					</td>
				<td style="border:none; width:450px" align=left> Код ЄДРПОУ 02125208</td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left>
                	Паспорт &nbsp; <?php echo $row['pasp_serial']." ".$row['pasp_number']; ?>,
				</td>
				<td style="border:none; width:450px" align=left> 10008, м. Житомир, вул. В.Бердичівська, 40, тел. (0412)37-27-63 </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px; padding-right:30px;" align=left>виданий &nbsp; <?php echo $row['pasp_issue']."   ".date("d.m.Y", $row['pasp_date']);?></td>
				<td style="border:none; width:450px" align=left> Банківські реквізити отримувача:  </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left> <?php if ($row['ID_code']!="") echo "Ідентифікаційний номер ".$row['ID_code']; ?></td>
				<td style="border:none; width:450px" align=left> р/р 31251272211947 </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left> тел. &nbsp; <?php echo $row['phone'];?> </td>
				<td style="border:none; width:450px" align=left> в ГУДКCУ у Житомирській області </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; width:450px" align=left> </td>
				<td style="border:none; width:450px" align=left> МФО 811039 </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-top:30px; width:450px" align=left> Студент ____________________ <?php echo substr($row['firstname'],0,1).". ".substr($row['patronymic'],0,1).". ".$row['lastname'];?></td>
				<td style="border:none; padding-top:30px; width:450px" align=left> Ректор ____________________ П. Ю. Саух </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-top:30px; width:450px" align=left> </td>
				<td style="border:none; padding-top:30px; width:450px" align=left> Головний бухгалтер ________________ Л. М. Шевчук </td>
			</tr>
			<tr style="font-family:times;font-size:16px;">
				<td style="border:none; padding-top:20px; width:450px" align=left> </td>
				<td style="border:none; padding-top:20px; width:450px" align=left> М.П. </td>
			</tr>
		</table>
						<div class="contactform">
            				<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
            				<?$type=1;?>
              				<fieldset>
              					<legend>&nbsp;РЕЗУЛЬТАТИ ВСТУПНИХ ІСПИТІВ&nbsp;</legend>
											<p>
											<label for="exam_name1" class="small" style="margin-left:79px">Бали за іспит з профільного предмету: </label>
		                                   	<input type="text" name="exam_mark1" id="exam_mark1" class="field"
		                                   	value="<?if ($_POST['exam_mark1']>0) echo $_POST['exam_mark1']; else echo "";?>"
		                                   	tabindex="10" maxlength="6" style="width:50px; text-align:center "/>
		                                   	<?if (substr($speciality,0,1)=="7"){ echo " х3"; $type = 3;}?>
		                                   	<?if (substr($speciality,0,1)=="8" && $cross_enter == '-') {echo " х2"; $type = 2;}?>
                                			</p>
											<p>
                     						<label for="exam_name2" class="small" >Бали за іспит з іноземної мови (для магістратури): </label>
		                                   	<input type="text" name="exam_mark2" id="exam_mark2" class="field"
		                                   	value="<?if ($_POST['exam_mark2']>0) echo $_POST['exam_mark2']; else echo "";?>"
		                                   	<?if (substr($speciality,0,1)=="7") echo "disabled";?> tabindex="20" maxlength="6" style="width:50px; text-align:center"/>
                                			</p>
                                			<p>
                     						<label for="exam_name3" class="small" style="margin-left:21px">Бали за додатковий іспит (перехресний вступ): </label>
		                                   	<input type="text" name="exam_mark3" id="exam_mark3" class="field"
		                                   	value="<?if ($_POST['exam_mark3']>0) echo $_POST['exam_mark3']; else echo "";?>"
		                                   	<?if (substr($speciality,0,1)=="7" || (substr($speciality,0,1)=="8" && $cross_enter == '-')) echo "disabled";?>
		                                   	tabindex="20" maxlength="6" style="width:50px; text-align:center"/>
                                			</p>
                                			<p><label for="dip_average" class="small" style="margin-left:184px">Середній бал диплома:</label>
                                			<input type="text" name="dip_average" id="dip_average" class="field"
                                			value="<?if ($_POST['dip_average']>0) echo $_POST['dip_average']; else echo "";?>"
                                			tabindex="50" maxlength="5" style="width:50px; text-align:center "/>
                                			</p>
                                			<p><label for="final_mark" class="small" style="margin-left:166px">Загальна кількість балів:</label>
                                			<input type="text" name="final_mark" id="final_mark" class="field" value="" tabindex="30" maxlength="6" readonly="" style="width:50px; text-align:center "/>
                                			</p>
							<p>	<input type="submit" name="set_exams" id="submit" class="button" value="Зберегти" tabindex="60" /></p>
                			</fieldset>
              				</form>
				    	</div>
						<script type="text/javascript">
                           var type= <?echo $type;?>;

							var a=document.getElementById("exam_mark1");
							var b=document.getElementById("exam_mark2");
							var b1=document.getElementById("exam_mark3");
							var c=document.getElementById("final_mark");
							var d=document.getElementById("dip_average");
							c.value=(-type*a.value-b.value-b1.value-d.value)*(-1);

							a.onkeypress = b.onkeypress = b1.onkeypress = d.onkeypress = function(e)
								{								e = e || window.event;
								var keyCode = e.keyCode || e.which;

								if (keyCode == 13 || keyCode == 8 || keyCode == 9)
									{
									return;
									}

								var s = this.value;
								s += String.fromCharCode(keyCode);

								/*if (!(/^[1]([0-9]{1,2})?(\.([0-9]{0,2})?)?$/.test(s) || /^[2]([0]{1,2})?$/.test(s)))
									{
									s.length--;
									return false;
									}     */
								}

							a.onkeyup = b.onkeyup = b1.onkeyup = d.onkeyup = function() {
								if (type == 3) {									 c.value=(-3*a.value-d.value)*(-1);									}
								if (type == 2) {									c.value=(-2*a.value-b.value-d.value)*(-1);
								}
								if (type == 1) {
									c.value=(-1*a.value-b.value-b1.value-d.value)*(-1);
								}
								}

				    	</script>


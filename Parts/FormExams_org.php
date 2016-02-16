						<div class="contactform">
            				<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;РЕЗУЛЬТАТИ ВСТУПНИХ ІСПИТІВ&nbsp;</legend>
											<p>
											<label for="exam_name1" class="small" style="margin-left:79px">Бали за іспит з профільного предмету: </label>
		                                   	<input type="text" name="exam_mark1" id="exam_mark1" class="field" value="<?if ($_POST['exam_mark1']>0) echo $_POST['exam_mark1']; else echo "";?>" tabindex="20" maxlength="3" style="width:50px; text-align:center "/>
                                			</p>

                     						<p>
                     						<label for="exam_name2" class="small" >Бали за іспит з іноземної мови (для магістратури): </label>
		                                   	<input type="text" name="exam_mark2" id="exam_mark2" class="field" value="<?if ($_POST['exam_mark2']>0) echo $_POST['exam_mark2']; else echo "";?>" <?if (substr($speciality,0,1)=="7") echo "readonly=''";?> tabindex="40" maxlength="3" style="width:50px; text-align:center"/>
                                			</p>
                                		<p><label for="final_mark" class="small" style="margin-left:166px">Загальна кількість балів:</label>
                                			<input type="text" name="final_mark" id="final_mark" class="field" value="" tabindex="50" maxlength="3" readonly="" style="width:50px; text-align:center "/>
                                		</p>
							<p>	<input type="submit" name="set_exams" id="submit" class="button" value="Зберегти" tabindex="60" /></p>
                			</fieldset>
              				</form>
				    	</div>
						<script type="text/javascript">
                        	a=document.getElementById("exam_mark1");
							b=document.getElementById("exam_mark2");
							c=document.getElementById("final_mark");
							c.value=(-1*a.value-b.value)*(-1);
							a.onkeyup = b.onkeyup = function()
								{								if (a.value>100) a.value=a.value.replace(a.value[a.value.length-1] , "");
								if (b.value>100) b.value=b.value.replace(b.value[b.value.length-1] , "");;

								var reg=/\D/ //не цыфра
								if (reg.test(a.value)) a.value="";
                                if (reg.test(b.value)) b.value="";

								c.value=(-1*a.value-b.value)*(-1);								}
				    	</script>
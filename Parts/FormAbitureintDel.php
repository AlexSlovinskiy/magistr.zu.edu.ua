						<div class="contactform">
            				<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;��������� �����в����&nbsp;</legend>
                                	<p>
                                		<label for="ab_delete" class="left">ϳ����������� ���������:</label>
                     					<input type="checkbox" name="ab_delete" id="ab_delete" class="checkbox"  size="1"  value="+"/>
										<input type="submit" name="set_delete" id="submit" class="button" value="��������" />
									</p>
              				</fieldset>
              				<fieldset>
              					<legend>&nbsp;²����� ²� ���������� ����������&nbsp;</legend>
                                	<p>
                                		<label for="only_contract" class="left">³��������:</label>
                     					<input type="checkbox" name="only_contract" id="only_contract" class="checkbox"  <?php if ($_POST['only_contract']=='+') echo 'checked=checked';?> size="1"  value="+"/>
										<input type="submit" name="set_only_contract" id="submit_only_contract" class="button" value="����������" />
									</p>
							</fieldset>
              				<fieldset>
              					<legend>&nbsp;̲��������� ��̲�&nbsp;</legend>
                                	<p>
                                		<label for="government_exchange" class="left">����������/������� ������:</label>
                     					<input type="checkbox" name="government_exchange" id="government_exchange" class="checkbox"  <?php if ($_POST['government_exchange']=='+') echo 'checked=checked';?> size="1"  value="+"/>
										<input type="submit" name="set_government_exchange" id="submit_government_exchange" class="button" value="����������" />
									</p>
							</fieldset>

              				</form>
				    	</div>
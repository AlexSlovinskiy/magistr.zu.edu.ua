					<div class="column1-unit">
          				<?php echo $success;?>

						<div class="contactform">
            				<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;Редагування повідомлення&nbsp;</legend>
                   				<p><label for="mes_header" class="left">Заголовок повідомлення:</label>
                   					<input type="text" name="mes_header" id="mes_header" class="field" value="<?php echo $_SESSION['mes_header'];?>" tabindex="1" /></p>
                           		<p><label for="mes_text" class="left">Зміст повідомлення:</label>
                   					<textarea name="mes_text" id="mes_text" cols="45" rows="10"tabindex="2"><?php echo $_SESSION['mes_text'];?></textarea></p>
                				<p><!--<label for="active" class="left">Активувати:</label>
                					<input type="checkbox" name="visible" id="visible" class="checkbox" tabindex="3" size="1" value=""/></p>!-->
                					<input type="submit" name="edit_mes" id="submit" class="button" value="ОК" tabindex="6" />
                			</fieldset>
              				</form>
              				<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;Редагування правил прийому&nbsp;</legend>
                   				<p><label for="rule_text" class="left">Короткий зміст правил:</label>
                   					<textarea name="rule_text" id="rule_text" cols="45" rows="10" tabindex="10"><?php echo $_SESSION['rule_text'];?></textarea></p>
                					<input type="submit" name="edit_rule" id="submit_rule" class="button" value="ОК" tabindex="15" />
                			</fieldset>
              				</form>
				    	</div>

					</div>
            		<hr class="clear-contentunit" />

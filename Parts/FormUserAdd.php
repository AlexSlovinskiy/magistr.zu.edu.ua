                    <div class="column1-unit">
          				<h2>��������� ������ ��������� ������</h2>
          			</div>
          			<?echo $success;?>
        			<div class="main-subcontent">
          				<div class="<?echo $border_color;?>">
          				<div class="round-border-topleft"></div>
          				<div class="round-border-topright"></div>
          				<h1 class="<?echo $color;?>"><?echo $message_new_user;?></h1>
             				<div class="loginform">
            					<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              						<fieldset>
                					<p><label for="add_login" class="top">����:</label><br />
					               	<input type="text" name="add_login" id="add_login" tabindex="10" class="field" value="<?=$_POST['add_login']?>" /></p>
					               	<p><label for="add_surname" class="top">�������:</label><br />
					               	<input type="text" name="add_surname" id="add_surname" tabindex="20" class="field" value="<?=$_POST['add_surname']?>" /></p>
					               	<p><label for="add_name" class="top">��'�:</label><br />
					               	<input type="text" name="add_name" id="add_name" tabindex="30" class="field" value="<?=$_POST['add_name']?>" /></p>
					               	<p><label for="add_patronymic" class="top">�� �������:</label><br />
					               	<input type="text" name="add_patronymic" id="add_patronymic" tabindex="40" class="field" value="<?=$_POST['add_patronymic']?>" /></p>
    	        					<p><label for="add_pass" class="top">������:</label><br />
                  					<input type="password" name="add_pass" id="add_pass" tabindex="50" class="field" value="" /></p>
                  					<p><label for="add_pass1" class="top">ϳ��������� ������ :</label><br />
                  					<input type="password" name="add_pass1" id="add_pass1" tabindex="60" class="field" value="" /></p>
    	        					<p><label for="add_status" class="top">����� �������:</label><br />
    	        						<input type="radio" name="add_status" id="add_status" class="radio" tabindex="70" size="1" value="admin"/>
    	        						<label for="checkbox" class="right">�����������</label></p>
    	        					<p>	<input type="radio" name="add_status" id="add_status" class="radio" tabindex="80" size="1" value="user" checked="checked"/>
    	        						<label for="checkbox" class="right">����������</label></p>
    	        					<p><input type="checkbox" name="executive" value="+" class="radio" />
    	        					<label for="checkbox" class="right">³�����������</label></p>
    	        					<p><input type="submit" name="create" class="button" tabindex="90" value="��"  /></p>

	            					</fieldset>
            					</form>
          					</div>
        				</div>
            		</div>
            		<hr class="clear-contentunit" />

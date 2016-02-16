					<div class="column1-unit">
          				<h2>Редагування існуючого облікового запису</h2>
          			</div>
          			<?echo $success;?>
        			<div class="main-subcontent">
          				<div class="<?echo $border_color;?>">
          				<div class="round-border-topleft"></div>
          				<div class="round-border-topright"></div>
          				<h1 class="<?echo $color;?>"><?echo $message_edit_user;?></h1>
             				<div class="loginform">
            					<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              						<fieldset>
              						<?echo $list_of_users;?>
                					<p><label for="login" class="top">Логін:</label><br />
					               	<input type="text" name="edit_login" id="edit_login" tabindex="20" class="field" value="<?=$_POST['edit_login']?>" /></p>
					               	<p><label for="edit_surname" class="top">Прізвище:</label><br />
					               	<input type="text" name="edit_surname" id="edit_surname" tabindex="30" class="field" value="<?=$_POST['edit_surname']?>" /></p>
					               	<p><label for="edit_name" class="top">Ім'я:</label><br />
					               	<input type="text" name="edit_name" id="edit_name" tabindex="30" class="field" value="<?=$_POST['edit_name']?>" /></p>
					               	<p><label for="edit_patronymic" class="top">По батькові:</label><br />
					               	<input type="text" name="edit_patronymic" id="edit_patronymic" tabindex="30" class="field" value="<?=$_POST['edit_patronymic']?>" /></p>
    	        					<p><label for="pass" class="top">Пароль:</label><br />
                  					<input type="password" name="edit_pass" id="pass" tabindex="40" class="field" value="" /></p>
                  					<p><label for="pass1" class="top">Підтвердити пароль :</label><br />
                  					<input type="password" name="edit_pass1" id="pass1" tabindex="50" class="field" value="" /></p>
    	        					<p><label for="status" class="top">Права доступу:</label><br />
    	        						<input type="radio" name="edit_status" id="status_admin" class="radio" tabindex="60" size="1" value="admin"/>
    	        						<label for="status" class="right">Адміністратор</label></p>
    	        					<p>	<input type="radio" name="edit_status" id="status_user" class="radio" tabindex="70" size="1" value="user"/>
    	        						<label for="status" class="right">Користувач</label></p>
    	        						<p><input type="checkbox" name="executive" id="executive" value="+" class="radio" />
    	        					<label for="checkbox" class="right">Відповідальний</label></p>
    	        					<p><input type="submit" name="edit" class="button" tabindex="80" value="ОК"  /></p>
	            					</fieldset>
            					</form>


            				<input type="hidden" name="debug" id="debug" class="field" value=""/>

                   			<script language="JavaScript">
                       		function findUser(selected_user)
                       			{
       		                	var login=document.getElementById("edit_login");
       		                	var surname=document.getElementById("edit_surname");
       		                	var name=document.getElementById("edit_name");
       		                	var patronymic=document.getElementById("edit_patronymic");
       		                	var status_admin=document.getElementById("status_admin");
       		                	var status_user=document.getElementById("status_user");
       		                	var executive=document.getElementById("executive");
                                JsHttpRequest.query
                       				(
                       				'UserBackend.php',
                       					{
                       					'selected_user' : selected_user

                       					},
                       				function (result, errors)
                       					{
                       					document.getElementById("debug").value = errors;
										//document.getElementById("list").value=result.length;     //checked = true
                                        login.value=result.login;
                                        surname.value=result.surname;
                                        name.value=result.name;
                                        patronymic.value=result.patronymic;
                                        if (result.status!='admin') status_user.checked=true;
                                        if (result.status=='admin') status_admin.checked=true;
                                        if (result.executive=='+') executive.checked=true;
                                        executive
                       					},
                       				false
                       				);
                       			}
            			</script>
          					</div>
        				</div>
            		</div>
            		<hr class="clear-contentunit" />

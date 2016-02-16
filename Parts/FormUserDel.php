					<div class="column1-unit">
          				<h2>Видалення існуючого облікового запису</h2>
          			</div>
          			<?echo $success;?>
        			<div class="main-subcontent">
          				<div class="<?echo $border_color;?>">
          				<div class="round-border-topleft"></div>
          				<div class="round-border-topright"></div>
          				<h1 class="<?echo $color;?>"><?echo $message_del_user;?></h1>
             				<div class="loginform">
            					<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              						<fieldset>
              						<?echo $list_of_users;?>
                					<p>

                						<input type="checkbox" name="confirm" class="checkbox" tabindex="2" size="1" value=""/>
    	        						<label for="checkbox" class="right">Підтвердити</label>
    	        					</p>
    	        					<p>
    	        						<input type="submit" name="del" class="button" tabindex="3" value="ОК"  />
    	        					</p>
	            					</fieldset>
            					</form>
          					</div>
        				</div>
            		</div>
            		<hr class="clear-contentunit" />
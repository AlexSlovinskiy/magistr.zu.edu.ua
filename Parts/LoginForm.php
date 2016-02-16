<?
    include ("MySQL/MysqlConnect.php");
    //echo date("D");
	$message="�����������";
	$color="green";
	$border_color="subcontent-unit-border-green";
	$num_for_capcha=2;
	$num_for_lock=4;

	if (!isset($_SESSION['try'])) $_SESSION['try']=0;

  	if (isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['enter']))
		{
		$login = mysql_real_escape_string($_POST['login']);
    	$pass = md5($_POST['pass']);
        $capcha=$_POST['capcha'];
        $_SESSION['try']++;

        if (($_SESSION['try'])>$num_for_capcha) //����� ������� ������� �������� �����
        	{
        	if ($capcha===$_SESSION["capcha"]) $capcha_error=0;
        		else $capcha_error=1;
        	}
        else $capcha_error=0;

        if ($_SESSION['try']>$num_for_lock) //����� ����� - ���������� ����� �� 30 ������
			{
			$_SESSION['lock']=time()+30;
			}

        if ($capcha_error==0)
        	{
    		// ������ ������ � �� � ���� ����� � ����� ������� � �������
     		$query = "SELECT * FROM `users` WHERE `login`='".$login."' AND `status` <> 'usr' LIMIT 1";
    		$sql = mysql_query($query) or die(mysql_error());
  			if (mysql_num_rows($sql) == 1)
  				{
  				$row = mysql_fetch_assoc($sql);
  				if ($row['status']=="guest")
  					{
  					$color="red";
					$border_color="subcontent-unit-border-red";
            		$message="���� ����������!";
            		unset ($_SESSION);
  					unset ($_POST);
            		}
  				if ($pass===$row['pass'])
  					{
  					if ($row['status']=="user") //���� ������������ ���� �� �������
  						{
  						$query1 = "SELECT * FROM `access` WHERE `week_day` = '".date("l")."' LIMIT 1";
    					$sql1 = mysql_query($query1) or die(mysql_error());
    					if (mysql_num_rows($sql1) == 1)
  							{
  							$row1 = mysql_fetch_assoc($sql1);
  							if ($row1["holyday"]=="+")
	  							{
	  							$color="red";
								$border_color="subcontent-unit-border-red";
            					$message="���� ����������!";
            					unset ($_SESSION);
  								unset ($_POST);
            					}
            				if ($row1["holyday"]=="-")
            					{
            					$row1['befor_h']+=1;
            					if ($row1['from_m']<10) $row1['from_m']="0".$row1['from_m'];
            					if ($row1['befor_m']<10) $row1['befor_m']="0".$row1['befor_m'];
                            		if ((date("G")>$row1['from_h'] && date("G")<$row1['befor_h']) ||
                            			(date("G")==$row1['from_h'] && date("i")>=$row1['from_m']) ||
                            			(date("G")==$row1['befor_h'] && date("i")<=$row1['befor_m']))
                            			{
                            			$_SESSION['user_id'] = $row['user_id'];
        	    						$_SESSION['login'] = $login;
        	    						$_SESSION['user_surname'] = $row['user_surname'];
	        	    					$_SESSION['user_name'] = $row['user_name'];
        	    						$_SESSION['user_patronymic'] = $row['user_patronymic'];
        	    						$_SESSION['status'] = $row['status'];
        	    						$_SESSION['banned'] = $row['banned'];
        	    						$_SESSION['try']=0;
        	    						$_SESSION['ShowModal']=0;
        	    						$query1 = "SELECT * FROM `messages` WHERE `mes_id`=1 LIMIT 1";
										$sql1 = mysql_query($query1) or die(mysql_error());
											if (mysql_num_rows($sql1) == 1)
  												{
  												$row1 = mysql_fetch_assoc($sql1);
  												$_SESSION['mes_header']=$row1['mes_header'];
  												$_SESSION['mes_text']=$row1['mes_text'];
  												}
										print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
										exit();
                            			}
                            	else
                            		{
                            		$color="red";
  									$border_color="subcontent-unit-border-red";
  									$message="���� ����������!";
  									unset ($_SESSION);
  									unset ($_POST);
                            		}
            					}
  							}
  						}

  					else if ($row['status']=="admin" || $row['status']=="root")//��� ������ ���� ������ ��������
	  					{
  						$_SESSION["user_id"] = $row["user_id"];
        	    		$_SESSION['login'] = $login;
        	    		$_SESSION['user_surname'] = $row['user_surname'];
        	    		$_SESSION['user_name'] = $row['user_name'];
        	    		$_SESSION['user_patronymic'] = $row['user_patronymic'];
        	    		$_SESSION['status'] = $row['status'];
        	    		$_SESSION['banned'] = $row['banned'];
                    	$_SESSION['try']=0;
                    	$_SESSION['ShowModal']=0;
                    	$query1 = "SELECT * FROM `messages` WHERE `mes_id`=1 LIMIT 1";
										$sql1 = mysql_query($query1) or die(mysql_error());
											if (mysql_num_rows($sql1) == 1)
  												{
  												$row1 = mysql_fetch_assoc($sql1);
  												$_SESSION['mes_header']=$row1['mes_header'];
  												$_SESSION['mes_text']=$row1['mes_text'];
  												}
        	    		print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
						exit();
						}
					}
				else
        			{
        			$color="red";
					$border_color="subcontent-unit-border-red";
            		$message="������� ������!";
            		}
        		}
        	else
        		{
        		$color="red";
				$border_color="subcontent-unit-border-red";
            	$message="������� ����!";
    			}
    		}
    	else
    		{
        	$color="red";
			$border_color="subcontent-unit-border-red";
            $message="����� �������!";
    		}
		}

	if ($_SESSION['try']>$num_for_lock)
		{
		$color="red";
		$border_color="subcontent-unit-border-red";
        $message="���� �����������!";
    	if (time()>$_SESSION['lock'])
			{
			$_SESSION['try']=$num_for_capcha+1;
			$color="green";
			$border_color="subcontent-unit-border-green";
        	$message="�����������";
			}
    	}

?>
	  	<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
      		<!-- Pagetitle -->
        		<h1 class="pagetitle">���� �� �������</h1>
        			<div class="main-subcontent">
          			<div class="<?echo $border_color;?>">
          			<div class="round-border-topleft"></div>
          			<div class="round-border-topright"></div>
          				<h1 class="<?echo $color;?>"><?echo $message;?></h1>

<?php
	$length = 5;
    $alphabet = '1234567890abcdefghijkmnpqrstuvwxyz';
	$string=substr ( str_shuffle ( str_repeat ( $alphabet, $length ) ), 0, $length ); //���������� �����
	$img = imagecreate(140,50); //������� ��������

	if ($color=="red")
		{
		$color = imagecolorAllocate($img,249,183,169);
		$border_color = imagecolorAllocate($img,212,12,12);
		}
		else
			{
			$color = imagecolorAllocate($img,217,239,185);
			$border_color = imagecolorAllocate($img,160,214,81);
			}

	$text_color = imagecolorAllocate($img,102,102,102);
	$�� = (imageSX($img)-1*strlen($string))/2;
	imagettftext($img,23,-3,10,30,$text_color,'font.TTF',$string);

	imageGif($img,"img/number.gif");
	imageDestroy($img);

 	$_SESSION["capcha"]= $string;

?>
             			<div class="loginform" <?php if ($_SESSION['try']>$num_for_lock) echo 'style="background:url(../img/lock.png) no-repeat 60% 30%;"'; ?>>
            				<form method="post" action="index.php" >
              					<fieldset >
                					<p>
                						<label for="login" class="top">����:</label><br />
					                	<input type="text" name="login" id="login" tabindex="1" class="field" value="<?=$_POST['login']?>" <?php if ($_SESSION['try']>$num_for_lock) echo 'disabled="disabled" style="background:transparent; border-color:rgb(212, 12, 12);"'?>/>
					                </p>
    	        					<p>
    	        						<label for="pass" class="top">������:</label><br />
                  						<input type="password" name="pass" id="pass" tabindex="2" class="field" value="" <?php if ($_SESSION['try']>$num_for_lock) echo 'disabled="disabled" style="background:transparent; border-color:rgb(212, 12, 12);"'?>/>
                  					</p>
                   			<?php
                   				if (($_SESSION['try'])>$num_for_capcha && $_SESSION['try']<=$num_for_lock)
                        		echo '
                                    <p>
					                	<input type=image src="img/number.gif?'.time().'" name="sub" style="margin:7px 0px 3px 20px;">
					                </p>
    	        					<p>
    	        						<label for="capcha" class="top">������ ���:</label><br />
					                	<input type="text" name="capcha" id="capcha" tabindex="4" class="field"/>
					                </p>';
					 		?>
					               	<p>
    	        						<input type="checkbox" name="remember" id="remember" class="checkbox" tabindex="5" size="1" value=""/>
    	        						<label for="checkbox" class="right">�����'�����</label>
    	        					</p>
    	        					<p>
    	        						<input type="submit" name="enter" class="button" tabindex="10" value="��"  <?php if ($_SESSION['try']>$num_for_lock) echo 'disabled="disabled" style="background-color:rgb(249, 183, 169);border-color:rgb(212, 12, 12);"'?>/>
    	        					</p>


	            				</fieldset>
            				</form>
          				</div>
        			</div>
            		</div>
            	<hr class="clear-contentunit" />
          	</div>
 		</div>
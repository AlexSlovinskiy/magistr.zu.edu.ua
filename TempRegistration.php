<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");

$_SESSION["is_registred"]=false;
?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">Попередня реєстрація випускника бакалаврату
        			<?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?>
        		року </h1>
					<div class="column1-unit">
                    	<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
            						Дана сторінка дозволяє всім бажаючим подати інформацію про себе,
            						яка необхідна для отримання диплому про вищу освіту державного зразка та вступу до ЖДУ імені Івана Франка.
            					</span>
            				</li>
						</ul>
						<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
                                	Попередня реєстрація абітурієнта значно прискорить процедуру подачі документів до приймальної комісії ЖДУ.
            					</span>
            				</li>
            			</ul>
            			<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
                                	Попередня реєстрація не звільняє абітурієнта від обов`язкової подачі паперових документів
                                	з 01 липня <?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?> року по 14 липня <?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?> року.
            					</span>
            				</li>
            			</ul>
            			<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
            						Із переліком документів, які необхідні для вступу Ви маєте змогу ознайомитись
            						на <a href="http://zu.edu.ua/list.html" style="color:#3300CC">офіційному сайті університету</a>
            					</span>
            				</li>
            			</ul>
            			<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(212,12,12); font-weight:bold; font-size:110%;">
            						Для заповнення анкети Вам необхідно мати при собі паспорт та ідентифікаційний код!!!
            					</span>
            				</li>
            			</ul>
            			<form method="post" class="simpleform" action="RegistrationAdd.php">
            			<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
                                	З <a href="http://zu.edu.ua/ymovu.html"  style="color:#3300CC">правилами прийому до університету</a>
                                	у <?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?> році  ознайомлений (-а).
									Не заперечую щодо внесення моїх персональних даних до бази даних абітурієнтів,
									а також їхнього використання в процесі вступу до ВНЗ.
									<div id="agree_but" style="margin-left:50px;">
									ПОГОДЖУЮСЬ!
                                	<input type="button" name="Name" id="agree_but" class="button" value="" onClick="showAgree()" style="float:left; width:25px; height:25px; border:none; background:url(../img/lb_true.png) no-repeat 5% 10%;" >
                                    </div>
                                </span>
            				</li>
						</ul>
						<div id="agreement" style="display:none;">
							<ul>
	            				<li style="display:inline;">
	            					<span style="color:rgb(80,80,80); font-weight:bold;">
                        				Перейти до анкети реєстрації:&nbsp;
                        			</span>
                        			<input type="submit" name="go_reg" class="button" value="Реєстрація&nbsp;&nbsp;&gt;&gt;&gt;" />
                        		</li>
                  			</ul>
                  		</div>
                  		</form>

					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

<?php

include ("Parts/Footer.php");

?>

<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");

$_SESSION["is_registred"]=false;
?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">��������� ��������� ���������� �����������
        			<?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?>
        		���� </h1>
					<div class="column1-unit">
                    	<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
            						���� ������� �������� ��� �������� ������ ���������� ��� ����,
            						��� ��������� ��� ��������� ������� ��� ���� ����� ���������� ������ �� ������ �� ��� ���� ����� ������.
            					</span>
            				</li>
						</ul>
						<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
                                	��������� ��������� �������� ������ ���������� ��������� ������ ��������� �� ���������� ���� ���.
            					</span>
            				</li>
            			</ul>
            			<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
                                	��������� ��������� �� ������� �������� �� ����`������ ������ ��������� ���������
                                	� 01 ����� <?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?> ���� �� 14 ����� <?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?> ����.
            					</span>
            				</li>
            			</ul>
            			<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
            						�� �������� ���������, �� �������� ��� ������ �� ���� ����� ������������
            						�� <a href="http://zu.edu.ua/list.html" style="color:#3300CC">���������� ���� �����������</a>
            					</span>
            				</li>
            			</ul>
            			<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(212,12,12); font-weight:bold; font-size:110%;">
            						��� ���������� ������ ��� ��������� ���� ��� ��� ������� �� ���������������� ���!!!
            					</span>
            				</li>
            			</ul>
            			<form method="post" class="simpleform" action="RegistrationAdd.php">
            			<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">
                                	� <a href="http://zu.edu.ua/ymovu.html"  style="color:#3300CC">��������� ������� �� �����������</a>
                                	� <?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?> ����  ������������ (-�).
									�� ��������� ���� �������� ��� ������������ ����� �� ���� ����� ��������,
									� ����� ������� ������������ � ������ ������ �� ���.
									<div id="agree_but" style="margin-left:50px;">
									����������!
                                	<input type="button" name="Name" id="agree_but" class="button" value="" onClick="showAgree()" style="float:left; width:25px; height:25px; border:none; background:url(../img/lb_true.png) no-repeat 5% 10%;" >
                                    </div>
                                </span>
            				</li>
						</ul>
						<div id="agreement" style="display:none;">
							<ul>
	            				<li style="display:inline;">
	            					<span style="color:rgb(80,80,80); font-weight:bold;">
                        				������� �� ������ ���������:&nbsp;
                        			</span>
                        			<input type="submit" name="go_reg" class="button" value="���������&nbsp;&nbsp;&gt;&gt;&gt;" />
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

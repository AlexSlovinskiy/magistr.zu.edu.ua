			<div class="header-bottom">
       			<div class="nav2">
          		<!-- Navigation menu -->
          			<ul>
          				<? if (isset ($_SESSION["login"]))
          					{
          					if ($_SESSION['status']=="user")
          					echo '<li><a href="MainPage.php" title="������� �������">�������</a></li>
          							<li><a href="AbiturientAdd.php" title="������ ������ ��������">����� �������</a>
          							<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AbiturientAdd.php?add=mag" title="������ �������� (�����������)">�����������</a></li>
                  						<li><a href="AbiturientAdd.php?add=spc" title="������ �������� (����������)">���������</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="Reports.php" title="������ ���������">������</a></li>
          							<li><a href="Exams.php" title="������ ������">������</a></li>
          							<li><a href="UserSpace.php" title="���� ����� �� ������">�� ���</a></li>';

          					if ($_SESSION['status']=="admin")
          					echo '<li><a href="MainPage.php" title="������� �������">�������</a></li>
          							<li><a href="AbiturientAdd.php" title="������ ������ ��������">����� �������</a>
          							<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AbiturientAdd.php?add=mag" title="������ �������� (�����������)">�����������</a></li>
                  						<li><a href="AbiturientAdd.php?add=spc" title="������ �������� (����������)">���������</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="Reports.php" title="������ ���������">������</a></li>
          							<li><a href="Exams.php" title="������ ������">������</a></li>
          							<li><a href="AdminSpaceUsers.php" title="��������� ��������� ��������">���������<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceUsers.php?act=new" title="��������� ������ ��������� ������">����� ��������</a></li>
                  						<li><a href="AdminSpaceUsers.php?act=edit" title="����������� ��������� ��������� ������">����������� �����</a></li>
                  						<li><a href="AdminSpaceUsers.php?act=del" title="��������� ��������� ��������� ������">��������� ���������</a></li>
                                        </ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminSpaceSpec.php" title="��������� ���������������">������������<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceSpec.php?act=new" title="��������� ���� ������������">���� ������������</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=edit" title="����������� ������� ������������">����������� �������</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=del" title="��������� ������� ������������">��������� �������</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=spc" title="������������">������������</a></li>
                  						<li><a href="AdminSpaceSpecAdditional.php" title="�������� ������� ��� ������������">�������� �������</a></li>
                                        </ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminSpaceFT.php" title="���������� �� ����� �����">����������/�����<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceFaculty.php" title="����������">����������</a></li>
                  						<li><a href="AdminSpaceTraining.php" title="����� �����">����� �����</a></li>
                  						<li><a href="AdminSpaceTrainingBak.php" title="������� ����������">������� ����������</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminPage.php" title="C������ ������������">������<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceAccess.php" title="������ �� �������">������ �� �������</a></li>
                  						<li><a href="AdminSpaceRegistredList.php" title="������ ���������� �������������">��������� �����</a></li>
                  						<li><a href="RegistrationEdit.php" title="����������� ����� ���������� ���������">�����������</a></li>
                  						<li><a href="AdminSpaceDiploma.php" title="������� ������ ��� ������� �� Education">������� ������</a></li>
                  						<li><a href="AdminSpaceMessages.php" title="����������">����������</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>';

          					if ($_SESSION['status']=="root")
          					echo '<li><a href="MainPage.php" title="������� �������">�������</a></li>
          							<li><a href="AbiturientAdd.php" title="������ ������ ��������">����� �������</a>
          							<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AbiturientAdd.php?add=mag" title="������ �������� (�����������)">�����������</a></li>
                  						<li><a href="AbiturientAdd.php?add=spc" title="������ �������� (����������)">���������</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="Reports.php" title="������ ���������">������</a></li>
          							<li><a href="Exams.php" title="������ ������">������</a></li>
          							<li><a href="AdminSpaceUsers.php" title="��������� ��������� ��������">���������<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceUsers.php?act=new" title="��������� ������ ��������� ������">����� ��������</a></li>
                  						<li><a href="AdminSpaceUsers.php?act=edit" title="����������� ��������� ��������� ������">����������� �����</a></li>
                  						<li><a href="AdminSpaceUsers.php?act=del" title="��������� ��������� ��������� ������">��������� ���������</a></li>
                                        </ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminSpaceSpec.php" title="��������� ���������������">������������<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceSpec.php?act=new" title="��������� ���� ������������">���� ������������</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=edit" title="����������� ������� ������������">����������� �������</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=del" title="��������� ������� ������������">��������� �������</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=spc" title="������������">������������</a></li>
										<li><a href="AdminSpaceSpecAdditional.php" title="�������� ������� ��� ������������">�������� �������</a></li>
                                        </ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminSpaceFT.php" title="���������� �� ����� �����">����������/�����<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceFaculty.php" title="����������">����������</a></li>
                  						<li><a href="AdminSpaceTraining.php" title="����� �����">����� �����</a></li>
                  						<li><a href="AdminSpaceTrainingBak.php" title="������� ����������">������� ����������</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminPage.php" title="C������ ������������">������<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceAccess.php" title="������ �� �������">������ �� �������</a></li>
                  						<li><a href="AdminSpaceRegistredList.php" title="������ ���������� �������������">��������� �����</a></li>
                  						<li><a href="AdminSpaceDiploma.php" title="������� ������ ��� ������� �� Education">������� ������</a></li>
                  						<li><a href="AdminSpaceMessages.php" title="����������">����������</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>';
          					}
          					else
          						{

          						echo '<li><a href="index.php" title="������� �������">������� �������</a></li>
          								<li><a href="TempRegistration.php" title="��������� ��������� ��������">��������� ���������</a></li>';

          						}
               			?>
					</ul>
             	</div>
	  		</div>



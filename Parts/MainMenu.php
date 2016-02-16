			<div class="header-bottom">
       			<div class="nav2">
          		<!-- Navigation menu -->
          			<ul>
          				<? if (isset ($_SESSION["login"]))
          					{
          					if ($_SESSION['status']=="user")
          					echo '<li><a href="MainPage.php" title="Головна сторінка">Головна</a></li>
          							<li><a href="AbiturientAdd.php" title="Додати нового абітурієнта">Новий абітурієнт</a>
          							<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AbiturientAdd.php?add=mag" title="Додати абітурієнта (магістратура)">Магістратура</a></li>
                  						<li><a href="AbiturientAdd.php?add=spc" title="Додати абітурієнта (спеціаліста)">Спеціаліст</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="Reports.php" title="Журнал реєстрації">Журнал</a></li>
          							<li><a href="Exams.php" title="Вступні іспити">Іспити</a></li>
          							<li><a href="UserSpace.php" title="Зміна логіну та пароля">Мої дані</a></li>';

          					if ($_SESSION['status']=="admin")
          					echo '<li><a href="MainPage.php" title="Головна сторінка">Головна</a></li>
          							<li><a href="AbiturientAdd.php" title="Додати нового абітурієнта">Новий абітурієнт</a>
          							<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AbiturientAdd.php?add=mag" title="Додати абітурієнта (магістратура)">Магістратура</a></li>
                  						<li><a href="AbiturientAdd.php?add=spc" title="Додати абітурієнта (спеціаліста)">Спеціаліст</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="Reports.php" title="Журнал реєстрації">Журнал</a></li>
          							<li><a href="Exams.php" title="Вступні іспити">Іспити</a></li>
          							<li><a href="AdminSpaceUsers.php" title="Управління обліковими записами">Оператори<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceUsers.php?act=new" title="Створення нового облікового запису">Новий оператор</a></li>
                  						<li><a href="AdminSpaceUsers.php?act=edit" title="Редагування існуючого облікового запису">Редагування даних</a></li>
                  						<li><a href="AdminSpaceUsers.php?act=del" title="Видалення існуючого облікового запису">Видалення оператора</a></li>
                                        </ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminSpaceSpec.php" title="Управління спеціальностями">Спеціальності<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceSpec.php?act=new" title="Створення нової спеціальності">Нова спеціальність</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=edit" title="Редагування існуючої спеціальності">Редагування існуючої</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=del" title="Видалення існуючої спеціальності">Видалення існуючої</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=spc" title="Спеціалізації">Спеціалізації</a></li>
                  						<li><a href="AdminSpaceSpecAdditional.php" title="Додаткові відомості про спеціальності">Додаткові відомості</a></li>
                                        </ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminSpaceFT.php" title="Факультети та галузі знань">Факультети/галузі<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceFaculty.php" title="Факультети">Факультети</a></li>
                  						<li><a href="AdminSpaceTraining.php" title="Галузі знань">Галузі знань</a></li>
                  						<li><a href="AdminSpaceTrainingBak.php" title="Напрями бакалаврат">Напрями бакалаврат</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminPage.php" title="Cторінка адміністратора">Адмінка<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceAccess.php" title="Доступ до системи">Доступ до системи</a></li>
                  						<li><a href="AdminSpaceRegistredList.php" title="Списки попередньо зареєстрованих">Попередній реєстр</a></li>
                  						<li><a href="RegistrationEdit.php" title="Редагування даних попердноьї реєстрації">Редагування</a></li>
                  						<li><a href="AdminSpaceDiploma.php" title="Експорт заявок для імпорту до Education">Експорт заявок</a></li>
                  						<li><a href="AdminSpaceMessages.php" title="Оголошення">Оголошення</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>';

          					if ($_SESSION['status']=="root")
          					echo '<li><a href="MainPage.php" title="Головна сторінка">Головна</a></li>
          							<li><a href="AbiturientAdd.php" title="Додати нового абітурієнта">Новий абітурієнт</a>
          							<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AbiturientAdd.php?add=mag" title="Додати абітурієнта (магістратура)">Магістратура</a></li>
                  						<li><a href="AbiturientAdd.php?add=spc" title="Додати абітурієнта (спеціаліста)">Спеціаліст</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="Reports.php" title="Журнал реєстрації">Журнал</a></li>
          							<li><a href="Exams.php" title="Вступні іспити">Іспити</a></li>
          							<li><a href="AdminSpaceUsers.php" title="Управління обліковими записами">Оператори<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceUsers.php?act=new" title="Створення нового облікового запису">Новий оператор</a></li>
                  						<li><a href="AdminSpaceUsers.php?act=edit" title="Редагування існуючого облікового запису">Редагування даних</a></li>
                  						<li><a href="AdminSpaceUsers.php?act=del" title="Видалення існуючого облікового запису">Видалення оператора</a></li>
                                        </ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminSpaceSpec.php" title="Управління спеціальностями">Спеціальності<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceSpec.php?act=new" title="Створення нової спеціальності">Нова спеціальність</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=edit" title="Редагування існуючої спеціальності">Редагування існуючої</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=del" title="Видалення існуючої спеціальності">Видалення існуючої</a></li>
                  						<li><a href="AdminSpaceSpec.php?act=spc" title="Спеціалізації">Спеціалізації</a></li>
										<li><a href="AdminSpaceSpecAdditional.php" title="Додаткові відомості про спеціальності">Додаткові відомості</a></li>
                                        </ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminSpaceFT.php" title="Факультети та галузі знань">Факультети/галузі<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceFaculty.php" title="Факультети">Факультети</a></li>
                  						<li><a href="AdminSpaceTraining.php" title="Галузі знань">Галузі знань</a></li>
                  						<li><a href="AdminSpaceTrainingBak.php" title="Напрями бакалаврат">Напрями бакалаврат</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>
          							<li><a href="AdminPage.php" title="Cторінка адміністратора">Адмінка<!--[if IE 7]><!--></a><!--<![endif]-->
          								<!--[if lte IE 6]><table><tr><td><![endif]-->
                						<ul>
                  						<li><a href="AdminSpaceAccess.php" title="Доступ до системи">Доступ до системи</a></li>
                  						<li><a href="AdminSpaceRegistredList.php" title="Списки попередньо зареєстрованих">Попередній реєстр</a></li>
                  						<li><a href="AdminSpaceDiploma.php" title="Експорт заявок для імпорту до Education">Експорт заявок</a></li>
                  						<li><a href="AdminSpaceMessages.php" title="Оголошення">Оголошення</a></li>
                  						</ul>
              							<!--[if lte IE 6]></td></tr></table></a><![endif]-->
          							</li>';
          					}
          					else
          						{

          						echo '<li><a href="index.php" title="Головна сторінка">Головна сторінка</a></li>
          								<li><a href="TempRegistration.php" title="Попередня реєстрація абітурієнтів">Попередня реєстрація</a></li>';

          						}
               			?>
					</ul>
             	</div>
	  		</div>



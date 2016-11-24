<section class="container">
	<h3>Варіанти запитів до api:</h3>
	<table class="table table-hover">
		<thead>
		<tr class="info">
			<th>Запит</th>
			<th>Опис</th>
			<th>Параметри</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td>/api/user</td>
				<td>Отримати інформацію про користувача за допомогою електронної адреси або ідентифікатора</td>
				<td>id - ідентифікатор користувача, email - електронна адреса</td>
			</tr>
			<tr>
				<td>/api/user/find</td>
				<td>Знайти користувачів за іменем або прізвищем</td>
				<td>name - частина імені чи прізвища або і те і інше</td>
			</tr>
			<tr>
				<td>/api/user/update</td>
				<td>Редагування даних користувача</td>
				<td>id - ідентифікатор користувача, values - масив, в якому потрібно вказати дані, які потрібно змінити</td>
			</tr>
			<tr>
				<td>/api/institution</td>
				<td>Отримати інформацію про заклад за допомогою ідентифікатора</td>
				<td>id - ідентифікатор користувача</td>
			</tr>
			<tr>
				<td>/api/institution/find</td>
				<td>Знайти заклади за назвою</td>
				<td>name - частина назви</td>
			</tr>
			<tr>
				<td>/api/institution/update</td>
				<td>Редагування даних закладу</td>
				<td>id - ідентифікатор закладу, values - масив, в якому потрібно вказати дані, які потрібно змінити</td>
			</tr>
			<tr>
				<td>/api/login</td>
				<td>Авторизація</td>
				<td>email - електронна адреса, password - пароль</td>
			</tr>
			<tr>
				<td>/api/logout</td>
				<td>Вихід з системи</td>
				<td></td>
			</tr>
			<tr>
				<td>/api/user/new</td>
				<td>Реєстрація</td>
				<td>user[first_name] - ім'я; user[last_name] - прізвище; user[email] - електронна адреса; user[contact_phone] - номер телефону ; user[password] - пароль</td>
			</tr>
		</tbody>
	</table>
</section>

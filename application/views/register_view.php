<div class="tooltip">test</div>
<div class="card p-4 mt-4" style="width: 25rem;">
	<h1 class="text-muted">Регистрация:</h1>
	<form action="" method="post">
		<table class="">
			<tr>
				<td>ФИО</td>
				<td><input class="form-control" type="text" name="fio"></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input class="form-control" type="text" name="email"></td>
			</tr>
			<tr>
				<td>Моб. телефон:</td>
				<td><input class="form-control" type="text" name="phone"></td>
			</tr>
			<tr>
				<td>Город:</td>
				<td><input class="form-control" type="text" name="address_city"></td>
			</tr>
			<tr>
				<td>Область:</td>
				<td><input class="form-control" type="text" name="address_obl"></td>
			</tr>
			<tr>
				<td>Район:</td>
				<td><input class="form-control" type="text" name="address_region"></td>
			</tr>
			<tr>
				<td>Адрес:</td>
				<td><input class="form-control" type="text" name="address_ulitsya"></td>
			</tr>
			<tr>
				<td>Пароль:</td>
				<td><input class="form-control" type="password" name="password"></td>
			</tr>
			<tr>
				<td>Подтвердите пароль:</td>
				<td><input class="form-control" type="password" name="password2"></td>
			</tr>
			<th colspan="2" style="text-align: right">
			<button class="btn btn-secondary" type="submit" value="add" name="btn">Зарегистрировать</button></th>
			
			
		</table>
	</form>
			<?php if($data['register_status']=="good_register") { ?>
				<p style="color:green"><p style="color:green">Вы успешно зарегистрировались. На вашу почту отправлено сообщение с ссылкой для верификации аккаунта.</p></p>
			<?php } elseif($data['register_status']=="bad_register") { ?>
				<p style="color:red">Ошибка! Проверьте введенные данные.</p>
			<?php } ?>
</div>
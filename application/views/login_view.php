<div class="card p-4 mt-4" style="width: 25rem;">
	<h1 class="text-muted">Авторизация:</h1>
	<form action="" method="post">
		<table class="login">
			<tr>
				<td>E-mail</td>
				<td><input class="form-control" type="text" name="email"></td>
			</tr>
			<tr>
				<td>Пароль</td>
				<td><input class="form-control" type="password" name="password"></td>
			</tr>
			<th colspan="2" style="text-align: right">
			<input class="btn btn-secondary" type="submit" value="Войти" name="btn"></th>
		</table>
	</form>

	<?php #extract($data); ?>
	<?php if($data['login_status']=="access_granted") { ?>
		<p style="color:green">Авторизация прошла успешно.</p>
	<?php } elseif($data['login_status']=="access_denied") { ?>
		<p style="color:red">Логин и/или пароль введены неверно, либо ваш аккаунт не верифицирован! Проверьте вашу почту.</p>
	<?php } ?>
</div>

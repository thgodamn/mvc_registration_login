<div class="card p-4 mt-4" style="width: 25rem;">
	<?php if($data['activation_status']=="good_activation") { ?>
		<p style="color:green">Вы успешно верифицировали ваш аккаунт.</p>
	<?php } elseif($data['activation_status']=="bad_activation") { ?>
		<p style="color:red">Ошибка! Данная ссылка не действительна.</p>
	<?php } ?>
</div>
<?php
if (isset($_GET['p']))
	$current_page = intval($_GET['p']);
else $current_page = 1;

if (isset($_GET['s']))
	$sort = intval($_GET['s']);
else $sort = 0;

#сортировка по имени, e-mail, статусу
$a_class_sort = ['','','','','',''];
if ($sort % 2 == 0) $a_class_sort[$sort] = 'down';
else $a_class_sort[$sort] = 'up';
?>
<h1 class="text-muted">Список задач:</h1>
<table class="table table-striped table-bordered table-hover">
	<thead class="">
		<?php 
			echo "<tr>";
			if ((isset($_GET['s']) && $_GET['s'] == '0') || !isset($_GET['s']))
				echo '<th><a class="btn '.$a_class_sort[0].'" href="/?p='.($current_page).'&s=1">Имя пользователя</a></th>';
			else echo '<th><a class="btn '.$a_class_sort[1].'" href="/?p='.($current_page).'&s=0">Имя пользователя</a></th>';
			
			if (isset($_GET['s']) && $_GET['s'] == '2')
				echo '<th><a class="btn '.$a_class_sort[2].'" href="/?p='.($current_page).'&s=3">E-mail</a></th>';
			else echo '<th><a class="btn '.$a_class_sort[3].'" href="/?p='.($current_page).'&s=2">E-mail</a></th>';
			
			if (isset($_GET['s']) && $_GET['s'] == '4')
				echo '<th><a class="btn '.$a_class_sort[4].'" href="/?p='.($current_page).'&s=5">Телефон</a></th>';
			else echo '<th><a class="btn '.$a_class_sort[5].'" href="/?p='.($current_page).'&s=4">Телефон</a></th>';
			
			echo '<th><div>Адрес</div></th>';
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			
			foreach ($data['table'] as $row) {
				echo "<tr>";
				echo '<td>'.$row['fio'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				echo '<td>'.$row['phone'].'</td>';
				echo '<td>'.$row['address'].'</td>';
				echo "</tr>";
			}
		?>
	</tbody>
</table>

<ul class="pagination justify-content-center">
<?php
#Пагинация
for ($i = 0; $i < $data['count_pages']/10; $i++) {
	if ($i+1 != $current_page)
		echo '<li class="page-item"><a class="page-link" href="/?p='.($i+1).'&s='.$sort.'">'.($i+1).'</a></li>';
	else echo '<li class="page-item active"><a class="page-link" href="/?p='.($i+1).'&s='.$sort.'">'.($i+1).'</a></li>';
}
?>
</ul>
<?php

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
  }

$dataFile = 'tasks.txt';

$id = uniqid();

$addedAt = date('Y年m月d日');

$task = '';

$DATA = [];

$BOARD = [];

if (file_exists($dataFile)) {
	$BOARD = json_decode(file_get_contents($dataFile));

	}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if(!empty($_POST['task'])) {

		$task = $_POST['task'];

		$DATA = [$id, $addedAt, $task];

		$BOARD[] = $DATA;

		file_put_contents($dataFile, json_encode($BOARD));


		}
	else if(isset($_POST['del'])) {

		$NEWBOARD = [];

		foreach($BOARD as $DATA) {
		  if($DATA[0] !== $_POST['del']) {
			$NEWBOARD[] = $DATA;

			}


			}

			file_put_contents($dataFile, json_encode($NEWBOARD));
			
		} 


	header('Location: '.$_SERVER['SCRIPT_NAME']);

	exit;


}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo app</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<h1>To Do リスト</h1>

<form action="" method="post">
  <input id="add-task" type="text" name="task">
  <input id="add-button" type="submit" value="追加">
</form>

<table>
  <thead>
    <tr>
		<th>追加日</th>
		<th>やること</th>
		<th>　　</th>
	</tr>
  
  </thead>

  <tbody>
	<?php if(!empty($BOARD)): ?>
	  <?php foreach ($BOARD as $DATA) :?>
  　　<tr>
        <td><?php echo h($DATA[1])?></td>
		<td><?php echo h($DATA[2]); ?>
		</td>
		<td>
			<form class="delete-button" method="post">
			<input type="hidden" name= "del" value= "<?php echo h($DATA[0]); ?>">  
			<input id="delete" type="submit" value="削除">
			</form>
	    </td>
		
	 </tr>
	<?php endforeach ; ?>
	<?else: ?>
	<p id="nocontents">※現在追加されているタスクはありません。</p>
    <?php endif; ?>
  
  </tbody>
  
</table>





	
</body>
</html>

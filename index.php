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


<table>
  <thead>
    <tr>
	  <th>追加日</th>
	  <th>やること</th>
	</tr>
  
  </thead>

  <tbody>
  　　<tr>
        <td>12/25</td>
        <td><a  id="task" href="#">掃除</a></td>
     </tr>
  
  </tbody>
  
</table>

<section id="modal" class="hidden">

  <input type="text">
  <div class="modal-button">
	  
	  <button id="delete">削除</button>
  </div>
  <p><a id="close" href="#">閉じる</a></p>
</section>

<div id="mask" class="hidden"></div>


<script type="text/javascript">

{

	const task = document.getElementById('task');
	const modal = document.getElementById('modal');
	const mask = document.getElementById('mask');
	const close = document.getElementById('close');



	
	
	task.addEventListener('click', e => {
		e.preventDefault;
		modal.classList.remove('hidden');
		mask.classList.remove('hidden');
		
		
	});
	
    close.addEventListener('click', e => {
		e.preventDefault;
		modal.classList.add('hidden');
		mask.classList.add('hidden');


	});
	
    mask.addEventListener('click', () => {
		modal.classList.add('hidden');
		mask.classList.add('hidden');


	});

}




</script>
	
</body>
</html>

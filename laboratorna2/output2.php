<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторна 1 -> Виведення</title>
	
</head>

<body>
  <?php
	$pdo = new PDO(
		'mysql:host=localhost;dbname=lab2',
		'root',
		'root'
	);
  
   echo "<body style='background-color:tan'>";
  echo 'Рядок додано<br><br>';

  $note = $_POST['note'];
  $year = $_POST['year'];
  $month = $_POST['month'];
  $day = $_POST['day'];

  $item =  [$year . '.' . $month . '.' . $day, $note];
  
  $statement = $pdo->prepare('INSERT INTO `notes`(`date`, `note`) VALUES (?, ?)');
  $statement->execute($item);
  
  
  $sql = 'SELECT `date`, `note` FROM `notes` ORDER BY `date` DESC';
  
   echo '<table border = 1>';

   foreach ($pdo->query($sql) as $row) {
    echo '<tr><td>';
    echo $row['date'];
    echo '</td><td>';
    echo $row['note'];
    echo '</td><tr>';
  }

  echo '</table>';
  ?>

<a href="/index2.html">На головну</a>
</body>

</html>
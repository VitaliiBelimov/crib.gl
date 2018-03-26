<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stylesheets/style.css" />
    <title>Шпаргалка</title>
  </head>
  <body>
    <h2>Звіт по платежам</h2>
    <?php
      //Задаем директорию, получаем список файлов в ней
      //$dir = "d:/!Post/Zenit";
	  //$dirP = "d:/!Post/Privatbank";
      $dir = "d:/!Post/Auto";
	  $dirP = "d:/!Post/Auto";
      $files1 = scandir($dir);
	  $files2 = scandir($dirP);

      echo "<h3>Пошта</h3>";
//Голованевск      
      $sum_G = 0;
      echo "<table>";
      
      echo "<tr>", "<th colspan='3'>", "Голованівськ", "</th>", "</tr>";
      echo "<tr>", "<th>", "Файл", "</th>", "<th>", "Дата оплати", "</th>", "<th>", "Сума пачки", "</th>", "</tr>";
      //Перебираем все файлы, работаем с 5002 (Голованевск)
      for ($i = 0; $i < count($files1); $i++) {
        //Проверяем, чтобы попадал только Голованевск (5002)
        if (substr($files1[$i], 0, 4) == "5002") {
          //Склеиваем путь + имя файла
          $dbName = $dir."/".$files1[$i];
          //Проверяем наличие файла
          if (file_exists($dbName)){
            //Работаем с файлом
            //Открываем БД
            $db = dbase_open ($dbName, 0);
            //Читаем первую запись в БД
            $row = dbase_get_record_with_names($db, 1);
            //Выводим дату оплаты и сумму пачки
            echo "<tr>", "<td>", $files1[$i], "</td>", "<td>", substr($row["MTIME"], 0, 10), "</td>", "<td class='sum-pack'>", number_format($row["SUM_PACK"], 2, ',', ' '), "</td>", "</tr>";
            $sum_G += $row["SUM_PACK"];
            //Закрываем БД
            dbase_close($db);
          } else {echo "Не могу открыть файл", $dbName;}
        }  //if
      }  //for
      echo "<tr>", "<th colspan='2'>", "ВСЬОГО:", "</th>", "<th class='sum-pack'>", number_format($sum_G, 2, ',', ' '), "</th>", "</tr>";
      echo "</table>", "<br>";

//Сельськие
      $sum_S = 0;
      echo "<table>";
      echo "<tr>", "<th colspan='3'>", "Сільські каси", "</th>", "</tr>";
      echo "<tr>", "<th>", "Файл", "</th>", "<th>", "Дата оплати", "</th>", "<th>", "Сума пачки", "</th>", "</tr>";
      //Перебираем все файлы, работаем с 5090 (Село)
      for ($i = 0; $i < count($files1); $i++) {
        //Проверяем, чтобы попадал только Село (5090)
        if (substr($files1[$i], 0, 4) == "5090") {
          //Склеиваем путь + имя файла
          $dbName = $dir."/".$files1[$i];
          //Проверяем наличие файла
          if (file_exists($dbName)){
            //Работаем с файлом
            //Открываем БД
            $db = dbase_open ($dbName, 0);
            //Читаем первую запись в БД
            $row = dbase_get_record_with_names($db, 1);
            //Выводим дату оплаты и сумму пачки
            echo "<tr>", "<td>", $files1[$i], "</td>", "<td>", substr($row["MTIME"], 0, 10), "</td>", "<td class='sum-pack'>", number_format($row["SUM_PACK"], 2, ',', ' '), "</td>", "</tr>";
            $sum_S += $row["SUM_PACK"];
            //Закрываем БД
            dbase_close($db);
          } else {echo "Не могу открыть файл", $dbName;}
        }  //if
      }  //for
      echo "<tr>", "<th colspan='2'>", "ВСЬОГО:", "</th>", "<th class='sum-pack'>", number_format($sum_S, 2, ',', ' '), "</th>", "</tr>";
      echo "</table>", "<br>";
      
      
      echo "<table>", "<tr>", "<th>", "РАЗОМ (пошта):", "</th>", "<th class='sum-pack'>", number_format($sum_G + $sum_S, 2, ',', ' '), "</th>", "</tr>", "</table>", "<br>";
      
//Ощадбанк
      echo "<h3>Ощадбанк</h3>";
      $sum_O = 0;
      echo "<table>";
      echo "<tr>", "<th colspan='3'>", "Ощадбанк", "</th>", "</tr>";
      echo "<tr>", "<th>", "Файл", "</th>", "<th>", "Дата оплати", "</th>", "<th>", "Сума пачки", "</th>", "</tr>";
      //Перебираем все файлы, работаем с 5052 (Ощадбанк)
      for ($i = 0; $i < count($files1); $i++) {
        //Проверяем, чтобы попадал только Ощадбанк (5052)
        if (substr($files1[$i], 0, 4) == "5052") {
          //Склеиваем путь + имя файла
          $dbName = $dir."/".$files1[$i];
          //Проверяем наличие файла
          if (file_exists($dbName)){
            //Работаем с файлом
            //Открываем БД
            $db = dbase_open ($dbName, 0);
            //Читаем первую запись в БД
            $row = dbase_get_record_with_names($db, 1);
            //Выводим дату оплаты и сумму пачки
            echo "<tr>", "<td>", $files1[$i], "</td>", "<td>", substr($row["MTIME"], 0, 10), "</td>", "<td class='sum-pack'>", number_format($row["SUM_PACK"], 2, ',', ' '), "</td>", "</tr>";
            $sum_O += $row["SUM_PACK"];
            //Закрываем БД
            dbase_close($db);
          } else {echo "Не могу открыть файл", $dbName;}
        }  //if
      }  //for
      echo "<tr>", "<th colspan='2'>", "ВСЬОГО:", "</th>", "<th class='sum-pack'>", number_format($sum_O, 2, ',', ' '), "</th>", "</tr>";
      echo "</table>", "<br>";

//Приватбанк
      echo "<h3>Приватбанк</h3>";
      $sum_P = 0;
      echo "<table>";
      echo "<tr>", "<th colspan='3'>", "Приватбанк", "</th>", "</tr>";
      echo "<tr>", "<th>", "Файл", "</th>", "<th>", "Дата оплати", "</th>", "<th>", "Сума пачки", "</th>", "</tr>";
      //Перебираем все файлы, работаем с OE (Приватбанк)
      for ($i = 0; $i < count($files2); $i++) {
        //Проверяем, чтобы попадал только Приватбанк (OE)
        if (substr($files2[$i], 0, 2) == "OE") {
          //Склеиваем путь + имя файла
          $dbName = $dirP."/".$files2[$i];
          //Проверяем наличие файла
          if (file_exists($dbName)){
            //Работаем с файлом
            //Открываем БД
            $db = dbase_open ($dbName, 0);
			
			$sum_P_db = 0;
			//Перебираем записи в таблице, находим сумму пачки
			for ($j = 1; $j <= dbase_numrecords($db); $j++) {
				$row = dbase_get_record($db, $j);
				$sum_P_db += $row[9];
			}
            //Выводим дату оплаты и сумму пачки
            echo "<tr>", "<td>", $files2[$i], "</td>", "<td>", substr($row[8],6,2).".".substr($row[8],4,2).".".substr($row[8],0,4) , "</td>", "<td class='sum-pack'>", number_format($sum_P_db, 2, ',', ' '), "</td>", "</tr>";
            $sum_P += $sum_P_db;
            //Закрываем БД
            dbase_close($db);
          } else {echo "Не могу открыть файл", $dbName;}
        }  //if
      }  //for
      echo "<tr>", "<th colspan='2'>", "ВСЬОГО:", "</th>", "<th class='sum-pack'>", number_format($sum_P, 2, ',', ' '), "</th>", "</tr>";
      echo "</table>", "<br>";

//IPay
      echo "<h3>IPay</h3>";
      $sum_P = 0;
      echo "<table>";
      echo "<tr>", "<th colspan='3'>", "IPay", "</th>", "</tr>";
      echo "<tr>", "<th>", "Файл", "</th>", "<th>", "Дата оплати", "</th>", "<th>", "Сума пачки", "</th>", "</tr>";
      //Перебираем все файлы, работаем с iP (IPay
      for ($i = 0; $i < count($files2); $i++) {
        //Проверяем, чтобы попадал только IPay (iP)
        if (substr($files2[$i], 0, 2) == "iP") {
          //Склеиваем путь + имя файла
          $dbName = $dirP."/".$files2[$i];
          //Проверяем наличие файла
          if (file_exists($dbName)){
            //Работаем с файлом
            //Открываем БД
            $db = dbase_open ($dbName, 0);
			
			$sum_P_db = 0;
			//Перебираем записи в таблице, находим сумму пачки
			for ($j = 1; $j <= dbase_numrecords($db); $j++) {
				$row = dbase_get_record($db, $j);
				$sum_P_db += $row[9];
			}
            //Выводим дату оплаты и сумму пачки
            echo "<tr>", "<td>", $files2[$i], "</td>", "<td>", substr($row[8],6,2).".".substr($row[8],4,2).".".substr($row[8],0,4) , "</td>", "<td class='sum-pack'>", number_format($sum_P_db, 2, ',', ' '), "</td>", "</tr>";
            $sum_P += $sum_P_db;
            //Закрываем БД
            dbase_close($db);
          } else {echo "Не могу открыть файл", $dbName;}
        }  //if
      }  //for
      echo "<tr>", "<th colspan='2'>", "ВСЬОГО:", "</th>", "<th class='sum-pack'>", number_format($sum_P, 2, ',', ' '), "</th>", "</tr>";
      echo "</table>", "<br>";
	  
//ПІН-банк
      echo "<h3>ПІН-банк</h3>";
      $sum_P = 0;
      echo "<table>";
      echo "<tr>", "<th colspan='3'>", "ПІН-банк", "</th>", "</tr>";
      echo "<tr>", "<th>", "Файл", "</th>", "<th>", "Дата оплати", "</th>", "<th>", "Сума пачки", "</th>", "</tr>";
      //Перебираем все файлы, работаем с PI (ПІН-банк)
      for ($i = 0; $i < count($files2); $i++) {
        //Проверяем, чтобы попадал только ПІН-банк (PI)
        if (substr($files2[$i], 0, 2) == "PI") {
          //Склеиваем путь + имя файла
          $dbName = $dirP."/".$files2[$i];
          //Проверяем наличие файла
          if (file_exists($dbName)){
            //Работаем с файлом
            //Открываем БД
            $db = dbase_open ($dbName, 0);
			
			$sum_P_db = 0;
			//Перебираем записи в таблице, находим сумму пачки
			for ($j = 1; $j <= dbase_numrecords($db); $j++) {
				$row = dbase_get_record($db, $j);
				$sum_P_db += $row[9];
			}
            //Выводим дату оплаты и сумму пачки
            echo "<tr>", "<td>", $files2[$i], "</td>", "<td>", substr($row[8],6,2).".".substr($row[8],4,2).".".substr($row[8],0,4) , "</td>", "<td class='sum-pack'>", number_format($sum_P_db, 2, ',', ' '), "</td>", "</tr>";
            $sum_P += $sum_P_db;
            //Закрываем БД
            dbase_close($db);
          } else {echo "Не могу открыть файл", $dbName;}
        }  //if
      }  //for
      echo "<tr>", "<th colspan='2'>", "ВСЬОГО:", "</th>", "<th class='sum-pack'>", number_format($sum_P, 2, ',', ' '), "</th>", "</tr>";
      echo "</table>", "<br>";
	  
    ?>
  </body>
</html>
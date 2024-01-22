<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $surname = $_POST['surname'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  // Здесь также должна быть проверка данных и отправка почты с приложенным файлом на указанный адрес

  // Пример отправки письма с прикрепленным файлом
  $to = "youremail@example.com";
  $subject = "Новая обратная связь";
  $message = "Фамилия: $surname\nИмя: $name\nТелефон: $phone\nEmail: $email";
  $file = $_FILES['attachment']['tmp_name'];
  $filename = $_FILES['attachment']['name'];
  $content = chunk_split(base64_encode(file_get_contents($file)));
  $uid = md5(uniqid(time()));
  $header = "From: $email\r\n";
  $header .= "Reply-To: $email\r\n";
  $header .= "MIME-Version: 1.0\r\n";
  $header .= "Content-Type: multipart/mixed; boundary=\"$uid\"\r\n\r\n";
  $header .= "This is a multi-part message in MIME format.\r\n";
  $header .= "--$uid\r\n";
  $header .= "Content-type:text/plain; charset=windows-1251\r\n";
  $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
  $header .= "$message\r\n";
  $header .= "--$uid\r\n";
  $header .= "Content-Type: application/octet-stream; name=\"$filename\"\r\n";
  $header .= "Content-Transfer-Encoding: base64\r\n";
  $header .= "Content-Disposition: attachment; filename=\"$filename\"\r\n\r\n";
  $header .= $content."\r\n\r\n";
  $header .= "--$uid--";
  mail($to, $subject, "", $header);
  // Отправка письма завершена

  echo "Form processed successfully";
} else {
  echo "Access denied";
}
?>
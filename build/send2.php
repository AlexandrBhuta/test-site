<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $lastName = $_POST["lastName"];
  $firstName = $_POST["firstName"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  
  // Загрузка прикрепленного файла (если есть)
  
  // Отправка письма на электронную почту с данными формы и прикрепленным файлом
  $to = "youremail@example.com";
  $subject = "Обратная связь";
  $message = "Фамилия: " . $lastName . "\n";
  $message .= "Имя: " . $firstName . "\n";
  $message .= "Телефон: " . $phone . "\n";
  $message .= "Email: " . $email . "\n";
  
  // Дополнительные настройки отправки
  
  // Отправка письма
  if (mail($to, $subject, $message)) {
    echo "Письмо успешно отправлено";
  } else {
    echo "Ошибка отправки письма";
  }
}
?>
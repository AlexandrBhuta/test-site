<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $lastName = $_POST["lastName"];
  $firstName = $_POST["firstName"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  
  // �������� �������������� ����� (���� ����)
  
  // �������� ������ �� ����������� ����� � ������� ����� � ������������� ������
  $to = "youremail@example.com";
  $subject = "�������� �����";
  $message = "�������: " . $lastName . "\n";
  $message .= "���: " . $firstName . "\n";
  $message .= "�������: " . $phone . "\n";
  $message .= "Email: " . $email . "\n";
  
  // �������������� ��������� ��������
  
  // �������� ������
  if (mail($to, $subject, $message)) {
    echo "������ ������� ����������";
  } else {
    echo "������ �������� ������";
  }
}
?>
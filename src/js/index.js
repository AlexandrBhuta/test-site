/*import mobileNav from './modules/mobile-nav.js';
mobileNav(); */

$(document).ready(function() {
    // Открытие модального окна при нажатии на кнопку "Обратная связь"
    $("#openModal").click(function() {
      $("#feedbackModal").show();
    });
  
    // Закрытие модального окна при нажатии на кнопку закрытия
    $(".close").click(function() {
      $("#feedbackModal").hide();
    });
  
    // Отправка формы через AJAX
    $('#feedbackForm').submit(function(e) {
      e.preventDefault();
      // Валидация формы
      if (validateForm()) {
        var formData = new FormData(this);
        $.ajax({
          url: 'send.php',
          type: 'POST',
          data: formData,
          success: function(response) {
            alert('Форма отправлена!');
            $("#feedbackModal").hide();
          },
          cache: false,
          contentType: false,
          processData: false
        });
      }
    });
  
    // Валидация формы на клиентской стороне
    function validateForm() {
      // Реализуйте проверки и валидацию формы на JavaScript 
      // Верните true, если данные валидны, иначе false
      return true; // Временное значение
    }
  });
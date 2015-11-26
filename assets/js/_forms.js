// Contact form validation
var contactForm = $('form#contactForm');
if (contactForm.length > 0) {
  contactForm.submit(function() {
    $('form#contactForm .error').remove();
    var hasError = false;
    $('.requiredField').each(function() {
      if(jQuery.trim($(this).val()) == '') {
        var labelText = $(this).prev('label').text();
        $(this).parent().append('<label class="error">请输入您的'+labelText+'。</label>');
        hasError = true;
      } else if($(this).hasClass('email')) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(!emailReg.test(jQuery.trim($(this).val()))) {
          var labelText = $(this).prev('label').text();
          $(this).parent().append('<label class="error">您输入的'+labelText+'格式不正确。</label>');
          hasError = true;
        }
      }
    });
    if(!hasError) {
      $('form#contactForm button').fadeOut('normal', function() {
        $(this).parent().append('<img src="/wp-content/themes/td-v3/images/template/loading.gif" alt="Loading&hellip;" height="31" width="31" />');
      });
      var formInput = $(this).serialize();
      $.post($(this).attr('action'),formInput, function(data){
        contactForm.slideUp("fast", function() {           
          $(this).before('<div class="thanks"><h3>感谢您对漫言的支持。</h3><p>您的来件已顺利提交，我们会抽空仔细阅读，谢谢！</p></div>');
        });
      });
    }
    return false;
  });
} else {
  // Contact form does not exist.
}
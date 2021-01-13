$(function(){

    $(".popup-bg").click(function(){
        $(".confirm-popup").fadeOut();
    })

    //クラス
    const error_class       = 'errors';
  
    //エラーメッセージ
    const required_message  = '必須入力です。';
    const mail_message      = 'メールアドレスの形式で入力してください。';
  
    //正規表現
    const mail_check        = "^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$";
  
    //バリデーションの関数を定義
      function validate(attr,message,check) {
        if(attr.val() == ""){
          attr.addClass(error_class);
          attr.next('span').text(required_message);
        } else if (!attr.val().match(check)) {
          attr.addClass(error_class);
          attr.next('span').text(message);
        } else {
          attr.removeClass(error_class);
          attr.next('span').text('');
        }
      }
      


    //submiされた時にチェック
    $('.submit-button').click(function(){
      //全体の必須チェック
      $('.form-text').each(function(){
        if($(this).val()) {
          $(this).removeClass(error_class);
          $(this).next('span').text("");
        } else {
          $(this).addClass(error_class);
          $(this).next('span').text(required_message);
        }
      });
  
      //メール
      validate($('.form-mail'),mail_message,mail_check);
      
      //エラーがあればsubmitを停止
      if($('.errors').length > 0) {
        console.log($('.errors').length);
      }else{
        let name = $("[name=name]").val();
        $(".confirm-name").text(name);

        let mail = $("[name=mail]").val();
        $(".confirm-mail").text(mail);

        let contact = $("[name=contact]").val();
        $(".confirm-contact").text(contact);

        $(".confirm-popup").fadeIn();
      }
    });

});
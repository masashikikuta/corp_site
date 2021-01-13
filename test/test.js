$(function(){
    //クラス
    const error_class       = 'errors';
  
    //エラーメッセージ
    const required_message  = '必須入力です。';
    const mail_message      = 'メールアドレスの形式で入力してください。';
    const tel_message       = '電話番号は半角数字で入力してください。';
    const postcode_message  = '郵便番号は「半角数字・ハイフン有り」で入力してください。';
    const checkbox_message  = 'いずれか１つをチェックしてください。';
  
    //正規表現
    const mail_check        = "^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$";
    const tel_check         = "^[0-9]+$";
    const postcode_check    = "^[0-9]{3}-[0-9]{4}$";
  
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
    $('#form').submit(function(){
      //全体の必須チェック
      $('.form-text').each(function(){
        if($(this).val()) {
          $(this).removeClass(error_class);
        } else {
          $(this).addClass(error_class);
          $(this).next('span').text(required_message);
        }
      });
  
      //メール
      validate($('#email'),mail_message,mail_check);
  
      // 電話番号
      validate($('#tel'),tel_message,tel_check);
  
      //郵便番号
      validate($('#postcode'),postcode_message,postcode_check);
   
      //チェックボックスの必須チェック（１つ以上）
      $('input[type="checkbox"]').each(function () {
        let checkedsum;
        let name = $(this).attr('name');
        checkedsum = $("input[name='" + name + "']:checked").length;
        if (checkedsum > 0) {
          $(this).parent().removeClass(error_class);
          $(this).parent().find('span').text('');
        } else {
          $(this).parent().addClass(error_class);
          $(this).parent().find('span').text(checkbox_message);
        }
      });
      
      //エラーがあればsubmitを停止
      if(error_class.length > 0) {
        return false;
      }
    });
  });
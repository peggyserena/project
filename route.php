<?php include __DIR__ . '/parts/config.php';

switch($route->getParameter(1)){
    case "reset":
      // 檢查是否有帶 Token 
      $verify_array['resetToken'] = $route->getParameter(2);
      $gump = new GUMP();
      $verify_array = $gump->sanitize($verify_array); 
      $validation_rules_array = array(
        'resetToken'    => 'required'
      );
      $gump->validation_rules($validation_rules_array);
      $filter_rules_array = array(
        'resetToken' => 'trim'
      );
      $gump->filter_rules($filter_rules_array);
      $validated_data = $gump->run($verify_array);
      if($validated_data === false) {
        // 沒有帶 Token 回來，直接踢回 login
        header("Location: login");
        exit;
      } else {
        foreach($validation_rules_array as $key => $val) {
          ${$key} = $verify_array[$key];
        }
        // 有帶 Token 回來的話，確認是否存在
        $table = 'members';
        $condition = 'resetToken = :resetToken';
        $order_by = '1'; 
        $fields = 'resetToken, resetComplete';
        $limit = '1';
        $data_array[':resetToken'] = $resetToken;
        $result = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);
        if(!isset($result[0]['resetToken']) OR empty($result[0]['resetToken'])){
          $stop = 'Invalid token provided, please use the link provided in the reset email.';
        }else if(isset($result[0]['resetComplete']) AND $result[0]['resetComplete'] == 'Yes'){
          $stop = 'Your password has already been changed!';
        }
      }
      
      //if form has been submitted process it
      if(isset($_POST['submit']))
      {
      
        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); 

        $validation_rules_array = array(
          'password'    => 'required|max_len,20|min_len,3',
          'passwordConfirm' => 'required'
        );
        $gump->validation_rules($validation_rules_array);

        $filter_rules_array = array(
          'password' => 'trim',
          'passwordConfirm' => 'trim'
        );
        $gump->filter_rules($filter_rules_array);

        $validated_data = $gump->run($_POST);

        if($validated_data === false) {
          $error = $gump->get_readable_errors(false);
        } else {
          // validation successful
          foreach($validation_rules_array as $key => $val) {
            ${$key} = $_POST[$key];
          }
          $userVeridator = new UserVeridator();
          $userVeridator->isPasswordMatch($password, $passwordConfirm);
          $error = $userVeridator->getErrorArray();
        } 
        //if no errors have been created carry on
        if(count($error) == 0)
        {
          //hash the password
          $passwordObject = new Password();
          $hashedpassword = $passwordObject->password_hash($password, PASSWORD_BCRYPT);
      
          try {
            $data_array = array();
            $table = 'members';
            $data_array['password'] = $hashedpassword;
            $data_array['resetComplete'] = 'Yes';
            $key = "resetToken";
            $id = $resetToken;
            Database::get()->update($table, $data_array, $key, $id);
            
            //redirect to index page
            header('Location: '.Config::BASE_URL.'login?action=resetAccount');
            exit;
      
          //else catch the exception and show the error.
          } catch(PDOException $e) {
              $error[] = $e->getMessage();
          }
        }
      }
      include('view/header/default.php'); // 載入共用的頁首
      include('view/body/reset.php');     // 載入忘記密碼的頁面
      include('view/footer/default.php'); // 載入共用的頁尾
    break;
    case "forget":
      //if logged in redirect to members page
      if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
        header('Location: home'); 
        exit();
      }
      
      //if form has been submitted process it
      if(isset($_POST['submit'])){
        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); 
        $validation_rules_array = array(
          'email'    => 'required|valid_email'
        );
        $gump->validation_rules($validation_rules_array);

        $filter_rules_array = array(
          'email' => 'trim|sanitize_email'
        );
        $gump->filter_rules($filter_rules_array);
        $validated_data = $gump->run($_POST);

        if($validated_data === false) {
          $error = $gump->get_readable_errors(false);
        } else {
          //email validation
          foreach($validation_rules_array as $key => $val) {
            ${$key} = $_POST[$key];
          }
          $table = 'members';
          $condition = 'email = :email';
          $order_by = '1'; 
          $fields = 'email, memberID'; 
          $limit = '1';
          $data_array[':email'] = $email;
          $result = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);
          if(!isset($result[0]['memberID']) OR empty($result[0]['memberID'])){
            $error[] = 'Email provided is not recognised.';
          }else{
            $memberID = $result[0]['memberID'];
          }
        }

        //if no errors have been created carry on
        if(!isset($error)){

          //create the activation code
          try {
            $data_array = array();
            $data_array['resetComplete'] = 'No';
            $data_array['resetToken'] = md5(rand().time());
            $resetToken = $data_array['resetToken'];
            $key = "memberID";
            $id = $memberID;
            Database::get()->update('members', $data_array, $key, $id);
            
            //send email
            $to = $email;
            $subject = "Password Reset";
            $body = "<p>Someone requested that the password be reset.</p>
            <p>If this was a mistake, just ignore this email and nothing will happen.</p>
            <p>To reset your password, visit the following address: <a href='".Config::BASE_URL."reset/$resetToken'>".Config::BASE_URL."reset/$resetToken</a></p>";

            $mail = new Mail(Config::MAIL_USER_NAME, Config::MAIL_USER_PASSWROD);
            $mail->setFrom(Config::MAIL_FROM, Config::MAIL_FROM_NAME);
            $mail->addAddress($to);
            $mail->subject($subject);
            $mail->body($body);
            $mail->send();

            //redirect to index page
            header('Location: login?action=reset');
            exit;

          //else catch the exception and show the error.
          } catch(PDOException $e) {
              $error[] = $e->getMessage();
          }
        }
      }

      //define page title
      $title = 'Reset Account';
      include('view/header/default.php'); // 載入共用的頁首
      include('view/body/forget.php');    // 載入忘記密碼的頁面
      include('view/footer/default.php'); // 載入共用的頁尾
      break;
}

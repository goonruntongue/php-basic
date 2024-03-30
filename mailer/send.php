<?php
$to = $_POST["usermail"];
$subject = "メールフォームのテスト送信です";
$postData;
foreach ($_POST as $key => $value) {
    if (is_array($value)) {
        $value = implode(",", $value);
    }
    switch ($key) {
        case "username":
            $newKey = "お名前";
            break;
        case "usermail":
            $newKey = "メールアドレス";
            break;
        case "usergen":
            $newKey = "性別";
            break;
        case "color":
            $newKey = "色";
            break;
        case "useropinion":
            $newKey = "意見";
            break;
        case "usercomment":
            $newKey = "コメント";
            break;
    }
    $postData .= "{$newKey}：{$value}\n";
}
$msg = <<<EOD
※このメールはシステムからの自動返信です。
{$_POST["username"]}様
お問い合わせありがとうございます。以下の内容で受け付けました。
{$postData}
後ほど返信をさせていただきます。今しばらくお待ちください。
EOD;
$message = $msg;
$header = "From:myVScode@mail";
mb_send_mail($to, $subject, $message, $header);
header("Location:thanks.html");

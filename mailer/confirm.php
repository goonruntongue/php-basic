<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>下記の内容でよろしいですか？</p>
    <form action="send.php" method="POST">
        <?php
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
            echo "<p>{$newKey}:{$value}</p>";
            echo "<input type='hidden' name='{$key}' value='{$value}'>";
        }
        ?>
        <input type="submit" value="送信">
    </form>
</body>

</html>
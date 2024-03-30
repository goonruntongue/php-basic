<?php
$dsn = "mysql:host=localhost;dbname=dashboard";
$username = "root";
$password = "";
$pdo = new PDO($dsn, $username, $password);
try {
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $sql = "INSERT INTO dashboard (name,comment) VALUES (:name, :comment)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":name" => $name,
        ":comment" => $comment
    ]);
    $sql2 = "SELECT * FROM dashboard";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>{$row['name']}</p>";
        echo "<p>{$row['comment']}</p>";
    }
} catch (PDOException $e) {
    echo "error" . $e->getMessage();
}

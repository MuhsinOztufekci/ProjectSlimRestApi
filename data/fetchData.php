<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';  // Database sınıfının bulunduğu dosyanın yolunu ayarlayın
$config = require __DIR__ . '/../config/database.php';
$db = new Database($config);

function fetchData($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data, true);
}

$users = fetchData('https://jsonplaceholder.typicode.com/users');
$posts = fetchData('https://jsonplaceholder.typicode.com/posts');

$pdo = $db->getPdo(); // Revert back to getPdo()

try {
    $pdo->beginTransaction();
    foreach ($users as $user) {
        $stmt = $pdo->prepare('INSERT INTO users (id, name, username, email) VALUES (:id, :name, :username, :email)');
        $stmt->execute([
            'id' => $user['id'],
            'name' => $user['name'],
            'username' => $user['username'],
            'email' => $user['email'],
        ]);
    }

    foreach ($posts as $post) {
        $stmt = $pdo->prepare('INSERT INTO posts (id, user_id, title, body) VALUES (:id, :user_id, :title, :body)');
        $stmt->execute([
            'id' => $post['id'],
            'user_id' => $post['userId'],
            'title' => $post['title'],
            'body' => $post['body'],
        ]);
    }
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo 'Error: ' . $e->getMessage();
}

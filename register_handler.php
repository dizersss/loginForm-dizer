<?php
// 1. Подключаемся к базе данных через PDO
$host = 'localhost';
$db   = 'users_accounts';
$user = 'root'; // По умолчанию в XAMPP пользователя зовут root
$pass = '';     // Пароль по умолчанию пустой

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// 2. Проверяем, что форма была отправлена методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Забираем данные из полей и очищаем их от лишних пробелов
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // 3. Базовые проверки безопасности
    if (empty($username) || empty($password)) {
        die("Пожалуйста, заполните все поля.");
    }

    if ($password !== $password_confirm) {
        die("Пароли не совпадают!");
    }

    // 4. Проверяем, нет ли уже пользователя с таким именем в базе
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        die("Этот Username уже занят. Выберите другой.");
    }

    // 5. ХЭШИРУЕМ ПАРОЛЬ (Безопасность превыше всего!)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 6. Записываем нового пользователя в базу данных
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$username, $hashed_password]);
        
        // Если всё ок, перенаправляем пользователя на страницу логина
        header("Location: index.php?success=registered");
        exit();
    } catch (PDOException $e) {
        die("Ошибка при регистрации: " . $e->getMessage());
    }
}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="users">
        <?php
        // Подключение к базе данных
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "friday";
        
        // Создание подключения
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Проверка подключения
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Выполнение SQL запроса
        $sql = "SELECT id, name, email FROM users";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Вывод данных
            while($row = $result->fetch_assoc()) {
                echo "<p>ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "</p>";
            }
        } else {
            echo "No users found";
        }
        
        // Закрытие подключения
        $conn->close();
        ?>
    </div>
</body>
</html>
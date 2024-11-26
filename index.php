<?php
// Функция для обработки POST запроса и вычисления
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $distance = isset($_POST['distance']) ? floatval($_POST['distance']) : 0;
    $fuel_in_tank = isset($_POST['fuel_in_tank']) ? floatval($_POST['fuel_in_tank']) : 0;
    $fuel_consumption = isset($_POST['fuel_consumption']) ? floatval($_POST['fuel_consumption']) : 0;
    
    // Вычисление необходимого количества бензина для поездки
    $required_fuel = $distance * $fuel_consumption;
    
    // Проверка, достаточно ли бензина
    $sufficient_fuel = $fuel_in_tank >= $required_fuel;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Определение достаточности бензина для поездки</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            font-size: 1.2em;
            text-align: center;
        }

        .result.success {
            color: green;
        }

        .result.failure {
            color: red;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Определение достаточности бензина</h1>
        
        <!-- Форма для ввода данных -->
        <form method="post">
            <label for="distance">Длина пути (км):</label>
            <input type="number" id="distance" name="distance" step="0.1" required>

            <label for="fuel_in_tank">Количество бензина в баке (литры):</label>
            <input type="number" id="fuel_in_tank" name="fuel_in_tank" step="0.1" required>

            <label for="fuel_consumption">Расход бензина на 1 км (литры):</label>
            <input type="number" id="fuel_consumption" name="fuel_consumption" step="0.1" required>

            <button type="submit">Проверить</button>
        </form>

        <?php
        // Вывод результата, если форма была отправлена
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<div class='result'>";
            if ($sufficient_fuel) {
                echo "<p class='success'>Бензина достаточно для поездки!</p>";
            } else {
                echo "<p class='failure'>Бензина недостаточно для поездки!</p>";
            }
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>

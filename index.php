<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="main">
    <h2>Нахождение площадей и периметров фигур:</h2>
        <form action="Controller.php" method="POST"> 
            <span>1. Выберите фигуру: </span> <br>
            <select name="figure" id="select_figure">
                <option value="Треугольник">Треугольник</option>
                <option value="Квадрат">Квадрат</option>
                <option value="Прямоугольник">Прямоугольник</option>
                <option value="Ромб">Ромб</option>
            </select> <br>
            <span>2. Введите длины сторон через пробел:</span> <br>
            <input type="text" name="sides"> <br>
            <span>3. Введите длину высоты (если присутствует):</span> <br>
            <input type="number" name="height" min=1> <br>
            <input type="submit" name="submit" value="Далее">
            <?php
                if(!empty($errors)){
                    foreach($errors as $error){
                        echo "<p>$error</p>";
                    }
                }else{
                    foreach($result as $key => $val){
            ?>
                        <table>
                            <tr><td><?php echo $key . " = "; ?></td><td><?php echo $val; ?></td></tr>
                        </table>
            <?php  
                    }
                }        
            ?>
        </form>
    </div>
</body>
</html>
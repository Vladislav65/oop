<?php

include "Entities.php";

class Controller{
    private function validate($figure, $sides, $height){
        $errors = []; 
        $sidesSize = sizeof($sides);

        for($i = 0; $i < $sidesSize; $i++){
            if($sides[$i] == "0"){
                $errors[] = "Ошибка. Нулевая длина стороны";
            }

            if($sides[$i] < 0){
                $errors[] = "Ошибка. Отрицательная длина стороны";
            }
        }

        switch($figure){
            case 'Треугольник':{
                if(sizeof($sides) != 3){
                    $errors[] = "Введите 3 стороны для треугольника"; 
                }

                if($height == ""){
                    $errors[] = "Введите длину высоты"; 
                }
            }
            break;

            case 'Квадрат':{
                if(sizeof($sides) != 1){
                    $errors[] = "Введите 1 сторону для квадрата"; 
                }

                if($height != ""){
                    $errors[] = "Для квадрата не указывается высота"; 
                }
            }
            break;

            case 'Прямоугольник':{
                if(sizeof($sides) != 2){
                    $errors[] = "Введите 2 параллельные стороны для прямоугольника"; 
                }

                if($height != ""){
                    $errors[] = "Для прямоугольника не указывается высота"; 
                }
            }
            break;

            case 'Ромб':{
                if(sizeof($sides) != 2){
                    $errors[] = "Введите 2 параллельные стороны для ромба"; 
                }

                if($height == ""){
                    $errors[] = "Укажите высоту для ромба"; 
                }
            }
            break;
        }
        
        return $errors;
    }

    public function start(){
        $inputData = $_POST;
        unset($inputData['submit']);
        $figure = $inputData['figure'];
        $height = $inputData['height'];
        $sides = explode(" ", $inputData['sides']);

        $errors = $this->validate($figure, $sides, $height);
        
        if(empty($errors)){
            switch($figure){
                case 'Треугольник':{
                    $triangle = new Triangle($sides[0], $sides[1], $sides[2], $height);
                    $squareTr = $triangle->countSquare();
                    $perimeterTr = $triangle->countPerimeter();
                    $result = self::result($sides, $height, $squareTr, $perimeterTr);
                }
                break;

                case 'Квадрат':{
                    $square = new Square($sides[0]);
                    $squareSq = $square->countSquare();
                    $perimeterSq = $square->countPerimeter();
                    $result = self::result($sides, $height, $squareSq, $perimeterSq);
                }
                break;

                case 'Прямоугольник':{
                    $rectangle = new Rectangle($sides[0], $sides[1]);
                    $squareRect = $rectangle->countSquare();
                    $perimeterRect = $rectangle->countPerimeter();
                    $result = self::result($sides, $height, $squareRect, $perimeterRect);
                }
                break;

                case 'Ромб':{
                    $rhombus = new Rhombus($sides[0], $sides[1], $height);
                    $squareRh = $rhombus->countSquare();
                    $perimeterRh = $rhombus->countPerimeter();  
                    $result = self::result($sides, $height, $squareRh, $perimeterRh);                  
                }
                break;
            }
        }
        
        require_once "index.php";
    }

    public static function result($sides, $height, $square, $perimeter){

        $result = [];
        $size = sizeof($sides);

        $sides = array_combine(range(1, count($sides)), array_values($sides));
        if($size > 1){
            for($i = 1; $i <= $size; $i++){
                $result["Сторона $i"] = $sides[$i];
            }
        }else{
            $result['Сторона'] = $sides[1];
        }

        if(is_array($square)){
            $square = array_combine(range(1, count($square)), array_values($square));
            $result["Площадь при высоте к 1 стороне"] = $square[1];
            $result["Площадь при высоте ко 2 стороне"] = $square[2];
            $result["Площадь при высоте к 3 стороне"] = $square[3];
        }else{
            $result["Площадь"] = $square;
        }

        $result["Периметр"] = $perimeter;

        return $result;
    }
}

$controller = new Controller();
$controller->start();
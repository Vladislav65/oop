<?php

abstract class Figure{
    protected $square;
    protected $perimeter;

    abstract public function countSquare();
    abstract public function countPerimeter();
}

class Triangle extends Figure{
    private $firstSide;
    private $secondSide;
    private $thirdSide;
    private $height;

    public function __construct($firstSide, $secondSide, $thirdSide, $height){
        $this->firstSide = $firstSide;
        $this->secondSide = $secondSide;
        $this->thirdSide = $thirdSide;
        $this->height = $height;
    }

    public function countSquare(){
        $this->square[] = 0.5 * $this->firstSide * $this->height; 
        $this->square[] = 0.5 * $this->secondSide * $this->height;
        $this->square[] = 0.5 * $this->thirdSide * $this->height;

        return $this->square;
    }

    public function countPerimeter(){
        $this->perimeter = $this->firstSide + $this->secondSide + $this->thirdSide;

        return $this->perimeter;
    }
}

class Square extends Figure{
    private $side;

    public function __construct($side){
        $this->side = $side;
    }

    public function countSquare(){
        $this->square = pow($this->side, 2);

        return $this->square;
    }

    public function countPerimeter(){
        $this->perimeter = $this->side * 4;

        return $this->perimeter;
    }
}

class Rectangle extends Figure{
    private $firstSide;
    private $secondSide;

    public function __construct($firstSide, $secondSide){
        $this->firstSide = $firstSide;
        $this->secondSide = $secondSide;
    }

    public function countSquare(){
        $this->square = $this->firstSide * $this->secondSide;

        return $this->square;
    }

    public function countPerimeter(){
        $this->perimeter = 2 * ($this->firstSide + $this->secondSide);

        return $this->perimeter;
    }
}

class Rhombus extends Figure{
    private $firstSide;
    private $secondSide;
    private $height;

    public function __construct($firstSide, $secondSide, $height){
        $this->firstSide = $firstSide;
        $this->secondSide = $secondSide;
        $this->height = $height;
    }

    public function countSquare(){
        $this->square[] = $this->firstSide * $this->height;
        $this->square[] = $this->secondSide * $this->height;

        return $this->square;
    }

    public function countPerimeter(){
        $this->perimeter = 2 * ($this->firstSide + $this->secondSide);

        return $this->perimeter;
    }
}

<?php

class Ellipse {

    private $x,$y;

    public function setWidth($x) {
        $this->x = $x;
    }

    public function setHeight($y) {
        $this->y = $y;
    }

    public function getWidth() {

        return $this->x;
    }

    public function getHeight() {

        return $this->y;
    }
}

function testEllipse(Ellipse $ellipse) {
    $ellipse->setWidth(2);
    assert('$ellipse->getWidth() == 2');
    $ellipse->setHeight(4);
    assert('$ellipse->getHeight() == 4');
    assert('$ellipse->getWidth() == 2'); // elipsa garantuje, ze pri zmene vysky sa nezmeni sirka
}

class Circle extends Ellipse {

    public function setWidth($x) {
        parent::setWidth($x);
        parent::setHeight($x);
    }

    public function setHeight($y) {
        parent::setHeight($y);
        parent::setWidth($y);
    }
}

function testCircle(Circle $circle) {
    $circle->setWidth(2);
    assert('$circle->getWidth() == 2');
    $circle->setHeight(4);
    assert('$circle->getHeight() == 4');
    assert('$circle->getWidth() == $circle->getHeight()'); // kruznica garantuje, ze sirka a vyska su rovnake
}

$ellipse = new Ellipse();
$circle = new Circle();

testEllipse($ellipse);
testCircle($circle);
testEllipse($circle);

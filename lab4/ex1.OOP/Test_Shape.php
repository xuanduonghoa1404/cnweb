<?php
require_once "Shape.php";
require_once "Polygon.php";
require_once "Rectangle.php";
require_once "Triangle.php";
require_once "Circle.php";
require_once "Color.php";

$myCollection = array();
$r = new Rectangle;
$r->width = 5;
$r->height = 7;
$myCollection[] = $r;
unset($r);

$t = new Triangle;
$t->base = 4;
$t->height = 5;
$myCollection[] = $t;
unset($t);

$c = new Circle;
$c->radius = 3;
$myCollection[] = $c;
unset($c);

$c = new Color;
$c->name = "blue";
$myCollection[] = $c;
unset($c);

foreach ($myCollection as $s) {
    if ($s instanceof Shape) {
        print("area " . $s->getArea() . "<br>\n");
    }

    if ($s instanceof Polygon) {
        print("sides " . $s->getNumberOfSides() . "<br>\n");
    }

    if ($s instanceof Color) {
        echo "color : $s->name <br>\n";
    }
    print("<br>\n");
}
?>
<?php

namespace labs7in0\frechet;

class Point
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function euclideanDistance($point)
    {
        return sqrt(
            pow(($this->getX() - $point->getX()), 2) +
            pow(($this->getY() - $point->getY()), 2)
        );
    }
}

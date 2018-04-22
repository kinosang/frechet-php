<?php

namespace labs7in0\frechet;

class Curve
{
    private $points;

    public function __construct($points = [])
    {
        $this->points = $points;
    }

    public function addPoint($point)
    {
        $this->points[] = $point;
    }

    public function getPoint($index)
    {
        return $this->points[$index];
    }

    public function countPoints()
    {
        return count($this->points);
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function getReverse()
    {
        $reversed = new self();

        foreach (array_reverse($this->points) as $point) {
            $reversed->addPoint($point);
        }

        return $reversed;
    }

    public function frechetDistance($curve)
    {
        $I = $this->countPoints();
        $J = $curve->countPoints();

        $runningMaxI = 0.0;
        for ($i = 0; $i < $I; $i++) {
            $currentMin = pow(10, 9);
            for ($j = 0; $j < $J; $j++) {
                $currDist = $this->getPoint($i)->euclideanDistance($curve->getPoint($j));
                $currentMin = min($currentMin, $currDist);
            }

            $runningMaxI = max($runningMaxI, $currentMin);
        }

        $runningMaxJ = 0.0;
        for ($j = 0; $j < $J; $j++) {
            $currentMin = pow(10, 9);
            for ($i = 0; $i < $I; $i++) {
                $currDist = $this->getPoint($i)->euclideanDistance($curve->getPoint($j));
                $currentMin = min($currentMin, $currDist);
            }

            $runningMaxJ = max($runningMaxJ, $currentMin);
        }

        return max($runningMaxI, $runningMaxJ);
    }
}

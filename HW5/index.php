<?php
declare(strict_types=1);

class RGBColor
{
    private int $red;
    private int $blue;
    private int $green;

    public function __construct(int $red, int $blue, int $green)
    {
        $this->setRed($red);
        $this->setBlue($blue);
        $this->setGreen($green);
    }

    private function getRed(): int
    {
        return $this->red;
    }

    private function setRed(int $red): void
    {
        $this->validate($red);

        $this->red = $red;
    }

    private function getBlue(): int
    {
        return $this->blue;
    }

    private function setBlue(int $blue): void
    {
        $this->validate($blue);

        $this->blue = $blue;
    }

    private function getGreen(): int
    {
        return $this->green;
    }

    private function setGreen(int $green): void
    {
        $this->validate($green);

        $this->green = $green;
    }

    public function validate(int $value): void
    {
        if ($value < 0 || $value > 255) {
            throw new Exception('Color is invalid.');
        }
    }

    public function equal(RGBColor $color): bool
    {
        return $this == $color;
    }

    public function mix(RGBColor $color)
    {
        return new RGBColor(
            intval(($this->red + $color->red) / 2 ),
            intval(($this->blue + $color->blue) / 2 ),
            intval(($this->green + $color->green) / 2 ),
        );
    }

    public static function random()
    {
        return new RGBColor(
            rand(0, 255),
            rand(0, 255),
            rand(0, 255)
        );
    }
}

$color1 = new RGBColor(200, 200, 200);
$color2 = new RGBColor(100,100,100);
$mixedColor = $color1->mix($color2);
$c1 = RGBColor::random();
$c2 = RGBColor::random();
//var_dump($c1);
//var_dump($c2);
$c = $c1->mix($c2);
var_dump($c);
$vars = get_object_vars ( $c );
echo "<br>";
$arr = (array)$c;
?>
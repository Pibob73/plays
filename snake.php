<?php
class body
{
    public function creep()
    {

    }
}

class tail
{
    public int $tX;
    public int $tY;
    public string $skin = ';';
    public function clear(){

    }
}

class snake
{
    public int $X;
    public int $Y;
    public bool $life;
    public int $size;
    public string $skin = '#';
    protected tail $tail;
    protected tail $body;
    public function __construct(tail $hTail,body $hBody)
    {
        $this->life = true;
        $this->size = 1;
        $this->X = 3;
        $this->Y = 3;
        $tail = $hTail;
        $tail->tX = 2;
        $tail->tY = 3;
        $body = $hBody;
    }
    public function getTailX(): int{
        return $this->tail->tX;
    }
    public function getTailY(): int{
        return $this->tail->tY;
    }
    public function setTailX(int $X){
        $this->tail->tX = $X;
    }
    public function setTailY(int $Y){
        $this->tail->tY = $Y;
    }
    public function eatFruit()
    {

    }

    public function growth()
    {

    }
}

class fruit
{
    public string $skin = '@';
    public int $X;
    public int $Y;
    public int $levelUp = 1;

    public function spam()
    {
        $this->X = rand(0, 7);
        $this->Y = rand(0, 5);
    }
}

class play
{
    public int $countUp;
}

$map = array_fill(0, 6, array_fill(0, 8, '.'));
$tail = new tail();
$body = new body();
$snake = new snake($tail, $body);
$fruit = new fruit();
while($snake->life === true){
sleep(1);
if ($map[$snake->Y][$snake->X] === '#')
    $snake->life = false;
$map[$snake->Y][$snake->X] = '#';
$map[$snake->getTailY()][$snake->getTailX()] = ';';
$snake->setTailX($snake->X);
if ($snake->X === 7)
    $snake->X = 0;
else
    $snake->X++;
$frame = '';
foreach ($map as $mass) {
    foreach ($mass as $border => $cell) {
        if ($border === 7)
            $frame .= $cell . "\n";
        else
            $frame .= $cell;
    }
}
if (substr_count($frame, '@') <= 4) {
    do {
        $fruit->spam();
    } while ($map[$fruit->Y][$fruit->X] == '@' || $map[$fruit->Y][$fruit->X] == '#');
    $map[$fruit->Y][$fruit->X] = $fruit->skin;
}
echo $frame . "\nF = " . substr_count($frame, '@') . "\n";
}
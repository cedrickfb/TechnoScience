
<?php
include "PLC/index.html";


class Box {
    private $text;
    private $title;
    private $class;
    private $style_start;
    private $style_end;
    function __construct($title_in, $text_in,$class_in) {
        $this->text = $text_in;
        $this->title  = $title_in;
    }
    function getText() {
        return $this->text;
    }
    function getTitle() {
        return $this->title;
    }
    function getClass()
    {
        return $this->class;
    }
    function getStyleStart(){
        return $this->style_start;
    }
    function getStyleEnd(){
        return $this->style_end;
    }
}

class BoxTitleDecorator {
    protected $box;
    protected $title;
    protected $box_top;
    protected $box_bottom;
    protected $text;
    protected $style_start;
    protected $style_end;
    public function __construct(Box $box_in) {
        $this->box = $box_in;
        $this->resetTitle();
        $this->setText();
        $this->setStyleStart();
        $this->setStyleEnd();
    }
    function resetTitle() {
        $this->title = $this->box->getTitle();
    }
    function setText(){
        $this->text = $this->box->getText();
    }
    function setStyleStart (){
        $this->style_start = $this->box->getStyleStart();
    }
    function setStyleEnd(){
        $this->style_end = $this->box->getStyleEnd();
    }
}


class BoxTitleColorDecorator extends BoxTitleDecorator{
    private $btd;
    public function __construct(BoxTitleDecorator $btd_in)
    {
        $this->btd = $btd_in;
    }
    function changeTitleColor($color,$size = 16){
        if($size > 50){
            $size = 50;
        }
        $this->title =  "<div style='color:". $color .";font-size:" . $size . "px;'>" . $this->btd->title . "</div>";
    }
    function getTitle(){
        return $this->title;
    }
}

class BoxContentDecorator extends BoxTitleDecorator{
    private $btd;
    public function __construct(BoxTitleDecorator $btd_in)
    {
        $this->btd = $btd_in;
    }
    function changeTextProperties($color = "white",$size = 28){
        $this->text =  "<div style='color:". $color .";font-size:" . $size . "px;'>" . $this->btd->text . "</div>";
    }
    function getText(){
        return $this->text;
    }
}

class BoxStyleDecorator extends BoxTitleDecorator {
    private $btd;
    public function __construct(BoxTitleDecorator $btd_in)
    {
        $this->btd = $btd_in;
    }
    function ChangeStyleProperties($borderColor ="white",$borderSize = 8,$class = "dw-pnl", $effect = 0)
    {
        $this->style_start = "<div class='" . $class . "' style='border: solid " . $borderSize . "px " . $borderColor . ";border-radius:25px;'>";
        $this->style_end = "</div>";
    }
    /*    if ($effect == 0 ){

        }elseif ($effect == 1){

        }elseif($effect == 2){

        }
    }*/ #TODO
    function GetTopStyle (){
        return $this->style_start;
    }
    function GetEndStyle(){
        return $this->style_end;
    }
}

$patternBox = new Box('My first custom box', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula erat', "dw_pln");
$decorator = new BoxTitleDecorator($patternBox);
$coloredTitleDecorator = new BoxTitleColorDecorator($decorator);
$coloredTitleDecorator->changeTitleColor("blue",50);
$changedTextDecorator = new BoxContentDecorator($decorator);
$changedTextDecorator->changeTextProperties("red",40);
$boxStyleChanged = new BoxStyleDecorator($decorator);
$boxStyleChanged->ChangeStyleProperties("red",15,"dw-pln dw-pnl--fcs");


echo $boxStyleChanged->GetTopStyle();
echo $coloredTitleDecorator->getTitle();
echo $changedTextDecorator->getText();
echo $boxStyleChanged->GetEndStyle();
include "code/test1.php";

function writeln($line_in) {
    echo $line_in."<br/>";
}

?>

</div>
</body>
</html>

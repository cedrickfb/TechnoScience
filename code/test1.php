<?php

//$patternBox = new Box('My second custom box', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula erat', "dw-pln");
/*
$patternBox = new Box('My first custom box', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula erat', "dw_pln");
$decorator = new BoxTitleDecorator($patternBox);
$coloredTitleDecorator = new BoxTitleColorDecorator($decorator);
$coloredTitleDecorator->changeTitleColor("red",30);*/
$patternBox = new Box('My first custom box', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula erat', "dw_pln");
$decorator = new BoxTitleDecorator($patternBox);
$coloredTitleDecorator = new BoxTitleColorDecorator($decorator);
$coloredTitleDecorator->changeTitleColor("green",50);
$changedTextDecorator = new BoxContentDecorator($decorator);
$changedTextDecorator->changeTextProperties("red",40);
$boxStyleChanged = new BoxStyleDecorator($decorator);
$boxStyleChanged->ChangeStyleProperties("white",8,"dw-pln dw-pnl--fcs");
echo $boxStyleChanged->GetTopStyle();
echo $coloredTitleDecorator->getTitle();
echo $changedTextDecorator->getText();
echo $boxStyleChanged->GetEndStyle();

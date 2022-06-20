<?php
require_once 'cartclasses.php';
if(session_status() === PHP_SESSION_NONE)
    session_start();

//echo 'before if isset';
if(isset($_POST['index'])){
    $index = filter_input(INPUT_POST, 'index', FILTER_SANITIZE_NUMBER_INT);
    echo "entered isset index $index\n";

    switch($_POST['type']){
        case 1:{
            //echo "\nindex sent is $index, size of badgeCount is {$_SESSION['badgeCount']}\n";
            //echo "\nvalue is {$_POST['value']}\n";
            foreach($_SESSION['badgeOrders'] as $badgeRow){
                if($badgeRow -> getIndex() == $index){
                    echo "matched index: badgeRow on index {$badgeRow -> getIndex()}";
                    echo "\nupdating column '{$_POST['column']}' with value {$_POST['value']}";
                    switch($_POST['column']) {
                        case 'type':{
                            $_SESSION['badgeOrders'][$index] -> setType((int)filter_input(INPUT_POST, 'value', FILTER_SANITIZE_NUMBER_INT));
                            break;
                        }case 'size':{
                            $_SESSION['badgeOrders'][$index] -> setSize((int)filter_input(INPUT_POST, 'value', FILTER_SANITIZE_NUMBER_INT));
                            break;
                        }case 'qty':{
                            $_SESSION['badgeOrders'][$index] -> setQty((int)filter_input(INPUT_POST, 'value', FILTER_SANITIZE_NUMBER_INT));
                            break;
                        }
                    }
                    break;
                }
            }
            echo var_dump($_SESSION['badgeOrders']);
            break;
        }case 2:{
            foreach ($_SESSION['stickerOrders'] as $stickerRow){
                if($stickerRow -> getIndex() == $index){
                    switch($_POST['column']) {
                        case 'labels':{
                            $_SESSION['stickerOrders'][$index] -> setLabels(filter_input(INPUT_POST, 'value', FILTER_SANITIZE_STRING));
                            break;
                        }case 'type':{
                            $_SESSION['stickerOrders'][$index] -> setType((int)filter_input(INPUT_POST, 'value', FILTER_SANITIZE_NUMBER_INT));
                            break;
                        }case 'size':{
                            $_SESSION['stickerOrders'][$index] -> setSize((int)filter_input(INPUT_POST, 'value', FILTER_SANITIZE_NUMBER_INT));
                            break;
                        }case 'color':{
                            $_SESSION['stickerOrders'][$index] -> setColor((int)filter_input(INPUT_POST, 'value', FILTER_SANITIZE_NUMBER_INT));
                            break;
                        }
                    }
                }
            }

            //echo var_dump($_SESSION['stickerOrders']);
            break;
        }
    }
}
session_write_close();
?>
<?php
$dbcon = null;
require_once 'cartclasses.php';
if(session_status() === PHP_SESSION_NONE)
    session_start();

$date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur'));
$formattedDate = $date -> format('Y-m-d H:i:s');


// if doing ajax
if(isset($_POST['action'])){
    if($_POST['type'] == 'badge'){
        $type = 1;
    }else{
        $type = 2;
    }

    $msg = '';
    switch($_POST['action']){
        case 'add':{
            if($_POST['type'] == 'badge'){
                /*
                 * on ajax success, update js vars
                 * https://stackoverflow.com/questions/9978449/update-javascript-variable-with-ajax-in-real-time
                 */
                $_SESSION['badgeCount']++;

                $badgeObj = new badgeOrder(); // initialize badge item with default values
                $badgeObj -> setIndex((int)$_SESSION['absoluteBR']);
                $badgeObj -> setFilename('');
                $badgeObj -> setQty(1);
                $badgeObj -> setSize(-1);
                $badgeObj -> setType(-1);
                $_SESSION['badgeOrders'][(int)$_SESSION['absoluteBR']] = $badgeObj; // add to badge cart

                $_SESSION['absoluteBR']++;
                $jsonVar = array("badgeCount" => $_SESSION['badgeCount'], "absoluteBR" => $_SESSION['absoluteBR']);
            }else{
                $_SESSION['stickerCount']++;

                $stickerObj = new stickerOrder(); // initialize sticker item with default values
                $stickerObj -> setIndex((int)$_SESSION['absoluteSR']);
                $stickerObj -> setLabels('');
                $stickerObj -> setType(-1);
                $stickerObj -> setSize(-1);
                $stickerObj -> setColor(-1);
                $_SESSION['stickerOrders'][(int)$_SESSION['absoluteSR']] = $stickerObj; // add to sticker cart

                $_SESSION['absoluteSR']++;
                $jsonVar = array("stickerCount" => $_SESSION['stickerCount'], "absoluteSR" => $_SESSION['absoluteSR']);
            }
            echo json_encode($jsonVar);
            break;
        }case 'delete':{
            $index = filter_input(INPUT_POST, 'itemIndex', FILTER_SANITIZE_NUMBER_INT);

            if($_POST['type'] == 'badge'){
                //array_splice($_SESSION['badgeOrders'], $index, 1); // remove from badge cart
                unset($_SESSION['badgeOrders'][$index]);
                $_SESSION['badgeCount'] = $_SESSION['badgeCount'] - 1 < 0? 0 : $_SESSION['badgeCount'] - 1; // decrease badge row count, don't let count to be < 0
                $jsonVar = array("badgeCount" => $_SESSION['badgeCount'], "absoluteBR" => $_SESSION['absoluteBR']);
            }else{
                //array_splice($_SESSION['stickerOrders'], $index, 1); // remove from sticker cart
                unset($_SESSION['stickerOrders'][$index]);
                $_SESSION['stickerCount'] = $_SESSION['stickerCount'] - 1 < 0? 0 : $_SESSION['stickerCount'] - 1; // decrease sticker row count, don't let count to be < 0
                $jsonVar = array("stickerCount" => $_SESSION['stickerCount'], "absoluteSR" => $_SESSION['absoluteSR']);
            }
            echo json_encode($jsonVar);
            break;
        }case 'submit':{
        /**
         * TO-DO: submit method. either do it here or in a new php file.
         *
         */
            break;
        }
    }
}
session_write_close();
?>
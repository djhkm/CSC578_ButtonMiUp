<?php
// initialize vars on document ready
if(session_status() === PHP_SESSION_NONE)
    session_start();
if(!isset($_SESSION['badgeRows']))
    $_SESSION['badgeRows'] = 0;
if(!isset($_SESSION['stickerRows']))
    $_SESSION['stickerRows'] = 0;

// if doing ajax
if(isset($_POST['action'])){
    if($_POST['type'] == 'badge'){
        $type = 1;
    }else{
        $type = 2;
    }

    switch($_POST['action']){
        case 'add':{
            if($_POST['type'] == 'badge'){
                $_SESSION['badgeRows']++;
                /*
                 * on ajax success, update js vars                 *
                 * https://stackoverflow.com/questions/9978449/update-javascript-variable-with-ajax-in-real-time
                 *
                 */

                $jsonVar = array("badgeRows" => $_SESSION['badgeRows']);
                echo json_encode($jsonVar);
            }else{
                $_SESSION['stickerRows']++;
                $jsonVar = array("stickerRows" => $_SESSION['stickerRows']);
                echo json_encode($jsonVar);
            }
            break;
        }case 'delete':{
        if($_POST['type'] == 'badge'){
            $_SESSION['badgeRows']--;
            $jsonVar = array("badgeRows" => $_SESSION['badgeRows']);
            echo json_encode($jsonVar);
        }else{
            $_SESSION['stickerRows']--;
            $jsonVar = array("stickerRows" => $_SESSION['stickerRows']);
            echo json_encode($jsonVar);
        }
        break;
        }case 'updateCard':{
            //echo "updateCard($type);";
            break;
        }
    }
}
?>
<?php
require_once 'cartclasses.php';
if(session_status() === PHP_SESSION_NONE)
    session_start();

$string = '';


?>
<div class="row sticky-top bg-white">
    <div class="col-6">
        <h3 id="stickerHeader">Sticker</h3>
    </div>
    <div class="col-6" align="right">
        <button type="button" class="btn btn-success" onclick="addDeleteAjax(2, 1, -1)"><span class="bi bi-plus-circle"></span></button>
    </div>
    <div class="table table-responsive d-none d-lg-block" align="center">
        <div class="thead border-bottom" id="stickerThead">
            <!--div class="row">
                <div class="col-lg-3 col-xs-12">
                    Labels
                </div>
                <div class="col-lg-3 col-xs-12">
                    Type
                </div>
                <div class="col-lg-3 col-xs-12">
                    Size
                </div>
                <div class="col-lg-1 col-xs-12">
                    Color
                </div>
                <div class="col-lg col-xs-12"">
                    Action
                </div>
            </div-->
        </div>
    </div>
    <script>
        updateHeader(2);
        updateTableHead(2)
    </script>
</div>
<style>
    .tbody .row:nth-of-type(even){
        background-color: #f5f5f5;
    }
    .tbody .row:nth-of-type(odd){
        background-color: transparent;
    }
</style>
<div class="row">
    <div class="table table-responsive align-items-center">
        <div class="tbody" id="stickerRows">
            <?php

            //$testIndex = 0;
            if(isset($_SESSION['stickerCount'])) {
                if ($_SESSION['stickerCount'] > 0) {
                    foreach ($_SESSION['stickerOrders'] as $row) {
                        //for($i = 0; $i < count($_SESSION['stickerOrders']); $i++){
                        //echo "entering loop $i";
                        if(isset($row) && !empty($row)){
                            //if(isset($_SESSION['stickerOrders'][$i])){ $row = $_SESSION['stickerOrders'][$i];

                            $string .=
                                //"<div class='phpadd-$testIndex row align-items-center border-bottom'>" .
                                "<div class='row align-items-center border-bottom'>" .

                                // sticker labels
                                "<div class='col-md-3 col-sm-12'>" .
                                "<textarea required class='textarea form-control' name='itemSticker[{$row -> getIndex()}][stickerLabels]' placeholder=\"Separate labels by new lines. e.g.&#10;Salt&#10;Sugar&#10;Sugar&#10;Flour\" rows=\"5\" onchange=\"onChangeAjax(2, {$row -> getIndex()}, 'labels', this.value)\">{$row -> getLabels()}</textarea>" .
                                "</div>" .

                                // sticker type
                                "<div class='form-floating col-md-3 col-sm-12'>" .
                                "<label for='itemSticker[{$row -> getIndex()}][stickerType]' class='ms-2'>Sticker Type</label>" .
                                "<select name='itemSticker[{$row -> getIndex()}][stickerType]' id='itemSticker[{$row -> getIndex()}][stickerType]' class='form-select' onchange='onChangeAjax(2, {$row -> getIndex()}, \"type\", this.value)'>" .
                                "<option selected disabled>Select the sticker type</option>";
                            for ($i = 0; $i < count($_SESSION['stickerTypes']); $i++) { // go through all sticker types
                                $string .= "<option value='{$_SESSION['stickerTypes'][$i]['id']}'";

                                if($row -> getType() == $_SESSION['stickerTypes'][$i]['id'])
                                    $string .= " selected";

                                $string .=">{$_SESSION['stickerTypes'][$i]['desc']}</option>";
                            }
                            $string .= "</select></div>";

                            // sticker size
                            $string .=
                                "<div class='form-floating col-md-3 col-sm-12'>" .
                                "<label for='itemSticker[{$row -> getIndex()}][stickerSize]' class='ms-2'>Sticker Size</label>" .
                                "<select name='itemSticker[{$row -> getIndex()}][stickerSize]' id='itemSticker[{$row -> getIndex()}][stickerSize]' class='form-select' onchange='onChangeAjax(2, {$row -> getIndex()},\"size\", this.value)'>" .
                                "<option selected disabled>Select the sticker size</option>";
                            for ($i = 0; $i < count($_SESSION['stickerSizes']); $i++) { // go through all sticker sizes
                                $string .= "<option value='{$_SESSION['stickerSizes'][$i]['id']}'";

                                if($row -> getSize() == $_SESSION['stickerSizes'][$i]['id'])
                                    $string .= " selected";

                                $string .=">{$_SESSION['stickerSizes'][$i]['desc']}</option>";
                            }
                            $string .= "</select></div>";

                            // sticker color
                            $string .=
                                "<div class='form-floating col-md-2 col-sm-12'>" .
                                "<label for='itemSticker[{$row -> getIndex()}][stickerColor]' class='ms-2'>Sticker Color</label>" .
                                "<select name='itemSticker[{$row -> getIndex()}][stickerColor]' id='itemSticker[{$row -> getIndex()}][stickerColor]' class='form-select' onchange='onChangeAjax(2, {$row -> getIndex()},\"color\", this.value)'>" .
                                "<option selected disabled>Select the color</option>";
                            for ($i = 0; $i < count($_SESSION['stickerColors']); $i++) { // go through all sticker sizes
                                $string .= "<option value='{$_SESSION['stickerColors'][$i]['id']}'";

                                if($row -> getColor() == $_SESSION['stickerColors'][$i]['id'])
                                    $string .= " selected";

                                $string .=">{$_SESSION['stickerColors'][$i]['desc']}</option>";
                            }
                            $string .= "</select></div>";

                            // delete btn
                            $string .=
                                "<div class='col-md-1 col-sm-12 d-flex justify-content-end justify-content-md-center'>" .
                                "<button type='button' class='btn btn-danger' onclick='removeItem(2, this, {$row -> getIndex()})'><span class='bi bi-trash'></span></button>" .
                                "</div>" .

                                "</div>"; //end of row div
                        }
                        //$testIndex++;

                    }

                }

            }
            //echo "<script>console.log($string);</script>";
            ?>
            <!--div class="row">
                <div class="col-lg-3 col-xs-12">
                    <textarea class="form-control" name="stickerLabels" placeholder="Separate labels by new lines. e.g.&#10;Salt&#10;Sugar&#10;Sugar&#10;Flour" rows="5"></textarea><br>
                    <div>* For multiple of the same label, write them multiple times.</div>
                </div>
                <div class="col-lg-3 col-xs-12">
                    <select class="form-control" name="stickerType">
                        <option>Vinyl</option>
                        <option>Transparent</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xs-12">
                    <select class="form-control" name="stickerSize">
                        <option>30mm x 60mm</option>
                        <option>60mm x 120mm</option>
                    </select>
                </div>
                <div class="col-lg-1 col-xs-12">
                    <select class="form-control" name="stickerColor">
                        <option>White</option>
                        <option>Black</option>
                        <option>Gold</option>
                    </select>
                </div>
                <div class="col-lg  col-xs-12">
                    <button type="button" class="btn btn-danger" onclick="removeItem()">Remove Item</button>
                </div>
            </div-->
        </div>
    </div>
</div>
<?php
require_once 'cartclasses.php';
if(session_status() === PHP_SESSION_NONE)
    session_start();

$string = '';


?>
<div class="row sticky-top bg-white">
    <div class="col-6">
        <h3 id="badgeHeader">Badge</h3>
    </div>
    <div class="col-6" align="right">
        <button type="button" class="btn btn-success" onclick="addDeleteAjax(1, 1, -1)"><span class="bi bi-plus-circle"></span></button>
    </div>
    <div class="table table-responsive d-none d-lg-block" align="center">
        <div class="thead border-bottom" id="badgeThead">
            <!--div class="row">
                <div class="col-lg-3 col-xs-12">
                    Image
                </div>
                <div class="col-lg-3 col-xs-12">
                    Type
                </div>
                <div class="col-lg-3 col-xs-12">
                    Size
                </div>
                <div class="col-lg-1 col-xs-12">
                    Quantity
                </div>
                <div class="col-lg col-xs-12">
                    Action
                </div>
            </div-->
        </div>
    </div>
    <script>
        updateHeader(1);
        updateTableHead(1);
        //addItem(2, 1);
    </script>
</div>
<style>
    .tbody .row:nth-of-type(even){
        background-color: #f5f5f5;
    }
    .tbody .row:nth-of-type(odd){
        background-color: white;
    }
</style>
<div class="row">
    <div class="table table-striped" align="center">
        <?php //div class="<?="aBR-{$_SESSION['absoluteBR']} countBO-" . count($_SESSION['badgeOrders']) . " "/tbody" id="badgeRows"> ?>
        <div class="tbody" id="badgeRows">
            <?php

            //$testIndex = 0;
            if(isset($_SESSION['badgeCount'])) {
                if ($_SESSION['badgeCount'] > 0) {
                    foreach ($_SESSION['badgeOrders'] as $row) {
                    //for($i = 0; $i < count($_SESSION['badgeOrders']); $i++){
                        //echo "entering loop $i";
                        if(isset($row) && !empty($row)){
                        //if(isset($_SESSION['badgeOrders'][$i])){ $row = $_SESSION['badgeOrders'][$i];

                            $string .=
                                //"<div class='phpadd-$testIndex row align-items-center border-bottom'>" .
                                "<div class='row align-items-center border-bottom'>" .

                                // badge image file
                                "<div class='col-md-3 col-sm-12'>" .
                                "<input name='itemBadge[{$row -> getIndex()}][badgeImage]' class='form-control' type='file' accept='image/jpeg, image/png'/>" .
                                "</div>" .

                                // badge type
                                "<div class='form-floating col-md-3 col-sm-12'>" .
                                "<label for='itemBadge[{$row -> getIndex()}][badgeType]' class='ms-2'>Badge Type</label>" .
                                "<select name='itemBadge[{$row -> getIndex()}][badgeType]' id='itemBadge[{$row -> getIndex()}][badgeType]' class='form-select' onchange='onChangeAjax(1, {$row -> getIndex()}, \"type\", this.value)'>" .
                                "<option selected disabled>Select the badge type</option>";
                            for ($i = 0; $i < count($_SESSION['badgeTypes']); $i++) { // go through all badge types
                                $string .= "<option value='{$_SESSION['badgeTypes'][$i]['id']}'";

                                if($row -> getType() == $_SESSION['badgeTypes'][$i]['id'])
                                    $string .= " selected";

                                $string .=">{$_SESSION['badgeTypes'][$i]['desc']}</option>";
                            }
                            $string .= "</select></div>";

                            // badge size
                            $string .=
                                "<div class='form-floating col-md-3 col-sm-12'>" .
                                "<label for='itemBadge[{$row -> getIndex()}][badgeSize]' class='ms-2'>Badge Size</label>" .
                                "<select name='itemBadge[{$row -> getIndex()}][badgeSize]' id='itemBadge[{$row -> getIndex()}][badgeSize]' class='form-select' onchange='onChangeAjax(1, {$row -> getIndex()},\"size\", this.value)'>" .
                                "<option selected disabled>Select the badge size</option>";
                            for ($i = 0; $i < count($_SESSION['badgeSizes']); $i++) { // go through all badge sizes
                                $string .= "<option value='{$_SESSION['badgeSizes'][$i]['id']}'";

                                if($row -> getSize() == $_SESSION['badgeSizes'][$i]['id'])
                                    $string .= " selected";

                                $string .=">{$_SESSION['badgeSizes'][$i]['desc']}</option>";
                            }
                            $string .= "</select></div>";

                            // badge qty
                            $string .=
                                "<div class='form-floating col-md-2 col-sm-12'>" .
                                "<label for='itemBadge[{$row -> getIndex()}][badgeQty]' class='ms-2'>Quantity</label>" .
                                "<input name='itemBadge[{$row -> getIndex()}][badgeQty]' id='itemBadge[{$row -> getIndex()}][badgeQty]' type='number' class='form-control' value='{$row -> getQty()}' min='1' onchange='onChangeAjax(1, {$row -> getIndex()}, \"qty\", this.value)'/>" .
                                "</div>";

                            // delete btn
                            $string .=
                                "<div class='col-md-1 col-sm-12 d-flex justify-content-end justify-content-md-center'>" .
                                "<button type='button' class='btn btn-danger' onclick='removeItem(1, this, {$row -> getIndex()})'><span class='bi bi-trash'></span></button>" .
                                "</div>" .

                                "</div>"; //end of row div
                        }
                        //$testIndex++;

                    }

                }

            }
            echo $string;
            ?>
            <!--div class="row">
                <div class="col-lg-3 col-xs-12">
                    <input class="form-control" type="file" accept="image/jpeg, image/png" />
                </div>
                <div class="col-lg-3 col-xs-12">
                    <select class="form-control">
                        <option>Keychain</option>
                        <option>Pin</option>
                        <option>Magnet</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xs-12">
                    <select class="form-control">
                        <option>58mm</option>
                        <option>32mm</option>
                    </select>
                </div>
                <div class="col-lg-1 col-xs-12">
                    <input type="number" class="form-control" value="1" min="1" />
                </div>
                <div class="col-lg  col-xs-12" align="center">
                    <button type="button" class="btn btn-danger" onclick="removeItem()">Remove Item</button>
                </div>
            </div-->
        </div>
    </div>
</div>
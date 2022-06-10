<?php
if(session_status() === PHP_SESSION_NONE)
    session_start();

if(!isset($_SESSION['badgeRows']))
    $_SESSION['badgeRows'] = 0;
if(!isset($_SESSION['stickerRows']))
    $_SESSION['stickerRows'] = 0;
?>
<script>
    var card;
    var badgeRows, stickerRows;

    function updateAjax(type, mode){
        var actionString = '';
        var typeString = '';

        switch (mode) {
            case 1:{
                actionString = 'add';
                addItem(mode, type);
                updateTableHead(type);
                break;
            }case 2:{
                actionString = 'delete';
                //removeItem(type, )
                break;
            }case 3:{
                actionString = 'updateCard'; break;
            }case 4:{
                actionString = ''; break;
            }
        }
        switch (type) {
            case 1:{
                typeString = 'badge'; break;
            }case 2:{
                typeString = 'sticker'; break;
            }
        }

        $.ajax({
            type: "POST",
            url: 'cartphp.php',
            data:{
                action:actionString,
                type:typeString
            },
            success:function (data){
                //console.log('POSTed mode:' + actionString);
                //console.log('POST response is: ' + data);

                switch (mode) {
                    case 1:
                    case 2: {
                        if (JSON.parse(data)) {
                            data = JSON.parse(data);
                            //data = data[0];

                            switch (type) {
                                case 1:{
                                    badgeRows = data['badgeRows'];
                                    //console.log('new badgerow js is ' + badgeRows);
                                    break; }
                                case 2:{
                                    stickerRows = data['stickerRows'];
                                    //console.log('new stickerrow js is ' + stickerRows);
                                    break; }
                            }
                            updateTableHead(type);
                        } else {
                            console.log("Response was not in json: " + data);
                        }
                        break;
                    }
                }
            }
        });
    }

    $(document).ready(function(){
        //console.log('php vars set, bR sR <?php /*session_status() !== PHP_SESSION_NONE? $_SESSION['badgeRows'] . ' ' . $_SESSION['stickerRows']: '0 0';*/ ?>');
        badgeRows = <?=isset($_SESSION['badgeRows'])? $_SESSION['badgeRows'] : 0; ?>;
        stickerRows = <?=isset($_SESSION['stickerRows'])? $_SESSION['stickerRows'] : 0; ?>;
        //console.log('js vars set, bR sR ' + badgeRows + ' ' + stickerRows);

        card = $("#cart-card");
        card.load("cartBadge.php");
    });

    function updateCard(id){
        $("#badgeBtn").removeClass("btn-info");
        $("#stickerBtn").removeClass("btn-info");
        if(id === 1){
            $("#badgeBtn").addClass("btn-info");
            card.load("cartBadge.php");
        }else{
            $("#stickerBtn").addClass("btn-info");
            card.load("cartSticker.php");
        }
        updateTableHead(id);
        addItem(2, id);
    }

    function updateTableHead(type){
        //type 1 = badge, type 2 = sticker
        var theadString;

        if(type === 1){
            if(badgeRows === 0){
                theadString = '<div class="row"><div class="col-12">You have no badges in your cart.</div></div>'
            }else{
                theadString = '<div class="row"><div class="col-lg-3 col-xs-12">Image</div><div class="col-lg-3 col-xs-12">Type</div><div class="col-lg-3 col-xs-12">Size</div><div class="col-lg-2 col-xs-12">Quantity</div><div class="col-lg-1 col-xs-12">Action</div></div>';
            }
            $("#badgeThead").html(theadString);
        }else{
            if(stickerRows === 0){
                theadString = '<div class="row"><div class="col-12">You have no stickers in your cart.</div></div>'
            }else{
                theadString = '<div class="row"><div class="col-lg-3 col-xs-12">Labels</div><div class="col-lg-3 col-xs-12">Type</div><div class="col-lg-3 col-xs-12">Size</div><div class="col-lg-2 col-xs-12">Color</div><div class="col-lg-1 col-xs-12"">Action</div></div>';
            }
            $("#stickerThead").html(theadString);
        }
    }

    function addItem(mode, type){
        // mode 1 = button is clicked; add one new row and increase count
        //      2 = repopulate table; loop and display rows without increasing count

        // type 1 = badge
        //      2 = sticker
        if(type === 1){
            if(mode === 1){ // if button is clicked
                insertNewRow(type);
            }else{
                //console.log('looping badgerows for n times: ' + badgeRows);
                for (let i = 0; i < badgeRows; i++) {
                    //console.log('badgerow loop entered');
                    insertNewRow(type);
                }
            }
        }else{
            if(mode === 1){ //if button is clicked
                insertNewRow(type); //add only one row
            }else{
                //console.log('looping stickerrows for n times: ' + stickerRows);
                for (let i = 0; i < stickerRows; i++) { //if called by other means, loop
                    insertNewRow(type)
                }
            }
        }

    }
    function insertNewRow(type){
        //console.log('insert entered, type: ' + type);
        let addString;
        //type 1 = badge, type 2 = sticker
        if(type === 1){
            addString = '<div class="row"><div class="col-lg-3 col-xs-12"><input class="form-control" type="file" accept="image/jpeg, image/png" /></div><div class="col-lg-3 col-xs-12"><select class="form-control"><option selected disabled>Please select the badge type.</option><option>Keychain</option><option>Pin</option><option>Magnet</option></select></div><div class="col-lg-3 col-xs-12"><select class="form-control"><option selected disabled>Please select the badge size.</option><option>58mm</option><option>32mm</option></select></div><div class="col-lg-2 col-xs-12"><input type="number" class="form-control" value="1" min="1" /></div><div class="col-lg-1 col-xs-12" align="center"><button type="button" class="btn btn-danger" onclick="removeItem(1, this)"><span class="bi bi-trash"></span></button></div></div>';
            if(badgeRows === 0){ // if row count is 0
                //console.log('html-ing badge');
                $("#badgeRows").html(addString);
            }else{
                //console.log('appending badge')
                $("#badgeRows").append(addString);
            }
        }else{
            addString = '<div class="row"><div class="col-lg-3 col-xs-12"><textarea class="form-control" name="stickerLabels" placeholder="Separate labels by new lines. e.g.&#10;Salt&#10;Sugar&#10;Sugar&#10;Flour" rows="5"></textarea><br><div>* For multiple of the same label, write them multiple times.</div></div><div class="col-lg-3 col-xs-12"><select class="form-control" name="stickerType"><option selected disabled>Please select the sticker type.</option><option>Vinyl</option><option>Transparent</option></select></div><div class="col-lg-3 col-xs-12"><select class="form-control" name="stickerSize"><option selected disabled>Please select the sticker size.</option><option>30mm x 60mm</option><option>60mm x 120mm</option></select></div><div class="col-lg-2 col-xs-12"><select class="form-control" name="stickerColor"><option selected disabled>Select the color.</option><option>White</option><option>Black</option><option>Gold</option></select></div><div class="col-lg-1 col-xs-12"><button type="button" class="btn btn-danger" onclick="removeItem(2, this)"><span class="bi bi-trash"></span></button></div></div>';
            if(stickerRows === 0){
                $("#stickerRows").html(addString);
            }else{
                $("#stickerRows").append(addString);
            }
        }

    }

    function removeItem(type, id){
        updateAjax(type, 2);
        $(id).parent().parent().remove();
    }
</script>
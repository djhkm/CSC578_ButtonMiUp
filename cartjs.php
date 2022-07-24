<?php
require_once 'cartclasses.php';
if(session_status() === PHP_SESSION_NONE)
    session_start();

?>
<script>
    var card;
    var badgeCount, stickerCount; // used for determining if row is empty or not
    var absoluteBR, absoluteSR;

    absoluteSR = absoluteBR = 0;

    $(document).ready(function(){
        //console.log('php vars set, bR sR <?php /*session_status() !== PHP_SESSION_NONE? $_SESSION['badgeCount'] . ' ' . $_SESSION['stickerCount']: '0 0';*/ ?>');
        badgeCount = <?=isset($_SESSION['badgeCount'])? $_SESSION['badgeCount'] : 0; ?>;
        stickerCount = <?=isset($_SESSION['stickerCount'])? $_SESSION['stickerCount'] : 0; ?>;
        //console.log('js vars set, bR sR ' + badgeRows + ' ' + stickerRows);

        card = $("#cart-card");
        card.load("cartBadge.php");
    });

    function addDeleteAjax(type, mode, rowIndex){
        var actionString = '';
        var typeString = '';

        switch (mode) {
            case 1:{
                actionString = 'add';
                insertNewRow(type);
                updateTableHead(type);
                break;
            }case 2:{
                actionString = 'delete';
                break;
            }case 3:{
                actionString = 'updateItems'; break;
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
            url: 'cartajax.php',
            data:{
                action:actionString,
                type:typeString,
                itemIndex:rowIndex //only used when deleting items
            },
            success:function (data){
                //console.log('POSTed mode:' + actionString);
                //console.log('POST response is: ' + data);

                switch (mode) {
                    case 1:
                    case 2: {
                        //console.log(data);
                        if (JSON.parse(data)) {
                            data = JSON.parse(data);

                            //data = data[0];
                            switch (type) {
                                case 1:{
                                    //absoluteBR++;
                                    badgeCount = data['badgeCount'];
                                    absoluteBR = data['absoluteBR'];
                                    //console.log('new badgecount js is ' + badgeCount);
                                    break;
                                }
                                case 2:{
                                    //absoluteSR++;
                                    stickerCount = data['stickerCount'];
                                    absoluteSR = data['absoluteSR'];
                                    //console.log('new stickercount js is ' + stickerCount);
                                    break;
                                }
                            }

                            // update header and tablehead after adding or deleting items
                            updateHeader(type);
                            updateTableHead(type);
                        } else {
                            console.log("Response was not in json: " + data);
                        }
                        break;
                    }
                }
                console.log(data);
            }

        });
    }

    function onChangeAjax(type, rowIndex, updateColumn, updateValue){
        $.ajax({
            type: "POST",
            url: 'cartupdate.php',
            data:{
                index:rowIndex,
                type:type,
                column:updateColumn,
                value:updateValue
            },
            success:function (data){
                console.log("POSTED update, data is \n" + data);
            }
        });
    }

    function onChangeFileUpload(rowIndex){

      var fd = new FormData();
      var imageFile = document.getElementById('itemBadge[' + rowIndex + '][badgeImage]');
      fd.append('index', rowIndex);
      fd.append('file', imageFile.files[0]);

      $.ajax({
        type: 'POST',
        url: 'cartfileupload.php',
        data: fd,
        contentType: false,
        processData: false,
        success:function (data){
          //console.log('POSTED update, data is \n' + data);

          var dataResult = JSON.parse(data);
          document.getElementById('itemBadge[' + rowIndex + '][badgeImageName]').innerHTML = dataResult.fileName;
        }
      });

    }

    function updateCard(type){
        $("#badgeBtn").removeClass("btn-info");
        $("#stickerBtn").removeClass("btn-info");
        if(type === 1){
            $("#badgeBtn").addClass("btn-info");
            card.load("cartBadge.php");
        }else{
            $("#stickerBtn").addClass("btn-info");
            card.load("cartSticker.php");
        }
        updateHeader(type);
        updateTableHead(type);
    }

    function updateHeader(type){
        let headerVar;
        let headerString = '';

        switch (type){
            case 1:{
                headerVar = $('#badgeHeader');
                headerString += 'Badges';
                if(badgeCount > 0){
                    headerString += ' (' + badgeCount + ')';
                }
                break;
            }case 2:{
                headerVar = $('#stickerHeader');
                headerString += 'Stickers';
                if(stickerCount > 0){
                    headerString += ' (' + stickerCount + ')';
                }
                break;
            }
        }
        headerVar.html(headerString);
    }

    function updateTableHead(type){
        //type 1 = badge, type 2 = sticker
        var theadString;

        if(type === 1){
            if(badgeCount === 0){
                theadString = '<div class="row"><div class="col-12">You have no badges in your cart.</div></div>'
            }else{
                theadString = '<div class="row"><div class="col-md-3 col-sm-12">Image</div><div class="col-md-3 col-sm-12">Type</div><div class="col-md-3 col-sm-12">Size</div><div class="col-md-2 col-sm-12">Quantity</div><div class="col-md-1 col-sm-12"></div></div>';
            }
            $("#badgeThead").html(theadString);
        }else{
            if(stickerCount === 0){
                theadString = '<div class="row"><div class="col-12">You have no stickers in your cart.</div></div>'
            }else{
                theadString = '<div class="row"><div class="col-md-3 col-sm-12">Labels</div><div class="col-md-3 col-sm-12">Type</div><div class="col-md-3 col-sm-12">Size</div><div class="col-md-2 col-sm-12">Color</div><div class="col-md-1 col-sm-12"></div></div>';
            }
            $("#stickerThead").html(theadString);
        }
    }

    function insertNewRow(type){
        //console.log('insert entered, type: ' + type);
        let addString = '<div class="jsadd row align-items-center border-bottom"><div class="col-md-3 col-sm-12">';
        if(type === 1){
            addString +=
                // badge image file
                '<input name="itemBadge[' + absoluteBR + '][badgeImage]" id="itemBadge[' + absoluteBR + '][badgeImage]" class="form-control" type="file" accept="image/jpeg, image/png" onchange="onChangeFileUpload('+ absoluteBR +')" required /><p class="text-start fs--1">Current File: <span class="text-info" id="itemBadge[' + absoluteBR + '][badgeImageName]">No File Uploaded</span></p></div>'+

                // badge type
                '<div class="form-floating col-md-3 col-sm-12">'+
                '<label for="itemBadge[' + absoluteBR + '][badgeType]"class="ms-2">Badge Type</label>' +
                '<select name="itemBadge[' + absoluteBR + '][badgeType]" id="itemBadge[' + absoluteBR + '][badgeType]" class="form-select" onchange="onChangeAjax(1, '+ absoluteBR +', \'type\', this.value)" required >' +
                '<option selected disabled>Select the badge type.</option>'+
                <?php
                //'<option>Keychain</option><option>Pin</option><option>Magnet</option></select></div>'+
                for ($i = 0; $i < count($_SESSION['badgeTypes']); $i++) { // go through all badge types
                    echo "'<option value=\"{$_SESSION['badgeTypes'][$i]['id']}\">{$_SESSION['badgeTypes'][$i]['desc']}</option>' +";
                }
                ?>
                '</select></div>' +
                // badge size
                '<div class="form-floating col-md-3 col-sm-12">'+
                '<label for="itemBadge[' + absoluteBR + '][badgeSize]" class="ms-2">Badge Size</label>'+
                '<select name="itemBadge[' + absoluteBR + '][badgeSize]" id="itemBadge[' + absoluteBR + '][badgeSize]"class="form-select"  onchange="onChangeAjax(1, '+ absoluteBR +', \'size\', this.value)" required >'+
                '<option selected disabled>Select the badge size.</option>' +
                <?php
                //'<option>58mm</option><option>32mm</option></select></div>'+ // hiding comment here to prevent showing up in html source
                for ($i = 0; $i < count($_SESSION['badgeSizes']); $i++) { // go through all badge sizes
                    echo "'<option value=\"{$_SESSION['badgeSizes'][$i]['id']}\">{$_SESSION['badgeSizes'][$i]['desc']}</option>' +";
                }
                ?>
                '</select></div>' +
                // badge quantity
                '<div class="form-floating col-md-2 col-sm-12">'+
                '<label for="itemBadge[' + absoluteBR + '][badgeQty]" class="ms-2">Quantity</label>'+
                '<input name="itemBadge[' + absoluteBR + '][badgeQty]" id="itemBadge[' + absoluteBR + '][badgeQty]" type="number" class="form-control" value="1" min="1"  onchange="onChangeAjax(1, '+ absoluteBR +', \'qty\', this.value)" required /></div>'+

                '<div class="col-md-1 col-sm-12 d-flex justify-content-end justify-content-md-center">'+
                '<button type="button" class="btn btn-danger" onclick="removeItem(1, this, ' + absoluteBR +')"><span class="bi bi-trash"></span></button></div></div>';
            if(badgeCount === 0){ // if row count is 0
                $("#badgeRows").html(addString);
            }else{
                $("#badgeRows").append(addString);
            }
        }else{
            addString +=
                // sticker labels
                '<textarea required class="textarea form-control" name="itemSticker[' + absoluteSR + '][stickerLabels]" id="itemSticker[' + absoluteSR + '][stickerLabels]" placeholder="Separate labels by new lines. e.g.&#10;Salt&#10;Sugar&#10;Sugar&#10;Flour" rows="5" onchange="onChangeAjax(2, '+ absoluteSR +', \'labels\', this.value)" required ></textarea>' +
                '<!--br><div>* For multiple of the same label, write them multiple times.</div--></div>'+

                // sticker type
                '<div class="form-floating col-md-3 col-sm-12">'+
                '<label for="itemSticker[' + absoluteSR + '][stickerType]" class="ms-2">Sticker Type</label>'+
                '<select id="itemSticker[' + absoluteSR + '][stickerType]" required class="form-select" name="stickerType[' + absoluteSR + '][stickerType]" onchange="onChangeAjax(2, '+ absoluteSR +', \'type\', this.value)" required >'+
                '<option selected disabled>Select the sticker type.</option>'+

                <?php
                //'<option>Vinyl</option><option>Transparent</option></select></div>'+
                for ($i = 0; $i < count($_SESSION['stickerTypes']); $i++) { // go through all badge types
                    echo "'<option value=\"{$_SESSION['stickerTypes'][$i]['id']}\">{$_SESSION['stickerTypes'][$i]['desc']}</option>' +";
                }
                ?>
                '</select></div>' +

                // sticker size
                '<div class="form-floating col-md-3 col-sm-12">'+
                '<label for="itemSticker[' + absoluteSR + '][stickerSize]" class="ms-2">Sticker Size</label>'+
                '<select id="itemSticker[' + absoluteSR + '][stickerSize]" required class="form-select" name="stickerSize[' + absoluteSR + '][stickerSize]" onchange="onChangeAjax(2, '+ absoluteSR +', \'size\', this.value)" required >' +
                '<option selected disabled>Select the sticker size.</option>' +
                <?php
                //<option>30mm x 60mm</option><option>60mm x 120mm</option></select></div>'+
                for ($i = 0; $i < count($_SESSION['stickerSizes']); $i++) { // go through all badge types
                    echo "'<option value=\"{$_SESSION['stickerSizes'][$i]['id']}\">{$_SESSION['stickerSizes'][$i]['desc']}</option>' +";
                }
                ?>
                '</select></div>' +

                // sticker color
                '<div class="form-floating col-md-2 col-sm-12">'+
                '<label for="itemSticker[' + absoluteSR + '][stickerColor]" class="ms-2">Sticker Color</label>'+
                '<select id="itemSticker[' + absoluteSR + '][stickerColor]" required class="form-select" name="stickerColor[' + absoluteSR + '][stickerColor]" onchange="onChangeAjax(2, '+ absoluteSR +', \'color\', this.value)" required >'+
                '<option selected disabled>Select the color.</option>' +
                <?php
                //<option>White</option><option>Black</option><option>Gold</option></select></div>'+
                for ($i = 0; $i < count($_SESSION['stickerColors']); $i++) { // go through all badge types
                    echo "'<option value=\"{$_SESSION['stickerColors'][$i]['id']}\">{$_SESSION['stickerColors'][$i]['desc']}</option>' +";
                }
                ?>
                '</select></div>' +

                '<div class="col-md-1 col-sm-12 d-flex justify-content-end justify-content-md-center">'+
                '<button type="button" class="btn btn-danger float-sm-end" onclick="removeItem(2, this, ' + absoluteSR + ')"><span class="bi bi-trash"></span></button></div></div>';
            if(stickerCount === 0){
                $("#stickerRows").html(addString);
            }else{
                $("#stickerRows").append(addString);
            }
        }
    }

    function removeItem(type, id, index){
        addDeleteAjax(type, 2, index);
        $(id).parent().parent().remove();
    }
</script>
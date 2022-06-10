<div class="row">
    <div class="col-6">
        <h3>Sticker</h3>
    </div>
    <div class="col-6" align="right">
        <button type="button" class="btn btn-success" onclick="updateAjax(2, 1)"><span class="bi bi-plus-circle"></span></button>
    </div>
</div>
<div class="row">&emsp;</div>
<div class="row">
        <div class="table table-responsive" align="center">
            <div class="thead" id="stickerThead">
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
            <script>
                updateTableHead(2)
                addItem(2, 2);
            </script>
            <div class="tbody" id="stickerRows">
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
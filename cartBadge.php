<div class="row">
    <div class="container">
        <div class="row">

        <div class="col-6">
            <h3>Badge</h3>
        </div>
        <div class="col-6" align="right">
            <button type="button" class="btn btn-success" onclick="updateAjax(1, 1)"><span class="bi bi-plus-circle"></span></button>
        </div>
    </div>
    </div>
</div>
<div class="row">&emsp;</div>
<div class="row">
        <div class="table table-responsive" align="center">
            <div class="thead" id="badgeThead">
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
            <script>
                updateTableHead(1);
                addItem(2, 1);
            </script>
            <div class="tbody" id="badgeRows">
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
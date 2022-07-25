<?php include "function-admin.php";?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = $dbcon -> query("SELECT `order`.*, `customer`.`Name`, `customer`.`Email` FROM `order` LEFT JOIN `customer` ON `order`.`CustomerID` = `customer`.`CustomerID`;");
    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $Name = $n['Name'];
        $Address = $n['Address'];
    }
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>ButtonMiUp - Blank Page</title>


    <?php
    include "page-head-admin.php";
    ?>
</head>


<body>
<?php
include "../config/info_notification.php";
include "../config/success_notification.php";
include "../config/warning_notification.php";
include "../config/danger_notification.php";
?>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main overflow-hidden" id="top">
    <?php include "navbar-admin.php";?>

    <div class="container-fluid mt-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body"> <h1>Order List</h1>
                        <div id="orderListTable" data-list='{"valueNames":["OrderID","InvoiceNumber","OrderStatus","DatePlaced","Name","Email"],"filter":true}'>
                            <div class="row justify-content-end g-0">
                                <div class="col-auto px-3">
                                    <select class="form-select form-select-sm mb-3" aria-label="Bulk actions" data-list-filter="data-list-filter">
                                        <option selected="" value="">Select order status</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Completed Order">Completed Order</option>
                                        <option value="Upcoming New Order">Upcoming New Order</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive scrollbar">
                                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                                    <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="OrderID">OrderID</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="InvoiceNumber">InvoiceNumber</th>
                                        <th class="sort align-middle white-space-nowrap pe-4" data-sort="OrderStatus<">OrderStatus</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="DatePlaced">DatePlaced</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="Name">Name</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="Email">Email</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="Action">Action</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="Action">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody class="list" id="table-purchase-body">
                                    <?php
                                    $query_read_user_name = $dbcon -> query("SELECT `order`.*, `customer`.`Name`, `customer`.`Email` FROM `order` LEFT JOIN `customer` ON `order`.`CustomerID` = `customer`.`CustomerID`;");
                                    if ($query_read_user_name -> num_rows > 0) {
                                        while ($row_read_user_name = $query_read_user_name -> fetch_object()) {
                                            ?>
                                            <tr class="btn-reveal-trigger">
                                                <td class="align-middle white-space-nowrap OrderID"><a href="#"><?php echo $row_read_user_name -> OrderID;?></a></td>
                                                <td class="align-middle white-space-nowrap InvoiceNumber"><?php echo $row_read_user_name -> InvoiceNumber;?></td>
                                                <td class="align-middle white-space-nowrap OrderStatus"><span class="badge badge rounded-pill badge-soft-success"><?php echo $row_read_user_name -> OrderStatus;?></span></td>
                                                <td class="align-middle white-space-nowrap DatePlaced"><?php echo $row_read_user_name -> DatePlaced;?></td>
                                                <td class="align-middle white-space-nowrap Name"><?php echo $row_read_user_name -> Name;?></td>
                                                <td class="align-middle white-space-nowrap Email"><?php echo $row_read_user_name -> Email;?></td>
                                                <td>
                                                    <!--                                          <a href="index.php?edit=<?php /*echo $row['Name']; */?>" class="btn btn-primary" >Edit</a>
-->                                                 <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#error-modal<?php echo $row_read_user_name -> OrderID;?>">Details
                                                    </button>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" href="function-admin.php?delete_row=<?php echo $row -> orderID;?>" title="Delete Class" onclick="return deleteclass()">Delete</a>
                                                </td>

                                                </td>
                                            </tr>
                                    <div class="modal fade" id="error-modal<?php echo $row_read_user_name -> OrderID;?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <form method="post">
                                            <div class="modal-dialog modal-dialog-centered" role="document"
                                                 style="max-width: 1250px">
                                                <div class="modal-content position-relative">
                                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">

                                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                            <h4 class="mb-1" id="modalExampleDemoLabel">Update Order</h4>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="p-4 pb-0">
                                                                    <div class="form-check">
                                                                        <h6 class="fs--1">Ordered On:       <?php echo $row_read_user_name -> DatePlaced;?></h6>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <h6 class="fs--1">Customer Name:    <?php echo $row_read_user_name -> Name;?></h6>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <h6 class="fs--1">Phone:            <?php echo $row_read_user_name -> PhoneNum;?></h6>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <h6 class="fs--1">Email:            <?php echo $row_read_user_name -> Email;?></h6>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <h6 class="fs--1">InvoiceNumber:    <?php echo $row_read_user_name -> InvoiceNumber;?></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="p-4 pb-0">
                                                                    <h6 class="fs--1">Mark as:</h6>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="" checked="" />
                                                                        <label class="form-check-label" for="flexCheckDefault">Payment Pending</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" id="flexCheckChecked" type="checkbox" value="" />
                                                                        <label class="form-check-label" for="flexCheckChecked">Processing</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" id="flexCheckChecked" type="checkbox" value="" />
                                                                        <label class="form-check-label" for="flexCheckChecked">Shipped</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" id="flexCheckChecked" type="checkbox" value="" />
                                                                        <label class="form-check-label" for="flexCheckChecked">Received by Customer</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-4 pb-0">
                                                            <h4 class="mb-0">
                                                                Order Details</h4>
                                                        </div>
                                                        <div class="p-4 pb-0">
                                                            <form>
                                                                <div class="card mb-3">
                                                                    <div class="card-header">
                                                                        <div class="row flex-between-end">
                                                                            <div class="col-auto align-self-center">
                                                                                <h5 class="mb-0" data-anchor="data-anchor">
                                                                                    Button Badge</h5>
                                                                            </div>
                                                                            <div class="col-auto ms-auto">
                                                                                <div class="search-box"
                                                                                     data-list='{"valueNames":["title"]}'>
                                                                                    <form class="position-relative"
                                                                                          data-bs-toggle="search"
                                                                                          data-bs-display="static">
                                                                                        <input class="form-control search-input fuzzy-search"
                                                                                               type="search"
                                                                                               placeholder="Search..."
                                                                                               aria-label="Search"/>
                                                                                        <span class="fas fa-search search-box-icon"></span>
                                                                                    </form>
                                                                                    <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none"
                                                                                         data-bs-dismiss="search">
                                                                                        <div class="btn-close-falcon"
                                                                                             aria-label="Close"></div>
                                                                                    </div>
                                                                                    <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                                                                                        <div class="scrollbar list py-3"
                                                                                             style="max-height: 24rem;">
                                                                                            <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                                                                                Recently Browsed</h6><a
                                                                                                    class="dropdown-item fs--1 px-card py-1 hover-primary"
                                                                                                    href="../../app/events/event-detail.html">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <span class="fas fa-circle me-2 text-300 fs--2"></span>
                                                                                                    <div class="fw-normal title">
                                                                                                        Pages <span
                                                                                                                class="fas fa-chevron-right mx-1 text-500 fs--2"
                                                                                                                data-fa-transform="shrink-2"></span>
                                                                                                        Events
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            <a class="dropdown-item fs--1 px-card py-1 hover-primary"
                                                                                               href="../../app/e-commerce/customers.html">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <span class="fas fa-circle me-2 text-300 fs--2"></span>
                                                                                                    <div class="fw-normal title">
                                                                                                        E-commerce <span
                                                                                                                class="fas fa-chevron-right mx-1 text-500 fs--2"
                                                                                                                data-fa-transform="shrink-2"></span>
                                                                                                        Customers
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            <hr class="bg-200 dark__bg-900"/>
                                                                                            <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                                                                                Suggested Filter</h6><a
                                                                                                    class="dropdown-item px-card py-1 fs-0"
                                                                                                    href="../../app/e-commerce/customers.html">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <span class="badge fw-medium text-decoration-none me-2 badge-soft-warning">customers:</span>
                                                                                                    <div class="flex-1 fs--1 title">
                                                                                                        All customers list
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            <a class="dropdown-item px-card py-1 fs-0"
                                                                                               href="../../app/events/event-detail.html">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <span class="badge fw-medium text-decoration-none me-2 badge-soft-success">events:</span>
                                                                                                    <div class="flex-1 fs--1 title">
                                                                                                        Latest events in current
                                                                                                        month
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            <a class="dropdown-item px-card py-1 fs-0"
                                                                                               href="../../app/e-commerce/product/product-grid.html">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <span class="badge fw-medium text-decoration-none me-2 badge-soft-info">products:</span>
                                                                                                    <div class="flex-1 fs--1 title">
                                                                                                        Most popular products
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            <hr class="bg-200 dark__bg-900"/>
                                                                                            <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                                                                                Files</h6><a
                                                                                                    class="dropdown-item px-card py-2"
                                                                                                    href="#!">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <div class="file-thumbnail me-2">
                                                                                                        <img class="border h-100 w-100 fit-cover rounded-3"
                                                                                                             src="../../assets/img/products/3-thumb.png"
                                                                                                             alt=""/></div>
                                                                                                    <div class="flex-1">
                                                                                                        <h6 class="mb-0 title">
                                                                                                            iPhone</h6>
                                                                                                        <p class="fs--2 mb-0 d-flex">
                                                                                                            <span class="fw-semi-bold">Antony</span><span
                                                                                                                    class="fw-medium text-600 ms-2">27 Sep at 10:30 AM</span>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            <a class="dropdown-item px-card py-2"
                                                                                               href="#!">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <div class="file-thumbnail me-2">
                                                                                                        <img class="img-fluid"
                                                                                                             src="../../assets/img/icons/zip.png"
                                                                                                             alt=""/></div>
                                                                                                    <div class="flex-1">
                                                                                                        <h6 class="mb-0 title">
                                                                                                            Falcon v1.8.2</h6>
                                                                                                        <p class="fs--2 mb-0 d-flex">
                                                                                                            <span class="fw-semi-bold">John</span><span
                                                                                                                    class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            <hr class="bg-200 dark__bg-900"/>
                                                                                            <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                                                                                Members</h6><a
                                                                                                    class="dropdown-item px-card py-2"
                                                                                                    href="../../pages/user/profile.html">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <div class="avatar avatar-l status-online me-2">
                                                                                                        <img class="rounded-circle"
                                                                                                             src="../../assets/img/team/1.jpg"
                                                                                                             alt=""/>
                                                                                                    </div>
                                                                                                    <div class="flex-1">
                                                                                                        <h6 class="mb-0 title">
                                                                                                            Anna Karinina</h6>
                                                                                                        <p class="fs--2 mb-0 d-flex">
                                                                                                            Technext Limited</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            <a class="dropdown-item px-card py-2"
                                                                                               href="../../pages/user/profile.html">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <div class="avatar avatar-l me-2">
                                                                                                        <img class="rounded-circle"
                                                                                                             src="../../assets/img/team/2.jpg"
                                                                                                             alt=""/>
                                                                                                    </div>
                                                                                                    <div class="flex-1">
                                                                                                        <h6 class="mb-0 title">
                                                                                                            Antony Hopkins</h6>
                                                                                                        <p class="fs--2 mb-0 d-flex">
                                                                                                            Brain Trust</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            <a class="dropdown-item px-card py-2"
                                                                                               href="../../pages/user/profile.html">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <div class="avatar avatar-l me-2">
                                                                                                        <img class="rounded-circle"
                                                                                                             src="../../assets/img/team/3.jpg"
                                                                                                             alt=""/>
                                                                                                    </div>
                                                                                                    <div class="flex-1">
                                                                                                        <h6 class="mb-0 title">
                                                                                                            Emma Watson</h6>
                                                                                                        <p class="fs--2 mb-0 d-flex">
                                                                                                            Google</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="text-center mt-n3">
                                                                                            <p class="fallback fw-bold fs-1 d-none">
                                                                                                No Result Found.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body bg-light">
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane preview-tab-pane active"
                                                                                 role="tabpanel"
                                                                                 aria-labelledby="tab-dom-9dbea959-eaad-4e79-a63e-1b8b4cf53297"
                                                                                 id="dom-9dbea959-eaad-4e79-a63e-1b8b4cf53297">
                                                                                <div class="table-responsive scrollbar">
                                                                                    <table class="table table-hover table-striped overflow-hidden">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">Type</th>
                                                                                            <th scope="col">Image</th>
                                                                                            <th scope="col">Size</th>
                                                                                            <th scope="col">Quantity</th>
                                                                                            <th scope="col">Progress</th>
                                                                                            <!--                                                                    <th class="text-end" scope="col">Amount</th>-->
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <tr class="align-middle">
                                                                                            <td class="text-nowrap">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <!--<div class="avatar avatar-xl">
                                                                                                        <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />
                                                                                                    </div>-->
                                                                                                    <div class="ms-2">Keychain
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="text-nowrap">
                                                                                                <div class="avatar avatar-4xl">
                                                                                                    <img class="rounded-soft"
                                                                                                         src="../../../assets/img/team/3.jpg"
                                                                                                         alt=""/>
                                                                                                </div>
                                                                                                <button class="btn btn-primary me-1 mb-1"
                                                                                                        type="button">Download
                                                                                                </button>
                                                                                            </td>
                                                                                            <td class="text-nowrap">55mm x
                                                                                                52mm
                                                                                            </td>
                                                                                            <td class="text-nowrap">10</td>
                                                                                            <td>
                                                                                        <span class="badge badge rounded-pill d-block p-2 badge-soft-success">Done<span
                                                                                                    class="ms-1 fas fa-check"
                                                                                                    data-fa-transform="shrink-2"></span></span>
                                                                                            </td>
                                                                                            <!--                                                                    <td class="text-end">$99</td>-->
                                                                                        </tr>
                                                                                        <tr class="align-middle">
                                                                                            <td class="text-nowrap">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <!--<div class="avatar avatar-xl">
                                                                                                        <img class="rounded-circle" src="../../assets/img/team/13.jpg" alt="" />
                                                                                                    </div>-->
                                                                                                    <div class="ms-2">Magnet
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="text-nowrap">
                                                                                                <div class="avatar avatar-4xl">
                                                                                                    <img class="rounded-soft"
                                                                                                         src="../../../assets/img/team/3.jpg"
                                                                                                         alt=""/>
                                                                                                </div>
                                                                                                <button class="btn btn-primary me-1 mb-1"
                                                                                                        type="button">Download
                                                                                                </button>
                                                                                            </td>
                                                                                            <td class="text-nowrap">55mm x
                                                                                                52mm
                                                                                            </td>
                                                                                            <td class="text-nowrap">100</td>
                                                                                            <td>
                                                                                        <span class="badge badge rounded-pill d-block p-2 badge-soft-warning">In Progress<span
                                                                                                    class="ms-1 fas fa-stream"
                                                                                                    data-fa-transform="shrink-2"></span></span>
                                                                                            </td>
                                                                                            <!--                                                                    <td class="text-end">$199</td>-->
                                                                                        </tr>
                                                                                        <tr class="align-middle">
                                                                                            <td class="text-nowrap">
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <!--<div class="avatar avatar-xl">
                                                                                                        <div class="avatar-name rounded-circle"><span>RA</span></div>
                                                                                                    </div>-->
                                                                                                    <div class="ms-2">Pin</div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="text-nowrap">
                                                                                                <div class="avatar avatar-4xl">
                                                                                                    <img class="rounded-soft"
                                                                                                         src="../../../assets/img/team/3.jpg"
                                                                                                         alt=""/>
                                                                                                </div>
                                                                                                <button class="btn btn-primary me-1 mb-1"
                                                                                                        type="button">Download
                                                                                                </button>
                                                                                            </td>
                                                                                            <td class="text-nowrap">32mm x
                                                                                                32mm
                                                                                            </td>
                                                                                            <td class="text-nowrap">200</td>
                                                                                            <td>
                                                                                        <span class="badge badge rounded-pill d-block p-2 badge-soft-warning">In Progress<span
                                                                                                    class="ms-1 fas fa-stream"
                                                                                                    data-fa-transform="shrink-2"></span></span>
                                                                                            </td>
                                                                                            <!--                                                                    <td class="text-end">$755</td>-->
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <nav aria-label="Page navigation example">
                                                                                <ul class="pagination">
                                                                                    <li class="page-item"><a class="page-link"
                                                                                                             href="#"
                                                                                                             aria-label="Previous"><span
                                                                                                    aria-hidden="true">&laquo;</span><span
                                                                                                    class="sr-only">Previous</span></a>
                                                                                    </li>
                                                                                    <li class="page-item active"><a
                                                                                                class="page-link" href="#">1</a>
                                                                                    </li>
                                                                                    <li class="page-item"><a class="page-link"
                                                                                                             href="#">2</a></li>
                                                                                    <li class="page-item"><a class="page-link"
                                                                                                             href="#">3</a></li>
                                                                                    <li class="page-item"><a class="page-link"
                                                                                                             href="#"
                                                                                                             aria-label="Next"><span
                                                                                                    aria-hidden="true">&raquo;</span><span
                                                                                                    class="sr-only">Next</span></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </nav>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form>
                                                    <div class="card mb-3">
                                                        <div class="card-header">
                                                            <div class="row flex-between-end">
                                                                <div class="col-auto align-self-center">
                                                                    <h5 class="mb-0" data-anchor="data-anchor">Sticker</h5>
                                                                </div>
                                                                <div class="col-auto ms-auto">
                                                                    <div class="search-box"
                                                                         data-list='{"valueNames":["title"]}'>
                                                                        <form class="position-relative" data-bs-toggle="search"
                                                                              data-bs-display="static">
                                                                            <input class="form-control search-input fuzzy-search"
                                                                                   type="search" placeholder="Search..."
                                                                                   aria-label="Search"/>
                                                                            <span class="fas fa-search search-box-icon"></span>
                                                                        </form>
                                                                        <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none"
                                                                             data-bs-dismiss="search">
                                                                            <div class="btn-close-falcon"
                                                                                 aria-label="Close"></div>
                                                                        </div>
                                                                        <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                                                                            <div class="scrollbar list py-3"
                                                                                 style="max-height: 24rem;">
                                                                                <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                                                                    Recently Browsed</h6><a
                                                                                        class="dropdown-item fs--1 px-card py-1 hover-primary"
                                                                                        href="../../app/events/event-detail.html">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <span class="fas fa-circle me-2 text-300 fs--2"></span>
                                                                                        <div class="fw-normal title">Pages <span
                                                                                                    class="fas fa-chevron-right mx-1 text-500 fs--2"
                                                                                                    data-fa-transform="shrink-2"></span>
                                                                                            Events
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="dropdown-item fs--1 px-card py-1 hover-primary"
                                                                                   href="../../app/e-commerce/customers.html">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <span class="fas fa-circle me-2 text-300 fs--2"></span>
                                                                                        <div class="fw-normal title">E-commerce
                                                                                            <span class="fas fa-chevron-right mx-1 text-500 fs--2"
                                                                                                  data-fa-transform="shrink-2"></span>
                                                                                            Customers
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <hr class="bg-200 dark__bg-900"/>
                                                                                <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                                                                    Suggested Filter</h6><a
                                                                                        class="dropdown-item px-card py-1 fs-0"
                                                                                        href="../../app/e-commerce/customers.html">
                                                                                    <div class="d-flex align-items-center"><span
                                                                                                class="badge fw-medium text-decoration-none me-2 badge-soft-warning">customers:</span>
                                                                                        <div class="flex-1 fs--1 title">All
                                                                                            customers list
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="dropdown-item px-card py-1 fs-0"
                                                                                   href="../../app/events/event-detail.html">
                                                                                    <div class="d-flex align-items-center"><span
                                                                                                class="badge fw-medium text-decoration-none me-2 badge-soft-success">events:</span>
                                                                                        <div class="flex-1 fs--1 title">Latest
                                                                                            events in current month
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="dropdown-item px-card py-1 fs-0"
                                                                                   href="../../app/e-commerce/product/product-grid.html">
                                                                                    <div class="d-flex align-items-center"><span
                                                                                                class="badge fw-medium text-decoration-none me-2 badge-soft-info">products:</span>
                                                                                        <div class="flex-1 fs--1 title">Most
                                                                                            popular products
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <hr class="bg-200 dark__bg-900"/>
                                                                                <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                                                                    Files</h6><a
                                                                                        class="dropdown-item px-card py-2"
                                                                                        href="#!">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="file-thumbnail me-2"><img
                                                                                                    class="border h-100 w-100 fit-cover rounded-3"
                                                                                                    src="../../assets/img/products/3-thumb.png"
                                                                                                    alt=""/></div>
                                                                                        <div class="flex-1">
                                                                                            <h6 class="mb-0 title">iPhone</h6>
                                                                                            <p class="fs--2 mb-0 d-flex"><span
                                                                                                        class="fw-semi-bold">Antony</span><span
                                                                                                        class="fw-medium text-600 ms-2">27 Sep at 10:30 AM</span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="dropdown-item px-card py-2" href="#!">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="file-thumbnail me-2"><img
                                                                                                    class="img-fluid"
                                                                                                    src="../../assets/img/icons/zip.png"
                                                                                                    alt=""/></div>
                                                                                        <div class="flex-1">
                                                                                            <h6 class="mb-0 title">Falcon
                                                                                                v1.8.2</h6>
                                                                                            <p class="fs--2 mb-0 d-flex"><span
                                                                                                        class="fw-semi-bold">John</span><span
                                                                                                        class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <hr class="bg-200 dark__bg-900"/>
                                                                                <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">
                                                                                    Members</h6><a
                                                                                        class="dropdown-item px-card py-2"
                                                                                        href="../../pages/user/profile.html">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="avatar avatar-l status-online me-2">
                                                                                            <img class="rounded-circle"
                                                                                                 src="../../assets/img/team/1.jpg"
                                                                                                 alt=""/>
                                                                                        </div>
                                                                                        <div class="flex-1">
                                                                                            <h6 class="mb-0 title">Anna
                                                                                                Karinina</h6>
                                                                                            <p class="fs--2 mb-0 d-flex">
                                                                                                Technext Limited</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="dropdown-item px-card py-2"
                                                                                   href="../../pages/user/profile.html">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="avatar avatar-l me-2">
                                                                                            <img class="rounded-circle"
                                                                                                 src="../../assets/img/team/2.jpg"
                                                                                                 alt=""/>
                                                                                        </div>
                                                                                        <div class="flex-1">
                                                                                            <h6 class="mb-0 title">Antony
                                                                                                Hopkins</h6>
                                                                                            <p class="fs--2 mb-0 d-flex">Brain
                                                                                                Trust</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="dropdown-item px-card py-2"
                                                                                   href="../../pages/user/profile.html">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="avatar avatar-l me-2">
                                                                                            <img class="rounded-circle"
                                                                                                 src="../../assets/img/team/3.jpg"
                                                                                                 alt=""/>
                                                                                        </div>
                                                                                        <div class="flex-1">
                                                                                            <h6 class="mb-0 title">Emma
                                                                                                Watson</h6>
                                                                                            <p class="fs--2 mb-0 d-flex">
                                                                                                Google</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="text-center mt-n3">
                                                                                <p class="fallback fw-bold fs-1 d-none">No
                                                                                    Result Found.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body bg-light">
                                                            <div class="tab-content">
                                                                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                                                     aria-labelledby="tab-dom-9dbea959-eaad-4e79-a63e-1b8b4cf53297"
                                                                     id="dom-9dbea959-eaad-4e79-a63e-1b8b4cf53297">
                                                                    <div class="table-responsive scrollbar">
                                                                        <table class="table table-hover table-striped overflow-hidden">
                                                                            <thead>
                                                                            <tr>
                                                                                <th scope="col">Type</th>
                                                                                <th scope="col">Label List</th>
                                                                                <th scope="col">Color</th>
                                                                                <th scope="col">Size</th>
                                                                                <th scope="col">Progress</th>
                                                                                <!--                                                                    <th class="text-end" scope="col">Amount</th>-->
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr class="align-middle">
                                                                                <td class="text-nowrap">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <!--<div class="avatar avatar-xl">
                                                                                            <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />
                                                                                        </div>-->
                                                                                        <div class="ms-2">Keychain</div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-nowrap">
                                                                                    <div class="avatar avatar-4xl">
                                                                                        <img class="rounded-soft"
                                                                                             src="../../../assets/img/team/3.jpg"
                                                                                             alt=""/>
                                                                                    </div>
                                                                                    <button class="btn btn-primary me-1 mb-1"
                                                                                            type="button">Download
                                                                                    </button>
                                                                                </td>
                                                                                <td class="text-nowrap">Black</td>
                                                                                <td class="text-nowrap">30mm x 60mm</td>
                                                                                <td>
                                                                            <span class="badge badge rounded-pill d-block p-2 badge-soft-success">Done<span
                                                                                        class="ms-1 fas fa-check"
                                                                                        data-fa-transform="shrink-2"></span></span>
                                                                                </td>
                                                                                <!--                                                                    <td class="text-end">$99</td>-->
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <nav aria-label="Page navigation example">
                                                                    <ul class="pagination">
                                                                        <li class="page-item"><a class="page-link" href="#"
                                                                                                 aria-label="Previous"><span
                                                                                        aria-hidden="true">&laquo;</span><span
                                                                                        class="sr-only">Previous</span></a></li>
                                                                        <li class="page-item active"><a class="page-link"
                                                                                                        href="#">1</a></li>
                                                                        <li class="page-item"><a class="page-link"
                                                                                                 href="#">2</a></li>
                                                                        <li class="page-item"><a class="page-link"
                                                                                                 href="#">3</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#"
                                                                                                 aria-label="Next"><span
                                                                                        aria-hidden="true">&raquo;</span><span
                                                                                        class="sr-only">Next</span></a></li>
                                                                    </ul>
                                                                </nav>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                                            <?php
                                        }
                                    }
                                    else {
                                        ?>
                                        <tr class="btn-reveal-trigger">
                                            <td colspan="5">No Data</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr class="btn-reveal-trigger">
                                        <th class="align-middle white-space-nowrap OrderID"><a href="../../app/e-commerce/customer-details.html">Sylvia Plath</a></th>
                                        <td class="align-middle white-space-nowrap InvoiceNumber">john@gmail.com</td>
                                        <td class="align-middle text-end fs-0 white-space-nowrap OrderStatus"> <span class="badge badge rounded-pill badge-soft-success">Completed Order<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                        </td> <!--reference-->
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end of .container-->

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">Blank v2</div>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

<?php include "page-foot-admin.php";?>

<script>
    function deleteclass(){
        var x = confirm("Are you sure want to delete this class?");

        if(x==true) {
            return true;
        }
        else {
            return false;
        }
    }
</script>

</body>

</html>
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
                              <th class="sort align-middle white-space-nowrap text-end pe-4" data-sort="OrderStatus<">OrderStatus</th>
                              <th class="sort pe-1 align-middle white-space-nowrap" data-sort="DatePlaced">DatePlaced</th>
                              <th class="sort pe-1 align-middle white-space-nowrap" data-sort="Name">Name</th>
                              <th class="sort pe-1 align-middle white-space-nowrap" data-sort="Email">Email</th>
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
                                          <a href="index.php?edit=<?php echo $row['Name']; ?>" class="edit_btn" >Edit</a>
                                      </td>
                                      <td>
                                          <a href="server.php?del=<?php echo $row['Name']; ?>" class="del_btn">Delete</a>
                                      </td>

                                      </td>
                                  </tr>
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

</body>

</html>
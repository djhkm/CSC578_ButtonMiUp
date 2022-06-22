<!DOCTYPE html>
<?php include "function-admin.php";?>
<html lang="en-US" dir="ltr">

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

    <div class="container-fluid mt-7">
        <form>
            <div class="row">
                <!--==================================================-->
                <!--                  Items                           -->
                <!--==================================================-->
                <div class="col-lg-9 col-sm-12">
                    <!-- ============================================-->
                    <!-- <section> begin ============================-->
                    <div class="row text-center">
                        <div class="col">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <div class="card card-span h-100">
                                            <a id="badgeBtn" class="btn stretched-link btn-info" onclick="updateCard(1)">
                                                <div class="card-body pt-4 pb-4">
                                                    <h5>Upcoming New Order</h5>
                                                    <p>5</p>
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="card card-span h-100">
                                            <a id="stickerBtn" class="btn stretched-link" onclick="updateCard(2)">
                                                <div class="card-body pt-4 pb-4">
                                                    <h5>Processing</h5>
                                                    <p>20</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="card card-span h-100">
                                            <a id="stickerBtn" class="btn stretched-link" onclick="updateCard(2)">
                                                <div class="card-body pt-4 pb-4">
                                                    <h5>Completed Order</h5>
                                                    <p>999</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end of .container-->

  <div class="container-fluid mt-7">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">Order List
              <div id="tableExample3" data-list='{"valueNames":["name","email","payment"],"filter":true}'>
                  <div class="row justify-content-end g-0">
                      <div class="col-auto px-3">
                          <select class="form-select form-select-sm mb-3" aria-label="Bulk actions" data-list-filter="data-list-filter">
                              <option selected="" value="">Select payment status</option>
                              <option value="Pending">Pending</option>
                              <option value="Success">Success</option>
                              <option value="Blocked">Blocked</option>
                          </select>
                      </div>
                  </div>
                  <div class="table-responsive scrollbar">
                      <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                          <thead class="bg-200 text-900">
                          <tr>
                              <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Customer</th>
                              <th class="sort pe-1 align-middle white-space-nowrap" data-sort="email">Email</th>
                              <th class="sort align-middle white-space-nowrap text-end pe-4" data-sort="payment">Payment</th>
                          </tr>
                          </thead>
                          <tbody class="list" id="table-purchase-body">
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Sylvia Plath</a></th>
                              <td class="align-middle white-space-nowrap email">john@gmail.com</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-success">Success<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Homer</a></th>
                              <td class="align-middle white-space-nowrap email">sylvia@mail.ru</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Edgar Allan Poe</a></th>
                              <td class="align-middle white-space-nowrap email">edgar@yahoo.com</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-secondary">Blocked<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">William Butler Yeats</a></th>
                              <td class="align-middle white-space-nowrap email">william@gmail.com</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-success">Success<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Rabindranath Tagore</a></th>
                              <td class="align-middle white-space-nowrap email">tagore@twitter.com</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Emily Dickinson</a></th>
                              <td class="align-middle white-space-nowrap email">emily@gmail.com</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-secondary">Blocked<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Giovanni Boccaccio</a></th>
                              <td class="align-middle white-space-nowrap email">giovanni@outlook.com</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Oscar Wilde</a></th>
                              <td class="align-middle white-space-nowrap email">oscar@hotmail.com</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-success">Success<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">John Doe</a></th>
                              <td class="align-middle white-space-nowrap email">doe@gmail.com</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-success">Success<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          <tr class="btn-reveal-trigger">
                              <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Emma Watson</a></th>
                              <td class="align-middle white-space-nowrap email">emma@gmail.com</td>
                              <td class="align-middle text-end fs-0 white-space-nowrap payment"> <span class="badge badge rounded-pill badge-soft-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                              </td>
                          </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
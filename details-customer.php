<!DOCTYPE html>
<?php
include "function-customer.php";
if (!isset($_SESSION["user_id"])) {
  echo "<script>location.href = 'index.php';</script>";
}
?>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>ButtonMiUp - Customer Details</title>


  <?php
  include "page-head-customer.php";
  ?>
</head>


<body>
<?php
include "config/info_notification.php";
include "config/success_notification.php";
include "config/warning_notification.php";
include "config/danger_notification.php";
?>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main overflow-hidden" id="top">
  <?php include "navbar-customer.php";?>

  <div class="container mt-7">
    <div class="row g-0">
      <div class="col-lg-8 pe-lg-2">
        <div class="card mb-3">
          <div class="card-header">
            <h5 class="mb-0">Profile Settings</h5>
          </div>
          <div class="card-body bg-light">
            <form class="row g-3" method="post" id="update_cust_details_form">
              <div class="col-lg-12">
                <label class="form-label" for="update_cust_details_name">Name</label>
                <input class="form-control" name="update_cust_details_name" id="update_cust_details_name" type="text" />
              </div>
              <div class="col-lg-6">
                <label class="form-label" for="update_cust_details_email">Email</label>
                <input class="form-control" name="update_cust_details_email" id="update_cust_details_email" type="text" readonly />
              </div>
              <div class="col-lg-6">
                <label class="form-label" for="update_cust_details_phone">Phone</label>
                <input class="form-control" name="update_cust_details_phone" id="update_cust_details_phone" type="text" />
              </div>
              <div class="col-lg-12">
                <label class="form-label" for="update_cust_details_address1">Address Line 1</label>
                <input class="form-control" name="update_cust_details_address1" id="update_cust_details_address1" type="text" />
              </div>
              <div class="col-lg-12">
                <label class="form-label" for="update_cust_details_address2">Address Line 2</label>
                <input class="form-control" name="update_cust_details_address2" id="update_cust_details_address2" type="text" />
              </div>
              <div class="col-lg-4">
                <label class="form-label" for="update_cust_details_postcode">Postcode</label>
                <input class="form-control" name="update_cust_details_postcode" id="update_cust_details_postcode" type="text" />
              </div>
              <div class="col-lg-4">
                <label class="form-label" for="update_cust_details_city">City</label>
                <input class="form-control" name="update_cust_details_city" id="update_cust_details_city" type="text" />
              </div>
              <div class="col-lg-4">
                <label class="form-label" for="update_cust_details_state">State</label>
                <input class="form-control" name="update_cust_details_state" id="update_cust_details_state" type="text" />
              </div>
              <div class="col-12 d-flex justify-content-end">
                <button class="btn bg-theme-cus w-100" type="submit" name="update_cust_details_btn" id="update_cust_details_btn">Update Profile</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <script>
        function get_a_cust_details () {
          $.ajax({
            url: 'function-customer.php',
            method: 'POST',
            data: {
              type:'get_a_cust_details',
              id:<?php echo $_SESSION["user_id"];?>
            },
            cache:false,
            beforeSend:function () {
              console.log('get a cust details start');
              loader.showLoader();
              $('#update_cust_details_btn').attr('disabled', 'disabled');
              // $('#infoNotificationText').html('Fetching...');
              // $('#infoNotificationToast').toast('show');
            },
            success:function (readData) {
              // $('#infoNotificationToast').toast('hide');
              $('#update_cust_details_btn').attr('disabled', false);

              var dataResult = JSON.parse(readData);
              if (dataResult.statusCode === 200) {
                $('#update_cust_details_name').val(dataResult.name);
                $('#update_cust_details_email').val(dataResult.email);
                $('#update_cust_details_phone').val(dataResult.phone);
                $('#update_cust_details_address1').val(dataResult.address1);
                $('#update_cust_details_address2').val(dataResult.address2);
                $('#update_cust_details_postcode').val(dataResult.postcode);
                $('#update_cust_details_city').val(dataResult.city);
                $('#update_cust_details_state').val(dataResult.state);
                console.log(dataResult.statusText);
              }
              else if (dataResult.statusCode === 410) {
                $('#warningNotificationText').html('User not found. Please try again');
                $('#warningNotificationToast').toast('show');
                console.log(dataResult.statusText);
              }

              loader.hideLoader();
            }
          });
        }

        $(document).ready(function () {
          get_a_cust_details();

          $('#update_cust_details_form').on('submit', function (event) {
            event.preventDefault();
            console.log('update customer details start');

            var name = $('#update_cust_details_name').val();
            var email = $('#update_cust_details_email').val();
            var phone = $('#update_cust_details_phone').val();
            var address1 = $('#update_cust_details_address1').val();
            var address2 = $('#update_cust_details_address2').val();
            var postcode = $('#update_cust_details_postcode').val();
            var city = $('#update_cust_details_city').val();
            var state = $('#update_cust_details_state').val();
            console.log(name +' '+ email +' '+ phone +' '+ address1 +' '+ address2 +' '+ postcode +' '+ city +' '+ state);

            $.ajax({
              url: 'function-customer.php',
              method: 'POST',
              data: {
                type:'update_cust_details',
                id:<?php echo $_SESSION["user_id"];?>,
                name:name,
                email:email,
                phone:phone,
                address1:address1,
                address2:address2,
                postcode:postcode,
                city:city,
                state:state
              },
              cache:false,
              beforeSend:function () {
                $('#register_cust_btn').attr('disabled', 'disabled');
                $('#infoNotificationText').html('Validating...');
                $('#infoNotificationToast').toast('show');
              },
              success:function (readData) {
                $('#infoNotificationToast').toast('hide');

                var dataResult = JSON.parse(readData);
                if (dataResult.statusCode === 200) {
                  $('#register_cust_btn').attr('disabled', false);
                  $('#successNotificationText').html('Successfully updated.');
                  $('#successNotificationToast').toast('show');
                  get_a_cust_details();
                  console.log(dataResult.statusText);
                }
                else if (dataResult.statusCode === 500) {
                  $('#dangerNotificationText').html('Internal server error. Please try again.');
                  $('#dangerNotificationToast').toast('show');
                  console.log(dataResult.statusText);
                }
                else if (dataResult.statusCode === 409) {
                  // $('#register_cust_email').addClass('is-invalid');
                  // $('#register_cust_email_invalid_tooltip').css('display', 'block');
                  // $('#warningNotificationText').html('Please use another email.');
                  // $('#warningNotificationToast').toast('show');
                  // console.log(dataResult.statusText);
                }
              }
            });
          });

        });
      </script>

      <div class="col-lg-4 ps-lg-2 pt-0">
        <div class="card mb-3">
          <div class="card-header">
            <h5 class="mb-0">Change Password</h5>
          </div>
          <div class="card-body bg-light">
            <form>
              <div class="mb-3">
                <label class="form-label" for="old-password">Old Password</label>
                <input class="form-control" id="old-password" type="password" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="new-password">New Password</label>
                <input class="form-control" id="new-password" type="password" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="confirm-password">Confirm Password</label>
                <input class="form-control" id="confirm-password" type="password" />
              </div>
              <button class="btn bg-theme-cus d-block w-100" type="submit">Update Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

<?php include "page-foot-customer.php";?>

</body>

</html>
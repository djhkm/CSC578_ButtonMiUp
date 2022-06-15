
<nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark bg-white">
  <div class="container"><a class="navbar-brand" href="index.php"><img class="me-2" src="assets/img/logo-bmu.png" alt="" width="150" /></a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownLogin" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
          <div class="dropdown-menu dropdown-caret dropdown-menu-end dropdown-menu-card" aria-labelledby="navbarDropdownLogin">
            <div class="card shadow-none navbar-card-login">
              <div class="card-body fs--1 p-4 fw-normal">
                <div class="row text-start justify-content-between align-items-center mb-2">
                  <div class="col-auto">
                    <h5 class="mb-0">Log in</h5>
                  </div>
                  <div class="col-auto">
                    <p class="fs--1 text-600 mb-0">or <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register_form_modal">Create an account</a></p>
                  </div>
                </div>
                <form>
                  <div class="mb-3">
                    <input class="form-control" type="email" placeholder="Email address" />
                  </div>
                  <div class="mb-3">
                    <input class="form-control" type="password" placeholder="Password" />
                  </div>
                  <div class="row flex-between-center">
                    <div class="col-auto">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="modal-checkbox" />
                        <label class="form-check-label mb-0" for="modal-checkbox">Remember me</label>
                      </div>
                    </div>
                    <div class="col-auto"><a class="fs--1" href="pages/authentication/simple/forgot-password.html">Forgot Password?</a></div>
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>
                  </div>
                </form>
                <div class="position-relative mt-4">
                  <hr class="bg-300" />
                  <div class="divider-content-center">or log in with</div>
                </div>
                <div class="row g-2 mt-2 flex-center">
                  <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="javascript:void(0)"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register_form_modal">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="modal fade" id="register_form_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="row text-start justify-content-between align-items-center mb-2">
          <div class="col-auto">
            <h5 id="modalLabel">Register</h5>
          </div>
          <div class="col-auto">
            <p class="fs--1 text-600 mb-0">Have an account? <a href="javascript:void(0)" data-bs-dismiss="modal">Login</a></p>
          </div>
        </div>
        <form method="post" id="register_form">
          <div class="mb-3">
            <input class="form-control" type="text" autocomplete="on" placeholder="Name" name="register_cust_name" id="register_cust_name" required />
          </div>
          <div class="mb-3">
            <input class="form-control" type="email" autocomplete="on" placeholder="Email address" name="register_cust_email" id="register_cust_email" required />
          </div>
          <div class="row gx-2">
            <div class="mb-3 col-sm-6">
              <input class="form-control" type="password" autocomplete="on" placeholder="Password" name="register_cust_password_1" id="register_cust_password_1" required />
            </div>
            <div class="mb-3 col-sm-6">
              <input class="form-control" type="password" autocomplete="on" placeholder="Confirm Password" name="register_cust_password_2" id="register_cust_password_2" required />
            </div>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="register_checkbox" required />
            <label class="form-label" for="register_checkbox">I accept the <a href="javascript:void(0)">terms </a>and <a href="javascript:void(0)">privacy policy</a></label>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="register_cust_btn" id="register_cust_btn">Register</button>
          </div>
        </form>
        <div class="position-relative mt-4">
          <hr class="bg-300" />
          <div class="divider-content-center">or register with</div>
        </div>
        <div class="row g-2 mt-2 flex-center">
          <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="javascript:void(0)"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('#register_form_modal').on('hidden.bs.modal', function (e) {
    $(this).find('form')[0].reset();
  });

  $(document).ready(function () {

    $('#register_form').on('submit', function (event) {
      event.preventDefault();
      console.log('register start');

      var cust_name = $('#register_cust_name').val();
      var cust_email = $('#register_cust_email').val();
      var cust_password_1 = $('#register_cust_password_1').val();
      var cust_password_2 = $('#register_cust_password_2').val();
      console.log(cust_name +' '+ cust_email +' '+ cust_password_1 +' '+ cust_password_2);

      $.ajax({
        url: 'function-customer.php',
        method: 'POST',
        data:{
          type:'register_cust',
          name:cust_name,
          email:cust_email,
          password_1:cust_password_1
        },
        cache:false,
        beforeSend:function () {
          $('#register_cust_btn').attr('disabled', 'disabled');
          $('#infoNotificationText').html('Validating...');
          $('#infoNotificationToast').toast('show');
        },
        success:function (readData) {
          var dataResult = JSON.parse(readData);
          if (dataResult.statusCode === 200) {
            $('#register_cust_btn').attr('disabled', false);
            $('#successNotificationText').html('Successfully Registered.');
            $('#successNotificationToast').toast('show');
            $('#register_form_modal').modal('hide');
            console.log(dataResult.statusText);
          }
          else if (dataResult.statusCode === 410) {
            $('#register_cust_btn').attr('disabled', false);
            $('#dangerNotificationText').html('Fatal Error.');
            $('#dangerNotificationToast').toast('show');
          }
        },
        error: function () {
          $('#register_cust_btn').attr('disabled', false);
          $('#dangerNotificationText').html('Fatal Error.');
          $('#dangerNotificationToast').toast('show');
        }
      });
    });

  });

</script>

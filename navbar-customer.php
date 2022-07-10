<nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark bg-white">
  <div class="container"><a class="navbar-brand" href="index.php"><img class="me-2" src="assets/img/logo-bmu.png" alt="" width="150" /></a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item text-center ms-5 me-5 d-none d-lg-block">
          <a class="nav-link text-dark" href="cart.php"><i class="fas fa-shopping-cart fs-1"></i></a>
        </li>

        <?php
        if (isset($_SESSION["user_id"])) {
          $user_name = "";

          $query_read_user_name = $dbcon -> query("SELECT Name FROM CUSTOMER WHERE CustomerID = '".$_SESSION["user_id"]."';");

          if ($query_read_user_name -> num_rows > 0) {
            $row_read_user_name = $query_read_user_name -> fetch_object();
            $user_name = $row_read_user_name -> Name;
          }
          else {
            $user_name = "Undefined";
          }

          ?>
          <li class="nav-item text-center mb-2 ms-2 me-2">
            <a class="nav-link text-dark p-0 m-0" href="details-customer.php">
              <!--              <a class="nav-link text-dark p-0 m-0" href="function-customer.php?type=logout_all" onclick="return logout_user()">-->
              <table class="w-100 d-none d-lg-block">
                <tr>
                  <td><i class="fas fa-user fs-1"></i>&emsp;</td>
                  <td class="text-start">Logged in as:<br><?php echo $user_name;?></td>
                </tr>
              </table>
              <center class="d-lg-none">
                <table>
                  <tr>
                    <td><i class="fas fa-user fs-1"></i>&emsp;</td>
                    <td class="text-start">Logged in as: <?php echo $user_name;?></td>
                  </tr>
                </table>
              </center>
            </a>
          </li>

          <li class="nav-item text-center ms-2 me-2">
            <a class="nav-link rounded bg-theme-cus" href="function-customer.php?type=logout_all" onclick="return logout_user()">Logout</a>
          </li>

          <script>
            function logout_user() {
              var x = confirm("Are you sure want to log out?");
              return x === true;
            }
          </script>

        <?php
        }
        else {
        ?>
          <li class="nav-item dropdown text-center mb-2 ms-2 me-2" id="login_form_dropdown">
            <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownLogin" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fs-1"></i>&emsp;Login</a>
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
                  <form method="post" id="login_form">
                    <div class="mb-3">
                      <input class="form-control" type="email" placeholder="Email address" name="login_email" id="login_email" required />
                    </div>
                    <div class="mb-3">
                      <input class="form-control" type="password" placeholder="Password" name="login_password" id="login_password" required />
                    </div>
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <!--                        <div class="form-check mb-0">-->
                        <!--                          <input class="form-check-input" type="checkbox" id="modal-checkbox" />-->
                        <!--                          <label class="form-check-label mb-0" for="modal-checkbox">Remember me</label>-->
                        <!--                        </div>-->
                      </div>
                      <div class="col-auto"><a class="fs--1" href="pages/authentication/simple/forgot-password.html">Forgot Password?</a></div>
                    </div>
                    <div class="mb-3">
                      <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="login_btn" id="login_btn">Log in</button>
                    </div>
                  </form>
                  <!--                  <div class="position-relative mt-4">-->
                  <!--                    <hr class="bg-300" />-->
                  <!--                    <div class="divider-content-center">or log in with</div>-->
                  <!--                  </div>-->
                  <!--                  <div class="row g-2 mt-2 flex-center">-->
                  <!--                    <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="javascript:void(0)"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>-->
                  <!--                  </div>-->
                </div>
              </div>
            </div>
          </li>

          <script>
            $('#login_form_dropdown').on('hidden.bs.dropdown', function (e) {
              $(this).find('form')[0].reset();
              //console.log("dropdown close");
            });

            $(document).ready(function () {

              $('#login_btn').on('click', function (event) {
                event.preventDefault();
                $(this).closest("form").submit();
              });

              $('#login_form').on('submit', function (event) {
                event.preventDefault();
                console.log('login start');

                var email = $('#login_email').val();
                var password = $('#login_password').val();
                console.log(email +' '+ password);

                $.ajax({
                  url: 'function-customer.php',
                  method: 'POST',
                  data: {
                    type:'login_all',
                    email:email,
                    password:password
                  },
                  cache:false,
                  beforeSend:function () {
                    $('#login_btn').attr('disabled', 'disabled');
                    $('#infoNotificationText').html('Validating...');
                    $('#infoNotificationToast').toast('show');
                  },
                  success:function (readData) {
                    $('#infoNotificationToast').toast('hide');
                    $('#login_btn').attr('disabled', false);

                    var dataResult = JSON.parse(readData);
                    if (dataResult.statusCode === 200) {
                      $('#successNotificationText').html('Successfully logged in.');
                      $('#successNotificationToast').toast('show');
                      console.log(dataResult.statusText);
                      location.reload();
                    }
                    else if (dataResult.statusCode === 409) {
                      $('#warningNotificationText').html('Credential does not match. Please login again.');
                      $('#warningNotificationToast').toast('show');
                      console.log(dataResult.statusText);
                    }
                    else if (dataResult.statusCode === 410) {
                      $('#warningNotificationText').html('Email not found. Please register an account.');
                      $('#warningNotificationToast').toast('show');
                      console.log(dataResult.statusText);
                    }
                  }
                });
              });

            });
          </script>

          <li class="nav-item ms-2 me-2">
            <a class="nav-link rounded bg-theme-cus text-center" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register_form_modal">Register</a>
          </li>
          <?php
        }
        ?>

        <li class="nav-item text-center ms-5 me-5 d-lg-none mt-3">
          <a class="nav-link text-dark" href="cart.php"><i class="fas fa-shopping-cart fs-1"></i></a>
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
          <div class="mb-3 position-relative">
            <input class="form-control" type="email" autocomplete="on" placeholder="Email address" name="register_cust_email" id="register_cust_email" required oninput="register_cust_email_remove_invalid_attr()" />
            <div class="invalid-tooltip" id="register_cust_email_invalid_tooltip">Please use another email.</div>
          </div>
          <div class="row gx-2">
            <div class="mb-0">
              <input class="form-control" type="password" autocomplete="on" placeholder="Password" name="register_cust_password_1" id="register_cust_password_1" required oninput="register_cust_password_strong()" />
            </div>
            <!--            <div class="mb-3 col-sm-6 position-relative">-->
            <!--              <input class="form-control" type="password" autocomplete="on" placeholder="Confirm Password" name="register_cust_password_2" id="register_cust_password_2" required oninput="register_cust_password_check()" />-->
            <!--              <div class="invalid-tooltip" id="register_cust_password_invalid_tooltip">Password does not match.</div>-->
            <!--            </div>-->
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="register_checkbox" onclick="register_view_password()" />
            <label class="form-label" for="register_checkbox">View password</label>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="register_cust_btn" id="register_cust_btn" disabled>Register</button>
          </div>
        </form>
        <!--        <div class="position-relative mt-4">-->
        <!--          <hr class="bg-300" />-->
        <!--          <div class="divider-content-center">or register with</div>-->
        <!--        </div>-->
        <!--        <div class="row g-2 mt-2 flex-center">-->
        <!--          <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="javascript:void(0)"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>-->
        <!--        </div>-->
      </div>
      <div class="w-100 valid-tooltip fw-bold" id="register_cust_password_valid_strong_tooltip"></div>
      <div class="w-100 invalid-tooltip fw-bold" id="register_cust_password_invalid_strong_tooltip"></div>
    </div>
  </div>
</div>

<script>
  function register_cust_email_remove_invalid_attr() {
    $('#register_cust_email').removeClass('is-invalid');
    $('#register_cust_email_invalid_tooltip').css('display', 'none');
  }

  // function register_cust_password_check() {
  //   var cust_password_1 = $('#register_cust_password_1').val();
  //   var cust_password_2 = $('#register_cust_password_2').val();
  //
  //   if (cust_password_1 != cust_password_2) {
  //     $('#register_cust_btn').attr('disabled', 'disabled');
  //     $('#register_cust_password_1').addClass('is-invalid');
  //     $('#register_cust_password_2').addClass('is-invalid');
  //     $('#register_cust_password_invalid_tooltip').css('display', 'block');
  //   }
  //   else {
  //     //$('#register_cust_btn').attr('disabled', false);
  //     $('#register_cust_password_1').removeClass('is-invalid');
  //     $('#register_cust_password_2').removeClass('is-invalid');
  //     $('#register_cust_password_invalid_tooltip').css('display', 'none');
  //   }
  // }

  $('#register_form_modal').on('hidden.bs.modal', function (e) {
    $(this).find('form')[0].reset();

    //email
    $('#register_cust_email').removeClass('is-invalid');
    $('#register_cust_email_invalid_tooltip').css('display', 'none');

    //password check
    // $('#register_cust_password_1').removeClass('is-invalid');
    // $('#register_cust_password_2').removeClass('is-invalid');
    // $('#register_cust_password_invalid_tooltip').css('display', 'none');

    //password strong
    $('#register_cust_password_invalid_strong_tooltip').html('').css('display', 'none');
    $('#register_cust_password_valid_strong_tooltip').html('').css('display', 'none');
    $('#register_cust_password_1').attr('type', 'password');
    //console.log("modal close");
  });

  function register_cust_password_strong() {
    var password = $("#register_cust_password_1").val();
    if (password != "") {
      var passScore = 0;
      var stringDesc = "";

      if (password.match(/[a-z]+/)) {
        passScore++;
        stringDesc += '<i class="far fa-check-circle"></i> Lowercase<br>';
      }
      else {
        stringDesc += '<i class="far fa-times-circle"></i> Lowercase<br>';
      }
      if (password.match(/[A-Z]+/)) {
        passScore++;
        stringDesc += '<i class="far fa-check-circle"></i> Uppercase<br>';
      }
      else {
        stringDesc += '<i class="far fa-times-circle"></i> Uppercase<br>';
      }
      if (password.match(/[0-9]+/)) {
        passScore++;
        stringDesc += '<i class="far fa-check-circle"></i> Number<br>';
      }
      else {
        stringDesc += '<i class="far fa-times-circle"></i> Number<br>';
      }
      if (password.match(/[$@#!]+/)) {
        passScore++;
        stringDesc += '<i class="far fa-check-circle"></i> Symbol ($@#!)<br>';
      }
      else {
        stringDesc += '<i class="far fa-times-circle"></i> Symbol ($@#!)<br>';
      }
      if (password.length >= 8) {
        passScore++;
        stringDesc += '<i class="far fa-check-circle"></i> Password length is more than or equal 8<br>';
      }
      else {
        stringDesc += '<i class="far fa-times-circle"></i> Password length is more than or equal 8<br>';
      }

      if (passScore === 5) {
        $('#register_cust_btn').attr('disabled', false);
        $('#register_cust_password_valid_strong_tooltip').html(stringDesc).css('display', 'block');
        $('#register_cust_password_invalid_strong_tooltip').html(stringDesc).css('display', 'none');
      }
      else {
        $('#register_cust_btn').attr('disabled', 'disabled');
        $('#register_cust_password_invalid_strong_tooltip').html(stringDesc).css('display', 'block');
        $('#register_cust_password_valid_strong_tooltip').html(stringDesc).css('display', 'none');
      }

      // $.ajax({
      //   crossDomain: true,
      //   url: 'https://strong-password-generator-and-checker.p.rapidapi.com/api/password_check',
      //   method: 'POST',
      //   dataType: 'html',
      //   headers: {
      //     "content-type": "application/json",
      //     "X-RapidAPI-Key": "5c2baa9c1cmshc641e1dba79beb7p132b9cjsnff3c06634aca",
      //     "X-RapidAPI-Host": "strong-password-generator-and-checker.p.rapidapi.com"
      //   },
      //   processData: false,
      //   data: JSON.stringify({
      //     password: password
      //   }),
      //   beforeSend:function () {
      //     $('#register_cust_btn').attr('disabled', 'disabled');
      //     $('#infoNotificationText').html('Validating...');
      //     $('#infoNotificationToast').toast('show');
      //   },
      //   success:function (readData) {
      //     $('#infoNotificationToast').toast('hide');
      //
      //     var dataResult = JSON.parse(readData);
      //     var passDesc = dataResult.password.contains;
      //     var passScore = 0;
      //     var stringDesc = "";
      //     if (passDesc.includes('lowercase')) {
      //       passScore++;
      //       stringDesc += '<i class="far fa-check-circle"></i> Lowercase<br>';
      //     }
      //     else {
      //       stringDesc += '<i class="far fa-times-circle"></i> Lowercase<br>';
      //     }
      //     if (passDesc.includes('uppercase')) {
      //       passScore++;
      //       stringDesc += '<i class="far fa-check-circle"></i> Uppercase<br>';
      //     }
      //     else {
      //       stringDesc += '<i class="far fa-times-circle"></i> Uppercase<br>';
      //     }
      //     if (passDesc.includes('number')) {
      //       passScore++;
      //       stringDesc += '<i class="far fa-check-circle"></i> Number<br>';
      //     }
      //     else {
      //       stringDesc += '<i class="far fa-times-circle"></i> Number<br>';
      //     }
      //     if (passDesc.includes('symbol')) {
      //       passScore++;
      //       stringDesc += '<i class="far fa-check-circle"></i> Symbol<br>';
      //     }
      //     else {
      //       stringDesc += '<i class="far fa-times-circle"></i> Symbol<br>';
      //     }
      //     if(parseInt(dataResult.password.length) >= 8) {
      //       passScore++;
      //       stringDesc += '<i class="far fa-check-circle"></i> Password length is more than or equal 8<br>';
      //     }
      //     else {
      //       stringDesc += '<i class="far fa-times-circle"></i> Password length is more than or equal 8<br>';
      //     }
      //
      //     if (passScore === 5) {
      //       $('#register_cust_btn').attr('disabled', false);
      //       $('#register_cust_password_valid_strong_tooltip').html(stringDesc).css('display', 'block');
      //       $('#register_cust_password_invalid_strong_tooltip').html(stringDesc).css('display', 'none');
      //     }
      //     else {
      //       $('#register_cust_password_invalid_strong_tooltip').html(stringDesc).css('display', 'block');
      //       $('#register_cust_password_valid_strong_tooltip').html(stringDesc).css('display', 'none');
      //     }
      //     // $('#successNotificationText').html(stringDesc);
      //     // $('#successNotificationToast').toast('show');
      //   }
      // });
    }
    else {
      $('#register_cust_password_valid_strong_tooltip').html('').css('display', 'none');
      $('#register_cust_password_invalid_strong_tooltip').html('').css('display', 'none');
    }
  }

  function register_view_password() {
    var x = document.getElementById('register_cust_password_1');
    if (x.type === "password") {
      x.type = "text";
    }
    else {
      x.type = "password";
    }
  }

  $(document).ready(function () {

    $('#register_form').on('submit', function (event) {
      event.preventDefault();
      console.log('register start');

      var cust_name = $('#register_cust_name').val();
      var cust_email = $('#register_cust_email').val();
      var cust_password_1 = $('#register_cust_password_1').val();
      // var cust_password_2 = $('#register_cust_password_2').val();
      console.log(cust_name +' '+ cust_email +' '+ cust_password_1);

      $.ajax({
        url: 'function-customer.php',
        method: 'POST',
        data: {
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
          $('#infoNotificationToast').toast('hide');
          $('#register_cust_btn').attr('disabled', false);

          var dataResult = JSON.parse(readData);
          if (dataResult.statusCode === 200) {
            $('#successNotificationText').html('Successfully registered.');
            $('#successNotificationToast').toast('show');
            $('#register_form_modal').modal('hide');
            console.log(dataResult.statusText);
          }
          else if (dataResult.statusCode === 500) {
            $('#dangerNotificationText').html('Internal server error. Please try again.');
            $('#dangerNotificationToast').toast('show');
            console.log(dataResult.statusText);
          }
          else if (dataResult.statusCode === 409) {
            $('#register_cust_email').addClass('is-invalid');
            $('#register_cust_email_invalid_tooltip').css('display', 'block');
            // $('#warningNotificationText').html('Please use another email.');
            // $('#warningNotificationToast').toast('show');
            console.log(dataResult.statusText);
          }
        }
      });
    });

  });
</script>
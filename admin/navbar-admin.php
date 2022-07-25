<nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark bg-white">
  <div class="container"><a class="navbar-brand" href="./"><img class="me-2" src="../assets/img/logo-bmu.png" alt="" width="150" /></a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
      <ul class="navbar-nav ms-auto">

<!--          <li class="nav-item ms-5">-->
<!--            <a class="nav-link text-dark p-0 m-0" href="details-customer.php">-->
<!--              <a class="nav-link text-dark p-0 m-0" href="function-customer.php?type=logout_all" onclick="return logout_user()">-->
<!--              <table>-->
<!--                <tr>-->
<!--                  <td><i class="fas fa-user fs-1"></i>&emsp;</td>-->
<!--                  <td>Logged in as:<br>Test</td>-->
<!--                </tr>-->
<!--              </table>-->
<!--            </a>-->
<!--          </li>-->
<!---->
<!--          <li class="nav-item pt-1 ms-4">-->
<!--            <a class="nav-link rounded bg-theme-cus" href="function-admin.php?type=logout_all" onclick="return logout_user()">Logout</a>-->
<!--          </li>-->


<!--          <li class="nav-item dropdown ms-5" id="login_form_dropdown">-->
<!--            <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownLogin" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fs-1"></i>&emsp;Login</a>-->
<!--            <div class="dropdown-menu dropdown-caret dropdown-menu-end dropdown-menu-card" aria-labelledby="navbarDropdownLogin">-->
<!--              <div class="card shadow-none navbar-card-login">-->
<!--                <div class="card-body fs--1 p-4 fw-normal">-->
<!--                  <div class="row text-start justify-content-between align-items-center mb-2">-->
<!--                    <div class="col-auto">-->
<!--                      <h5 class="mb-0">Log in</h5>-->
<!--                    </div>-->
<!--                    <div class="col-auto">-->
<!--                      <p class="fs--1 text-600 mb-0">or <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register_form_modal">Create an account</a></p>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <form method="post" id="login_form">-->
<!--                    <div class="mb-3">-->
<!--                      <input class="form-control" type="email" placeholder="Email address" name="login_email" id="login_email" required />-->
<!--                    </div>-->
<!--                    <div class="mb-3">-->
<!--                      <input class="form-control" type="password" placeholder="Password" name="login_password" id="login_password" required />-->
<!--                    </div>-->
<!--                    <div class="row flex-between-center">-->
<!--                      <div class="col-auto">-->
<!--                      </div>-->
<!--                      <div class="col-auto"><a class="fs--1" href="pages/authentication/simple/forgot-password.html">Forgot Password?</a></div>-->
<!--                    </div>-->
<!--                    <div class="mb-3">-->
<!--                      <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="login_btn" id="login_btn">Log in</button>-->
<!--                    </div>-->
<!--                  </form>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </li>-->

<!--          <li class="nav-item pt-1 ms-4">-->
<!--            <a class="nav-link rounded bg-theme-cus" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register_form_modal">Register</a>-->
<!--          </li>-->

      </ul>
    </div>
  </div>
</nav>

<!--<div class="modal fade" id="register_form_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-body p-4">-->
<!--        <div class="row text-start justify-content-between align-items-center mb-2">-->
<!--          <div class="col-auto">-->
<!--            <h5 id="modalLabel">Register</h5>-->
<!--          </div>-->
<!--          <div class="col-auto">-->
<!--            <p class="fs--1 text-600 mb-0">Have an account? <a href="javascript:void(0)" data-bs-dismiss="modal">Login</a></p>-->
<!--          </div>-->
<!--        </div>-->
<!--        <form method="post" id="register_form">-->
<!--          <div class="mb-3">-->
<!--            <input class="form-control" type="text" autocomplete="on" placeholder="Name" name="register_cust_name" id="register_cust_name" required />-->
<!--          </div>-->
<!--          <div class="mb-3 position-relative">-->
<!--            <input class="form-control" type="email" autocomplete="on" placeholder="Email address" name="register_cust_email" id="register_cust_email" required oninput="register_cust_email_remove_invalid_attr()" />-->
<!--            <div class="invalid-tooltip" id="register_cust_email_invalid_tooltip">Please use another email.</div>-->
<!--          </div>-->
<!--          <div class="row gx-2">-->
<!--            <div class="mb-0">-->
<!--              <input class="form-control" type="password" autocomplete="on" placeholder="Password" name="register_cust_password_1" id="register_cust_password_1" required oninput="register_cust_password_strong()" />-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="form-check">-->
<!--            <input class="form-check-input" type="checkbox" id="register_checkbox" onclick="register_view_password()" />-->
<!--            <label class="form-label" for="register_checkbox">View password</label>-->
<!--          </div>-->
<!--          <div class="mb-3">-->
<!--            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="register_cust_btn" id="register_cust_btn" disabled>Register</button>-->
<!--          </div>-->
<!--        </form>-->
<!--      </div>-->
<!--      <div class="w-100 valid-tooltip fw-bold" id="register_cust_password_valid_strong_tooltip"></div>-->
<!--      <div class="w-100 invalid-tooltip fw-bold" id="register_cust_password_invalid_strong_tooltip"></div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
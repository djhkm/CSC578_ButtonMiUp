<nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark bg-white">
  <div class="container"><a class="navbar-brand" href="index.php"><img class="me-2" src="assets/img/logo-bmu.png" alt="" width="150" /></a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
      <ul class="navbar-nav ms-auto">
        <!--              <li class="nav-item d-flex align-items-center me-2">-->
        <!--                <div class="nav-link theme-switch-toggle fa-icon-wait p-0">-->
        <!--                  <input class="form-check-input ms-0 theme-switch-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark">-->
        <!--                  <label class="mb-0 theme-switch-toggle-label theme-switch-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun"></span></label>-->
        <!--                  <label class="mb-0 py-2 theme-switch-toggle-light d-lg-none" for="themeControlToggle"><span>Switch to light theme</span></label>-->
        <!--                  <label class="mb-0 theme-switch-toggle-label theme-switch-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon"></span></label>-->
        <!--                  <label class="mb-0 py-2 theme-switch-toggle-dark d-lg-none" for="themeControlToggle"><span>Switch to dark theme</span></label>-->
        <!--                </div>-->
        <!--              </li>-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownLogin" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
          <div class="dropdown-menu dropdown-caret dropdown-menu-end dropdown-menu-card" aria-labelledby="navbarDropdownLogin">
            <div class="card shadow-none navbar-card-login">
              <div class="card-body fs--1 p-4 fw-normal">
                <div class="row text-start justify-content-between align-items-center mb-2">
                  <div class="col-auto">
                    <h5 class="mb-0">Log in</h5>
                  </div>
                  <div class="col-auto">
                    <p class="fs--1 text-600 mb-0">or <a href="pages/authentication/simple/register.html">Create an account</a></p>
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
                  <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                  <!--                        <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>-->
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="row text-start justify-content-between align-items-center mb-2">
          <div class="col-auto">
            <h5 id="modalLabel">Register</h5>
          </div>
          <div class="col-auto">
            <p class="fs--1 text-600 mb-0">Have an account? <a href="pages/authentication/simple/login.html">Login</a></p>
          </div>
        </div>
        <form>
          <div class="mb-3">
            <input class="form-control" type="text" autocomplete="on" placeholder="Name" />
          </div>
          <div class="mb-3">
            <input class="form-control" type="email" autocomplete="on" placeholder="Email address" />
          </div>
          <div class="row gx-2">
            <div class="mb-3 col-sm-6">
              <input class="form-control" type="password" autocomplete="on" placeholder="Password" />
            </div>
            <div class="mb-3 col-sm-6">
              <input class="form-control" type="password" autocomplete="on" placeholder="Confirm Password" />
            </div>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="modal-register-checkbox" />
            <label class="form-label" for="modal-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
          </div>
        </form>
        <div class="position-relative mt-4">
          <hr class="bg-300" />
          <div class="divider-content-center">or register with</div>
        </div>
        <div class="row g-2 mt-2">
          <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
          <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
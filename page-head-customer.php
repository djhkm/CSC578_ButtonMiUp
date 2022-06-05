<!-- ===============================================-->
<!--    Favicons-->
<!-- ===============================================-->
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo-title.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo-title.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo-title.png">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo-title.png">
<link rel="manifest" href="assets/img/favicons/manifest.json">
<meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
<meta name="theme-color" content="#ffffff">
<script src="assets/js/config.js"></script>
<script src="vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


<!-- ===============================================-->
<!--    Stylesheets-->
<!-- ===============================================-->
<link href="vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
<link href="vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
<link href="assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
<link href="assets/css/theme.min.css" rel="stylesheet" id="style-default">
<link href="assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
<link href="assets/css/user.min.css" rel="stylesheet" id="user-style-default">
<script>
  var isRTL = JSON.parse(localStorage.getItem('isRTL'));
  if (isRTL) {
    var linkDefault = document.getElementById('style-default');
    var userLinkDefault = document.getElementById('user-style-default');
    linkDefault.setAttribute('disabled', true);
    userLinkDefault.setAttribute('disabled', true);
    document.querySelector('html').setAttribute('dir', 'rtl');
  } else {
    var linkRTL = document.getElementById('style-rtl');
    var userLinkRTL = document.getElementById('user-style-rtl');
    linkRTL.setAttribute('disabled', true);
    userLinkRTL.setAttribute('disabled', true);
  }
</script>
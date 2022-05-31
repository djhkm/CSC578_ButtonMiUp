# CSC578 ButtonMiUp

Codes for ButtonMiUp web dev

## Installation

Clone this inside *www* folder in laragon or *htdocs* folder in xampp

## Code Layout

```ignorelang
<html>
  <head>
  
    coding...
  
    <?php
    include "function-customer.php"; / include "function-admin.php";
    include "page-head-customer.php"; / include "page-head-admin.php";
    ?>
    
  </head>
  <body>
  
    <?php include "navbar-customer.php";?> / <?php include "navbar-admin.php";?>
  
    coding...
    
    <?php include "page-foot-customer.php";?> / <?php include "page-foot-admin.php";?>
    
  </body>
</html>
```


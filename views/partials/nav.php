
      <?php  
      // if no one is logged in
        if(!isset($_SESSION['user'])) {
         include("./views/forms/login.php");
          } else if($_SESSION['user']['isAdmin'] == false){  // if a normal user is logged-in
          echo "
            <nav class='navbar navbar-expand-lg navbar-light bg-lightgreen p-2 px-4'>
              <a class='navbar-brand' href='/views/user/items_catalog.php'>
              <img src='/resources/img/logo/tfro-white.svg' class='ml-4'></a>
              <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ml-auto mr-5'>
                  <li class='nav-item mx-3'>
                    <a href='/views/user/items_catalog.php' class='nav-link text-white family-c'>Assets</a>
                  </li>
                  <li class='nav-item mx-3'>
                    <a href='/views/user/my_profile.php' class='nav-link text-white family-c'>My Transactions</a>
                  </li>
                  <li class='nav-item mx-3'>
                    <a href='/views/user/cart.php' class='nav-link text-white family-c'>Cart</a>
                  </li>          
                  <li class='nav-item mx-3'>
                    <a href='/controllers/auth/logout_user.php' class='nav-link text-white family-c'>Logout</a>
                  </li>
                 </ul>
               </div>
             </nav>   
            ";
        } else {
          echo "
          <nav class='navbar navbar-expand-lg navbar-light bg-lightgreen p-2 px-4'>
            <a class='navbar-brand' href='/views/admin/dashboard.php'>
            <img src='/resources/img/logo/tfro-white.svg' class='ml-4'></a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNav'>
              <ul class='navbar-nav ml-auto mr-5'>
            <li class='nav-item mx-3'>
              <a href='/views/admin/dashboard.php' class='nav-link text-white family-c'>Dashboard</a>
            </li>
            <li class='nav-item mx-3'>
              <a href='/views/admin/borrow.php' class='nav-link text-white family-c'>Transactions</a>
            </li>
            <li class='nav-item mx-3'>
              <a href='/views/admin/user_management.php' class='nav-link text-white family-c'>User Management</a>
            </li>
            <li class='nav-item mx-3'>
              <a href='/views/admin/item_management.php' class='nav-link text-white family-c'>Item Management</a>
            </li>
            <li class='nav-item mx-3'>
              <a href='/controllers/auth/logout_user.php' class='nav-link text-white family-c'>Logout</a>
            </li>
               </ul>
               </div>
             </nav> 
          ";
        }
      ?>

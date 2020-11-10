
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1"   href="https://genething.com" target ="_blank">
    <img src="images/favicon.png" style="max-width: 20px;" class="img-fluid"> Gene-Thing
  
    </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
     
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle"data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>

  </nav>

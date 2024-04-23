<header class="">
      <nav class="navbar navbar-expand-lg">
      @if(session('fullname'))
          <p class="info">Welcome, {{ session('fullname') }}</p>
          @else
          <p class="info">Welcome, Guest</p>
          @endif
          <div id="popupMessage" class="popup">
         <span class="popuptext" id="popupText">Welcome, Guest. Please <a href="/login">login</a> to view your profile.</span>
          </div>
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Megashop</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/products">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/checkout">Checkout</a>
              </li>
              <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
              
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/about">About Us</a>
                    
                    <a class="dropdown-item" href="https://demo.phpjabbers.com/free-web-templates/mobile-store-website-template-81/terms.php">Terms</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ session('profilephoto') ? asset('uploads/' . session('profilephoto')) : asset('uploads/avatar.png') }}" class="img-circle elevation-2" alt="User Image" height="50px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="/logout" class="dropdown-item">Logout</a>
                        </div>
        </div>
      </nav>
    </header>
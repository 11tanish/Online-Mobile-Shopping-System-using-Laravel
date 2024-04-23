@include('user-layout.header')
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .info {
    color: #7DF9FF; /* Set text color */
    font-size: 20px; /* Set font size */
    font-weight: bold; /* Set font weight to bold */
    text-transform: capitalize; /* Capitalize the text */
    text-align:left;
}

.popup {
        visibility: hidden;
        position: fixed;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #f0f0f0;
        color: black;
        text-align: center;
        border-radius: 20px;
        padding: 16px;
        z-index: 999;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
    }

    .popup.show {
        visibility: visible;
        animation: fadeIn 3s;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .popuptext {
        font-size: 16px;
    }

    .popuptext a {
        color: blue;
        text-decoration: underline;
    }

  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @stack('title')
  

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
<body>

    <!-- ***** Preloader Start ***** -->
    
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    
    

    <!-- Page Content -->
   
    <!-- Banner Ends Here -->
@include('user-layout.sub-header')

@include('user-layout.navbar')

@include('user-layout.preloader')

<!-- Banner Starts Here -->
@include('user-layout.banner')
<!-- Banner Ends Here -->

@include('user-layout.request-form')

@include('user-layout.services')

@include('user-layout.fun-facts')

@include('user-layout.more-info')

@include('user-layout.testimonials')

@include('user-layout.callback-form')

    <script>
    // Function to display the pop-up message
    function displayPopupMessage() {
        var popup = document.getElementById("popupMessage");
        popup.classList.toggle("show");
        setTimeout(function() {
            popup.classList.toggle("show");
        }, 3000); // Close the pop-up after 3 seconds
    }

    // Check if the user is logged in
    @if(!session('fullname'))
        // If user is not logged in, display the pop-up message
        displayPopupMessage();
    @endif
</script>
</body>
@include('user-layout.footer')
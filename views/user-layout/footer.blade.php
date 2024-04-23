<!-- Footer Starts Here -->
<footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
            <h4>Megashop</h4>
            <p>&copy Copyright 2023 Megashop. All rights reserved.</p>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Useful Links</h4>
            <ul class="menu-list">
              <a href="https://www.facebook.com/"><img src="dist/img/udash/face.jpg" height="50" width="50"></a> &nbsp;
              <a href="https://www.instagram.com/"><img src="dist/img/udash/insta.jpg" height="50" width="50"></a> &nbsp;
              <a href="https://www.youtube.com"><img src="dist/img/udash/yt.jpg" height="50" width="50"></a> &nbsp;
              <a href="https://www.twitter.com"><img src="dist/img/udash/twitter.jpg" height="50" width="50"></a> &nbsp;
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Additional Pages</h4>
            <ul class="menu-list">
              <li><a href="#">Products</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Terms</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item last-item">
            <h4>Contact Us</h4>
            <div class="contact-form">
              <form id="contact footer-contact" action="#" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>
                Copyright © 2023 Megashop
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://demo.phpjabbers.com/free-web-templates/mobile-store-website-template-81/vendor/jquery/jquery.min.js"></script>
    <script src="https://demo.phpjabbers.com/free-web-templates/mobile-store-website-template-81/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="https://demo.phpjabbers.com/free-web-templates/mobile-store-website-template-81/assets/js/custom.js"></script>
    <script src="https://demo.phpjabbers.com/free-web-templates/mobile-store-website-template-81/assets/js/owl.js"></script>
    <script src="https://demo.phpjabbers.com/free-web-templates/mobile-store-website-template-81/assets/js/slick.js"></script>
    <script src="https://demo.phpjabbers.com/free-web-templates/mobile-store-website-template-81/assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

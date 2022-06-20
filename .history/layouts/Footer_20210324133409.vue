<template>
<footer class="footer-area">
    <div class="container">
        div.row




        <div class="row">
            <div class="col-md-2 col-sm-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <a href="#" class="nav-link">
                            
                                <img src="img/group-5.png" class="Combined-Shape">
                         </a>
                    </div>
                </div>
            </div>

            <div class=" col-md-8 col-sm-6">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="menu">
                            <li class="nav-item">
                                <nuxt-link to="/about-full" class="nav-link">About us</nuxt-link>
                            </li>
                            <li class="nav-item">
                                <nuxt-link to="/products" class="nav-link">Shop</nuxt-link>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <nuxt-link to="/contact" class="nav-link">Contact</nuxt-link>
                            </li>
                            <li class="nav-item">
                                <nuxt-link to="/contact" class="nav-link">FAQ</nuxt-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="menu">
                            <li class="nav-item p-relative">
                                <nuxt-link to="/contact" class="nav-link">Contact</nuxt-link>
                            </li>

                            <li class="nav-item p-relative"><a href="#" class="nav-link">032 202 03 04 </a>
                            </li>
                            <li class="nav-item">
                                E-mail:
                            </li>
                            <li class="nav-item">
                                <nuxt-link to="/contact" class="nav-link">Info@augustbakery.com</nuxt-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-sm-6">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="menu">
                            <li class="nav-item p-relative"><a href="#" class="nav-link">Follow us </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="menu">
                            <li class="nav-item p-relative">
                                <a href="https://www.facebook.com/Augustbakery.ge" class="nav-link" target="_blank">
                                
                                <img src="img/facebook/path-copy-2.png" class="socialIcons">
                            </a>
                            </li>
                            <li class="nav-item p-relative">
                                <a href="https://www.instagram.com/augustbakery.ge_/" target="_blank" class="nav-link">
                                <img src="img/combined-shape-copy-2_2.png" class="socialIcons">
                            </a>
                            </li>
                            <li class="nav-item p-relative">
                                <a href="#" class="nav-link">
                                <img src="img/twit/combined-shape.png" class="socialIcons">
                               
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 allRights">
                    <p>All Rights Reserved</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul class="menuuu float-right">
                        <li class="nav-item p-relative"><a href="#" target="_blank">Terms & Conditions</a></li>
                        <li class="nav-item p-relative"><a href="#" target="_blank">Pricacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</template>

<style scoped>
.allRights p{
    font-family: PlayfairDisplay;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #ffffff !important;
}
.Path-Copy-2 {
  width: 28px;
  height: 28px;
  
  object-fit: contain;
  opacity: 0.9;
  background-color: #f8f8f8;
}
.Group-5 {
    width: 149px;
    height: 72px;
    object-fit: contain;
}

.footer-area ul li a {
    font-size: 20px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #ffffff !important;
}
.copyright-area ul li a {
  font-size: 16px;
  padding: 15px 0;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #f8f8f8 !important;

  
}

.footer-area ul {
    width: 90%;
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu {
    display: flex;
    justify-content: space-between;
    font-size: 20px;
    font-family: "Playfair Display SC", serif;
    color: #F8F8F8;
    text-transform: none;
    padding-left: 0;
    padding-right: 0;
    padding-top: 0;
    padding-bottom: 0;
    margin-left: 0px;
    margin-right: 20px;
}
.menuuu {
    display: flex;
}

</style>

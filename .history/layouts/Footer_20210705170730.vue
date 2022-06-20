<template>
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                <div class="single-footer-widget">
                    <div class="logo">
                        <a href="#" class="nav-link">

                            <img src="img/group-5.png" class="Combined-Shape">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
              <ul class="navbar-nav">

                                <li class="nav-item p-relative">
                                    <nuxt-link to="/about-full" class="nav-link">About Us</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/about-full" class="nav-link">Mus Haves</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/about-full" class="nav-link">Rav Services</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/about-full" class="nav-link">Artists</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/about-full" class="nav-link">Virtual Exhibision</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/blog-one" class="nav-link">News</nuxt-link>
                                </li>
                              

                                <li class="nav-item p-relative">
                                    <nuxt-link to="/products" class="nav-link">{{$t('navs.shop.title')}}</nuxt-link>
                              
                                </li>
                                <li class="nav-item">
                                    <nuxt-link to="/contact" class="nav-link">{{$t('navs.contact.title')}}</nuxt-link>
                                </li>
                                <li class="nav-item">
                                    <nuxt-link to="/faq" class="nav-link">{{$t('navs.faq.title')}}</nuxt-link>
                                </li>

                            </ul>
                <ul class="menu mt-4 " style="width: 90%;">
                            <li class="nav-item p-relative">
                                <!-- <nuxt-link to="/contact" class="nav-link"> -->
                                Contact
                                <!-- </nuxt-link> -->
                            </li>

                            <li class="nav-item p-relative">
                               
                                    032 202 03 04 
                                 
                            </li>
                            <li class="nav-item">
                                E-mail:
                            </li>
                            <li class="nav-item">
                               
                                Info@augustbakery.com
                                
                            </li>
                        </ul>
            </div>
            <div class="col-md-2 col-sm-12 Follow-Us">
                <ul class="menu">
                    <li class="nav-item">Follow Us</li>
                </ul>
                <ul class="menu  mt-4">
                    <li>
                        <a href="https://www.facebook.com/Augustbakery.ge" target="_blank">
                            <img src="img/facebook/path-copy-2.png" class="socialIcons">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/augustbakery.ge_/" target="_blank">
                            <img src="img/combined-shape-copy-2_2.png" class="socialIcons">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="img/twit/combined-shape.png" class="socialIcons">

                        </a>
                    </li>
                </ul>
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
                        <li class="nav-item p-relative"><a href="#" target="_blank">Terms & Conditions </a> </li>
                        <li class="nav-item p-relative pl-5"><a href="#" target="_blank">Pricacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</template>

<style scoped>
.Follow-Us {
    font-family: 'Montserrat', sans-serif !important;
    font-size: 20px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #ffffff;
}

.allRights p {
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
    font-family: PlayfairDisplay;
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

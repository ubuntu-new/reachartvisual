<template>
<div class="container mt-1oo">
    <client-only>
        <!-- Start Main Banner Area -->
        <div class="home-slides-twoo">
            <carousel class="webertela" :autoplay=false :autoplayTimeout=3000 :navigationEnabled=true :paginationEnabled=true :perPageCustom="[[0, 1], [768, 1], [1024, 1], [1200, 1]]">
                <slide>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12  item-left">
                                <div class="banner-content">
                                            <h1>Daily baked with<br>love & care</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                            </div>
                            <div class="col-md-6 hidden-sm">
                                <img  src="../../assets/img/main-banner-image/1.jpg" class="banner-image-right">
                            </div>
                        </div>
                    </div>
                </slide>

                <slide>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6   col-sm-12 item-left">
                                <div class="banner-content">
                                            <h1>Daily baked with<br>love & care</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                            </div>
                            <div class="col-md-6 hidden-sm">
                                <img  src="../../assets/img/main-banner-image/1.jpg" class="banner-image-right">
                            </div>
                        </div>
                    </div>
                </slide>

            </carousel>
        </div>
        <!-- End Main Banner Area -->
    </client-only>
</div>
</template>

<style scoped>
 .VueCarousel-navigation-prev[data-v-453ad8cd]{
    opacity: 0.5;
    cursor: default;
    background-image: url(/img/group-7.png) !important;
    width: 53px;
    height: 53px;
    background-position: center center;
    background-size: cover;
 }

  .banner-content   h1 {
    font-family: PlayfairDisplaySC;
    font-size: 50px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #131415;
    }


.banner-image-right {
    max-width: 100%;
    float: right; 
    margin-top: 20px;
}


</style>

<template>
<div class="container mt-1oo">
    <client-only>
        <!-- Start Main Banner Area -->
        <div class="home-slides-two">
            <carousel :autoplay=false :autoplayTimeout=3000 :navigationEnabled=true :paginationEnabled=true :perPageCustom="[[0, 1], [768, 1], [1024, 1], [1200, 1]]">
                <slide>
                    <div class="banner-section item-left">
                        <div class="d-table">
                                <div class="d-table-cell">
                                    
                                        <div class="banner-content">
                                            <h1>Daily baked with<br>love & care</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                   
                                </div>
                            </div>
                        <img  src="../../assets/img/main-banner-image/1.jpg" class="banner-image-right">
                    </div>
                </slide>

                <slide>
                    <div class="banner-section item-left">
                        <div class="d-table">
                                <div class="d-table-cell">
                                    <div class="container">
                                        <div class="banner-content">
                                            <h1>Daily baked with<br>love & care</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <img  src="../../assets/img/main-banner-image/1.jpg" class="banner-image-right">
                    </div>
                </slide>
            </carousel>
        </div>
        <!-- End Main Banner Area -->
    </client-only>
</div>
</template>

<style scoped>
.VueCarousel-navigation-button {

    top: 50%;
    color: #C1C1C1 !important;
    left: 15px;
    outline: 0;
    transform: translateY(-50%) translateX(0);
    opacity: 1 !important;
    border: 1px solid #C1C1C1 !important;

    border-radius: 50% !important;
    width: 53px;
    height: 53px;
}



.VueCarousel-navigation-button[data-v-453ad8cd] {
    color: rebeccapurple !important;
}
</style>

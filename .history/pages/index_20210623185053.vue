<template>
  <div class="main">
    <Banner></Banner>
    <v-divider class="mobiluriza"></v-divider>
    <AboutMain></AboutMain>
    <Offer></Offer>
    <News></News>
    <Locations></Locations>
    <div class="fixedSocial">


    </div>
  </div>
</template>
<style>
.fixedSocial {
  width: 55px;
  height: 106px;
  padding: 25px 18px;
  border-radius: 12px;
  background-color: #161e17;
  position: fixed;
  top: 401px;
  right: 0px;
}
.main
{
  position: relative
}
</style>
<script>
import Banner from '../components/diction-three/Banner';
import AboutMain from '../components/landing-one/AboutMain';
import Offer from '../components/landing-one/Offer';
import LatestProducts from '../components/landing-one/LatestProducts';
import ProductCategory from '../components/landing-one/ProductCategory';
import TrendingProducts from '../components/landing-one/TrendingProducts';
import BestSellers from '../components/landing-one/BestSellers';
import Facility from '../components/landing-one/Facility';
import Testimonials from '../components/landing-one/Testimonials';
import News from '../components/landing-one/News';
import Subscribe from '../components/common/Subscribe';
import Partner from '../components/common/Partner';
import InstagramPhotos from '../components/common/InstagramPhotos';
import Locations from '~/components/landing-one/Locations.vue';

export default {
  components: {
    Banner, AboutMain, Offer, LatestProducts, ProductCategory, TrendingProducts,
    BestSellers, Facility, Testimonials, News, Subscribe, Partner, InstagramPhotos,Locations
  }
}
</script>
    
<template>
<div>

    <section class="blog-details-area mt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-details">
                        <div class="article-img">
                            <img :src="`https://reachartvisual.com/back_api/backend/web/images/store/${artists.filePath}`" />
                        </div>
                    </div>
                  
                </div>
            </div>
            <div class="row  mt-50">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-8">
                    <div class="article-content">
                        <h3 class="text-center title-detail mb-85">{{ artists.title }}</h3>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
            </div>
        </div>

        <div class="container-fluid fullBg">
            <div class="row">
                <div class="col-md-12  mt-75 mb-75">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="share text-center">
                                    <p>Social</p>
                                    <p class="xazi">
                                        &nbsp;
                                    </p>
                                    <ul class="shareUl">
                                        <li class="shareLi" v-if="artists.facebook "><img src="../assets/img/facebook.png" class="facebook" @click="myFunction()"></li>
                                        <li class="shareLi" v-if="artists.instagramm"><img src="../assets/img/instagram.png" class="facebook" @click="myFunctionOne()"></li>
                                        <!-- <li class="shareLi"><img src="../assets/img/path.svg" class="facebook"></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8 ">
                                <div class="blog-details" v-html="artists.description">
                                </div>
                                <!-- <span>
                                    {{ artists.facebook }}
                                </span> -->
                            </div>
                            <div class="col-md-2">&nbsp;</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
</template>

<script>

export default {
    name: 'artists_detail',
    data() {
        return {
            artists: {},
        }
    },
  async created () {
	    let singleArtists = this.$route.params.artists
        if(singleArtists){
            this.artists = singleArtists
        }
        else {
            this.$router.push('artists');
        }
	},
    mounted() {

        console.log('orderArtists: ', this.singleArtists);
    },
     methods:{
      myFunction: function () {   
          window.open( this.artists.facebook , "_blank");    
      },
      myFunctionOne: function () {   
          window.open( this.artists.instagramm , "_blank");    
      },
    }
}
</script>

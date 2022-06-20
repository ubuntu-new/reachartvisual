<template>
<div>

    <section class="blog-details-area mt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-details">
                        <div class="article-img">
                            <img :src="`http://art.webertela.online/backend/web/images/store/${artists.filePath}`" />
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
                                    <p>Share</p>
                                    <p class="xazi">
                                        &nbsp;
                                    </p>
                                    <ul class="shareUl">
                                        <li class="shareLi"><img src="../assets/img/facebook.svg" class="facebook" @click="goToFacebook()"></li>
                                        <li class="shareLi"><img src="../assets/img/linkedin-1.svg" class="facebook"></li>
                                        <li class="shareLi"><img src="../assets/img/path.svg" class="facebook"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8 ">
                                <div class="blog-details" v-html="artists.description">
                                </div>
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
    methods() {
         goToFacebook(){
   this.$router.push('/home'); 
      }
  }
    }
}
</script>

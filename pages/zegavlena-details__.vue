<template>
<div>

    <section class="blog-details-area mt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-details">
                        <div class="article-img">
                            <img :src="`https://art.webertela.online/backend/web/images/store/${rav.filePath}`" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  mt-50">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-8">
                    <div class="article-content">

                        <h3 class="text-center title-detail mb-85">{{ rav.title }}</h3>
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
                            <!-- <div class="col-md-2">
                                <div class="share text-center">
                                    <p>Share</p>
                                    <p class="xazi">
                                        &nbsp;
                                    </p>
                                    <ul class="shareUl">
                                        <li class="shareLi"><img src="../assets/img/facebook.svg" class="facebook" @click="myFunction()"></li>
                                        <li class="shareLi"><img src="../assets/img/linkedin-1.svg" class="facebook"></li>
                                        <li class="shareLi"><img src="../assets/img/path.svg" class="facebook"></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="col-md-12 ">
                                <div class="blog-details" v-html="zegavlena.description">
                                </div>
                                <span>
                                    {{ zegavlena.facebook }}
                                </span>
                                <nuxt-link
                                        class="maxLink"
                                        :to="zegavlena.facebook"
                                >
                                    <h3 class="text-h4 font-weight-light orange--text mb-2">
                                        {{ zegavlena.facebook }}
                                    </h3>
                                </nuxt-link>
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
    name: 'zegavlena_detail',
    data() {
        return {
            journal: {},
        }
    },
  async created () {
	    let singleJournal = this.$route.params.journal
        if(singleJournal){
            this.journal = singleJournal
        }
        else {
            this.$router.push('journal');
        }
	},
    mounted() {

        console.log('orderJournal: ', this.singleJournal);
    },
    
   //   methods:{
   //    myFunction: function () {   
   //        window.open( this.artists.facebook , "_blank");    
   //    },
   //  }
   head() {
      return {
        title: 'RAV: ZEGAVLENAaaaaa',
        meta: [
          // hid is used as unique identifier. Do not use `vmid` for it as it will not work
             { hid: 'og-type', property: 'og:type', content: 'website' },
			 { hid: 'og-title', property: 'og:title', content: 'Reach Art Visual – ZEGAVLENA. ააა' },
			 { hid: 'og-desc', property: 'og:description', content: 'nfluence (“ზეგავლენა” in Georgian) is a monthly online publication that introduces the dynamics of contemporary Georgian art and current cultural processes to a wide range of readers. Our concept is based on getting Georgian contemporary artists known, finding connections from art history, and discovering interesting and unknown visual materials through the thematic sections. Readers of the online edition will get inspiration for interior design through interviews, review blogs, high-quality exclusive design, and also get acquainted with the Georgian art reality from different angles. “Influence” - the name of the publication, is the name of Tea Nili’s concept book.' },
			 { hid: 'og-image', property: 'og:image',
  content: 'https://reachartvisual.com/back_api/backend/web/images/store/Abouts/About1/b53a0c.jpg'
},
{ hid: 'og-url', property: 'og:url', content: 'https://reachartvisual.com/about-full' },
        ]
      }
    }
}
</script>

<template>
<div>

    <section class="blog-details-area mt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-details">
                        <div class="article-img">
                            <img :src="`http://august.webertela.online/backend/web/images/store/${news.filePath}`" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  mt-50">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-8">
                    <div class="article-content">

                        <h3 class="text-center title-detail mb-85">{{ news.title }}</h3>
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
                                        <li class="shareLi"><img src="../assets/img/facebook.svg" class="facebook"></li>
                                        <li class="shareLi"><img src="../assets/img/linkedin-1.svg" class="facebook"></li>
                                        <li class="shareLi"><img src="../assets/img/path.svg" class="facebook"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8 ">
                                <div class="blog-details" v-html="news.description">
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
    name: 'news_detail',
    data() {
        return {
            news: {},
        }
    },
  async created () {
	    let singleNews = this.$route.params.news
        if(singleNews){
            this.news = singleNews
        }
        else {
            this.$router.push('blog-one');
        }
	},
    mounted() {

        console.log('orderNews: ', this.news);
    }
}
</script>

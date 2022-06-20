<template>
<client-only>
    <!-- Start News Area -->
    <section class="news-area ptb-60">
        <div class="container">
            <div class="row" style="margin-bottom:44px">
                <div class="col-md-6">
                    <div class="blog-content">
                        <h1 class="title">
                            <nuxt-link to="/blog-one" class="titleA">Blog</nuxt-link>
                        </h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                </div>
                <div class="col md-4"></div>
                <div class="col md-4"></div>
            </div>
            <div class="row" style="margin-bottom:44px">
                <hooper :settings="hooperSettings">
                    <slide v-for="news in allNews" :key="news.id">
                        <div class="col md-4">
                            <div class="single-news-post">
                                <div class="news-image">
                                    <!-- <nuxt-link :to="news.link">  -->
                                    <img :src="`http://august.webertela.online/backend/web/images/store/${news.filePath}`" />
                                    <!-- </nuxt-link>  -->
                                </div>

                                <div class="news-content text-center">
                                    <h3>
                                        <!-- <nuxt-link :to="post.link">{{news.title}}</nuxt-link> -->
                                        {{news.title}}
                                    </h3>
                                    <!-- <span class="author">By <a href="#">{{mews.author}}</a></span> -->
                                    <p>{{news.post}}</p>
                                    <div>
                                        <ul class="list-inline justify-content-center">
                                            <li class="list-inline-item"><img src="img/group-10.png" class="Group-10"></li>
                                            <li class="list-inline-item" style="position: relative; bottom:20px;">
                                                <router-link  class="maxLink" :to="{ name: 'blog-details', params: { news: news }}">
                                                    Explore more
                                                </router-link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </slide>
                    <hooper-navigation slot="hooper-addons"></hooper-navigation>
                </hooper>
            </div>

        </div>
    </section>
    <!-- End News Area -->
</client-only>
</template>

<style scoped>

.Group-10 {
    width: 48px;
    height: 48px;
    object-fit: contain;
    float: left;
}

.hooper {
    height: auto;
}
</style>

<script>
import axios from 'axios';
import {
    Hooper,
    Slide,
    Navigation as HooperNavigation
} from 'hooper';
import 'hooper/dist/hooper.css';
export default {
    components: {
        Hooper,
        Slide,
        HooperNavigation
    },
    data() {
        return {
            hooperSettings: {
                itemsToShow: 3,
                keysControl: false,
                autoPlay: true,
                playSpeed: 3000,
                transition: 300,
                hoverPause: true,
                centerMode: true,
                infiniteScroll: true,
                breakpoints: {
                    2400: {
                        itemsToShow: 4
                    },
                    1800: {
                        itemsToShow: 3
                    },
                    1500: {
                        itemsToShow: 3
                    },
                    1100: {
                        itemsToShow: 3
                    },
                    0: {
                        itemsToShow: 1.5
                    }
                }
            },
            allNews: [],
            featuredNews: {},
        }

    },
    mounted() {
        const lang = this.$store.getters.language;
        const TOKEN = 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS';
        
        // var bodyFormData = new FormData();
        // bodyFormData.set("branch", this.branch);
        // bodyFormData.set("status_key", this.status);

        axios.request({
            method: "post",
            url:
            "http://august.webertela.online/rest/web/index.php?r=v1/news/list",
            headers: {
            Authorization: "Bearer " + TOKEN,
            },
            // data: bodyFormData,
        })
        .then((response) => {
            if(lang == 'ka'){
                console.log('Catogeries Response: ', response);
                this.allNews = response.data;
                this.allNews.forEach((x) => {
                    x.title_en = x.title,
                    x.title = x.title_ge,
                    x.description_en = x.description,
                    x.description = x.description_ge
                });
                this.featuredNews = this.allNews.filter((x) => x.feautured == '1');
                console.log('featured: ', this.featuredNews);
            }
            else {
                console.log('Catogeries Response: ', response);
                this.allNews = response.data;
                this.featuredNews = this.allNews.filter((x) => x.feautured == '1');
                console.log('featured: ', this.featuredNews);
            }
        });
    },
}
</script>

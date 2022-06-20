<template>
<div data-app>

    <!-- Start Navbar Area -->
    <div :class="['navbar-area', {'is-sticky': isSticky}]">
        <div class="comero-nav">
            <div class="container">
                <div class="col-12 top">
                    <nuxt-link class="navbar-brand mobiluriza" to="/">
                        <img src="img/logo.png" alt="logo">
                    </nuxt-link>
                    <nav class="navbar navbar-expand-md navbar-light" style="overflow-anchor: none;
    background-color: white;
    position: absolute;
    right: 10px;
    top: 50px;
    z-index: 2;">

                        <b-navbar-toggle target="navbarSupportedContent"></b-navbar-toggle>

                        <b-collapse class="collapse navbar-collapse" id="navbarSupportedContent" is-nav>
                            <ul class="navbar-nav">

                                <li class="nav-item p-relative">
                                    <nuxt-link to="/about-full" class="nav-link">{{$t('navs.about.title')}}</nuxt-link>
                                    <!-- <a href="#" class="nav-link">About us <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <nuxt-link to="/" class="nav-link active">Home Style One</nuxt-link>
                                    </li>

                                    <li class="nav-item">
                                        <nuxt-link to="/diction-two" class="nav-link active">Home Style Two</nuxt-link>
                                    </li>
                                    <li class="nav-item">
                                        <nuxt-link to="/diction-three" class="nav-link active">Home Style Three</nuxt-link>
                                    </li>
                                </ul> -->
                                </li>

                                <li class="nav-item p-relative">
                                    <nuxt-link to="/products" class="nav-link">{{$t('navs.shop.title')}}</nuxt-link>
                                    <!-- <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <nuxt-link to="/products" class="nav-link">Products</nuxt-link>
                                    </li>

                                    <li class="nav-item">
                                        <nuxt-link to="/products-details/1" class="nav-link">Products Details</nuxt-link>
                                    </li>
                                </ul> -->
                                </li>

                                <li class="nav-item p-relative">
                                    <nuxt-link to="/blog-one" class="nav-link">{{$t('navs.blog.title')}}</nuxt-link>
                                    <!-- <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <nuxt-link to="/blog-one" class="nav-link">Blog Grid</nuxt-link>
                                    </li> 

                                    <li class="nav-item">
                                        <nuxt-link to="/blog-details" class="nav-link">Blog Details</nuxt-link>
                                    </li>
                                </ul> -->
                                </li>

                                <li class="nav-item">
                                    <nuxt-link to="/contact" class="nav-link">{{$t('navs.contact.title')}}</nuxt-link>
                                </li>
                                <li class="nav-item">
                                    <nuxt-link to="/faq" class="nav-link">{{$t('navs.faq.title')}}</nuxt-link>
                                </li>
                            </ul>

                            <div class="others-option mobiluriza">
                                <div class="option-item">
                                    <a @click="loginDialog = true">
                                        Login
                                    </a>
                                </div>
                                <div class="option-item">
                                    <a @click.prevent="toggle" href="#">
                                        Cart({{cart.length}}) <i class="fas fa-shopping-bag"></i>
                                    </a>
                                </div>
                            </div>
                        </b-collapse>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    <SidebarPanel></SidebarPanel>

    <v-dialog v-model="loginDialog" max-width="600px">
        <v-card>
            <v-card-title>
                <span class="headline">Login</span>
            </v-card-title>
            <v-card-text>
                <v-container>
                    <v-row>
                        <div class="login-content">

                            <form class="login-form">
                                <div class="form-group">
                                    <label>Email</label>
                                    <v-text-field v-model="username" label="Username *" required></v-text-field>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" v-model="password" class="form-control" placeholder="Enter your password" id="password" name="password">
                                </div>

                                <v-btn class="btn btn-primary white" @click="login()">Login</v-btn>

                            </form>
                        </div>
                    </v-row>
                </v-container>
                <small>*indicates required field</small>
            </v-card-text>
        </v-card>
    </v-dialog>

</div>
</template>

<style scoped>
ul {
    width: 84%;
    display: table;
    table-layout: fixed;
}

.white {
    color: aliceblue;
}

ul>li {
    display: table-cell;
}

ul>li>a {
    display: block;

}
</style>

<script>
import axios from 'axios';
import SidebarPanel from '../layouts/SidebarPanel';
import {
    mutations
} from '../utils/sidebar-util';
export default {
    components: {
        SidebarPanel
    },
    data() {
        return {
            isSticky: false,
            loginDialog: false,
            username: null,
            password: null,
        }
    },
    mounted() {
        const that = this;
        window.addEventListener('scroll', () => {
            let scrollPos = window.scrollY;
            if (scrollPos >= 100) {
                that.isSticky = true;
            } else {
                that.isSticky = false;
            }
        })
    },
    computed: {
        cart() {
            return this.$store.getters.cart
        }
    },
    methods: {
        toggle() {
            mutations.toggleNav()
        },
        changeLang(lang) {
            //mutate 'locale' in store
            this.$store.commit('SET_LANG', lang)
            //re-route to the current page but with the selected language in a query string
            // this.$router.push({ path: `${this.$router.currentRoute.path}` })
            this.$router.go();
        },

        login() {

            var bodyFormData = new FormData();

            bodyFormData.set("username", this.username);
            bodyFormData.set("password", this.password);

            axios.request({
                    method: "post",
                    url: "http://august.webertela.online/rest/web/index.php?r=auth",
                    data: bodyFormData,
                }

            ).then((response) => {

                console.log('Auth Response: ', response);

                if (response.data.is_error) {
                    alert('Wrong username or password');
                } else {
                    this.$store.commit('SET_USER', response.data.data)
                    this.loginDialog = false;
                    this.$router.push('/');
                }
            });
        },
    }
}
</script>

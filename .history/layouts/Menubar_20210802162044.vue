<template>
<div data-app>

    <!-- Start Navbar Area -->
    <!-- <div :class="['navbar-area', {'is-sticky': isSticky}]"> -->
    <div :class="['navbar-area']">
        <div class="comero-nav">
            <div class="container">
                <div class="col-12 top">
                    <nav class="navbar navbar-expand-md navbar-light">

                        <b-navbar-toggle target="navbarSupportedContent"></b-navbar-toggle>

                        <b-collapse class="collapse navbar-collapse" id="navbarSupportedContent" is-nav>
                            <ul class="navbar-nav">
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/about-full" class="nav-link">About Us</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/journal" class="nav-link">Zegavlena</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/mus" class="nav-link">Mus Haves</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/rav" class="nav-link">Rav Services</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/artists" class="nav-link">Artists</nuxt-link>
                                </li>
                                <!-- <li class="nav-item p-relative">
                                    <nuxt-link to="/about-full" class="nav-link">Virtual Exhibision</nuxt-link>
                                </li> -->
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/blog-one" class="nav-link">News</nuxt-link>
                                </li>
                                <li class="nav-item p-relative">
                                    <nuxt-link to="/shop" class="nav-link">Shop</nuxt-link>
                                </li>
                                <!-- <li class="nav-item">
                                    <nuxt-link to="/about-full" class="nav-link">contact</nuxt-link>
                                </li> -->
                                <li class="nav-item">
                                    <nuxt-link to="/faq" class="nav-link">faq</nuxt-link>
                                </li>
                            </ul>
                        </b-collapse>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    <SidebarPanel></SidebarPanel>

    

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
 a.active {
  color: rgb(221, 8, 8) !important;
}
</style>

<script>
import axios from 'axios';
import SidebarPanel from '../layouts/SidebarPanel';
import {
    mutations
} from '../utils/sidebar-util';
import store from '~/store';
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
            userLogged: false,
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
            return this.$store.getters.cart;
        },
        loggedUser() {
            return this.$store.getters.getUsers;
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
            }).then((response) => {

                console.log('Auth Response: ', response);

                if (response.data.is_error) {
                    alert('Wrong username or password');
                } else {
                    this.$store.commit('SET_USER', response.data.data);
                    this.loginDialog = false;
                    this.$router.push('/');
                }
            });
        },
    }
}
</script>

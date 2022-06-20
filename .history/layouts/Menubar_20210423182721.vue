<template>
<div>
    <!-- Start Navbar Area -->
    <div :class="['navbar-area', {'is-sticky': isSticky}]">
        <div class="comero-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">

                    <b-navbar-toggle target="navbarSupportedContent"></b-navbar-toggle>

                    <b-collapse class="collapse navbar-collapse" id="navbarSupportedContent" is-nav>
                        <ul class="navbar-nav">

                            <li class="nav-item p-relative">
                                <nuxt-link to="/about-full" class="nav-link">About us</nuxt-link>
                    
                            </li>

                            <li class="nav-item p-relative">
                                <nuxt-link to="/products" class="nav-link">Shop</nuxt-link>
                            
                            </li>

                         

                            <li class="nav-item p-relative"><nuxt-link to="/blog-one" class="nav-link">Blog</nuxt-link>
                      
                            </li>

                            <li class="nav-item">
                                <nuxt-link to="/contact" class="nav-link">Contact</nuxt-link>
                            </li>
                            <li class="nav-item">
                                <nuxt-link to="/faq" class="nav-link">FAQ</nuxt-link>
                            </li>
                        </ul>

                        <div class="others-option">
                            <div class="option-item">
                                <nuxt-link to="/login"> <i class="fas fa-user"></i></nuxt-link>
                            </div>
                            <div class="option-item userIconIza">
                                <a @click.prevent="toggle" href="#">
                                    ({{cart.length}}) <i class="fas fa-shopping-bag"></i>
                                </a>
                            </div>
                        </div>
                    </b-collapse>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    <SidebarPanel></SidebarPanel>
</div>
</template>

<style scoped>
.userIconIza i
{
    width: 32px;
    height: 32px;
    /* margin: 0 41px 0 17px; */
    background-color: #f8f8f8;
    font-size: 29px;
    position: relative;
    margin: 0 auto;
    color: black;
}
ul {
    width: 84%;
    display: table;
    table-layout: fixed;
}

ul>li {
    display: table-cell;
}

ul>li>a {
    display: block;

}
</style>

<script>
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
            isSticky: false
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
        }
    }
}
</script>

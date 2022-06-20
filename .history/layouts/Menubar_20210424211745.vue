<template>
<div>
    <!-- Start Navbar Area -->
    <div :class="['navbar-area', {'is-sticky': isSticky}]">
        <div class="comero-nav">
            <div class="container pt-0 pb-0">
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

                            <li class="nav-item p-relative">
                                <nuxt-link to="/blog-one" class="nav-link">Blog</nuxt-link>

                            </li>

                            <li class="nav-item">
                                <nuxt-link to="/contact" class="nav-link">Contact</nuxt-link>
                            </li>
                            <li class="nav-item">
                                <nuxt-link to="/faq" class="nav-link">FAQ</nuxt-link>
                            </li>
                        </ul>

                        <div class="others-option">
                            <div class="option-item ">
                                <nuxt-link to="/signup">Signup</nuxt-link>
                            </div>
                            <div class="option-item ">
                                <div class="userIconIza">
                                    <nuxt-link to="/login">
                                        <img src="../assets/img/userIcons/shape.png" srcset="img/shape@2x.png 2x, img/shape@3x.png 3x" alt="userIcon">
                                        <!-- png -->
                                        <i class="fas fa-user tipi"></i>
                                    </nuxt-link>
                                </div>
                            </div>
                            <div class="option-item ">
                                <div class="cartIconIza">
                                    <a @click.prevent="toggle" href="#">
                                        <span class="cartLength"> ({{cart.length}}) </span> <i class="fas fa-shopping-bag bag"></i>
                                    </a>
                                </div>
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
.top-header-right-nav li::before {
    height: 0px;
    background: none
}

span.cartLength {
    color: #f8f8f8;
    position: relative;
    right: -30px;
    top: -20px;
    font-size: 14px;
}

.cartIconIza {
    width: 32px;
    height: 32px;
    background-color: #f8f8f8;
    font-size: 24px;
    position: relative;
    bottom: 4px;
    color: black;
    border-radius: 50%;
}

.cartIconIza .bag {
    width: 100%;
    position: absolute;
    left: 6px;
    color: black;
    top: 3px;
}

.userIconIza {
    width: 32px;
    height: 32px;
    background-color: #f8f8f8;
    font-size: 24px;
    position: relative;
    top: 5px;
    margin: 0 auto;
    color: black;
    border-radius: 50%;
}

.userIconIza .tipi {
    width: 100%;
    position: absolute;
    left: 6px;
    color: black;
    top: 3px;
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

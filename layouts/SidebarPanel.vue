<template>
<div>
    <div class="modal-backdrop" v-if="isPanelOpen"></div>
    <!-- Start Shopping Cart Modal -->
    <transition name="slide-fade">
        <div v-if="isPanelOpen" class="modal right shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" @click="closeSidebarPanel"><span aria-hidden="true">&times;</span></button>

                    <div class="modal-body" v-if="cart.length > 0">
                        <h3>My Cart ({{cart.length}})</h3>

                        <div class="product-cart-content">

                            <div class="product-cart" v-for="cart in cart" :key="cart.id">
                                <div class="product-image">
                                    <img :src="`http://august.webertela.online/backend/web/images/store/${cart.image}`" :alt="cart.name" />
                                </div>

                                <div class="product-content">
                                    <h3><a href="#">{{cart.name}}</a></h3>
                                    <span>Blue / XS</span>
                                    <div class="product-price">
                                        <span>{{cart.quantity}}</span>
                                        <span>x</span>
                                        <span class="price">${{cart.price}}</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="product-cart-subtotal">
                            <div class="row p-10">
                                <div class="col-12">
                                    <span>Subtotal</span>
                                    <span class="subtotal">{{cartTotal}}₾</span>
                                </div>
                                <div v-if="cartTotal > 50"  class="col-12">
                                    <span>Delivery</span>
                                    <span class="subtotal">{{ totalFee }}</span>
                                </div>
                                <div v-else class="col-12">
                                    <span>Delivery</span>
                                    <span class="subtotal">Free</span>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div v-if="Math.random(cartTotal) > 50">
                                   <span>Delivery fee</span>
                                   <span class="subtotal">5 ₾</span>
                                </div>
                                <div v-else>
                                     <span>Delivery fee</span>
                                     <span class="subtotal">Free</span>
                                </div>
                            </div> -->
                        </div>

                        <div @click="closeSidebarPanel" class="product-cart-btn">
                            <nuxt-link to="/checkout" class="btn btn-primary">Proceed to Checkout</nuxt-link>
                            <!-- <nuxt-link to="/cart" class="btn btn-light">View Shopping Cart</nuxt-link> -->
                        </div>
                    </div>
                    <div class="modal-body" v-else>
                        <h3>Empty!</h3>
                        <div @click="closeSidebarPanel" class="product-cart-btn">
                            <nuxt-link to="/products" class="btn btn-primary">Browse All Time Hot!</nuxt-link>
                            <nuxt-link to="/products" class="btn btn-light">Browse Latest!</nuxt-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
    <!-- End Shopping Cart Modal -->
</div>
</template>

<script>
import { store, mutations } from '../utils/sidebar-util';
export default {
    name: 'SidebarPanel',
    methods: {
        closeSidebarPanel: mutations.toggleNav
    },
    computed: {

        isPanelOpen() {
            return store.isNavOpen
        },
        cart() {
            return this.$store.getters.cart
        },
        cartTotal() {
            if(Number(this.$store.getters.totalAmount) > 50){
                this.$store.commit('FEE_TO_TOTAL', 5);
            }
            else {
                this.$store.commit('FEE_TO_TOTAL', 0);
            }
            //alert(Number(this.$store.getters.totalAmount));
            return Number(this.$store.getters.totalAmount);
        },
        totalFee() {
            return Number(this.$store.getters.totalFee);
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../assets/scss/styles/_transitions.scss";
</style>

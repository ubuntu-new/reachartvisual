<template>
<div>
    <!-- Start Page Title Area -->
    <div class="container p-0">
        <div class="row">
            <div class="col-12" style="padding:0px">
                <v-stepper alt-labels>
                    <v-stepper-header>
                        <a href="">
                            <v-stepper-step step="1" class="stepOne">
                                Your Bag
                            </v-stepper-step>
                        </a>
                        <v-divider></v-divider>

                        <v-stepper-step step="2" class="stepTwo">
                            Additional Info
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step step="3" class="stepThree">
                            Checkout
                        </v-stepper-step>
                    </v-stepper-header>
                </v-stepper>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="user-actions">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Returning customer? <nuxt-link to="/login">Click here to login</nuxt-link></span>
                </div>
            </div>
        </div> -->

        <!-- End Page Title Area -->
        <!-- Start Checkout Area -->

        <div class="row">
            <div class="col-12">
                <div class="checkoutLeftInner backgroundGray">
                    <div class="billing-details">
                        <h3 class="title">Additional Information</h3>
                        <v-divider></v-divider>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Enter District </label>
                                    <input type="text" id="fullName" v-model="personDetails.fullName" class="form-control">
                                    <!-- <label>Full Name <span class="required">*</span></label>
                                            <input type="text" id="fullName" v-model="personDetails.fullName" class="form-control"> -->
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" id="address" v-model="personDetails.address" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" id="city" v-model="personDetails.city" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" id="email" v-model="personDetails.email" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" id="phone" v-model="personDetails.phone" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="checkoutRightInner ">
                    <div class="cart-table table-responsive">
                         <h3 class="title">Product</h3>
                        <v-divider></v-divider>
                        <table class="table table-bordered webertela">
                           

                            <tbody v-if="cart.length > 0">

                                <tr v-for="(cart, i) in cart" :key="i">
                                    <td>
                                        <a href="javascript:void(0)" @click="removeItemFromCart(cart.id)" class="remove">
                                            <img src="img/group-6.png" srcset="img/group-6@2x.png 2x,
                                                        img/group-6@3x.png 3x" class="Group-6">
                                        </a>
                                    </td>
                                    <td class="product-thumbnail">

                                        <a href="#">
                                            <img :src="`http://august.webertela.online/backend/web/images/store/${cart.image}`" :alt="cart.name" />
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <nuxt-link :to="`/products-details/${cart.id}`">
                                            {{cart.name}}
                                        </nuxt-link>

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">${{cart.price * cart.quantity}}</span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered webertela">
                            <tbody>
                                <tr>
                                    <td>racxa</td>
                                    <td>racxa</td>
                                </tr>
                                <tr>
                                    <td class="order-subtotal">
                                        Price: <span class="order-subtotal-amount">{{cartTotal}}₾</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-shipping">
                                        <span>Delivery Service: <span>O ₾</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="total-price">
                                        Total: <span class="subtotal-amount">{{parseFloat(cartTotal + 10).toFixed(2)}}₾</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Checkout Area -->
</div>
</template>

<style scoped>

</style>

<script>
import firebase from '../../plugins/firebase';
export default {
    data() {
        return {
            personDetails: {
                fullName: 'John Doe',
                address: 'Town hall, av 02',
                city: 'New York',
                email: 'john@gmail.com',
                phone: '+990198378372',
                createdAt: new Date()
            },
            e1: 1
        }
    },
    computed: {
        cart() {
            return this.$store.getters.cart
        },
        cartTotal() {
            return this.$store.getters.totalAmount
        }
    },
    methods: {
        add() {
            const cartData = {
                details: this.personDetails,
                items: this.cart
            }
            const db = firebase.firestore();
            const dbOrderRef = db.collection('orders');
            dbOrderRef.add(cartData);
            this.$toast.success(`Thanks for the order`, {
                icon: 'fas fa-cart-plus'
            });
            this.$store.dispatch('cartEmpty')
            this.$router.push("/");
        }
    }
}
</script>

<template>
<div>
    <!-- Start Page Title Area -->
    <div class="container p-0">
        <div class="row">
            <div class="col-12" style="padding:0px">
                <v-stepper alt-labels non-linear v-model="e1">
                    <v-stepper-header>

                        <v-stepper-step editable :complete="e1 > 1" step="1" class="stepOne">
                        Your Bag
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step editable :complete="e1 > 2" step="2" class="stepTwo">
                            Additional Info
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step editable step="3" class="stepThree">
                            Checkout
                        </v-stepper-step>
                    </v-stepper-header>

                    <v-stepper-items>
                        <v-stepper-content step="1">
                            <CartItems @onStep='changeStep' />
                        </v-stepper-content>

                        <v-stepper-content step="2">
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
                                                <div class="col-lg-6 col-md-6">
                                                    &nbsp;
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="btn btn-checkout" @click="changeStep(3, null)">Proceed</div>
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
                        </v-stepper-content>

                        <v-stepper-content step="3">
                            <CheckoutItem @onPaymentType='payOrder' />
                        </v-stepper-content>
                        </v-stepper-items>
                </v-stepper>
            </div>
        </div>

        <!-- End Page Title Area -->
        <!-- Start Checkout Area -->

        
    </div>

    <!-- End Checkout Area -->
</div>
</template>

<style scoped>

</style>

<script>
import axios from 'axios';
import firebase from '../../plugins/firebase';
import CartItems from '../cart/CartItems';
import CheckoutItem from '../cart/CheckoutItem';
export default {
    data() {
        return {
            personDetails: {
                fullName: '',
                address: '',
                city: '',
                email: '',
                phone: '',
                createdAt: new Date()
            },
            e1: 1,
            order: {},
            items: [], 
        }
    },
    components: {
        CartItems,
        CheckoutItem,
    },
    computed: {
        cart() {
            this.items = this.$store.getters.cart;
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
        },
        changeStep(step, comments) {
            if(comments != null){
                this.items.forEach((x, index) => {
                    x.comment = comments[index];
                });
            }
            this.e1 = step;
        },
        payOrder(type){
            if(type == 'card'){
                alert('BANK PAGE');
            }
            else if(type == 'cash'){

                this.order.items = this.items;
                this.order.totalPrice = this.cartTotal;
                this.order.customerData = this.personDetails;
                this.order.paymentType = type;

                // const lang = this.$store.getters.language;
                const TOKEN = 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS';
                
                // var bodyFormData = new FormData();
                // bodyFormData.set("customer_id", 2);
                // bodyFormData.set("orderData", this.order);

                axios.request({
                    method: "post",
                    url:
                    "http://august.webertela.online/rest/web/index.php?r=v1/orders/create",
                    headers: {
                    Authorization: "Bearer " + TOKEN,
                    },
                    // data: bodyFormData,
                    data: { customer_id: 1, orderData: this.order },
                })
                .then((response) => {
                    console.log('orders/create response :', response);
                });

            }
        },
    }
}
</script>

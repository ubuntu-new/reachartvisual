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

 

        <!-- Start Cart Area -->
<section class="cart-area ptb-60  backgroundWhite">
    <div class="container">
        <form>
            <div class="row ">
                <div class="col-8 backgroundGray">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered webertela">
                            <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Comment</th>
                                    <!-- <th scope="col">Unit Price</th> -->
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>

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
                                        <!-- <ul>
                                                    <li>Crust: <strong>Thin</strong></li>
                                                    <li>Some: <strong>ingridients</strong></li>
                                                </ul> -->
                                    </td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                            <span @click="onDecrement(cart.id, cart.quantity)" class="minus-btn"><i class="fas fa-minus"></i></span>
                                            {{cart.quantity}}
                                            <span @click="onIncrement(cart.id)" class="plus-btn"><i class="fas fa-plus"></i></span>
                                        </div>
                                    </td>

                                    <td class="product-comment">
                                        <div class="input-counter">
                                            <p style="white-space: pre-line;">{{ message }}</p>
                                            <br>
                                            <textarea v-model="message" placeholder="Write a comment"></textarea>
                                        </div>
                                    </td>

                                    <!-- <td class="product-price">
                                        <span class="unit-amount">${{cart.price}}</span>
                                    </td> -->

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">${{cart.price * cart.quantity}}</span>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3 backgroundGray short">
                    <div class="racxa">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered webertela">
                            <thead>
                                <tr>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Full price <span style="float:right"><b>${{parseFloat(cartTotal + 10).toFixed(2)}}</b></span></td>
                                </tr>
                                <nuxt-link to="/checkout" class="btn btn-checkout">Buy</nuxt-link>
                            </tbody>
                        </table>
                    </div>
</div>
                </div>

            </div>
        </form>
    </div>

</section>
<!-- End Cart Area -->
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

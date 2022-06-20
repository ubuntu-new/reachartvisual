<template>
<div>
    <!-- Start Page Title Area -->
    
    <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="user-actions">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Returning customer? <nuxt-link to="/login">Click here to login</nuxt-link></span>
                    </div>
                </div>
            </div>
    <!-- End Page Title Area -->

<div class="container p-0">
        <div class="row">
            <div class="col-12">
                <div class="checkoutLeftInner backgroundGray">
                     <div class="billing-details">
                            <h3 class="title">Additional Information</h3>

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
                        <table class="table table-bordered webertela">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="4" class="checkoutTitle">Product</th>
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
                                

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">${{cart.price * cart.quantity}}</span>

                                    </td>
                                </tr>
<tr>
                                        <td>racxa</td>
                                        <td>racxa</td>
                                        </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Start Checkout Area -->
    <section class="checkout-area ptb-60">
        <div class="container">
            

            <form>
                <div class="row">
                    <div class="col-8 backgroundGray">
                       
                    </div>

                    <div class="col-md-4 col-sm-12 formInner">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                

                                <tbody v-if="cart.length > 0">

                                    <tr v-for="(cart, i) in cart" :key="i">
                                        <td><a href="javascript:void(0)" @click="removeItemFromCart(cart.id)" class="remove"><i class="far fa-trash-alt"></i></a></td>
                                        <td class="product-thumbnail">

                                            <a href="#">
                                                <img :src="cart.image" :alt="cart.name" />
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
                                                <p>
                                                    {{cart.quantity}}
                                                </p>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">${{cart.price * cart.quantity}}</span>

                                        </td>
                                    </tr>
                                    
                                          <div class="order-details">
                            
                            <div class="order-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr v-for="(cart, i) in cart" :key="i">
                                            <td class="product-name">
                                                <a href="#">{{cart.name}}</a>
                                            </td>

                                            <td class="product-total">
                                                <span class="subtotal-amount">${{cart.price * cart.quantity}}</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="order-subtotal">
                                                <span>Cart Subtotal</span>
                                            </td>

                                            <td class="order-subtotal-price">
                                                <span class="order-subtotal-amount">${{cartTotal}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="order-shipping">
                                                <span>Shipping</span>
                                            </td>

                                            <td class="shipping-price">
                                                <span>$10.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="total-price">
                                                <span>Order Total</span>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="subtotal-amount">${{parseFloat(cartTotal + 10).toFixed(2)}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="payment-method">
                                <p>
                                    <input type="radio" id="direct-bank-transfer" name="radio-group" checked>
                                    <label for="direct-bank-transfer">Direct Bank Transfer</label>

                                    Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                </p>
                                <p>
                                    <input type="radio" id="paypal" name="radio-group">
                                    <label for="paypal">PayPal</label>
                                </p>
                                <p>
                                    <input type="radio" id="cash-on-delivery" name="radio-group">
                                    <label for="cash-on-delivery">Cash on Delivery</label>
                                </p>
                            </div>

                            <a href="javascript:void(0)" @click="add" class="btn btn-primary order-btn">Place Order</a>
                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Checkout Area -->
</div>
</template>

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
            }
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

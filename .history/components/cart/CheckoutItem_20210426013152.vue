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
<div class="cart-area ptb-60  backgroundWhite">
    <div class="container">
        <form>
            <div class="row ">
                <div class="col-8 checkout-details ">
                     <div class="rectangle">
                        <h3 class="title"> Choose Payment Method</h3>
                        <div class="row">
                            <div class="cardButt">
                                <span class="">
                                    Pay by Card
                                </span>
                            </div>
                            <div class="cardButt">
                                 <span class="">
                                    Pay by Cash
                                </span>
                            </div>
                        </div>
                     </div>
                  
                </div>
                <div class="col-4 backgroundGray short">
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

</div>
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

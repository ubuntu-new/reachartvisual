<template>
<div>
    <!-- Start Page Title Area -->
    <div class="container p-0">
        <div class="row">
            <div class="col-md-12">
                <v-stepper alt-labels>
                    <v-stepper v-model="e1">
                        <v-stepper-header>
                            <v-stepper-step :complete="e1 > 1" step="1">
                                Name of step 1
                            </v-stepper-step>

                            <v-divider></v-divider>

                            <v-stepper-step :complete="e1 > 2" step="2">
                                dfsddf sdfsd
                            </v-stepper-step>

                            <v-divider></v-divider>

                            <v-stepper-step step="3">
                                Name of step 3
                            </v-stepper-step>
                        </v-stepper-header>

                        <v-stepper-items>
                            <v-stepper-content step="1">
                                <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

                                <v-btn color="primary" @click="e1 = 2">
                                    Continue
                                </v-btn>

                                <v-btn text>
                                    Cancel
                                </v-btn>
                            </v-stepper-content>

                            <v-stepper-content step="2">
                                <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

                                <v-btn color="primary" @click="e1 = 3">
                                    Continue
                                </v-btn>

                                <v-btn text>
                                    Cancel
                                </v-btn>
                            </v-stepper-content>

                            <v-stepper-content step="3">
                                <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

                                <v-btn color="primary" @click="e1 = 1">
                                    Continue
                                </v-btn>

                                <v-btn text>
                                    Cancel
                                </v-btn>
                            </v-stepper-content>
                        </v-stepper-items>
                    </v-stepper>
                    </v-stepper>
            </div>
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
    <div class="container p-0">
        <div class="row">
            <div class="col-12">
               
            </div>
        </div>
    </div>

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

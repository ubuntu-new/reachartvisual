<template>
<!-- Start Cart Area -->
<section class="cart-area ptb-60  backgroundWhite">
    <div class="container">
        <form>
            <div class="row ">
                <div class="col-8 backgroundGray mr-20">
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
                <div class="col-3 backgroundGray short ml-20">
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
</template>

<style>

</style>

<script>
export default {
    computed: {
        cart() {
            return this.$store.getters.cart
        },
        cartTotal() {
            return this.$store.getters.totalAmount
        }
    },
    methods: {
        removeItemFromCart(id) {
            this.$store.dispatch('deleteCart', id)
        },
        onIncrement(id) {
            this.$store.dispatch('updateCart', {
                id,
                unit: 1,
                cart: this.cart
            })
        },
        onDecrement(id, quantity) {
            if (quantity > 1) {
                this.$store.dispatch('updateCart', {
                    id,
                    unit: -1,
                    cart: this.cart
                })
            } else {
                this.removeItemFromCart(id);
                this.$toast.warning("Item deleted!");
            }
        },
    }
}
</script>

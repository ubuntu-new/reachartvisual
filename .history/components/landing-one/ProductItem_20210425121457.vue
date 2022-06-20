<template>
<div :class="className">
    <div class="single-product-box">
               <!--    -->

        <div class="product-image">
            <!-- <nuxt-link :to="`/products-details/${product.id}`"> -->
                <!-- <img :src="require(`~/assets/img/uploads/store/${product.filePath}`)" @error="imageError()" /> -->
                <img :src="`http://august.webertela.online/backend/web/images/store/${product.filePath}`" @error="imageError()" />
                <!-- <img :src="product.image" :alt="product.name">
                <img :src="product.imageHover" :alt="product.name"> -->
            <!-- </nuxt-link> -->

            <!-- <ul>
                    <li>
                        <a 
                            href="javascript:void(0)" 
                            title="Quick View"
                            v-b-tooltip.hover
                            @click.prevent="quickView"
                        >
                            <i class="far fa-eye"></i>
                        </a>
                    </li>
                    <li>
                        <a 
                            href="#"
                            title="Add to Wishlist"
                            v-b-tooltip.hover
                        >
                            <i class="far fa-heart"></i>
                        </a>
                    </li>
                    <li>
                        <a 
                            href="#"
                            title="Add to Compare"
                            v-b-tooltip.hover
                        >
                            <i class="fas fa-sync"></i>
                        </a>
                    </li>
                </ul> -->

            <!-- <Timer v-if="product.timePeriod" v-bind:dateTime="product.dateTime"></Timer> -->
        </div>

        <div class="product-content">
            <div class="row pt-30">
                <div class="col">
                    <!-- <nuxt-link :to="`/products-details/${product.id}`" class="itemName">{{product.name}}</nuxt-link> -->
                    {{product.name}}
                </div>
                <div class="col">
                    <span class="old-price" v-if="product.offer == 1">
                        ${{ product.price - product.offerPrice }}
                    </span>
                    <!-- <nuxt-link :to="`/products-details/${product.id}`" class="price">${{product.price}}</nuxt-link> -->
                    <span class="old-price" v-if="product.offer != 1">
                        ${{ product.price }}
                    </span>
                </div>
            </div>
            <div class="row mt-30 mb-30 pb-30">
                <div class="col-3 verticalMiddle">
                    <span class="quantity">Quantity:</span>
                </div>
                <div class="col-3 verticalMiddle">
                    <div class="quantityPlusMinus">
                        <div class="quantPlus" @click="addQty(product)"><a>+</a></div>
                        <!-- <div class="quantLine">|</div> -->
                        <div class="quantMinus" @click="minusQty(product)">-</div>
                    </div>
                </div>
                <div class="col-3 verticalMiddle">
                    <span class="quantityCircle">
                        <span class="quantityNumber">{{ product.qty }}</span>
                    </span>
                </div>
                <div class="col-3 verticalMiddle">
                     <span class="quantityBuyv">
                        <a v-if="getExistPId === product.id" href="javascript:void(0)" class="btn btn-light added-btn" @click="addToCart(product)">
                            Added Already!
                        </a>

                        <a v-else href="javascript:void(0)" class="btn btn-light quantityBuy" @click="addToCart(product)">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    </span>
                </div>
            </div>

            <!-- <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div> -->

            <!-- <a v-if="getExistPId === product.id" href="javascript:void(0)" class="btn btn-light added-btn" @click="addToCart(product)">
                Added Already!
            </a>

            <a v-else href="javascript:void(0)" class="btn btn-light" @click="addToCart(product)">
                Add to Cart
            </a> -->
        </div>
    </div>
</div>
</template>

<style scoped>
ul.productDetail li {
    width: 50%;

}

ul.productDetail li.list-group-item {
    background-color: transparent;
    border: 0px;
}

ul.productDetail li a {
    font-family: Canela;
    font-size: 20px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #494949;
    margin-top: 0px;
    margin-bottom: 0px;
}

.productDetailtwo .quantity {
    width: 66px;
    height: 22px;
    margin: 51px 14px 6px 0;
    opacity: 0.5;
    font-family: Canela;
    font-size: 16px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #131415;
}

.quantityBuy {
    width: 36px;
    height: 36px;
    border-radius: 18.4px;
    border: solid 1px #494949;

}
</style>

<script>
import Timer from './Timer';
export default {
    name: 'ProductItem',
    components: {
        Timer
    },
    data() {
        return {
            getExistPId: null
        }
    },
    props: ['product', 'className'],
    computed: {
        cart() {
            return this.$store.getters.cart
        }
    },
    mounted() {
    },
    methods: {
        // imageError(){
        //     alert('BLA');
        // },
        addQty(item){
            item.qty++;
            this.$forceUpdate();
        },
        minusQty(item){
            item.qty--;
            this.$forceUpdate();
        },
        quickView(e) {
            this.$emit('clicked')
        },
        addToCart(item) {
            const product = [{
                id: item.id,
                name: item.name,
                price: item.price,
                image: item.filePath,
                quantity: item.qty
            }]

            if (this.cart.length > 0) {
                let id = item.id
                this.getExistPId = id
                let cartIndex = this.cart.findIndex(cart => {
                    return cart.id == id
                })

                if (cartIndex == -1) {
                    this.$store.dispatch('addToCart', product);
                    this.$toast("Added to cart", {
                        icon: 'fas fa-cart-plus'
                    });
                } else {
                    this.$store.dispatch('updateCart', {
                        id,
                        unit: 1,
                        cart: this.cart
                    });
                    this.$toast.info("Already added to the cart and update with one");
                }
            } else {
                this.$store.dispatch('addToCart', product)
                this.$toast("Added to cart", {
                    icon: 'fas fa-cart-plus'
                });
            }
        }
    }
}
</script>

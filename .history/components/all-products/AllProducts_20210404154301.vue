<template>
<div>
   
        <div class="products-filter-options">
            <div class="row align-items-center">
                <div id="products-filter" class="products-collections-listing row">
                    <ProductItem v-for="(product, index) in filteredOrders" :product="product" :key="index" @clicked="toggle" :className="`col-md-4 products-col-item`"></ProductItem>
                </div>
                </div>
            </div>
        </div>
        
       <div class="container">
           
                
           </div>
      

        <!-- <nav class="woocommerce-pagination">
            <ul>
                <li><a href="#" class="page-numbers">1</a></li>
                <li><span class="page-numbers current">2</span></li>
                <li><a href="#" class="page-numbers">3</a></li>
                <li><a href="#" class="page-numbers">4</a></li>
                <li><span class="page-numbers dots">…</span></li>
                <li><a href="#" class="page-numbers">11</a></li>
                <li><a href="#" class="page-numbers">12</a></li>
                <li><a href="#" class="next page-numbers"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
        </nav> -->

        <!-- <QuckView /> -->
    
</div>
</template>

<script>
import QuckView from '../modals/QuckView';
import axios from 'axios';
import {
    mutations
} from '../../utils/sidebar-util';
import ProductItem from '../landing-one/ProductItem';
export default {
    data() {
        return {
            allProducts: []
        }
    },
    components: {
        QuckView,
        ProductItem
    },
    props: ['category'],
    methods: {
        toggle() {
            mutations.toggleQuickView();
        }
    },
    mounted() {
        const TOKEN = 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS';

        // var bodyFormData = new FormData();
        // bodyFormData.set("branch", this.branch);
        // bodyFormData.set("status_key", this.status);

        axios.request({
                method: "post",
                url: "http://august.webertela.online/rest/web/index.php?r=v1/products/list",
                headers: {
                    Authorization: "Bearer " + TOKEN,
                },
                // data: bodyFormData,
            })
            .then((response) => {
                console.log('Products Response: ', response);
                this.allProducts = response.data;
                this.allProducts.forEach((x) => {
                    x.qty = 1;
                    if (x.filePath === null) {
                        x.filePath = 'placeHolder.png';
                    }
                });
            });
    },
    computed: {
        products() {
            return this.$store.state.products.all
        },
        filteredOrders() {
            if (this.category.id == -1) {
                return this.allProducts;
            } else {
                return this.allProducts.filter((x) =>
                    x.catId == this.category.id
                );
            }
        },
    },
}
</script>

<template>
<div>

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <!-- <div class="container">
            <ul>
                <li>
                    <nuxt-link to="/">Home</nuxt-link>
                </li>
                <li>All Products</li>
            </ul>
        </div> -->

        <div class="container mt-20">
            <div class="row">
                <div class="col">
                    <div class="productsWrapper">
                        <img src="img/bred.svg" class="Group-9">
                        <div class="title">
                            01
                        </div>
                        <div class="titleSmall">
                            Breads
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="productsWrapper">
                        <img src="img/pastry.svg" class="Group-9">
                        <div class="title">
                            02
                        </div>
                        <div class="titleSmall">
                            Pastry
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="productsWrapper active">
                        <img src="img/foods.svg" class="Group-9">
                        <div class="title">
                            03
                        </div>
                        <div class="titleSmall">
                            Food
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="productsWrapper">
                        <img src="img/desserts.svg" class="Group-9">
                        <div class="title">
                            04
                        </div>
                        <div class="titleSmall">
                            Desserts
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="productsWrapper">
                        <img src="img/drinks.svg" class="Group-9">
                        <div class="title">
                            05
                        </div>
                        <div class="titleSmall">
                            Drinks
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="productsWrapper">
                        <img src="img/our.svg" class="Group-9">
                        <div class="title">
                            06
                        </div>
                        <div class="titleSmall">
                            Our Production 
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="productsWrapper">
                        <img src="img/benjy.svg" class="Group-9">
                        <div class="title">
                            07
                        </div>
                        <div class="titleSmall">
                            Benjy’s
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Page Title Area -->

    <!-- Start Collections Area -->
    <section class="products-collections-area ptb-60">
        <div class="container">
            <div class="section-title" >
                <span>Breads</span>
            </div>

            <div class="row">
                <!-- <Sidebar /> -->
                <AllProducts />
            </div>
        </div>
    </section>
    <!-- End Collections Area -->
</div>
</template>

<style scoped>
.col 
{
    padding-left: 0px;
    padding-right: 0px;
}

</style>

<script>
import Sidebar from '../components/all-products/Sidebar';
import AllProducts from '../components/all-products/AllProducts';
import axios from 'axios';
export default {
    components: {
        Sidebar,
        AllProducts
    },
    data() {
        return{
            allCategories: [],
            selectedCategory: null,
        }
    },
    mounted() {

        const TOKEN = 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS';
        
        // var bodyFormData = new FormData();
        // bodyFormData.set("branch", this.branch);
        // bodyFormData.set("status_key", this.status);

        axios.request({
            method: "post",
            url:
            "http://august.webertela.online/rest/web/index.php?r=v1/categories/list",
            headers: {
            Authorization: "Bearer " + TOKEN,
            },
            // data: bodyFormData,
        })
        .then((response) => {
            console.log('Catogeries Response: ', response);
            //this.allCategories = response.data;
            
            // this.allCategories.forEach((x) => {
            //     x.qty = 1;
            //     if(x.filePath === null){
            //         x.filePath = 'placeHolder.png';
            //     }
            // });
        });
    },
}
</script>

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

                <div class="col" v-for="category in allCategories" :key="category.id">
                    <div class="productsWrapper" :class="{ active : category.id == selectedCategory.id }" @click="selectCategory(category)">
                        <img :src="`http://august.webertela.online/dist/${category.img}`" class="Group-9">
                        <div class="title">
                            {{ category.menu_count }}
                        </div>
                        <div class="titleSmall">
                            {{ category.name }}
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
                <span>{{ selectedCategory.name }}</span>
            </div>
  </div>
  <div class="container">
            <div class="row">
                <!-- <Sidebar /> -->
                <AllProducts :category="selectedCategory" />
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
            selectedCategory: { id: -1 },
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
            this.allCategories = response.data;
        });
    },
    methods: {
        selectCategory(cat) {
            this.selectedCategory = cat;

        }
    },
}
</script>

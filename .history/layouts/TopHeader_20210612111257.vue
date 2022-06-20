<template>
<!-- Start Top Header Area -->
<div class="top-header none">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-2 col-md-3">
                <nuxt-link class="navbar-brand" to="/">
                    <img src="img/logo.png" alt="logo">
                </nuxt-link>
            </div>
            <div class="col-lg-10 col-md-8 ">
                <ul class="top-header-right-nav">
                    <!-- <li>
                        <nuxt-link to="/login">Login</nuxt-link>
                    </li>
                    <li>
                        <nuxt-link to="/signup">Signup</nuxt-link>
                    </li>
                    <li><nuxt-link to="/products">Products</nuxt-link></li> -->
                    <li>
                        <nuxt-link to="/contact">Contact</nuxt-link>
                    </li>
                    <li>
                        <a href="tel:+995598641315">+995 598 64 13 15</a>
                    </li>
                    <li>
                        <v-text-field append-icon="mdi-magnify" class="searchInner"></v-text-field>
                    </li>
                    <li>
                        <a @click="changeLang()" style="float:left; margin-right:20px; position: relative; bottom: 2px" >{{ this.langText }}</a><i class="fas fa-chevron-right"></i>
                    </li>
                    <!-- <li>
                        <nuxt-link to="/cart">Cart</nuxt-link>
                    </li> -->
                    <!-- <li>
                            <div class="languages-list">
                                <select>
                                    <option value="1">Eng</option>
                                    <option value="2">Ger</option>
                                    <option value="3">Span</option>
                                </select>
                            </div>
                        </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Top Header Area -->
</template>

<style>
.v-text-field.searchInner {
    width: 225px;
    height: 46px !important;
    border-radius: 24.5px;
    border: solid 1px #4a4a4a;
    padding:  12px;
}
.v-input__slot:before{
    border-bottom: none !important
}
.top-header-right-nav li{
margin-right: 35px;
    }

</style>

<script>
export default {
    data(){
        return{
            langText: '',
            lang: '',
        }
    },
    mounted(){
        const lang = this.$store.getters.language;

        if(lang == 'ka'){
            this.langText = 'ENG';
        }
        else {
            this.langText = 'ქართ';
        }
    },
    methods: {
        changeLang () {
        if(this.langText == 'ENG'){
            this.lang = 'en';
        }
        else {
            this.lang = 'ka';
        }
        this.$store.commit('SET_LANG', this.lang)
        
        this.$router.go();
        }
    }
}
</script>

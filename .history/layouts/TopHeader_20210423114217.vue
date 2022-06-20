<template>
    <!-- Start Top Header Area -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-lg-2 col-md-3">
                    <nuxt-link class="navbar-brand" to="/">
                            <img src="../assets/img/logo.png" alt="logo">
                        </nuxt-link>
                </div>
                <div class="col-lg-10 col-md-8">
                    <ul class="top-header-right-nav">
                        <li><nuxt-link to="/login">Login</nuxt-link></li>
                        <li><nuxt-link to="/signup">Signup</nuxt-link></li>
                        <li><nuxt-link to="/products">Products</nuxt-link></li>
                        <li><nuxt-link to="/contact">Contact</nuxt-link></li>
                        <li><a href="tel:+995598641315">+995 598 64 13 15</a></li>
                        <li><span class="searchInner"><i class="fas fa-shopping-bag"></i></span></li>
                        <li><nuxt-link to="/cart">Cart</nuxt-link></li>
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
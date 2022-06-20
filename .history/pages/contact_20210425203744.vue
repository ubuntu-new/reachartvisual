<template>
<div>
    <!-- <div class="page-title-area">
            <div class="container">
                <ul>
                    <li><nuxt-link to="/">Home</nuxt-link></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div> -->

    <section class="contact-area ptb-60 augustBackground">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="section-title">
                        <h1>Contact Us</h1>
                    </div>
                    <div class="contact-info">

                        <ul class="contact-list">
                            <li>E-mail: <a href="Info@augustbakery.com">Info@augustbakery.com</a></li>
                            <li>Phone: <a href="#">032 202 03 04</a></li>
                        </ul>
                    </div>

                    <div class="section-title mt-100">
                        <h1>Our Socials</h1>
                    </div>
                    <div class="contact-info">
                        <ul class="social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <!-- <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li> -->
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-5">
                    <div class="section-title">
                        <h1 class="mb-100">Our Locations</h1>
                        <table>
                            <tbody>
                                <tr v-for="location in allLOCATION" :key="locations">

                                    <td style="padding-right:40px ; border-right: solid 1px #ECECEC;">
                                        <h5>{{ location.number }}</h5>
                                    </td>
                                    <td style="padding-left:40px ; ">
                                        <h5>{{ location.title }}</h5>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
</template>

<style scoped>


</style>

<script>
import axios from 'axios'
export default {
    data: () => ({
        allLOCATION: [],
        location: {},
    }),
    mounted() {
        const TOKEN = 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS';

        axios.request({
                method: "post",
                url: "http://localhost/webertela-new/rest/web/index.php?r=v1/locations/list",
                headers: {
                    Authorization: "Bearer " + TOKEN,
                },

                // data: bodyFormData,
            })
            .then((response) => {
                console.log('Products Response: ', response);
                this.allLOCATION = response.data;
                this.location = this.allLOCATION[0];
            });
    },
}
</script>

<template>
<client-only>
    <div class="">
        <div class="AboutMain desktopiza">
            <table class="table table-bordered webetrla-table " CELLPADDING=0 CELLSPACING=0>
                <tbody>
                    <tr>
                        <td colspan="3">
                            <div class="container padding-none">
                                <table class="table " style="height: 80px; position: relative;">
                                    <tbody>
                                        <tr>
                                            <td style="width:25%;">&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td style="width:50%">
                                                <span class="cifraTitle">

                                                    01

                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered webetrla-table" CELLPADDING=0 CELLSPACING=0>
                <tbody>
                    <tr>
                        <td colspan="3">
                            <div class="container  padding-none" style="height: 706px;">
                                <table class="table" style="height: 100%; position: relative;">
                                    <tbody>
                                        <tr>
                                            <td style="width:25%;">
                                                <img src="img/about/about-first.jpg" class="one img-fluid">

                                            </td>
                                            <td><img src="img/about/about-second.jpg" class="two img-fluid"></td>
                                            <td style="width:50%" class="h-100">
                                                <div class="row h-100">
                                                    <div class="col-sm-12 my-auto text-left aboutiza" style="padding-left:80px;">
                                                        <h1 class="title">{{ about.title }}</h1>
                                                        <p>{{ aboutHalf1 }}</p>
                                                    </div>
                                                    <div class="col-sm-12  text-left" style="padding: 0 0 0 80px;">
                                                        <img src="img/group-2-copy.png" style="float:left">
                                                        <nuxt-link to="/about-full" style="float: left;
                                                        font-family: Montserrat;
                                                        font-size: 16px;
                                                        font-weight: 300;
                                                        font-stretch: normal;
                                                        font-style: normal;
                                                        line-height: 1.63;
                                                        letter-spacing: normal;
                                                        color: #f8f8f8;
                                                        padding: 12px 20px;">Explore more
                                                        </nuxt-link>
                                                    </div>
                                                </div>
                                                <img src="img/group-94.png" class="Group-94">
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered webetrla-table" CELLPADDING=0 CELLSPACING=0>
                <tbody>
                    <tr>
                        <td colspan="3">
                            <div class="container  padding-none">
                                <table class="table" style="height: 80px; position: relative;">
                                    <tbody>
                                        <tr>
                                            <td style="width:25%;">&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td style="width:50%">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    
</client-only>
</template>

<style scoped>
.left {
    position: relative;
    margin: 80px 0 !important;

}

.one {

    left: 0px;
    position: absolute;
    z-index: 1;
}

.padding-none {
    padding: 0px;
}

.Group-94 {
    width: 271px;
    height: 286px;

    object-fit: contain;
    transform: rotate(-14deg);
    opacity: 0.4;
}
</style>

<script>
import axios from 'axios'
export default {
    data: () => ({
        allABOUT: [],
        about: {},
        aboutHalf1: '',
        aboutHalf2: '',
    }),
    mounted() {
        const TOKEN = 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS';

        axios.request({
                method: "post",
                url: "http://august.webertela.online/rest/web/index.php?r=v1/about/list",
                headers: {
                    Authorization: "Bearer " + TOKEN,
                },

                // data: bodyFormData,
            })
            .then((response) => {
                console.log('about Response: ', response);
                this.allABOUT = response.data;
                this.about = this.allABOUT[0];

                var s = this.about.description;

                var middle = Math.floor(s.length / 2);
                var before = s.lastIndexOf(' ', middle);
                var after = s.indexOf(' ', middle + 1);

                if (middle - before < after - middle) {
                    middle = before;
                } else {
                    middle = after;
                }

                this.aboutHalf1 = s.substr(0, middle);
                this.aboutHalf2 = s.substr(middle + 1);
            });
    }
}
</script>

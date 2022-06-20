<template>
<client-only>
    <div class="AboutMain">
        <table class="table table-bordered webetrla-table" CELLPADDING=0 CELLSPACING=0>
            <tbody>
                <tr>
                    <td colspan="3">
                        <div class="container padding-none">
                            <table class="table" style="height: 80px; position: relative;">
                                <tbody>
                                    <tr>
                                        <td style="width:25%;">&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td style="width:50%">
                                            <span class="cifraTitle" >

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
                                            <img src="../../assets/img/about/about-first.jpg" class="one img-fluid">

                                        </td>
                                        <td><img src="../../assets/img/about/about-second.jpg" class="two img-fluid"></td>
                                        <td style="width:50%" class="h-100">
                                            <div class="row h-100">
                                                <div class="col-sm-12 my-auto text-left aboutiza" style="padding-left:80px;">
                                                    <h1 class="title">About Us</h1>
                                                    <p>Our olive oil is a celebration of the creativity of chefs and food fans the world over. We wouldn’t be here without them, so this page is all about the great work they do. In other words, these stories are about you.</p>
                                                </div>
                                            </div>
                                            <img src="../../static/img/group-94.png" class="Group-94">
                                            <img src="../../static/img/group-2-copy.png"  class="Group-2-Copy">
                                            <nuxt-link to="/about-full" class="Explore-More-Copy-4">Explore more</nuxt-link>
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

        <!-- 
        <div class="line-top">&nbsp;</div>
        
        <div class="container">
            <div class="row">
            
            <div class="col-md-6 col-sm-12 line-left line-right ">
                <div class="linee ">&nbsp;</div>
                
                <div class="left">
                    <img src="../../assets/img/about/about-first.jpg" class="one img-fluid">
                    <img src="../../assets/img/about/about-second.jpg" class="two img-fluid">
                </div>
            </div>

            <div class="col-md-6 col-sm-12 line-right">
                <div class="symbolia">01</div>
                <div class="d-table">
                                <div class="d-table-cell width-100">
                                    
                                            <h1>About Us</h1>
                                            <p>Our olive oil is a celebration of the creativity of chefs and food fans the world over. We wouldn’t be here without them, so this page is all about the great work they do. In other words, these stories are about you..</p>
                                        
                                </div>
                            </div>
            </div>
            </div>
        </div>
        <div class="line-bottom">&nbsp;</div> -->
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
.padding-none
{
    padding: 0px ;
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
export default {
    data() {
        return {
            items: [{
                    id: 1,
                    name: 'Jason Statham',
                    position: 'Actor at Crank',
                    feedback: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.',
                    image: require('../../assets/img/client1.jpg')

                },
                {
                    id: 2,
                    name: 'Jason Statham',
                    position: 'CEO at Assmble',
                    feedback: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.',
                    image: require('../../assets/img/client1.jpg')

                },
                {
                    id: 3,
                    name: 'Jason Statham',
                    position: 'Founder at Kramble',
                    feedback: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.',
                    image: require('../../assets/img/client1.jpg')

                },
            ]
        }
    }
}
</script>

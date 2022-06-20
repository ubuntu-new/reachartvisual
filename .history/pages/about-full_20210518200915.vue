<template>
<div class="container">
    <div class="row">
        <div class="col-12" style="height: 100px;">
            <span class="about-us">
               {{ about.title }}
            </span>
        </div>
    </div>
    <div class="row desktopiza">
        <div class="col-6 sm-12">
            <blockquote>
                <span class="about-quote">
                    {{ about.quote }}
                </span>
            </blockquote>

        </div>
        <div class="col-6">
            &nbsp;
        </div>
    </div>
   
    <div class="row ">
        <div class="col-12">
            <img  src="../assets/img/about/august-about-full.jpg" class="mx-auto d-block">
        </div>
    </div>
    <div class="row mt-60 mb-60">
        <div class="col-4  sm-12">
            <span class="about-us">
                {{ about.title }}
            </span>
        </div>
        <div class="col-4  sm-12">
          {{ aboutHalf1 }}
        </div>
        <div class="col-4  sm-12">
          {{ aboutHalf2 }}
        </div>
        <!-- <div class="col-4  sm-12">
         The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC, baking was introduced as an occupation and respectable profession for Romans.    
        </div> -->
    </div>
</div>
</template>

<style scoped>
.about-us {
    font-family: PlayfairDisplaySC;
    font-size: 30px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    vertical-align: middle;
    letter-spacing: normal;
    color: #949494;
    text-transform: uppercase;
}
.about-quote{
      font-size: 45px;
}
blockquote::before {
    position: absolute;left: 0px; right: 0px;
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
        
        // var bodyFormData = new FormData();
        // bodyFormData.set("branch", this.branch);
        // bodyFormData.set("status_key", this.status);

        axios.request({
            method: "post",
            url:
            "http://august.webertela.online/rest/web/index.php?r=v1/about/list",
            headers: {
            Authorization: "Bearer " + TOKEN,
            },
        
            // data: bodyFormData,
        })
        .then((response) => {
            console.log('Products Response: ', response);
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
    },
  }
</script>

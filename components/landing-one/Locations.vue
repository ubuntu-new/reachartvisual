<template>
<client-only>
    <div class="container locations mb-60">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h1 class="" style="margin-top:46px; margin-bottom:100px;">Our Locations</h1>
                <table>
                     
                    <tbody>
                        <span v-for="(location,index) in allLocation" :key="index">
                            <tr>
                                <td class="locationNumber" style="padding-right:40px ; border-right: solid 1px #ECECEC;"><span class="locationNumber">0{{ index+1 }}</span></td>
                                <td style="padding-left:40px ; ">{{ location.title }}</td>
                                
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                
                            </tr>
                        </span>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-sm-12 locations-bg">
                <img src="~/assets/img/about/locations.jpg" class="mx-auto d-block">
            </div>
        </div>
    </div>
</client-only>
</template>

<style scoped>
h1 {
   
  font-family: PlayfairDisplaySC;
  font-size: 50px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #131415;
 
}

.locations {
    background-color: white;
    padding: 0 0 0 120px;
}

.locations table tr td {
    height: 80px;
      font-family: PlayfairDisplaySC;
  font-size: 25px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #131415;
   text-transform: uppercase;
}
.locationNumber
{
  font-family: PlayfairDisplaySC;
  font-size: 36px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #131415;
}
</style>

<script>
import axios from 'axios'
export default {
    data: () => ({
      allLocation: [],
      location: {},
    }),
     mounted() {
        const lang = this.$store.getters.language;
        const TOKEN = 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS';
   

        axios.request({
            method: "post",
            url:
            "http://august.webertela.online/rest/web/index.php?r=v1/locations/list",
            headers: {
            Authorization: "Bearer " + TOKEN,
            },
        
            // data: bodyFormData,
        })
        .then((response) => {
            if(lang == 'ka'){
                this.allLocation = response.data;
                this.allLocation.forEach((x) => {
                    x.title_en = x.title;
                    x.title = x.title_ge;
                });
            } else {
                console.log('Products Response: ', response);
                this.allLocation = response.data;
            }
        });
    },
  }
</script>

<template>
<client-only>
    <div class="container locations mb-60">
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <h1 class="" style="margin-top:46px; margin-bottom:100px;">Our Locations</h1>
                <table>
                    <tbody>
                        <tr>
                            <td class="locationNumber" style="padding-right:40px ; border-right: solid 1px #ECECEC;"><span class="locationNumber">01</span></td>
                            <td style="padding-left:40px ; ">Tsereteli Avenue  N 55</td>
                            
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            
                        </tr>
                        <tr>
                            <td class="locationNumber" style="padding-right:40px ; border-right: solid 1px #ECECEC;"><span class="locationNumber">02</span></td>
                            <td style="padding-left:40px ; ">Alexandre Kazbegi St. 6</td>
                            
                        </tr>
                         <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            
                        </tr>
                        <tr>
                            <td  style="padding-right:40px ; border-right: solid 1px #ECECEC;"><span class="locationNumber">03</span></td>
                            <td style="padding-left:40px ; ">Tchavchavadze Av. 16</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5 col-sm-12 locations-bg">
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
export default {
}
</script>

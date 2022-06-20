<template>
<div class="ptb-60 augustBackground">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="faqTitle mt-100 mb-60">
                    <h2>Shop</h2>
                </div>
            </div>
            <div class="col-md-4" v-for="shop in allShop" :key="shop">

                <template>
                    <div class="faqiza">
            
                        

                            
                            <v-card class="mx-auto" color="grey lighten-4" max-width="600">
                                <img :aspect-ratio="16/9" :src="`http://art.webertela.online/backend/web/images/journal/${journal.filePath}`" class="ravImage" />
                        

                                <v-card-text class="pt-6" style="position: relative;">

                             
                                    <h3 class="text-h4 font-weight-light orange--text mb-2">
                                        {{ journal.name }}
                                    </h3>
                                    
                                        <a :href="journal.file" target="_blank">
                                            <h5>
                                                Go to the seller's page
                                            </h5>
                                        </a>
                                    <!-- <div class="font-weight-light text-h6 mb-2" v-html="artists.description" >
                                       {{ v-html }}
                                    </div> -->
                                </v-card-text>
                            </v-card>

                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>
.v-card--reveal {
    align-items: center;
    bottom: 0;
    justify-content: center;
    opacity: .5;
    position: absolute;
    width: 100%;
}

.artistsImage {
    max-height: 303px;
    width: 100%;
    object-fit: cover;
    object-position: center top;
}
</style>

<script>
import axios from 'axios'
export default {
    data: () => ({
        panel: [0],
        allJournal: [],
        disabled: false,
        readonly: false,
    }),
    mounted() {
        //const TOKEN = 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS';

        // var bodyFormData = new FormData();
        // bodyFormData.set("branch", this.branch);
        // bodyFormData.set("status_key", this.status);

        axios.request({
                method: "post",
                url: "http://art.webertela.online/rest/web/index.php?r=v1/Journal/list",

                // data: bodyFormData,
            })
            .then((response) => {
                console.log('Journal Response: ', response);
                this.allJournal = response.data;
            });
    }

}
</script>

<template>
<div class="ptb-60 augustBackground">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="faqTitle mt-100 mb-60">
                    <h2>Frequently Asked Questions</h2>
                </div>
            </div>
            <div class="col-4" v-for="artists in allArtists" :key="artists">

                <template>
                    <div class="faqiza">
                        <!-- <div class="d-flex">
                            <v-checkbox v-model="disabled" label="Disabled"></v-checkbox>
                        </div> -->

                        <!-- <v-expansion-panels v-model="panel" :disabled="disabled" multiple>

                            <v-expansion-panel v-for="faq in allFAQ" :key="faq">
                                <v-expansion-panel-header><h2>{{ faq.title }}</h2></v-expansion-panel-header>
                                <v-expansion-panel-content class="txt">
                                    <div v-html="faq.description"></div>
                                </v-expansion-panel-content>
                            </v-expansion-panel>

                        </v-expansion-panels> -->
                        <v-hover v-slot="{ hover }">
                            <v-card class="mx-auto" color="grey lighten-4" max-width="600">
                                <img :aspect-ratio="16/9" :src="`http://localhost/art_rest/backend/web/images/store/${artists.filePath}`"  class="artistsImage"/>
                               
                                    <v-expand-transition>
                                        <div v-if="hover" class="d-flex transition-fast-in-fast-out orange darken-2 v-card--reveal text-h2 white--text" style="height: 100%;">
                                            $14.99
                                        </div>
                                    </v-expand-transition>
                              
                                <v-card-text class="pt-6" style="position: relative;">
                                    <v-btn absolute color="orange" class="white--text" fab large right top>
                                        <v-icon>mdi-cart</v-icon>
                                    </v-btn>
                                    <!-- <div class="font-weight-light grey--text text-h6 mb-2">
                                        For the perfect meal
                                    </div> -->
                                    <h3 class="text-h4 font-weight-light orange--text mb-2">
                                       {{ artists.fullname }}
                                    </h3>
                                    <div class="font-weight-light text-h6 mb-2" v-html="artists.description">
                                       {{ v-html }}
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-hover>
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
.artistsImage
{
    max-height: 303px; width: 100%;
}
</style>

<script>
import axios from 'axios'
export default {
    data: () => ({
        panel: [0],
        allArtists: [],
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
                url: "http://localhost/art_rest/rest/web/index.php?r=v1/artists/list",

                // data: bodyFormData,
            })
            .then((response) => {
                console.log('Products Response: ', response);
                this.allArtists = response.data;
            });
    },
}
</script>

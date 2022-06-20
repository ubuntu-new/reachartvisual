<template>
<div class="ptb-60 augustBackground">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="faqTitle mt-100 mb-60">
                    <h2>Frequently Asked Questions</h2>
                </div>
                <template>
                    <div class="faqiza">
                        <!-- <div class="d-flex">
                            <v-checkbox v-model="disabled" label="Disabled"></v-checkbox>
                        </div> -->

                        <v-expansion-panels v-model="panel" :disabled="disabled" multiple>

                            <v-expansion-panel v-for="faq in allFAQ" :key="faq">
                                <v-expansion-panel-header><h2>{{ faq.title }}</h2></v-expansion-panel-header>
                                <v-expansion-panel-content class="txt">
                                    <div v-html="faq.description"></div>
                                </v-expansion-panel-content>
                            </v-expansion-panel>

                        </v-expansion-panels>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
export default {
    data: () => ({
      panel: [0],
      allFAQ: [],
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
            url:
            "http://august.webertela.online/rest/web/index.php?r=v1/faq/list",
        
            // data: bodyFormData,
        })
        .then((response) => {
            console.log('Products Response: ', response);
            this.allFAQ = response.data;
        });
    },
  }
</script>

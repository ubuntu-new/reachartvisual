<template>
<div class="ptb-60 augustBackground">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="faqTitle mt-100 mb-60">
                    <h2>Journal</h2>
                </div>
            </div>
            <div class="col-md-4" v-for="journal in allJournal" :key="journal">
                <template>
                    <div class="faqiza">
                        sdrterterte
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
                url: "https://art.webertela.online/rest/web/index.php?r=v1/journal/list",

                // data: bodyFormData,
            })
            .then((response) => {
                console.log('Journal Response: ', response);
                this.allJournal = response.data;
            });
    }

}
</script>

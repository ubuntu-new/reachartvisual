<template>
<div>

    <section class="blog-details-area mt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-details">
                        <div class="article-img">

                            <img :src="`https://reachartvisual.com/back_api/backend/web/images/store/${journal.filePath}`" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  mt-50">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-8">
                    <div class="article-content">

                        <h3 class="text-center title-detail mb-85">{{ journal.title }}</h3>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
            </div>
        </div>
</section>
        <div class="container-fluid fullBg">
            <div class="row">
                <div class="col-md-12  mt-75 mb-75">

                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-2">
                                <div class="share text-center">
                                    <p>Share</p>
                                    <p class="xazi">
                                        &nbsp;
                                    </p>
                                    <ul class="shareUl">
                                        <li class="shareLi"><img src="../assets/img/facebook.svg" class="facebook" @click="myFunction()"></li>
                                        <li class="shareLi"><img src="../assets/img/linkedin-1.svg" class="facebook"></li>
                                        <li class="shareLi"><img src="../assets/img/path.svg" class="facebook"></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="col-md-12 ">
                                <div class="blog-details" v-html="journal.description">
                                </div>
                                <span>
                                    {{ journal.facebook }}
                                </span>
                            </div>
                            <div class="col-md-2">&nbsp;</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'zegavlena_detail',
    data() {
        return {
			   id: this.$route.params.id,
            journal: {},
				journalList: [],
        }
    },
	 
  async created () {
	   //  let singleJournal = this.$route.params.journal
      //   if(singleJournal){
      //       this.journal = singleJournal
      //   }
      //   else {
      //       this.$router.push('journal');
      //   }
	},
    mounted() {
		//  alert(this .id);

		 const TOKEN = "RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS";

		axios
			.request({
				method: "post",
				url: "https://reachartvisual.com/back_api/rest/web/index.php?r=v1/journal/list",
				headers: {
					Authorization: "Bearer " + TOKEN,
				},
				// data: bodyFormData,
			})
			.then((response) => {
				console.log("journal Response: ", response);
				this.journalList = response.data;
				// this.journal = this.journalList.filter((x) =>  x.id == this.id );

				this.journalList.forEach(x => {
					if(x.id == this.id) {
						this.journal = x;
					}
				})
			});
      //   console.log('orderJournal: ', this.singleJournal);
    },
   //   methods:{
   //    myFunction: function () {   
   //        window.open( this.artists.facebook , "_blank");    
   //    },
   //  }
}
</script>

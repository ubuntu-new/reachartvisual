<template>
	<div class="main">
		<div class="container">
			<div class="row mb-20">
				<div class="col-12 mt-50">
					<span class="about-us ">
						<h1 class="mb-20"> {{ about.title }} </h1>
					</span>
					<p v-html=" about.description">
						<!-- {{ about.description }} -->
					</p>
				</div>
			</div>

			<div class="row mb-100">
				<div class="col-12">
					<img :src="`https://reachartvisual.com/back_api/backend/web/images/store/${about.filePath}`" />
				</div>
			</div>
			<!-- <ShareNetwork
				network="facebook"
				url="https://reachartvisual.com/about-full"
				media="https://reachartvisual.com/back_api/backend/web/images/store/Abouts/About1/b53a0c.jpg"
				title="Reach Art Visual – visual art consulting company. We create conceptual and creative content oriented on thematic essence, the foundation of which is to define art identity. Art Identity is an innovative concept of Reach Art Visual."
				description="Reach Art Visual – visual art consulting company. We create conceptual and creative content oriented on thematic essence, the foundation of which is to define art identity. Art Identity is an innovative concept of Reach Art Visual.
What is the purpose of art in real life and what personal characteristic can it be for us? We discover your art identity with you. With individual or corporate services, together we explore the infinite possibilities of artistic communication, in accordance with your needs and requirements."
				quote="The hot reload is so fast it\'s near instant. - Evan You"
				hashtags="reachartvisual"
			>
				Share on Facebook
			</ShareNetwork> -->
		</div>
	</div>
</template>

<style scoped>
</style>

<script>
import axios from "axios";

export default {
	data: () => ({
		allABOUT: [],
		about: {},
		aboutHalf1: "",
		aboutHalf2: "",
	}),

	mounted() {
		const TOKEN = "RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS";

		// var bodyFormData = new FormData();
		// bodyFormData.set("branch", this.branch);
		// bodyFormData.set("status_key", this.status);

		axios
			.request({
				method: "post",
				url: "https://reachartvisual.com/back_api/rest/web/index.php?r=v1/about/list",
				headers: {
					Authorization: "Bearer " + TOKEN,
				},

				// data: bodyFormData,
			})
			.then((response) => {
				console.log("Products Response: ", response);
				this.allABOUT = response.data;
				this.about = this.allABOUT[0];

				var s = this.about.description;

				var middle = Math.floor(s.length / 2);
				var before = s.lastIndexOf(" ", middle);
				var after = s.indexOf(" ", middle + 1);

				if (middle - before < after - middle) {
					middle = before;
				} else {
					middle = after;
				}

				this.aboutHalf1 = s.substr(0, middle);
				this.aboutHalf2 = s.substr(middle + 1);
			});
	},
	
    head() {
      return {
        title: 'Reach Art Visual',
        meta: [
          // hid is used as unique identifier. Do not use `vmid` for it as it will not work
          { hid: 'og-type', property: 'og:type', content: 'website' },
			 { hid: 'og-title', property: 'og:title', content: 'Reach Art Visual – visual art consulting company. ' },
			 { hid: 'og-desc', property: 'og:description', content: 'We create conceptual and creative content oriented on thematic essence, the foundation of which is to define art identity. Art Identity is an innovative concept of Reach Art Visual. What is the purpose of art in real life and what personal characteristic can it be for us? We discover your art identity with you. With individual or corporate services, together we explore the infinite possibilities of artistic communication, in accordance with your needs and requirements.' },
			 { hid: 'og-image', property: 'og:image',
  content: 'https://reachartvisual.com/back_api/backend/web/images/store/Abouts/About1/b53a0c.jpg'
},
{ hid: 'og-url', property: 'og:url', content: 'https://reachartvisual.com/about-full' },
        ]
      }
    }
};
</script>

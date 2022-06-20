<template>
	<div class="main">
		<div class="container">
			<div class="row mb-20">
				<div class="col-12 mt-50">
					<span class="about-us ">
						<h1 class="mb-20"> {{ about.title }} </h1>
					</span>
					<p v-html=" about.description">
						{{ about.description }}
					</p>
				</div>
			</div>

			<div class="row mb-100">
				<div class="col-12">
					<img :src="`https://reachartvisual.com/back_api/backend/web/images/store/${about.filePath}`" />
				</div>
			</div>

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
				url: "https://art.webertela.online/rest/web/index.php?r=v1/about/list",
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
};
</script>

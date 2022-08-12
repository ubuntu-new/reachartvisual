<template>
	<div class="main">
		<div class="pb-60 augustBackground">
			<div class="container">
				<div class="row">
					<div class="col-12 mt-60  mb-30">
						<span class="about-us ">
							<h1 class="mb-20">
								Artists
							</h1>
						</span>
					</div>
				</div>
				<div class="row">

					<div
						class="col-md-3"
						v-for="(artists, index) in allArtists"
						:key="index"
					>
						<template>
							<router-link
								class="maxLink"
								:to="{ name: 'artists-details', params: { artists: artists }}"
							>
								<div class="faqiza">
									<v-hover v-slot="{  }">
										<v-card
											class="mx-auto"
											color="grey lighten-4"
											max-width="600"
										>
											<img
												:src="`https://reachartvisual.com/back_api/backend/web/images/store/${artists.filePath}`"
												class="artistsImage"
											/>
											<v-card-text
												class="pt-6"
												style="position: relative;"
											>

												<h3 class="text-h4 font-weight-light orange--text mb-2">
													{{ artists.fullname }}
												</h3>
											</v-card-text>
										</v-card>
									</v-hover>
								</div>
							</router-link>
						</template>
					</div>
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
		opacity: 0.5;
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
import axios from "axios";
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

		axios
			.request({
				method: "post",
				url: "https://reachartvisual.com/back_api/rest/web/index.php?r=v1/artists/list",

				// data: bodyFormData,
			})
			.then((response) => {
				// console.log("Products Response: ", response);
				this.allArtists = response.data;
			});
	},
};
</script>

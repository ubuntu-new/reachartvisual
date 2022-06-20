<template>
	<div class="ptb-60 augustBackground main">
		<div class="container">
			<div class="row">
				<div class="col-12   mb-30">
					<span class="about-us ">
						<h1 class="mb-20">
							shop
						</h1>
					</span>
				</div>
			</div>
			<div class="row">
				<div
					class="col-md-3"
					v-for="shop in allShop"
					:key="shop"
				>

					<template>
						<div class="faqiza">

							<v-card
								class="mx-auto"
								color="grey lighten-4"
								max-width="600"
							>
								<img
									:aspect-ratio="16/9"
									:src="`https://art.webertela.online/backend/web/images/store/${shop.filePath}`"
									class="ravImage"
								/>

								<v-card-text
									class="pt-6"
									style="position: relative;"
								>

									<h3 class="text-h4 font-weight-light orange--text mb-2">
										{{ shop.name }}
									</h3>

									<a
										:href="shop.shopurl"
										target="_blank"
									>
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
		allShop: [],
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
				url: "https://art.webertela.online/rest/web/index.php?r=v1/shop/list",

				// data: bodyFormData,
			})
			.then((response) => {
				console.log("Shop Response: ", response);
				this.allShop = response.data;
			});
	},
};
</script>

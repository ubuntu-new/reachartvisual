<template>
	<div class="ptb-60 augustBackground main">
		<div class="container">
			<div class="row">
				<div class="col-12 mt-60  mb-30">
					<span class="about-us ">
						<h1 class="mb-20">
							Mus Haves
						</h1>
					</span>
				</div>
			</div>
			<div class="row">

				<div
					class="col-md-3"
					v-for="mus in allMus"
					:key="mus"
				>

					<template>
						<div class="faqiza">
							<v-hover v-slot="{  }">
								<router-link
									class="maxLink"
									:to="{ name: 'mus-details', params: { mus: mus }}"
								>
									<v-card
										class="mx-auto"
										color="grey lighten-4"
										max-width="600"
									>
										<img
											:src="`https://art.webertela.online/backend/web/images/store/${mus.filePath}`"
											class="musImage"
										/>
										<!--                                
                                    <v-expand-transition>
                                        <div v-if="hover" class="d-flex transition-fast-in-fast-out orange darken-2 v-card--reveal text-h2 white--text" style="height: 100%;">
                                            $14.99
                                        </div>
                                    </v-expand-transition> -->

										<v-card-text
											class="pt-6"
											style="position: relative;"
										>

											<!-- <div class="font-weight-light grey--text text-h6 mb-2">
                                        For the perfect meal
                                    </div> -->
											<h3 class="text-h4 font-weight-light orange--text mb-2">
												{{ mus.fullname }}
											</h3>
											<!-- <div class="font-weight-light text-h6 mb-2" v-html="artists.description" >
                                       {{ v-html }}
                                    </div> -->
										</v-card-text>
									</v-card>
								</router-link>
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
		allMus: [],
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
				url: "https://art.webertela.online/rest/web/index.php?r=v1/mus/list",

				// data: bodyFormData,
			})
			.then((response) => {
				console.log("Products Response: ", response);
				this.allMus = response.data;
			});
	},
};
</script>

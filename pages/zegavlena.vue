<template>
	<div class="main">
		<div class="ptb-60 augustBackground">
			<div class="container">
				<div class="row mb-100">
					<div class="col-12  mb-30">
						<span class="about-us ">
							<h1 class="mb-20">Zegavlena </h1>
						</span>
						<p>
							Influence (“ზეგავლენა” in Georgian) is a monthly online publication that introduces the dynamics of contemporary Georgian art and current cultural processes to a wide range of readers. Our concept is based
							on getting Georgian contemporary artists known, finding connections from art history, and discovering interesting and unknown visual materials through the thematic sections.
							Readers of the online edition will get inspiration for interior design through interviews, review blogs, high-quality exclusive design, and also get acquainted with the Georgian art reality from different angles.
							“Influence” - the name of the publication, is the name of Tea Nili’s concept book.
						</p>
						<p>
							Tea Nili’s concept through wordplay tells us about the influences, intangible values, and inspirations that are born around us.
							Tea Nili, Editor-in-Chief of this online publication and the author of the idea, based on visual research with ReachArt Visual Group and I-Studio, creates the concept of developing a personal aesthetic vision by discovering art. Art is an influence, an identifier, an integral part of our personality, character, and taste.
						</p>
					</div>
					<div
						class="col-md-3"
						v-for="journal in allJournal"
						:key="journal"
					>

						<template>
							<div class="faqiza">
								<v-hover v-slot="{  }">
									<v-card
										class="mx-auto"
										color="grey lighten-4"
										max-width="600"
									>
										<a
											:href="`https://reachartvisual.com/back_api/backend/web/images/${journal.pdf}`"
											target="_blank"
										>
											<img
												:src="`https://reachartvisual.com/back_api/backend/web/images/store/${journal.filePath}`"
												class="artistsImage"
											/>

											<v-card-text
												class="pt-6"
												style="position: relative;"
											>
<nuxt-link
								class="maxLink"
								:to="'zegavlena-details/'+journal.id"
							>
												<h3 class="text-h4 font-weight-light orange--text mb-2">
													{{ journal.title }}
												</h3>
												</nuxt-link>

											</v-card-text>
										</a>
									</v-card>
								</v-hover>
							</div>
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
		/* max-height: 303px; */
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
		allJournal: [],
		disabled: false,
		readonly: false,
	}),
	mounted() {
		const TOKEN = "RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS";

		// var bodyFormData = new FormData();
		// bodyFormData.set("branch", this.branch);
		// bodyFormData.set("status_key", this.status);

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
				this.allJournal = response.data;
			});
	},
};
</script>

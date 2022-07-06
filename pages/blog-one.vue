<template>
	<div class="main">
		<section>
			<div class="container">
				<div class="row">
					<div class="col-12 mt-60  mb-30">
						<span class="about-us ">
							<h1 class="mb-20">
								EVENTS & News
							</h1>
						</span>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container ptb-60">
				<div
					class="row  mb-30"
					v-for="news in allNews"
					:key="news.id"
				>
					<div class="col-md-2 col-sm-12">
						
					<span v-for="(image, index) in news.image" :key="index">
								<img  v-if="image.isMain == 1"  :src="`https://reachartvisual.com/back_api/backend/web/images/store/${image.filePath}`" />
							</span>
					</div>
					<div class="col-md-10">
						<div>
							<router-link
										class="maxLink"
										:to="{ name: 'blog-details', params: { news: news }}"
									>
							<h3 class="blogtitle">{{ news.title }}</h3>
							<p
								class="text"
								v-html="news.description"
							>
								&nbsp;
							</p>
							<p>&nbsp;</p>
							</router-link>
							<ul class="list-inline justify-content-center exploreMore">
								<li class="list-inline-item"><img
										src="~/assets/img/group-10.png"
										class="Group-10"
									></li>
								<li class="list-inline-item">
									<router-link
										class="maxLink"
										:to="{ name: 'blog-details', params: { news: news }}"
									>
										Explore more
									</router-link>
								</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</section>

	</div>
</template>

<style scoped>
	.blogTitle {
		font-family: "Playfair Display SC", serif;
		font-size: 41px;
		font-weight: normal;
		font-stretch: normal;
		font-style: normal;
		line-height: normal;
		letter-spacing: normal;
		color: #161e17;
	}
	.futured {
		font-family: "FiraGO", serif;
		font-size: 16px;
		font-weight: normal;
		font-stretch: normal;
		font-style: normal;
		line-height: 1.63;
		letter-spacing: normal;
		color: #131415;
	}
	.post p {
		font-family: "FiraGO", serif;
		font-size: 16px;
		font-weight: 200;
		font-stretch: normal;
		font-style: normal;
		line-height: 1.63;
		letter-spacing: normal;
		color: #131415;
	}
</style>

<script>
import axios from "axios";
export default {
	name: "blog",
	data() {
		return {
			allNews: [],
			featuredNews: {},
		};
	},
	mounted() {
		const lang = this.$store.getters.language;
		const TOKEN = "RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS";

		// var bodyFormData = new FormData();
		// bodyFormData.set("branch", this.branch);
		// bodyFormData.set("status_key", this.status);

		axios
			.request({
				method: "post",
				url: "https://reachartvisual.com/back_api/rest/web/index.php?r=v1/news/list",
				headers: {
					Authorization: "Bearer " + TOKEN,
				},
				// data: bodyFormData,
			})
			.then((response) => {
				if (lang == "ka") {
					console.log("Catogeries Response: ", response);
					this.allNews = response.data;
					this.allNews.forEach((x) => {
						(x.title_en = x.title),
						(x.title = x.title_ge),
						(x.description_en = x.description),
						(x.description = x.description_ge);
					});
					this.featuredNews = this.allNews.filter((x) => x.feautured == "1");
					console.log("featured: ", this.featuredNews);
				} else {
					console.log("Catogeries Response: ", response);
					this.allNews = response.data;
					this.featuredNews = this.allNews.filter((x) => x.feautured == "1");
					console.log("featured: ", this.featuredNews);
				}
			});
	},
	methods: {
		detailNews(item) {
			console.log("Item: ", item);
			this.$router.push({ path: "blog-details", props: { news: item } });
		},
	},
};
</script>

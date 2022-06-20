<template>
	<div>

		<section class="blog-details-area mt-90">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<h1 class="mb-20 blogtitle">{{ news.title }} </h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="blog-details">
							<!-- IS MAIN -->
							<span v-for="(image, index) in news.image" :key="index">
								<div class="article-img" v-if="image.isMain == 1">
									<img  :src="`https://reachartvisual.com/back_api/backend/web/images/store/${image.filePath}`" />
									<!-- <span v-else></span> -->
								</div>
							</span>

							<carousel>
							<slide v-for="(image, index) in news.image" :key="index">
								<img v-if="image.isMain != 1"  :src="`https://reachartvisual.com/back_api/backend/web/images/store/${image.filePath}`" />
							</slide>
							</carousel>
							
						</div>
					</div>
				</div>
				<!-- <div class="row  mt-50">
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8">
						<div class="article-content">
							<h3 class="text-center title-detail mb-85">{{ news.title }}</h3>
						</div>
					</div>
					<div class="col-md-2">&nbsp;</div>
				</div> -->
			</div>

			<div class="container-fluid fullBg">
				<div class="row">
					<div class="col-md-12  mt-75 mb-75">
						<div class="container">
							<div class="row">
								<div class="col-md-2">
									<div class="share text-center">
										<p>View</p>
										<p class="xazi">
											&nbsp;
										</p>
										<ul class="shareUl">
											<li class="shareLi"><img
													src="../assets/img/facebook.svg"
													class="facebook"
												></li>
											<li class="shareLi"><img
													src="../assets/img/linkedin-1.svg"
													class="facebook"
												></li>
											<li class="shareLi"><img
													src="../assets/img/path.svg"
													class="facebook"
												></li>
										</ul>
									</div>
								</div>
								<div class="col-md-8 ">
									<div
										class="blog-details"
										v-html="news.description"
									>
									</div>
								</div>
								<div class="col-md-2">&nbsp;</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';

export default {
	name: "news_detail",
	data() {
		return {
			news: {},
		};
	},
	components: {
		Carousel,
    	Slide
	},
	methods: {

  },
	created() {

		let singleNews = this.$route.params.news;
		if (singleNews) {
			this.news = singleNews;
		} else {
			this.$router.push("blog-one");
		}
	},
	mounted() {
		console.log("orderNews: ", this.news);
	},
};
</script>

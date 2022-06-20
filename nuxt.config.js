import axios from 'axios'

export default {
  generate: {
    routes() {
      // var lang = ['', '/en/', '/ru/'];
      const TOKEN = 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS'
      return axios
        .request({
          method: 'post',
          url: 'https://reachartvisual.com/back_api/rest/web/index.php?r=v1/journal/list',
          headers: {
            Authorization: 'Bearer ' + TOKEN,
          },
        })
        .then(res => {
          return res.data.map(journal => {
            for (let a = 0; a < 3; a++) {
              return {
                route: 'zegavlena-details/' + journal.id,
                payload: journal
              }
            }
          });
          // return ['/some-other-dynamic-route-or-array-of-routes/', ...users]
        })
    }
  },

  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    API_URL: "https://reachartvisual.com/back_api/rest/web/index.php?r=v1/",
    LOGIN_URL: "https://reachartvisual.com/back_api/rest/web/index.php?r=auth",

    htmlAttrs: {
      lang: 'en',
    },
    title: 'Reach art visual',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || 'Meta Description' },
      { property: 'og:image', content: "https://reachartvisual.com/images/share.png" || '' },
      { property: 'og:title', content: "Reach Art Visual – visual art consulting company. " },
      { property: 'og:type', content: "We create conceptual and creative content oriented on thematic essence, the foundation of which is to define art identity. Art Identity is an innovative concept of Reach Art Visual." },
      { property: 'og:url', content: "https://reachartvisual.com/" }


    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    { src: '~/plugins/vue-carousel', ssr: false },
    { src: '~/plugins/vue-backtotop', ssr: false },
    { src: '~/plugins/vue-toastification', ssr: false },
    { src: '~/plugins/vueperslides', ssr: false },
    { src: '~/plugins/vuex-persist', ssr: false },
    'plugins/i18n.js'
    // { src: '~/plugins/firebase' },
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://bootstrap-vue.js.org
    'bootstrap-vue/nuxt',
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    '@nuxtjs/vuetify',
  ],
  /*
  /*
  ** Global CSS
  */
  css: [
    './assets/scss/styles/animate.min.css',
    './assets/scss/styles/fontawesome.min.css',
    './assets/scss/styles/style.scss',
    './assets/scss/styles/admin.scss',
    './assets/scss/styles/responsive.scss',
  ],
  /** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
    proxy: true
  },
  /*
  ** Globally configure <nuxt-link> default active class.
  */
  router: {
    middleware: ['i18n'],
    linkActiveClass: 'active',
    base: '/'
  },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend(config, ctx) {
    }
  }
}

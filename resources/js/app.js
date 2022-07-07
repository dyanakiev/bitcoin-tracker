import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Vue
import { createApp } from 'vue'
import BitcoinChart from './components/BitcoinChart'
import SubscribeForm from './components/SubscribeForm'

const app = createApp({})

app.component('bitcoin-chart', BitcoinChart)
app.component('subscribe-form', SubscribeForm)

app.mount('#app')

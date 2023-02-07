import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";





// call fontawesome 
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import {library} from "@fortawesome/fontawesome-svg-core"
import {far} from "@fortawesome/free-regular-svg-icons";
import {fas} from "@fortawesome/free-solid-svg-icons";
import { fab } from '@fortawesome/free-brands-svg-icons'
import { faFacebook } from '@fortawesome/free-brands-svg-icons'

import AOS from 'aos';
import 'aos/dist/aos.css';






AOS.init();

library.add(fas,far,faFacebook,fab);

createApp(App).component("FIcons",FontAwesomeIcon).use(store).use(router).mount('#app')



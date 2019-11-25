require('./bootstrap');

window.Vue = require('vue');

// register modal component
import ModalComponent from './components/Modal.vue';
import ExampleComponent from './components/ExampleComponent.vue';

// start app
const app = new Vue({
    el: '#app',
    name: 'app',
    components: {
        'example-component': ExampleComponent
    },
});

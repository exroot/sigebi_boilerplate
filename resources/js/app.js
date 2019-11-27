require('./bootstrap');

window.Vue = require('vue');

// register modal component
import AddBookButton from './components/AddBookButton.vue';

// start app
const app = new Vue({
    el: '#app',
    name: 'app',
    components: {
        'add-book': AddBookButton
    },
});

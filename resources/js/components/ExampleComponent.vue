<script>
  import modal from './modals/CreateBookModal.vue';

  export default {
    components: {
      modal,
    },
    data () {
      return {
        isModalVisible: false,
      };
    },
    methods: {
      showModal: function() {
        this.isModalVisible = true;
      },
      closeModal: function() {
        this.isModalVisible = false;
      }
    }
  };
</script>

<template>
  <div>
    <button
      type="button"
      class="btn btn-primary"
      @click="showModal"
    >
      Open Modal!
    </button>

    <modal v-show="isModalVisible" @close="closeModal" />
  </div>
</template>

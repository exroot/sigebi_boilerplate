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
      <i class="fa fa-plus mr-1"></i>
      Add book
    </button>

    <modal v-show="isModalVisible" @close="closeModal" />
  </div>
</template>

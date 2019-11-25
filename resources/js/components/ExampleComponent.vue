<script>
  import modal from './Modal.vue';

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
      },
      message: function(event) {
        console.log('button clcked');
        this.$emit('click', this.page, event);
      }
    },
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

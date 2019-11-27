<script>
  export default {
    name: 'modal',
    methods: {
      close: function() {
        this.$emit('close');
      },
      postBook() {
          console.log('Registering Book');
      },
    },
  };
</script>

<template>
  <transition name="modal-fade">
    <div class="modal-backdrop" role="dialog">
      <div class="modal" ref="modal">
        <header class="modal-header">
          <slot name="header">
            <h2>
              Add new book!
            </h2>
            <button type="button" class="btn-close btn-right" @click="close" aria-label="Close modal">
              x
            </button>
          </slot>
        </header>

        <section class="modal-body">
          <slot name="body">
            <div class="container">

                <div class="input-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" required>
                </div>

                <div class="input-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" required></textarea>
                </div>

                <div class="input-group">
                    <label for="pages">Pages</label>
                    <input type="number" name="pages" id="pages" required>
                </div>

                <div class="input-group">
                    <label for="author">Author</label>
                    <select name="author">
                        <option value="">Pepe</option> 
                        <option value="">Juan2</option> 
                    </select>
                </div>

                <div class="input-group">
                    <label for="category">Category</label>
                    <select name="category">
                        <option value="">Category 1</option> 
                        <option value="">Category 2</option> 
                    </select>
                </div>

            </div>
          </slot>
        </section>

        <footer class="modal-footer">
          <slot name="footer">
            <button type="button" class="btn btn-danger" @click="close" aria-label="Close modal">
              Cancel
            </button>
            <button type="button" class="btn btn-primary" @click="postBook" aria-label="Add new book">
              Save
            </button>
          </slot>
        </footer>
      </div>
    </div>
  </transition>
</template>

<style>
  .modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    background: #FFFFFF;
    box-shadow: 0px 0px 20px 5px #8c8c8c;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 60vw;
    max-height: 80vh;
  }

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    justify-content: flex-end;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
  }

  .container {
      display: inline-block;
      padding: 5px;
  }
  
  .input-group {
      width: 50%;
      margin-left: auto;
      margin-right: auto;
  }

    label {
        padding-right: 5px;
        display: inline-block;
    }
    input {
        display: inline-block;
    }
    select {
        display: inline-block;
    }
    textarea {
        display: inline-block;
    }


  .btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }

  .modal-fade-enter,
  .modal-fade-leave-active {
    opacity: 0;
  }

  .modal-fade-enter-active,
  .modal-fade-leave-active {
    transition: opacity .5s ease
  }
</style>

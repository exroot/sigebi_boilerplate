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
            <h3 class="modal-title">
              Add new book!
            </h3>
            <button type="button" class="btn-close btn-right" @click="close" aria-label="Close modal">
              x
            </button>
          </slot>
        </header>

        <section class="modal-body">
          <slot name="body">
            <div class="container">
            <form action="/books" method="POST">
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
              </form>
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

<style scoped>
  :root {
    --primary: #2aa3b0;
  }
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
    width: 500px;
    height: 500px;
    max-width: 90%;
    max-height: 90%;
  }

  .modal-header,
  .modal-footer {
    padding: 10px;
    display: flex;
  }

  .modal-header {
    border-bottom: 1px solid #eeeeee;
    color: var(--teal);
    justify-content: space-between;
  }

   .modal-title {
    padding: 10px 0px 0px 10px;
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
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 90%;
    max-height: 100%;
    padding: 10px;
    overflow: auto;
    scrollbar-width: thin;
    background-color: #97d4af;
    border-bottom: 1px solid #dfe3e0;
  }
  
  .input-group {
      width: 85%;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 20px;
      font-family: 'Montserrat';
      font-size: 1.2em;
      display: block;
  }

  label {
      padding-right: 5px;
      font-weight: bold;
      color: #545360;
  }

  input, textarea, select {
    width: 100%;
    color: #6f6f6f;
  }

  input, textarea {
    padding: 5px;
  }

  select {
    display: block;
    margin-top: 5px;
    padding: 8px;
  }

  .btn {
    min-width: 20%;
  }

  .btn-close {
    font-size: 15px;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
    color: var(--teal);
    background: transparent;
  }

  .btn-green {
    color: white;
    background: var(--teal);
    border: 1px solid var(--teal);
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

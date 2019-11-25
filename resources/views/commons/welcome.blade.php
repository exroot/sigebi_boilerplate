@extends('layouts.app')

@section('title', 'SIGEBI')

@section('content')
    <h2>welcome everybody</h2>
    <ul>
        <li><a href="/books">Books</a></li>
        <li><a href="/authors">Authors</a></li>
        <li><a href="/">Inventary</a></li>
    </ul>
    <!-- use the modal component, pass in the prop -->
    <example-component />
    <!--Añadimos el js generado con webpack, donde se encuentra nuestro componente vuejs-->
    {{-- <script>
        Vue.component('modal', require('./components/ModalComponent.vue'));
    </script> --}}
@endsection
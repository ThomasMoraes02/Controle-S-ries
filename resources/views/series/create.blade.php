@extends('layout')


@section('cabecalho')
Adicionar Série
@endsection

@section('conteudo')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="#" method="post">
    @csrf
    <!-- Verificação de TOKEN  -->
    <div class="form-group">
        <label for='nome'>Nome</label>
        <input type="text" name="nome" id='nome' class='form-control'>
    </div>
    <button class="btn btn-primary">Adicionar</button>
</form>
@endsection
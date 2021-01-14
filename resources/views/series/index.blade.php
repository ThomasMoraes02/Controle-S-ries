@extends('layout')
<!-- Dizendo que essa view 'index' ESTENDE de layout.blade.php -->

@section('cabecalho')
<!-- O Template Blade trabalha com sessões e é preciso definir o que cada uma é -->
Series
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif


<a href="{{route('form_criar_serie')}}" class="mb-2 btn btn-dark">Adicionar</a>

<ul class='list-group'>
    @foreach($series as $serie)
    <li class='list-group-item d-flex justify-content-between align-items-center'>
        {{$serie->nome}}
        <form method="POST" action="/series/{{$serie->id}}"
            onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($serie->nome)}}?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Tarefas
                        </div>
                        <div class="col-6">
                            <div class="float-end">
                                <a href="{{ route('tarefa.create') }}" class="mr-5">Novo</a>
                                <a href="{{ route('tarefa.exportacao', ['formato' => 'xlsx']) }}" class="mr-5">Exportar XLSX</a>
                                <a href="{{ route('tarefa.exportacao', ['formato' => 'csv']) }}" class="mr-5">Exportar CSV</a>
                                <a href="{{ route('tarefa.exportacao', ['formato' => 'pdf']) }}" class="mr-5">Exportar PDF</a>
                                <!--<a href="#">Exportar domPDF</a>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data limite de conclusão</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tarefas as $tarefa)
                                <tr>
                                    <th>{{ $tarefa->id }}</th>
                                    <td>{{ $tarefa->tarefa }}</td>
                                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                                    <td><a href="{{ route('tarefa.edit', $tarefa->id) }}" class="btn btn-primary">Editar</a></td>
                                    <td>
                                        <form id="form_{{ $tarefa->id }}" method="post" action="{{ route('tarefa.destroy', ['tarefa' => $tarefa->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                        <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{ $tarefa->id }}').submit()">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>          
                      
                      <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>
                            
                            @for($i = 1; $i <= $tarefas->lastPage(); $i++)
                                <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a></li>
                            
                        </ul>
                      </nav>                                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

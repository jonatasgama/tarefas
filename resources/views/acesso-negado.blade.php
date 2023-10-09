@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Acesso negado</div>

                <div class="card-body">
                   Desculpe, mas você não tem acesso a esse item.<br>

                   <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Voltar</a>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection

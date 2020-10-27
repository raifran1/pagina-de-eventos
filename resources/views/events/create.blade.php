@extends('layouts.base')

@section('title', 'Crie seu evento')

@section('content')
    <div class="content" align='center'>
        <div class="col-12">
            <h4>Crie um evento</h4>
        </div>

        <div class="col-4" align='left'>
            <form action="{{ route('create_edit_evento_post') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Título:</strong>
                            <input type="text" name="title" class="form-control" placeholder="Título" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Descrição do evento:</strong>
                            <textarea type="text" name="description" class="form-control" placeholder="Descrição" ></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Data do evento:</strong>
                            <input type="date" name='date_event' class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="hidden" name='user_id' class="form-control" value="{{ Auth::user()->id }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
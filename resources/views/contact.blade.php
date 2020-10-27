@extends('layouts.base')

@section('title', 'Contatos')

@section('content')
    <div class="content">
        <div class="col-12">
            @if ($id != 1 || $id != null)
                <p>O id enviado é {{ $id }}</p>
            @endif
        </div>
    </div>
@endsection
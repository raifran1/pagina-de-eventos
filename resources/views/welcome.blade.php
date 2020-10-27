@extends('layouts.base')

@section('title', 'R Events')

@section('content')

    <h3>Confira todos os nossos eventos</h3>

    {{-- Diretivas de templates laravel --}}

    {{-- Diretiva de IF|ELSE|ELSEIF --}}
    {{-- @if($nome == 'p1')
        <p>O nome está correto</p>
    @elseif($nome == 'Raifran')
        <p> nome está certo</p>
    @else
        <p>Tudo errado</p>
    @endif --}}

    {{-- CHAVE DE VARIAVEL --}}
    {{-- <p>{{ $nome }}</p> --}}

    {{-- Diretiva de FOR --}}
    {{-- @for($i = 0; $i < count($arr); $i++)
        <p>{{ $arr[$i] }}</p>
    @endfor --}}

    {{-- Diretiva de execução de código PHP --}}
    {{-- @php
        $name = 'Raifran';
        echo $name;            
    @endphp --}}

    {{-- Igual o for mas ele percorre direto no array ao invés de acessarmos através do index --}}
    <div class="row">
        @foreach ($events as $event)
            <div class="card" style="width: 17rem; margin: 3px;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title" id='eventTitle{{ $loop->index }}'>{{ $event->title }}</h5>
                    <p class="card-text" id='eventDescription{{ $loop->index }}'>{{ $event->description }}</p>
                    <a href="#" class="btn btn-primary descEvent" data-toggle="modal" data-target="#modal-detail-event" id='{{ $loop->index }}'>Ver Mais</a>
                </div>
                    
                <div class="card-footer text-muted">
                    @php
                        $data_atual = (new DateTime())->format('Y-m-d');
                        $data_evento = (new DateTime($event->date_event))->format('Y-m-d');

                        $data_atual = DateTime::createFromFormat('Y-m-d', $data_atual);
                        $data_evento = DateTime::createFromFormat('Y-m-d', $data_evento);

                        if($data_atual < $data_evento){
                            $dateInterval = $data_atual->diff($data_evento);
                            echo  "<p>Faltam ", $dateInterval->days, " dia(s) para o evento</p>";
                        }else{
                            echo "<p style='color:red'>O evento já acabou</p>";
                        }
                        echo "<p id='date", $loop->index, "' style='display: none;'>", (new DateTime($event->date_event))->format('d/m/Y'),"</p>";
                    @endphp
                </div>
            </div>
        @endforeach
    </div>
    
    @if (count($events) >= 1 )
        @if (count($events) > 1)
            <nav class="col-12 mt-4">
                <ul class="pagination justify-content-end">
                    @if (request('page', 1) > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ route('home') }}?page={{ request('page', 1) - 1 }}" title='Anterior'>Anterior</a>
                        </li>
                    @endif
                    <li class="page-item">
                        <a class="page-link" href="#" title='Página {{ request('page', 1) }}'>Página {{ request('page', 1) }}</a>
                    </li>
                    @if (request('page', 1) < 2)
                        <li class="page-item">
                            <a class="page-link" href="{{ route('home') }}?page={{ request('page', 1) + 1 }}" title='Próximo'>Próximo</a>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    @else
        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading"></h4>
          <p>Não existe nenhum evento cadastrado</p>
          <p class="mb-0"></p>
        </div>
    @endif

    
    <div class="modal fade" id="modal-detail-event" tabindex="-1" aria-labelledby="modal-detail-eventLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-detail-eventLabel"></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <h5 class='modal-description'></h5>
                        <p class="modal-date"></p>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>  
        </div>
    </div>


    @section('ext_script')
        <script>
            $('.descEvent').click(function(){
                index = this.getAttribute('id');

                title_id = '#eventTitle' + index;
                title = $(title_id)[0].innerHTML;

                description_id = '#eventDescription' + index;
                description = $(description_id)[0].innerHTML;

                date_id = '#date' + index;
                date = $(date_id)[0].innerHTML;
                
                $(".modal-title").html(title);
                $(".modal-description").html('Sobre o evento: ' + description);
                $(".modal-date").html('A data do evento é prevista para o dia: ' + date);
            })
        </script>
    @endsection
@endsection

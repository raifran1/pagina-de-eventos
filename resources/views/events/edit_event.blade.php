<form action="{{ route('editar_evento_post', $event->id) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Título:</strong>
                <input type="text" name="title" class="form-control" placeholder="Título" value="{{ $event->title }}" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição do evento:</strong>
                <textarea type="text" name="description" class="form-control" placeholder="Descrição" required>{{ $event->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data do evento:</strong>
                <input type="date" name='date_event' class="form-control" value="{{ $event->date_event }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="hidden" name='user_id' class="form-control" value="{{ $event->user_id }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
</form>
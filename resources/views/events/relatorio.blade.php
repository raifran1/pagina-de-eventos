@extends('layouts.base')

@section('title', 'Relatórios')

@section('content')

    <h3>Gerador de Relatórios</h3>

    <form action="" method="">
        <div class='row'>
            <div class="form-group col-3">
                <strong>Data de inicio da pesquisa</strong>
                @php
                    $data_atual = DateTime::createFromFormat('Y-m-d', (new DateTime())->format('Y-m-d'));
                    echo "<input class='form-control' type='date' id='data_inicio' required value=", $data_atual,">";
                @endphp
                
            </div>
            <div class="form-group col-3">
                <strong>Data final:</strong>
                <input class="form-control" type='date' id='data_fim' required>
            </div>
            <div class="form-group col-2">
                <strong>Paginação</strong>
                <select class="form-control" id="exampleFormControlSelect1">
                <option>10 registros</option>
                <option>15 registros</option>
                <option>30 registros</option>
                <option>45 registros</option>
                <option>60 registros</option>
                </select>
            </div>
            <div class="col-4 pt-4">
                <button class="btn btn-primary btn-sm" id='relatorio' type="submit">Baixe o relatório</button>
            </div>
        </div>
    </form>

    @section('ext_script')
        <script src="/js/jspdf.debug.js"></script>
        <script>
            $('#relatorio').click(function(event){              
                event.preventDefault();
                $.ajax({
                    url: '/events/relatorio/?data_inicio=' + data_inicio + '&' + data_fim,
                    type: 'GET',
                    success: function(data) {	//função para rodar se a requisição for efetuada com sucesso.. http code == 200
                        $('#edit_event').html(data);
                    },
                    error: function() {
                        console.log('tudo errado');
                    }
                }); 

                var generateData = function() {
                var result = [];
                var data = [
                    {
                        data_do_evento: "27/11/2020",
                        participantes: "20485861",
                        usuario_que_criou: "1", 
                    },
                    {
                        data_do_evento: "27/11/2020",
                        participantes: "000",
                        usuario_que_criou: "1", 
                    }
                    
                ];

                for (list in data) {
                    data[list].id = (parseInt(list) + 1).toString();
                    result.push(Object.assign({}, data[list]));
                    console.log(data[list]);
                }
                return result;
                };

                function createHeaders(keys) {
                var result = [];
                for (var i = 0; i < keys.length; i += 1) {
                    result.push({
                    id: keys[i],
                    name: keys[i],
                    prompt: keys[i],
                    width: 65,
                    align: "center",
                    padding: 0
                    });
                }
                return result;
                }

                var headers = createHeaders([
                "id",
                "data_do_evento",
                "participantes",
                "usuario_que_criou",
                ]);

                var doc = new jsPDF({ putOnlyUsedFonts: true, orientation: "landscape" });
                doc.table(1, 1, generateData(), headers, { autoSize: false });

                doc.save('relatorio.pdf')
            })
        </script>
    @endsection
@endsection

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /* Referente ao erro que gerou na hora de iniciar o index 
    (não reconheceu a tabela - por padrão ele tenta advinhar o nome da tabela)*/
    public $table = 'events';
    protected $fillable = [
        'title', 'description', 'date_event', 'user_id'
    ];
}

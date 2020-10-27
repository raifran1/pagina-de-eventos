<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{   
    public function index(){
        $events = Event::latest()->paginate(12);
  
        return view('welcome',compact('events'))->with('i', request()->input('page', 1));
    }

    public function my_events(){
        $events = Event::where('user_id', auth()->user()->id )->latest()->paginate(12);
        return view('events.my_events',compact('events'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(Request $request){
        if ($request == 'POST'){
            $validadeData = $request->validate([
                'title' => ['required'],
                'description' => [],
                'date_event' => ['required'],
                'user_id' => ['required'],
            ]);
        
            Event::updated($validadeData);
        
            return redirect()->route('my_events')->with('success','Evento cadastrado com sucesso.');
        }else{
            return view('events.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
       /* Validação do cadastro em banco */
       
       $validadeData = $request->validate([
        'title' => ['required'],
        'description' => [],
        'date_event' => ['required'],
        'user_id' => ['required'],
        ]);

        Event::create($validadeData);

        return redirect()->route('my_events')->with('success','Evento cadastrado com sucesso.');
    }

    // (ClassModel variavel-da-url, Class var) 
    public function edit(Event $event, Request $request){  
        if ($request->isMethod('post')){
            
            $validadeData = $request->validate([
                'title' => ['required'],
                'description' => [],
                'date_event' => ['required'],
                'user_id' => ['required'],
            ]);
            $event->update($validadeData);
            
            return redirect()->route('my_events')->with('success','Evento atualizado com sucesso.');
                
        }elseif ($request->isMethod('get')){
           
            return view('events.edit_event',compact('event'));
       
        } 
        
    }

    // (ClassModel, variavel-da-url) 
    public function delete(Event $id){
        $id->delete();
  
        return redirect()->route('my_events')
                        ->with('success','O evento cadastrado foi deletado com sucesso');
    }

     // (Relatórios) 
     public function relatorios(){
        return view('events.relatorio');
    }
}


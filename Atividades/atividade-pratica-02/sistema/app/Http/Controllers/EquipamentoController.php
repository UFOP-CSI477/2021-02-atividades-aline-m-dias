<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;

use App\Http\Requests\StoreEquipamentoRequest;
use App\Http\Requests\UpdateEquipamentoRequest;


class EquipamentoController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos = Equipamento::orderBy('nome')->paginate(20);
        return view('equipamentos.index', ['equipamentos' => $equipamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('equipamentos.create');

        //  if (Auth::check()) {
        //     $estados = Estado::orderBy('nome')->get();
        //     return view('cidades.create', [ 'estados' => $estados]);
        // } else {
        //     session()->flash('mensagem-erro', 'Operação não permitida!');
        //     return redirect()->route('home');
        // }
     
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipamentoRequest  $request)
    {
        if ( Equipamento::create($request->all()) ) {
            session()->flash('mensagem', 'Equipamento inserido com sucesso!');
            return redirect()->route('equipamentos.index');
        } else {
            session()->flash('mensagem-erro', 'Erro na gravação do Equipamento');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function show(Equipamento $equipamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipamento $equipamento)
    {
        $equipamentos = Equipamento::orderBy('nome')->get();
        return view('equipamentos.edit', 
            [ 
                'equipamento' => $equipamento
                
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipamentoRequest $request, Equipamento $equipamento)
    {
        $equipamento->fill($request->all());
        if ($equipamento->save()) {
            session()->flash('mensagem', 'Equipamento atualizado com sucesso!');
            return redirect()->route('equipamentos.index');
        } else {
            session()->flash('mensagem-erro', 'Erro na atualização do Equipamento!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipamento $equipamento)
    {
        if($equipamento->delete()) {
            session()->flash('mensagem', 'Equipamento excluído com sucesso!');
            return redirect()->route('equipamentos.index');
        } else {
            session()->flash('mensagem-erro', 'Erro na exclusão do equipamento!');
            return back();
        }
    }
}

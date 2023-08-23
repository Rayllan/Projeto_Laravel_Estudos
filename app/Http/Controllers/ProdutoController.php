<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $produtos = Produto::paginate(5);
        $categorias = Categoria::all();
        
        return view('admin.produtos',compact('produtos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = $request->all();

        if($request->imagem){
           $produto['imagem'] = $request->imagem->store('produtos');
        }

        $produto['slug'] = Str::slug($request->nome);

        $produto = Produto::create($produto);

        return redirect()->route('admin.produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       // Carrega os detalhes do produto do banco de dados
       //$produto = Produto::find($id);

       // Verifique os dados do produto antes de passá-lo para a view
       //dd($produto); // Ou var_dump($produto);

       // Passa o objeto $produto para a view "details"
       //return view('details', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto -> delete();
        return redirect()->route('admin.produtos')->with('sucesso-delete', 'Produto removido!');
    }
}

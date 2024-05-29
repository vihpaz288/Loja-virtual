<?php

namespace App\Http\Controllers;

use App\Models\ImageProduto;
use App\Models\produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class produtoController extends Controller
{
    // public function index()
    // {
    //     return view('Produto.index');
    // }
    public function favoritos()
    {
        return view('Produto.favoritos');
    }
    public function create()
    {
        return view('Produto.create');
    }
    public function store(Request $request)
    {
       


            // if ($request->file("file1")) {
            //     $path1 = $request->file("file1")->store('produto', 'public');
            //     $request['foto1'] = $path1;
            // }
            // dd($request->except('file1', '_token'));

           
            $criar = Produto::create($request->except('file1', '_token'));
            if (!$criar) {
               
                return redirect()->back()->with('falha', 'Não foi possivel criar o produto');
            }

            foreach ($request->file1 as $key => $value) {
                $caminhoDaImagem = $value->store('produto', 'public');
                $criarProduto = ImageProduto::create([
                    'produtoId'    => $criar->id,
                    'image'        => $caminhoDaImagem
                ]);
                if (!$criarProduto) {
                  
                    return redirect()->back()->with('falha', 'Não foi possivel criar o produto');
                }
            }

          
            return redirect()->route('index')->with('success', 'Produto cadastrado com sucesso.');
      
        
        
    }
    public function detalhes($id)
    {
        $produtos = Produto::with('image')->find($id);
        if (!$produtos) {
            return redirect()->back();
        }
        return view('Produto.index', compact('produtos'));
    }
    public function buscar()
    {
        $search = request('search');

        if ($search) {
            $produtos = Produto::where([
                ['descrição', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $produtos = Produto::all();
        }

        return view('Index', compact('produtos'));
    }
    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        return redirect()->route('index');
    }
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

        return view('Produto.edit', ['produto' => $produto]);
    }

    // public function update(Request $request)
    // {
    //     try {


    //         // if ($request->file("file1")) {
    //         //     $path1 = $request->file("file1")->store('produto', 'public');
    //         //     $request['foto1'] = $path1;
    //         // }
    //         // dd($request->except('file1', '_token'));

    //         DB::beginTransaction();
    //         $editar = Produto::update($request->except('file1', '_token'));
    //         if (!$editar) {
    //             DB::rollBack();
    //             return redirect()->back()->with('falha', 'Não foi possivel criar o produto');
    //         }

    //         foreach ($request->file1 as $key => $value) {
    //             $caminhoDaImagem = $value->update('produto', 'public');
    //             $editar = ImageProduto::update([
    //                 'produtoId'    => $editar->id,
    //                 'image'        => $caminhoDaImagem
    //             ]);
    //             if (!$editar) {
    //                 DB::rollBack();
    //                 return redirect()->back()->with('falha', 'Não foi possivel criar o produto');
    //             }
    //         }

    //         DB::commit();
    //         return redirect()->route('index')->with('success', 'Produto cadastrado com sucesso.');
    //     } catch (\Exception $ex) {
    //         DB::rollBack();
    //         return redirect()->back();
    //     }
        //    Produto::findOrFail($request->id)->update($request->all());

        //    return redirect()->route('index');

        // $produto = Produto::findOrFail($request->id);
        // dd($request->all());
        // // Verifica se foi enviada uma nova foto
        // if ($request->hasFile('nova_foto')) {
        //     // Armazena a nova foto e obtém o caminho do arquivo
        //     $caminho_foto1 = $request->file('nova_foto1')->store('produto', 'public');
        //     $caminho_foto2 = $request->file('nova_foto2')->store('produto', 'public');
        //     $caminho_foto3 = $request->file('nova_foto3')->store('produto', 'public');

        //     // Atualiza o caminho da foto no produto
        //     $produto->foto1 = $caminho_foto1;
        //     $produto->foto2 = $caminho_foto2;
        //     $produto->foto3 = $caminho_foto3;

        // }

        // // Atualiza os outros campos do produto
        // $produto->nome = $request->nome;
        // $produto->valor = $request->valor;
        // $produto->quantidade = $request->quantidade;
        // $produto->descrição = $request->descrição;

        // // Adicione outros campos conforme necessário

        // // Salva as alterações no banco de dados
        // $produto->save();

        // return redirect()->route('index');
        // }


    //         $produto = Produto::findOrFail($request->id);

    //         $produto->nome = $request->nome;
    //         $produto->valor = $request->valor;
    //         $produto->quantidade = $request->quantidade;
    //         $produto->descrição = $request->descrição;
    //         if ($request->hasFile("foto1")) {
    //             // Remove a foto anterior, se existir
    //             // Storage::disk('public')->delete($produto->foto1);


    //             // // Armazena a nova foto e obtém o caminho do arquivo
    //             // $caminho_foto1 = $request->file("nova_foto1")->store('produto', 'public');

    //             // // Atualiza o caminho da nova foto no produto
    //             // $produto->foto1 = $caminho_foto1;
    //             $file = $request->file('foto1');
    //             $extension = $file->getClientOriginalExtension();
    //             $filename = time() . '.' . $extension;
    //             $file->move('produto', 'public');
    //             $produto->foto1 = $filename;
    //         }

    //         // Atualiza os outros campos do produto
    //         // Adicione outros campos conforme necessário

    //         // Salva as alterações no produto
    //         $produto->update();

    //         return redirect()->route('index')->with('success', 'Produto atualizado com sucesso.');

    //     }
 }


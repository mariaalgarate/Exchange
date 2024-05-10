<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categories/index', compact('categorias'));
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categories/index')->with('success', 'Categoría creada con éxito');
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view('categories/edit', [
            'categoria' => $categoria
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Encuentra el producto por su ID
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;

        $categoria->update($request->all());
        return redirect('categories')->with('success', 'Categoría actualizada con éxito');
    }

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categories/index')->with('success', '¡Producto eliminado exitosamente!');
    }


    public function electronics(){
        // Obtener productos de la categoría "Electrónica"
        $categoria = Categoria::where('nombre', 'Electrónica')->first();

        if (!$categoria) {
            return abort(404, 'Categoría no encontrada');
        }
        $productos = $categoria->productos;
        return view('categories/technology', ['productos' => $productos]);
    }

    public function homeappliances(){
        // Obtener productos de la categoría "Electrónica"
        $categoria = Categoria::where('nombre', 'Electrodomésticos')->first();
    
        if (!$categoria) {
            return abort(404, 'Categoría no encontrada');
        }
        $productos = $categoria->productos;
        return view('categories/home-appliances', ['productos' => $productos]);
    }


        public function clothes(){
            // Obtener productos de la categoría "Electrónica"
            $categoria = Categoria::where('nombre', 'Ropa')->first();

            if (!$categoria) {
                return abort(404, 'Categoría no encontrada');
            }
            $productos = $categoria->productos;
            return view('categories/clothes', ['productos' => $productos]);
        }

        public function household(){
            // Obtener productos de la categoría "Electrónica"
            $categoria = Categoria::where('nombre', 'Hogar')->first();

            if (!$categoria) {
                return abort(404, 'Categoría no encontrada');
            }
            $productos = $categoria->productos;
            return view('categories/household-items', ['productos' => $productos]);
        }

    




}

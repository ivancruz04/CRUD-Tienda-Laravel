<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo; //manda a llamar al controlador

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all(); //nos trae todos los registros de la tabla
                                      //y los guarda en la variable $articulo
                                      
        //la variable se envia a la vista para que ponga todos los registros en la tabla con whit
        return view('articulo.index')->with('articulos',$articulos); //retornar la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //create nos muestra la vista del formulario de creacion de registro
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //store es para guardar los datos en la BD
    public function store(Request $request)
    {
        //el modelo articulo es una clase y para ello hacemos una instancia para esa clase
        $articulos = new Articulo(); 

        //se asigna a la variable articulos lo que recibe del formulario
        $articulos->codigo = $request->get('codigo');//el codigo de get viene del lo que recibe en el formulario
        $articulos->descripcion = $request->get('descripcion');
        $articulos->cantidad = $request->get('cantidad');
        $articulos->precio = $request->get('precio');

        $articulos->save();//la funcion save es para guardar todo en la tabla de la bd

        return redirect('/articulos'); //funcion para que cuando guarde regrese a la tabla de articulos
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //esta funcion solo nos retornara la vista con los datos del registro seleccionado
        //la funcion que almacena los nuevos datos es update
        //se aplica la funcion find para que nos devuelva un solo articulo de acuerdo al id
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo', $articulo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //funcion para almacenar los datos en la bd (datos nuevos)
        //el modelo articulo es una clase y para ello hacemos una instancia para esa clase
        $articulo = Articulo::find($id);

        //se asigna a la variable articulos lo que recibe del formulario de
        $articulo->codigo = $request->get('codigo');//el codigo de get viene del lo que recibe en el formulario
        $articulo->descripcion = $request->get('descripcion');
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');

        $articulo->save();//la funcion save es para guardar todo en la tabla de la bd

        return redirect('/articulos'); //funcion para que cuando guarde regrese a la tabla de articulos
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect('/articulos');
    }
}

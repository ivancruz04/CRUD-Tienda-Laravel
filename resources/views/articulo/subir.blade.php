@extends('articulo.plantillabase');

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Subir Imagenes</h1>
                <form action="" method="get">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="file" id="">
                    </div>
                    <button type="submit" class="btn btn-primary">Subir imagen</button>
                </form>
            </div>
        </div>
    </div>


@endsection
@extends('base')
@section('content')

        <div class="row card z-depth-3">
            <div class="col s6 m6" style="margin-top: 50px;">
                <hr>
                @foreach($producto as $item)
                    <img class="materialboxed responsive-img z-depth-4" width="650" src="storage/disenos/{{$item->diseno}}">
                @endforeach
                <hr>
            </div>
            <div class="col s4 m6" style="color: black;">
                @foreach($producto as $item)
                    <h3 style="font-family: Georgia">{{$item->nombre}}</h3>
                    <hr>
                    <p style="color: #dd0007; font-size: 20px">
                        <strong>Precio: MXN${{$item->costo}}</strong><br>
                    </p>
                    <p style="font-size: 20px;">Tipo de producto: {{$item->tipo}} <br><br>Categoría: {{$item->categoria}}<br><br>Género: {{$item->sexo}}</p>
                    <form action="carrito" method="post">
                        {{csrf_field()}}
                        <p style="font-size: 20px">Tallas</p>
                        <p>
                            <label>
                                <input name="tallas" type="radio" value="Chica" checked/>
                                <span>Chica</span>
                            </label>
                            <label>
                                <input name="tallas" type="radio" value="Mediana"/>
                                <span>Mediana</span>
                            </label>
                            <label>
                                <input name="tallas" type="radio" value="Grande"/>
                                <span>Grande</span>
                            </label><br><br>
                        <p class="range-field" style="font-size: 20px;">
                            Cantidad:
                            <input class="input validate" type="number" name="cantidad" min="1" placeholder="Ingrese la cantidad" value="1">
                            <input name="id" class="hide" type="text" value="{{$item->id_producto}}">
                        </p>
                        @if(Session::has('tipo'))
                            <button class="btn grey darken-4 z-depth-2 waves-effect waves-light" type="submit"><i class='material-icons left'>add_shopping_cart</i>Agregar al carrito</button>
                            @else
                            <p style="font-size: 18px"><strong>Inicia sesión para poder comprar nuestros productos!</strong></p>
                        @endif
                        <br>
                        <br>
                    </form>
                    @endforeach
            </div>
        </div>


    @endsection

@section('js')
    <script>
        // Or with jQuery
        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });
        $(document).ready(function(){
            $('.tooltip').tooltip();
        });
    </script>
    @endsection

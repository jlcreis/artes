@extends ('novoProduto')

@section ('categoriaProduto')

<label>Categorias</label>

<div class="row">
    @foreach ($categorias as $c)
        <div class="col-md-3">
            <label>
                <input name="categoria[]" id="{{$c->categoria}}" value="{{$c->id}}" type="checkbox" class="checkboxGrande"/>
                {{$c->categoria}}
            </label>
        </div>
    @endforeach
</div>

@stop
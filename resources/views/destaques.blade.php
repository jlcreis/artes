@extends ('publico.bem_vindo')
@section ('conteudo')

@foreach ($produtos as $p)

<p>{{$p->nome}}</p>    

@endforeach

@stop
@extends ('publico.bem_vindo')
@section ('conteudo')


<!-- carousel padrao -->
<div id="carousel" class="carousel slide">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach ($destaques as $key=> $p)
            @if ($key == 0)
            <div class="item active" align="center">
                <img src="/img/{{$p->nome}}" alt="img_{{$p->id}}" class="img_carousel">
                <div class="carousel-caption">
                    {{$p->nome}}
                </div>
            </div>
            @else
            <div class="item" align="center">
                <img src="/img/{{$p->nome}}" alt="img_{{$p->id}}" class="img_carousel">
                <div class="carousel-caption">
                    {{$p->nome}}
                </div>
            </div>
            @endif
        @endforeach
    </div><!--carousel inner-->
    
    <a href="#carousel" class="left carousel-control" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a href="#carousel" class="right carousel-control" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    
</div><!--carousel-->

<!--Item slider text-->
<div class="container">
  <div class="row" id="slider-text">
    <div class="col-md-6" >
      <h2>Destaques</h2>
    </div>
  </div>
</div>
<!-- Item slider-->
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="itemslider">
        <div class="carousel-inner">
            @foreach ($destaques as $key=> $p)
                @if ($key == 0)
                <div class="item active">
                    <div class="col-xs-12 col-sm-6 col-md-2">
                      <a href="#"><img src="/img/{{$p->nome}}" class="img-responsive center-block" width="200" height="200"></a>
                      <h4 class="text-center">...</h4>
                      <h5 class="text-center">...</h5>
                    </div>
                </div>
                @else 
                <div class="item">
                    <div class="col-xs-12 col-sm-6 col-md-2">
                      <a href="#"><img src="/img/{{$p->nome}}" class="img-responsive center-block"></a>
                      <h4 class="text-center">...</h4>
                      <h5 class="text-center">...</h5>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <div id="slider-control">
        <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a>
        <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- Item slider end-->



@stop
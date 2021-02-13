@extends('laravel-usp-theme::master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/programas.css') }}">
@endsection

@section('content')

@include ('programas.partials.search')

<div class="card">
  <div class="card-header"><h3>{{ $content['nome'] }}</h3></div>
  <div class="card-body">

    <ul class="list-group">
      @if($content['resumo'])
        <li class="list-group-item">
          <div class="panel panel-default panel-discente">
              <div class="panel-heading">
                  <h5 role="button" data-toggle="collapse" href="#collapseResumo"  aria-controls="collapseResumo" 
                    {{$section_show == 'resumo' ? "aria-expanded=true" : "aria-expanded=false class=collapsed"}}
                  >
                  Resumo
                      <span class="controller-collapse">
                          <i class="fas fa-plus-square"></i>
                          <i class="fas fa-minus-square"></i>  
                      </span>
                  </h5>
              </div>
              <div class="panel-body collapse in {{ $section_show == 'resumo' ?  'show' : ''}}" id="collapseResumo">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <p>{{ $content['resumo'] }}</p>
                    </li>
                  </ul>
              </div>
          </div>
        </li>
      @endif

      @if($content['linhas_pesquisa'])
        <li class="list-group-item">
          <div class="panel panel-default panel-discente ">
              <div class="panel-heading">
                  <h5 role="button" data-toggle="collapse" href="#collapseLinhaPesquisa" aria-controls="collapseLinhaPesquisa"
                  {{$section_show == 'linhas_pesquisa' ? "aria-expanded=true" : "aria-expanded=false class=collapsed"}}>
                      Linhas de pesquisa
                      <span class="controller-collapse">
                        <i class="fas fa-plus-square"></i>
                        <i class="fas fa-minus-square"></i>  
                      </span>
                  </h5>
              </div>
              <ul class="list-group collapse in  {{ $section_show == 'linhas_pesquisa' ?  'show' : ''}}" id="collapseLinhaPesquisa">
                  @foreach($content['linhas_pesquisa'] as $key => $value)
                      <li class="list-group-item"> {{ $value }} </li> 
                  @endforeach 
              </ul>
              
          </div>
        </li>
      @endif

      @if($content['livros'])
        <li class="list-group-item">
          <div class="panel panel-default panel-discente">
              <div class="panel-heading">
                  <h5 role="button" data-toggle="collapse" href="#collapseLivrosPublicados"  aria-controls="collapseLivrosPublicados"
                  {{$section_show == 'livros' ? "aria-expanded=true" : "aria-expanded=false class=collapsed"}}>
                      Livros publicados: {{count($content['livros'])}}
                      <span class="controller-collapse">
                        <i class="fas fa-plus-square"></i>
                        <i class="fas fa-minus-square"></i>  
                      </span>
                  </h5>
              </div>
              
              <ul class="list-group collapse in {{ $section_show == 'livros' ?  'show' : ''}}" id="collapseLivrosPublicados">
                  @foreach($content['livros'] as $key => $value)
                      <li class="list-group-item">
                          
                        @foreach($value['AUTORES'] as $k=>$val)
                        <?php
                            if(strpos($val["NOME-PARA-CITACAO"], ';') !== false){
                                echo explode(';', $val["NOME-PARA-CITACAO"])[0];
                            }else {
                                echo $val["NOME-PARA-CITACAO"]; 
                            }
                        ?>
                        @if( $k + 1 <  count($value['AUTORES']))
                            ;
                        @else
                            .
                        @endif
                        @endforeach
                        
                      
                      {{ $value["TITULO-DO-LIVRO"] }}. 
                      {{ $value["CIDADE-DA-EDITORA"] }}: {{ $value["NOME-DA-EDITORA"] }},
                      {{ $value["ANO"] }}. {{ $value["NUMERO-DE-PAGINAS"] }}p. 
                      
                      </li>
                      @endforeach
              </ul>
            
          </div>
        </li>
      @endif


      @if($content['artigos'])
      <li class="list-group-item">
        <div class="panel panel-default panel-discente">
            <div class="panel-heading">
                <h5 role="button" data-toggle="collapse" href="#collapseArtigos"  aria-controls="collapseArtigos"
                {{$section_show == 'artigos' ? "aria-expanded=true" : "aria-expanded=false class=collapsed"}}>
                    Artigos completos publicados em periódicos: {{count($content['artigos'])}}
                    <span class="controller-collapse">
                        <i class="fas fa-plus-square"></i>
                        <i class="fas fa-minus-square"></i>  
                    </span>
                </h5>
            </div>
            
            <ul class="list-group collapse in {{ $section_show == 'artigos' ?  'show' : ''}}" id="collapseArtigos">
                @foreach($content['artigos'] as $key=>$value)
                    <li class="list-group-item">
                        @foreach($value['AUTORES'] as $k=>$val)
                        <?php
                            if(strpos($val["NOME-PARA-CITACAO"], ';') !== false){
                                echo explode(';', $val["NOME-PARA-CITACAO"])[0];
                            }else {
                                echo $val["NOME-PARA-CITACAO"]; 
                            }
                        ?>
                        @if( $k + 1 <  count($value['AUTORES']))
                            ;
                        @else
                            .
                        @endif
                        @endforeach
                        
                        
                        {{ $value["TITULO-DO-ARTIGO"] }}. 
                        {{ $value["TITULO-DO-PERIODICO-OU-REVISTA"] }},
                        v. {{ $value["VOLUME"] }},
                        p. {{ $value["PAGINA-INICIAL"] }} - {{ $value["PAGINA-FINAL"] }},
                        {{ $value["ANO"] }}.
                    </li>
                @endforeach
            </ul>
            
        </div>
      </li>
      @endif

      @if($content['capitulos'])
      <li class="list-group-item">
        <div class="panel panel-default panel-discente"> 
            <div class="panel-heading">
                <h5 role="button" data-toggle="collapse" href="#collapseCapitulos" aria-controls="collapseCapitulos"
                {{$section_show == 'capitulos' ? "aria-expanded=true" : "aria-expanded=false class=collapsed"}}>
                
                    Capítulos publicados: {{count($content['capitulos'])}}
                    <span class="controller-collapse">
                        <i class="fas fa-plus-square"></i>
                        <i class="fas fa-minus-square"></i>  
                    </span>
                </h5>
            </div>
            
            <ul class="list-group collapse in  {{ $section_show == 'capitulos' ?  'show' : ''}}" id="collapseCapitulos">
                @foreach($content['capitulos'] as $key=>$value)
                    <li class="list-group-item">
                         
                        @foreach($value['AUTORES'] as $k=>$val)
                        <?php
                            if(strpos($val["NOME-PARA-CITACAO"], ';') !== false){
                                echo explode(';', $val["NOME-PARA-CITACAO"])[0];
                            }else {
                                echo $val["NOME-PARA-CITACAO"]; 
                            }
                        ?>
                        @if( $k + 1 <  count($value['AUTORES']))
                            ;
                        @else
                            .
                        @endif
                        @endforeach
                        
                        
                        
                        {{ $value["TITULO-DO-CAPITULO-DO-LIVRO"] }}. 
                        {{ $value["TITULO-DO-LIVRO"] }},
                        v. {{ $value["NUMERO-DE-VOLUMES"] }},
                        p. {{ $value["PAGINA-INICIAL"] }} - {{ $value["PAGINA-FINAL"] }},
                        {{ $value["ANO"] }}.
                    </li>
                @endforeach
            </ul>
        </div>
     </li>
      @endif
     
      @if($content['jornal_revista'])
      <li class="list-group-item">
        <div class="panel panel-default panel-discente"> 
            <div class="panel-heading">
                <h5 role="button" data-toggle="collapse" href="#collapsejornal_revista" aria-controls="collapsejornal_revista"
                {{$section_show == 'jornal_revista' ? "aria-expanded=true" : "aria-expanded=false class=collapsed"}}>
                
                    Textos em jornais de notícias/revistas: {{count($content['jornal_revista'])}}
                    <span class="controller-collapse">
                        <i class="fas fa-plus-square"></i>
                        <i class="fas fa-minus-square"></i>  
                    </span>
                </h5>
            </div>
            
            <ul class="list-group collapse in  {{ $section_show == 'jornal_revista' ?  'show' : ''}}" id="collapsejornal_revista">
                @foreach($content['jornal_revista'] as $key=>$value)
                    <li class="list-group-item">
                         
                        @foreach($value['AUTORES'] as $k=>$val)
                        <?php
                            if(strpos($val["NOME-PARA-CITACAO"], ';') !== false){
                                echo explode(';', $val["NOME-PARA-CITACAO"])[0];
                            }else {
                                echo $val["NOME-PARA-CITACAO"]; 
                            }
                        ?>
                        @if( $k + 1 <  count($value['AUTORES']))
                            ;
                        @else
                            .
                        @endif
                        @endforeach
                        
                        
                        {{ $value["TITULO"] }}. 
                        {{ $value["TITULO-DO-JORNAL-OU-REVISTA"] }},
                        {{ $value["LOCAL-DE-PUBLICACAO"] }},
                        <?php
                            if(isset($value["DATA"])){
                                $meses = ['', 'jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez']; 
                                echo substr($value["DATA"],0,2) .' '. $meses[(int)substr($value["DATA"],2,2)] .'. '. substr($value["DATA"],4,4) .'.';
                            }
                        ?>
                    </li>
                @endforeach
            </ul>
        </div>
     </li>
      @endif
      
      @if($content['trabalhos_anais'])
      <li class="list-group-item">
        <div class="panel panel-default panel-discente"> 
            <div class="panel-heading">
                <h5 role="button" data-toggle="collapse" href="#collapsetrabalhos_anais" aria-controls="collapsetrabalhos_anais"
                {{$section_show == 'trabalhos_anais' ? "aria-expanded=true" : "aria-expanded=false class=collapsed"}}>
                
                    Trabalhos em Anais: {{count($content['trabalhos_anais'])}}
                    <span class="controller-collapse">
                        <i class="fas fa-plus-square"></i>
                        <i class="fas fa-minus-square"></i>  
                    </span>
                </h5>
            </div>
            
            <ul class="list-group collapse in  {{ $section_show == 'trabalhos_anais' ?  'show' : ''}}" id="collapsetrabalhos_anais">
                @foreach($content['trabalhos_anais'] as $key=>$value)
                    <li class="list-group-item">
                         
                        @foreach($value['AUTORES'] as $k=>$val)
                        <?php
                            if(strpos($val["NOME-PARA-CITACAO"], ';') !== false){
                                echo explode(';', $val["NOME-PARA-CITACAO"])[0];
                            }else {
                                echo $val["NOME-PARA-CITACAO"]; 
                            }
                        ?>
                        @if( $k + 1 <  count($value['AUTORES']))
                            ;
                        @else
                            .
                        @endif
                        @endforeach
                        
                        {{ $value["TITULO"] }}. 
                        @if($value["NOME-DO-EVENTO"] )
                        In: {{ $value["NOME-DO-EVENTO"] }},
                        {{ $value["ANO"] }}, {{ $value["CIDADE-DO-EVENTO"] }}.
                        @endif

                        {{ $value["TITULO-DOS-ANAIS-OU-PROCEEDINGS"] }}.

                        @if($value["NOME-DA-EDITORA"] )
                            {{ $value["CIDADE-DA-EDITORA"] }}: {{ $value["NOME-DA-EDITORA"] }},
                        @endif
                        {{ $value["ANO-DE-REALIZACAO"] }}.

                        @if($value["PAGINA-INICIAL"] )
                            p. {{ $value["PAGINA-INICIAL"] }}-{{ $value["PAGINA-FINAL"] }}.
                        @endif
                        
                    </li>
                @endforeach
            </ul>
        </div>
     </li>
      @endif
      
      @if($content['outras_producoes_bibliograficas'])
      <li class="list-group-item">
        <div class="panel panel-default panel-discente"> 
            <div class="panel-heading">
                <h5 role="button" data-toggle="collapse" href="#collapseoutras_producoes_bibliograficas" aria-controls="collapseoutras_producoes_bibliograficas"
                {{$section_show == 'outras_producoes_bibliograficas' ? "aria-expanded=true" : "aria-expanded=false class=collapsed"}}>
                
                    Outras Produções Bibliográficas: {{count($content['outras_producoes_bibliograficas'])}}
                    <span class="controller-collapse">
                        <i class="fas fa-plus-square"></i>
                        <i class="fas fa-minus-square"></i>  
                    </span>
                </h5>
            </div>
            
            <ul class="list-group collapse in  {{ $section_show == 'outras_producoes_bibliograficas' ?  'show' : ''}}" id="collapseoutras_producoes_bibliograficas">
                @foreach($content['outras_producoes_bibliograficas'] as $key=>$value)
                    <li class="list-group-item">
                         
                        @foreach($value['AUTORES'] as $k=>$val)
                        <?php
                            if(strpos($val["NOME-PARA-CITACAO"], ';') !== false){
                                echo explode(';', $val["NOME-PARA-CITACAO"])[0];
                            }else {
                                echo $val["NOME-PARA-CITACAO"]; 
                            }
                        ?>
                        @if( $k + 1 <  count($value['AUTORES']))
                            ;
                        @else
                            .
                        @endif
                        @endforeach
                        
                        
                        {{ $value["TITULO"] }}. 
                        {{ $value["CIDADE-DA-EDITORA"] }}
                        @if($value["EDITORA"] )
                            :{{ $value["EDITORA"] }},
                        @endif
                        {{ $value["ANO"] }}
                        @if($value["TIPO"] )
                            ({{ $value["TIPO"] }})
                        @endif


                        <?php
                            if(isset($value["DATA"])){
                                $meses = ['', 'jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez']; 
                                echo substr($value["DATA"],0,2) .' '. $meses[(int)substr($value["DATA"],2,2)] .'. '. substr($value["DATA"],4,4) .'.';
                            }
                        ?>
                    </li>
                @endforeach
            </ul>
        </div>
     </li>
      @endif
      
      @if($content['trabalhos_tecnicos'])
      <li class="list-group-item">
        <div class="panel panel-default panel-discente"> 
            <div class="panel-heading">
                <h5 role="button" data-toggle="collapse" href="#collapsetrabalhos_tecnicos" aria-controls="collapsetrabalhos_tecnicos"
                {{$section_show == 'trabalhos_tecnicos' ? "aria-expanded=true" : "aria-expanded=false class=collapsed"}}>
                
                    Apresentação de trabalhos técnicos: {{count($content['trabalhos_tecnicos'])}}
                    <span class="controller-collapse">
                        <i class="fas fa-plus-square"></i>
                        <i class="fas fa-minus-square"></i>  
                    </span>
                </h5>
            </div>
            
            <ul class="list-group collapse in  {{ $section_show == 'trabalhos_tecnicos' ?  'show' : ''}}" id="collapsetrabalhos_tecnicos">
                @foreach($content['trabalhos_tecnicos'] as $key=>$value)
                    <li class="list-group-item">
                         
                        @foreach($value['AUTORES'] as $k=>$val)
                        <?php
                            if(strpos($val["NOME-PARA-CITACAO"], ';') !== false){
                                echo explode(';', $val["NOME-PARA-CITACAO"])[0];
                            }else {
                                echo $val["NOME-PARA-CITACAO"]; 
                            }
                        ?>
                        @if( $k + 1 <  count($value['AUTORES']))
                            ;
                        @else
                            .
                        @endif
                        @endforeach
                        
                        
                        {{ $value["TITULO"] }}. 
                        {{ $value["ANO"] }}

                    </li>
                @endforeach
            </ul>
        </div>
     </li>
      @endif
    </ul>

  </div>
</div>

@endsection('content')

@section('javascripts_bottom')
  <script src="{{ asset('assets/js/programas.js') }}"></script>
@endsection 
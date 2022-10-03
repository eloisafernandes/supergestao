<h3>Fornecedor</h3>

{{-- Aqui está o comentário --}}


{{-- Incluir trecho de php puro --}}
@php 
    //para comentários
    /* 
    {{}} - <? ?>
    são sinonimos
    */
    //echo 'oi'

   
@endphp

{{--@dd($fornecedoresUnless)--}}

{{-- Operadores if e else --}}
@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem menos que 10 fornecedores cadastrados</h3>
@elseif (count($fornecedores) > 9)
    <h3>Existem 10 ou mais fornecedores cadastrados</h3>
@else 
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif

{{-- unless retorna se a condição for falsa --}}

<br/>
Fornecedor: {{$fornecedoresUnless[0]['nome']}}<br>
Status: {{$fornecedoresUnless[0]['status']}}

@if ($fornecedoresUnless[0]['status'] == 'N')
    <h4>Fornecedor inativo</h4>
@else
    <h4>Fornecedor ativo</h4>
@endif

<!-- unless: executa se o retorno da condição for false -->

@unless($fornecedoresUnless[0]['status'] == 'S') 
    <h4>Fornecedor inativo</h4>
@endunless

<!-- isset: testa se uma variável existe -->
{{--@isset($fornecedoresUnless[0]['cnpj'])
    Nome: {{$fornecedoresUnless[0]['nome']}}
    <br>
    Status: {{$fornecedoresUnless[0]['status']}}
    <br>
    Cnpj: {{$fornecedoresUnless[0]['cnpj']}}
    @empty($fornecedoresUnless[0]['cnpj'])
        Vazio
    @endempty
    <br>
    Telefone:
    @switch($fornecedoresUnless[0]['ddd'])
        @case('83')
            Paraíba - PB
            @break
        @case('84')
            Rio Grande do Norte - RN
            @break
        @default
            Estado não identificado
            @break
    @endswitch
@endisset
<br>
@isset($fornecedoresUnless[1]['nome'])
    Nome: {{$fornecedoresUnless[1]['nome']}}
    <br>
    Status: {{$fornecedoresUnless[1]['status']}}
    <br>
    Cnpj: {{$fornecedoresUnless[1]['cnpj'] ?? 'dado não foi preenchido'}}
    <!-- se a variavel não existir ou se possuir valor null ?? -->
    <br>
    Telefone:
    @switch($fornecedoresUnless[1]['ddd'])
        @case('83')
            Paraíba - PB
            @break
        @case('84')
            Rio Grande do Norte - RN
            @break
        @default
            Estado não identificado
            @break
    @endswitch
@endisset--}}
<br>
@isset($fornecedoresUnless)
    @for($i = 0; $i < count($fornecedoresUnless); $i++) 
        Nome: {{$fornecedoresUnless[$i]['nome']}}
        <br>
        Status: {{$fornecedoresUnless[$i]['status']}}
        <br>
        Cnpj: {{$fornecedoresUnless[$i]['cnpj'] ?? 'Vazio'}}
        @empty($fornecedoresUnless[$i]['cnpj'])
            vazio
        @endempty
        <br>
        Telefone:
        @switch($fornecedoresUnless[$i]['ddd'])
            @case('83')
                Paraíba - PB
                @break
            @case('84')
                Rio Grande do Norte - RN
                @break
            @default
                Estado não identificado
                @break
         
        @endswitch
        <hr>
    @endfor

@endisset

<br>
@for($i = 0; $i < 10; $i++)
    {{$i }}<br>
@endfor
{{$i = 0}}

<h2>Com while</h2>
@while(isset($fornecedoresUnless[$i])) 
        Nome: {{$fornecedoresUnless[$i]['nome']}}
        <br>
        Status: {{$fornecedoresUnless[$i]['status']}}
        <br>
        Cnpj: {{$fornecedoresUnless[$i]['cnpj'] ?? 'Vazio'}}
        @empty($fornecedoresUnless[$i]['cnpj'])
            vazio
        @endempty
        <br>
        Telefone:
        @switch($fornecedoresUnless[$i]['ddd'])
            @case('83')
                Paraíba - PB
                @break
            @case('84')
                Rio Grande do Norte - RN
                @break
            @default
                Estado não identificado
                @break
         
        @endswitch
        <hr>
        {{$i++}}
@endwhile


<h2>Com foreach</h2>
@foreach($fornecedoresUnless as $indice => $fornecedor) 
        Nome: {{$fornecedor['nome']}}
        <br>
        Status: {{$fornecedor['status']}}
        <br>
        Cnpj: {{$fornecedor['cnpj'] ?? 'Vazio'}}
        @empty($fornecedor['cnpj'])
            vazio
        @endempty
        <br>
        Telefone:
        @switch($fornecedor['ddd'])
            @case('83')
                Paraíba - PB
                @break
            @case('84')
                Rio Grande do Norte - RN
                @break
            @default
                Estado não identificado
                @break
         
        @endswitch
        <hr>
        
@endforeach
<h2>Uso de caracteres especiais</h2>
@{{aqui vai xser impresso as chaves normais}}

<h2>Com forelse</h2>
@isset($fornecedoresUnless)
    @forelse($fornecedoresUnless as $indice => $fornecedor) 

            Iteração atual: {{$loop ->iteration}}<br>
            Nome: {{$fornecedor['nome']}}
            <br>
            Status: {{$fornecedor['status']}}
            <br>
            Cnpj: {{$fornecedor['cnpj'] ?? 'Vazio'}}
            @empty($fornecedor['cnpj'])
                vazio
            @endempty
            <br>
            Telefone:
            @switch($fornecedor['ddd'])
                @case('83')
                    Paraíba - PB
                    @break
                @case('84')
                    Rio Grande do Norte - RN
                    @break
                @default
                    Estado não identificado
                    @break
            
            @endswitch
            <br>
            Iteração atual: {{$loop ->iteration}}<br>
            <!-- Uso do loop -->
            @if($loop->first)
                Primeira iteração<br>
            @endif
            
           

            @if($loop->last)
                Última iteração
                <br>
                Total de registos {{$loop->count}}<br>
                @dd($loop)
            @endif
            <hr>


        @empty
            Não existem fornecedores cadastrados


    @endforelse
@endisset


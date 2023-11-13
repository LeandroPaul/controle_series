<x-layout title="Editar Série">
    <form method="post" action="{{route('series.update')}}">
       @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{$serie->nome}}"class="form-control"/>
            <input type="hidden" name="id" id="id" value="{{$serie->id}}"class="form-control"/>
        </div>
        <button class="btn btn-primary">Atualizar</button>
   </form>   
</x-layout>
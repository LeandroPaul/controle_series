<x-layout title="Adicionar Série">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post" action="{{route('series.store')}}">
       @csrf

       <div class="row mb-3">
            <div class="col-8">       
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" 
                class="form-control"/>       
            </div>

            <div class="col-2">       
                <label for="seasonsQty">Temporadas</label>
                <input type="text" name="seasonsQty" id="seasonsQty" 
                class="form-control"/>       
            </div>

            <div class="col-2">       
                <label for="episodesPerSeason">Episodios</label>
                <input type="text" name="episodesPerSeason" id="episodesPerSeason" 
                class="form-control"/>       
            </div>          

        </div>
        <button class="btn btn-primary">adicionar</button>
   </form>   
</x-layout>
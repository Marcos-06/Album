@extends('/layouts/main')
@section('content')
@include('/partials/navbar')
<div class="container">
  <!-- Coluna Btn voltar -->
  <div class="row">
    <div class="col-12 my-4">
      <a href="/"><i class="fas fa-arrow-left me-2"></i>Voltar</a>
    </div>
    <!-- Coluna Tabela -->
    <div class="col-12 mb-5">
      <div class="card shadow bg-white rounded">
        <div class="card-header gradient text-white">
          <h2 class="card-title p-3">
            <i class="fas fa-image"></i>
            Fotos cadastradas
          </h2>
        </div>
        <div class="card-body p-4">
          <table class="table table-hover text-center">
            <thead class="">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Titulo</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              @if($photos->isEmpty())
                <tr>
                  <td colspan="5" class="p-5">
                    <h1 class="display-6 text-secondary"><i class="far fa-sad-tear"></i>Nenhuma Foto Cadastrada</h1>
                  </td>
                </tr>
              @endif

              @foreach($photos as $photo)
              <tr class="align-middle">
                <td>{{$photo->id}}</td>
                <td><img class="img-thumbnail" width="230" style="object-fit: cover; height:130px" src="{{url("/storage/photos/$photo->photos_url")}}" alt=""></td>
                <td>{{$photo->title}}</td>
                <td>{{$photo->date}}</td>
                <td>
                  <a href="/photos/edit/{{$photo->id}}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationModal" data-photo-id="{{$photo->id}}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!--fim do card-body -->
      </div><!-- fim do card -->
    </div><!-- fim da coluna da tabela -->
  </div>
  <!--fim da row -->
</div><!-- fim do container -->

<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Deseja Realmente Excluir Essa Foto?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="/photos/" method="POST" id="formDeletePhoto">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger" type="submit">Sim, excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('/js/script.js')}}"></script>

@endsection

@extends('app')

@section('title', 'Editar movimento')

@section('navegacao')
    <div class="col-3 bg-secondary text-white-50 vh-100">
        <p class="text-center mt-3 mb-5 fw-bold fs-4"> 
            <i class="fas fa-money-bill-wave"></i> 
            APP FINANÇAS
        </p>

        <p class="text-center mt-3 mb-5"> 
            <i class="fas fa-user fa-4x"></i><br>
            Olá, <?php $user = auth()->user(); echo $user->name; ?>
        </p>

        

        <nav class="nav flex-column text-center">
            <a class="nav-link text-white" href="{{route('dashboard')}}">Extrato</a>
            <a class="nav-link text-white" href="{{route('novo_movimento')}}">Novo Movimento</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit(); " role="button">
                    <i class="fas fa-sign-out-alt"></i>
    
                    {{ __('Log Out') }}
                </a>
            </form>
        </nav>
    </div> 
@endsection

@section('conteudo')
    <div class="col-md-6 offset-md-2 mt-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-secondary"><strong>Suas Finanças - Editar movimento </strong></h3>
            </div>
            <div class="panel-body">
                <form id="frm-edita-movimento" action="{{route('updatemovimento',[$movimento->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="movimento">Movimento</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="{{$movimento->descricao}}" placeholder="Descrição" required>
                    </div>
                    
                    <br>

                    <div class="form-check form-check-inline">
                        @if ($movimento->tipo == 'Despesa')
                            <input class="form-check-input" type="radio" name="tipo" id="opcao1" value="Despesa" checked>
                        @else
                            <input class="form-check-input" type="radio" name="tipo" id="opcao1" value="Despesa">
                        @endif                        
                        <label class="form-check-label" for="opcao1">Despesa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if ($movimento->tipo == 'Receita')
                            <input class="form-check-input" type="radio" name="tipo" id="opcao2" value="Receita" checked>
                        @else
                            <input class="form-check-input" type="radio" name="tipo" id="opcao2" value="Receita">
                        @endif                        
                        <label class="form-check-label" for="opcao2">Receita</label>
                    </div>
    
                    <div class="form-group mt-4">
                        <label for="valor">Valor</label>
                        <input type="Number" class="form-control" id="valor" value="{{$movimento->valor}}" name="valor" step=".01" required>
                    </div>

                    <button type="submit" class="mt-4 btn btn-sm btn-primary">Atualizar</button>                
                </form>
            </div>
        </div>
    </div>
@endsection
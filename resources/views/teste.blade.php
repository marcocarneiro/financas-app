<?php $user = auth()->user(); ?>

@extends('app')

@section('title', 'Extrato')

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
    <div class="col-9 text-secondary">
        <p class="mb-5 p-2 fw-bold fs-4 border-bottom border-secondary"> 
            TODOS OS MOVIMENTOS
        </p>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <p class="fs-2">Tudo</p>
                
                @foreach ($movimentos as $movimento)
                    <div class="card mb-5">
                        <div class="card-header">
                            Nome: {{$movimento->name}}
                        </div>
                        <div class="card-body">
                            {{$movimento->descricao}}
                        </div>                        
                    </div>
                @endforeach

            </div>
            
        </div>
    </div> 
@endsection


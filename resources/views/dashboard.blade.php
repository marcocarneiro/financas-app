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
            EXTRATO - Saldo R$ {{$totalreceitas - $totaldespesas}}
        </p>

        <div class="row">
            <div class="col-md-6">
                <p class="fs-2">Receitas</p>
                {{-- lista de receitas --}}
                @if (count($receitas) === 0)
                    <p>Não há receitas para esse usuário.</p>
                @else
                    @foreach ($receitas as $receita)
                        <div class="card mb-3">
                            <div class="card-header">
                                {{ \Carbon\Carbon::parse($receita->data)->format('d/m/Y')}}
                            </div>
                            <div class="card-body">
                                {{$receita->descricao}}
                            </div>
                            <div class="card-footer">
                                <strong>R$ {{$receita->valor}}</strong>  &nbsp; &nbsp;
                                <a href="{{route('editar',[$receita->id])}}" ><i class="fas fa-edit"></i></a> &nbsp; &nbsp;
                                <a href="#" ><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif                

                {{-- total de receitas --}}
                <p class="fw-bold">Total: R$ {{$totalreceitas}}</p>
            </div>
            
            <div class="col-md-6">
                <p class="fs-2">Despesas</p>
                {{-- lista de despesas --}}
                @if (count($despesas) === 0)
                    <p>Não há despesas para esse usuário.</p>
                @else
                    @foreach ($despesas as $despesa)
                        <div class="card mb-3">
                            <div class="card-header">
                                {{ \Carbon\Carbon::parse($despesa->data)->format('d/m/Y')}}
                            </div>
                            <div class="card-body">
                                {{$despesa->descricao}}
                            </div>
                            <div class="card-footer">
                                <strong>R$ {{$despesa->valor}}</strong>  &nbsp; &nbsp;
                                <a href="{{route('editar',[$despesa->id])}}" ><i class="fas fa-edit"></i></a> &nbsp; &nbsp;
                                <a href="#" ><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif 
                
                {{-- total de despesas --}}
                <p class="fw-bold">Total: R$ {{$totaldespesas}}</p>
            </div>
        </div>
    </div> 
@endsection


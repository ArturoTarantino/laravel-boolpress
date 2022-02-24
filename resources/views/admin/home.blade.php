@extends('layouts.dashboard')

@section('content')
    
    <h1>Benvenuto {{ $user->name }}</h1>
    {{-- {{ dd($user->userInfo()) }} --}}
    @if ($user->userInfo)
        <div>Telefono: {{ $user->userInfo->phone }}</div>
        <div>Indirizzo: {{ $user->userInfo->address }}</div>
    @endif
@endsection
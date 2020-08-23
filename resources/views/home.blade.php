@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <h4 class="text-danger py-3" style="font-size: 40px">Mon compte </h4>
                <nav class="nav nav-tabs nav-justified">
                    <a href="" class="nav-item nav-link ">Mon profile</a>
                    <a href="" class="nav-item nav-link ">Mes annonces</a>
                    <a href="#" class="nav-item nav-link ">S'abonner</a>
                    <a href="{{ route('message') }}" class="nav-item nav-link active">Ma messagerie 
                    @if(unreadCountAll(Auth::user()->id) > 0)
                        <span class="badge badge-pill badge-warning unread_noti">
                                          {{ unreadCountAll(Auth::user()->id) }}
                        </span>
                    @endif
                    </a> 
                </nav>
                @yield('adds')
            </div>
            <div class="col-md-12 pt-5">
               @yield('message')
            </div>
        </div>
    </div>
       
    </main>
@endsection

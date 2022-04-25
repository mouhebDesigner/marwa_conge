@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <!-- Faire appel à la header et aside ici dans cet div -->
        @include('includes.header')
        @include('includes.aside')
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                  @include('includes.stat')
                </div>
            </div>
        </div>
        <!-- Njarbou nconnectou tawa lazem y3adina lahna be design jdid  -->
    </div>         
@endsection

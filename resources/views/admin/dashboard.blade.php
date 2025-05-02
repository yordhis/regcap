@extends('layouts.app')

@section('title', 'Panel')


@section('content')
    @if (session('mensaje'))
        @include('partials.alert')
    @endif


    <div class="container">
        <section class="section register d-flex flex-column align-items-center justify-content-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class=" col-sm-12 d-flex flex-column align-items-center justify-content-center">

                        <h1>Bienvenidos al Sistema de Registro y Captación (RegCap)</h1>


                    </div>
                </div>
            </div>

        </section>
    @endsection

@extends('layout')

@if(session()->has('message'))
    <div class="alert alert-success">
        
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

@section('content')
    <div style="background-color: rgb(196, 194, 194); padding:20px; margin-top: 40px; margin-bottom:40px; border-radius: 7px;">
        <form class="g-3" method="POST" action="{{ route('contact') }}" style="padding:20px;">
            @csrf
            <div class="row align-items-center">
            <div class="col-4 justify-content-center d-none d-lg-block">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <img src="{{ asset('imgs/email.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <h2 style="color:white;">Contacta amb nosaltres</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <label for="validationCustom01" class="form-label">El teu nom</label>
                    <input type="text" name="name" class="form-control" id="validationCustom01" style="border-radius: 7px;" value={{ old('name') }}>
                    {!! $errors->first('name', '<small style="color:red">:message</small><br>') !!}
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <label for="validationCustomUsername" class="form-label">El teu email</label>
                    <input type="email" name="email" class="form-control" id="validationCustomUsername" style="border-radius: 7px;" aria-describedby="inputGroupPrepend" placeholder="example@gmail.com" value={{ old('email') }}>
                    {!! $errors->first('email', '<small style="color:red">:message</small><br>') !!}
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <label for="validationCustom02" class="form-label">Asumpte</label>
                    <input type="text" name="subject" class="form-control" style="border-radius: 7px;" id="validationCustom02" value={{ old('subject') }}>
                    {!! $errors->first('subject', '<small style="color:red">:message</small><br>') !!}
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <label for="validationCustom03" class="form-label">Missatge</label>
                    <textarea name="content" class="form-control" style="border-radius: 7px;" id="validationCustom03">{{ old('content') }}</textarea>
                    {!! $errors->first('content', '<small style="color:red">:message</small><br>') !!}
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 mt-2">
                    <button class="btn btn-primary w-100" type="submit">Enviar</button>
                </div>
            </div>
            </div>

        </div>
        </form>
    </div>
@endsection


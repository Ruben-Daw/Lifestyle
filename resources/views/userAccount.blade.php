@extends('layout')

@section('content')

    <div style="background-color: rgb(227, 224, 224); padding:20px; margin-top: 40px; margin-bottom:40px; border-radius: 7px;">
        <div class="row">
            <div class="col-12">
                <h2>Les meves dades</h2>
                <p>Aquí podràs veure totes les teves dades i podràs modificar-los per a tenir el teu compte actualitzat.</p>
            </div>

            <div class="col-1"></div>

                <div class="col-12">
                    <h2>Dades personals
                        <span>
                            <a style=border:none; onclick="document.getElementById('nameAccount').removeAttribute('readonly','');
                                document.getElementById('nameAccount').value=''; 
                                document.getElementById('nameAccount').placeholder='nom'; 
                                document.getElementById('lastNamesAccount').removeAttribute('readonly','');
                                document.getElementById('lastNamesAccount').value=''; 
                                document.getElementById('lastNamesAccount').placeholder='cognoms';
                                document.getElementById('data_naixement').removeAttribute('readonly',''); 
                                document.getElementById('data_naixement').focus();
                                document.getElementById('submitUserDataForm').removeAttribute('hidden','');">
                                <i class="bi bi-pencil-square" style="color:green; font-size:25px;"></i>
                            </a>
                        </span>
                    </h2>

                    <form action="{{route('userAccount.editUserPersonalData')}}" method="get" id="userDataForm">

                        @csrf

                        @if(strlen($userData->name) <= 26)
                            <input type="text" class="form-control-lg border-0 w-25" name="nameAccount" id="nameAccount" value="{{$userData->name}}" style="background-color: rgb(227, 224, 224);" readonly required>
                        @elseif(strlen($userData->name) < 45)
                            <input type="text" class="form-control-lg border-0 w-50" name="nameAccount" id="nameAccount" value="{{$userData->name}}" style="background-color: rgb(227, 224, 224);" readonly required>
                        @endif
                        <br>

                        @if(strlen($userData->last_names) <= 26)
                            <input type="text" class="form-control-lg border-0 w-25" name="lastNamesAccount" id="lastNamesAccount" value="{{$userData->last_names}}" style="background-color: rgb(227, 224, 224);" readonly required>
                        @elseif(strlen($userData->last_names) < 45)
                            <input type="text" class="form-control-lg border-0 w-50" name="lastNamesAccount" id="lastNamesAccount" value="{{$userData->last_names}}" style="background-color: rgb(227, 224, 224);" readonly required>
                        @endif
                        <br>

                        <input type="date" class="form-control-lg border-0 w-50" name="data_naixement" id="data_naixement" value="{{$userData->date_of_birth}}" style="background-color: rgb(227, 224, 224);" readonly required>

                    </form>

                    <a id="submitUserDataForm" onclick="document.getElementById('userDataForm').submit()" hidden> 
                        <i class="bi bi-check-square" style="font-size:25px; color:green;"></i>
                    </a>

                </div>

                <div class="col-1"></div>

            <div class="col-12">
                <h2>Correu electrònic 
                    <span>
                        <a style=border:none; onclick="document.getElementById('emailAccount').removeAttribute('readonly',''); 
                            document.getElementById('emailAccount').focus(); document.getElementById('emailAccount').value=''; 
                            document.getElementById('submitEmailForm').removeAttribute('hidden','');">
                            <i class="bi bi-pencil-square" style="color:green; font-size:25px;"></i>
                        </a>
                    </span>
                </h2>

                <form action="{{route('userAccount.editEmail')}}" method="get" id="userEmailForm">

                    @csrf

                    @if(strlen($userData->email) <= 26)
                        <input type="email" class="form-control-lg border-0 w-25" name="emailAccount" id="emailAccount" value="{{$userData->email}}" style="background-color: rgb(227, 224, 224);" readonly required>
                    @elseif(strlen($userData->email) < 45)
                        <input type="email" class="form-control-lg border-0 w-50" name="emailAccount" id="emailAccount" value="{{$userData->email}}" style="background-color: rgb(227, 224, 224);" readonly required>
                    @endif

                </form>

                <a id="submitEmailForm" onclick="document.getElementById('userEmailForm').submit()" hidden> 
                    <i class="bi bi-check-square" style="font-size:25px; color:green;"></i>
                </a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/account.js')}}"></script>
@endsection
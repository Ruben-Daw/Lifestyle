<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<style>
    .tooltip-inner {
        background-color: rgb(96, 96, 248);
        box-shadow: 0px 0px 4px black;
        opacity: 1 !important;
    }

    body{
        padding:20px;
    }
    
</style>

<body>

    <h1 style="text-align:center;"> Tots els usuaris de la base de dades</h1>


    <div class="col-12">
        <form action="{{ route('users.index') }}" method="get" class="d-flex" style="margin-top:30px; margin-bottom:30px;">

            @csrf
        
            <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search" style="border: 2px solid;" value="{{ $search }}">
            <!-- COMPONENT BUTTON -->
            <button class="btn btn-outline-success" id="browseBtn" type="submit">Search</button>

        </form>
    </div>
    <table class="table table-dark table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Cognoms</th>
            <th scope="col">Gmail</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{strip_tags($user->name)}}</td>
                    <td>{{strip_tags($user->last_names)}}</td>
                    <td>{{$user->email}}</td>
                    <td><a onclick="return confirm('Estas segur?')" href="{{ route('users.destroy', $user->user_id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Esborrar usuari"><i class="bi bi-x-square" style="color: white;"></i></a></td>
                </tr>
            @empty
                <script>
                    document.getElementById("table").style.display = "none";
                </script>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                        <b>No hi han usuaris a la base de dades</b>
                    </div>
                </div>
            @endforelse

        </tbody>
    </table>

    <div style="display:flex; justify-content:center;">{{ $users->links() }}</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        document.querySelector("#btnClose").onclick = function(e) {
            e.preventDefault();
            new bootstrap.Toast(document.querySelector('#toastBasic')).hide();
        }

    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Szótár</title>
</head>
<body>
    {{csrf_field()}}
    {{method_field("GET")}}
    <main class="container">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if ($aktualisTema == 0)
                    Válassz témát!
                @else
                    @foreach ($temak as $tema)
                        @if ($tema->id == $aktualisTema)
                            {{$tema->temanev}}
                        @endif
                    @endforeach
                @endif
            </button>
            <ul class="dropdown-menu">
                @foreach ($temak->where("id", "!=", $aktualisTema) as $tema)
                    <li><a class="dropdown-item" href="/{{$tema->id}}">{{$tema->temanev}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="container-fluid">
            <div class="row border">
                <div class="col-sm"><p>ANGOL</p></div>
                <div class="col-sm"><p>MAGYAR</p></div>
                <div class="col-sm"><p>visszajelzés</p></div>
            </div>
            @foreach ($szavak as $szo)
            <div class="row border">
                <div class="col-sm"><p>{{$szo->angol}}</p></div>
                <div class="col-sm"><input type="text" id="temaInput_{{$szo->id}}" class="temaInput" name="{{$szo->magyar}}"></div>
                <div class="col-sm"><img id="joValasz_{{$szo->id}}" src="../imgs/rosz.png" alt="jo válasz-e"></div>
            </div>
            @endforeach
        </div>
        <div class="container-fluid">
            <h3 id="eredmenyText">Összpontszám: 0</h3>
        </div>
    </main>
</body>
</html>

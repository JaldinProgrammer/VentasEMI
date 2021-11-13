
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-ompatible" content="ie=edge">
    <script src="{{ asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6bc26732f2.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href=" {{asset('./Icons/escudo.jpg')}}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>EMI | Market</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light nav-bk3">
        <div class="container-fluid">
          <div class="navbar-header" style="margin: 5px">
            <a class="navbar-brand" href="/">
              <img src="{{asset('./Icons/store.png')}}" alt="store" width="35" height="35" >
              Tienda EMI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @guest
              <li class="nav-item fs-6" >
                <a class="nav-link fs-6" href="{{route('login')}}">Login</a>
              </li> 
                @endguest
                @auth
              <li class="nav-item fs-6" >
                <a class="nav-link fs-6" href="{{route('user.perfil')}}">{{Auth::user()->username}}</a>
              </li>
              <li class="nav-item fs-6" >
                <a class="nav-link fs-6" href="{{route('people.show')}}">Clientes</a>
              </li>
                  @can('admin')
                  <li class="nav-item fs-6" >
                    <a class="nav-link fs-6" href="{{route('user.show')}}">Equipo</a>
                  </li>
                  <li class="nav-item fs-6" >
                    <a class="nav-link fs-6" href="{{route('product.show')}}">Productos</a>
                  </li>
                  <li class="nav-item fs-6" >
                    <a class="nav-link fs-6" href="{{route('category.show')}}">Categorias</a>
                  </li>
                  <li class="nav-item fs-6" >
                    <a class="nav-link fs-6" href="{{route('supplier.show')}}">Proveedores</a>
                  </li>
                  <li class="nav-item fs-6" >
                    <a class="nav-link fs-6" href="{{route('productSupplier.show')}}">Compras de inventario</a>
                  </li>
                  @endcan
              <li class="nav-item">
                <form style="display: inline" action="{{route('logout')}}" method="POST">
                    @csrf
                    <a class="nav-link" href="#" onclick="this.closest('form').submit()">
                      <img src="{{asset('./Icons/logout.png')}}" alt="exit" width="25" height="25">
                      {{"  Logout  "}}</a>
                </form>
              </li>
              @endauth 
            </ul>
          </div>
        </div>
    </nav>
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    @yield('content')
  </body>
</html>



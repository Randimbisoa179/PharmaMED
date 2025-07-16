<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaMed - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

</head>
<body >

    <div class="container" >
        <!-- En-tête -->
        <header class="bg-success text-white p-4 mb-4" >
            <h1><i class="	fas fa-clinic-medical" ></i>PharmaMed</h1>
        </header>

        @include('partials.navbar')
        <!-- Contenu principal -->
        <main>
            @yield('content')
        </main>

        <!-- Pied de page -->
        <footer class="mt-4 p-4 bg-light text-center">
            <p>&copy; {{ date('Y') }} PharmaMed. <br> ENI Fianarantsoa. Tous droits réservés.</p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        setTimeout(function(){
            var successMessage = document.getElementById('success-message');
            if(successMessage){
                successMessage.style.display = 'none';
            }
        }, 5000)
    </script>
</body>
</html>

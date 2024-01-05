<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/navteste.css">
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body> 

    <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <center>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                       <!-- <a class="nav-link active" aria-current="page" href="index.php"><img src='../../public/images/icon/WhiteIcon.png' /></a>-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Negociar</a>
                    </li>

                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link active" aria-current="page" href="">Minha Carteira</a>
                            <button type="button" class="btn  dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Deposito, saque e status</a></li>
                                <li><a class="dropdown-item" href="">Transferencia entre carteiras</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Minha Conta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active loginText" aria-current="page" href="">Login</a>
                    </li>
                    <li class="nav-item cadastreUser">
                        <a class="nav-link active" aria-current="page" href="">Cadastro</a>
                    </li>
                </ul>
               
            </div>
        </center>
        </div>
    </nav>
    

    @yield('conteudo')

<!-------------------FOOTER-------------------------------------------->
<div class="row footer">
    <div class="col-md-3 text-start">
        <p class="nossbitTitle">nossbit</p>
        <p><h5 class="fw-bold">Location:</h5>Alameda Santos 700 - cj.132</p>
        <p>Cerqueira César - São Paulo - Brazil</p>
        <p>CEP: 01418-100</p>
    </div>  
    <div class="col-md-5">
    </div> 
    <div class="col-md-3 text-start mt-3">
        <h5 class="fw-bold">Social Media</h5>
        <p>Instagram</p>
        <p>LinkedIn</p>
        <p>Facebook</p>
        <p>Twitter</p>
    </div>  
    <div class="col-md-12 text-center mt-5">
        <h6>Nosscompany Serviços Digitais Ltda - CNPJ 44.868.835/0001-33</h6>
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>
</html>
<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <title>Document</title>
    <style>
        html{
            scroll-behavior: smooth;
        }
        body{
            background-color: #FFF;
        }
        .navbar{
            background-color: black;
        }
        .img-carousel{
            width: 100%;
            height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .img-carousel1{
            background: url('assets/img/salutation.jpg') no-repeat center/cover;
        }
        .img-carousel2{
            background: url('assets/img/test.jpg') no-repeat center/cover;
        }
        .img-carousel3{
            background: url('assets/img/masque.jpg') no-repeat center/cover;
        }
        .nav-link{
            color: white;
        }
        .nav-link:hover{
            color: red;
            transform: scale(1.05);
            cursor:pointer;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand">
        <div class="container">
            <a href="" class="navbar-brand text-white title">Covid.<span class="text-danger font-weight-bolder">Stat</span> </a>
            <ul class="nav">
                <li class="nav-item">
                    <a href="" class="nav-link text">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#covid" class="nav-link text">Covid ?</a>
                </li>
                <li class="nav-item">
                    <a href="#search" class="nav-link text">Search</a>
                </li>
            </ul>
        </div>
        
    </nav>

    
    <div id="carouselSlide" class="carousel slide" data-ride="carousel">
    
        <div class="carousel-inner">
        
            <div class="carousel-item active">
        
                <div class="img-carousel img-carousel1"></div>
        
                <div class="carousel-caption d-md-block">
        
                    <h5 class="title">Protect yourself...</h5>
        
                    <p class="text">It's also protecting others.</p>
        
                </div>
        
            </div>
                
        
            <div class="carousel-item">
        
                <div class="img-carousel img-carousel2"></div>
        
                <div class="carousel-caption d-md-block">
        
                    <h5 class="title">Do you have any doubts?</h5>
        
                    <p class="text">Get tested.</p>
        
                </div>
        
            </div>
                
        
            <div class="carousel-item">
        
                    <div class="img-carousel img-carousel3"></div>
        
                    <div class="carousel-caption d-md-block">
        
                        <h5 class="title">Don't forget...</h5>
        
                        <p class="text">Respect the barrier measures.</p>
        
                    </div>
        
            </div>
                
        
            <a class="carousel-control-next" role="button" href="#carouselSlide" data-slide="next">
        
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
        
            </a>
                
        
            <a class="carousel-control-prev" role="button" href="#carouselSlide" data-slide="prev">
        
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
        
            </a>
                
        
        </div>
    
    </div>

    <div class="container mt-3 pt-3 overflow-hidden p-3">
        <?= $content;?>
    </div>
    
    <footer class="mt-3 p5 bg-dark">
        <div class="footer-copyright text-center py-3"><span class="text-white"> © 2022 Copyright: </span><span class="text-danger">NAN</span></div>
    </footer>
</body>
<script src="assets/scripts/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>
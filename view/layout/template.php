<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        html{
            scroll-behavior: smooth;
        }
        body{
            background-color:#6C63FF;
        }
        .navbar{
            background-color:#6C63FF;
        }
        .img-carousel{
            width: 100%;
            height: 90vh;
        }
        .img-carousel1{
            background: url('../assets/img/salutation.jpg') no-repeat center/cover;
        }
        .img-carousel2{
            background: url('../assets/img/test.jpg') no-repeat center/cover;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand">
        <div class="container">
            <a href="" class="navbar-brand text-white">Covid</a>
            <ul class="nav">
                <li class="nav-item">
                    <a href="" class="nav-link text-white">Home</a>
                </li>
            </ul>
        </div>
        
    </nav>

        <div id="carouselSlide" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="img-carousel img-carousel1"></div>
                    <div class="carousel-caption d-md-block">
                        <h5>Se protéger...</h5>
                        <p>C'est aussi protéger autrui.</p>
                    </div>
                </div>
                <div class="carousel-item">
                <div class="img-carousel img-carousel2"></div>
                    <div class="carousel-caption d-md-block">
                    <h5>Vous avez un doute ?</h5>
                        <p>Faite vous dépister.</p>
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

    <div class="container mt-3 pt-3 overflow-hidden">
    <?= $content;?>
    </div>

</body>
<script src="../assets/scripts/jquery.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>
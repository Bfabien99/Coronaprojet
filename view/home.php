<?php
    $covid = new covid19();
    $news = new news();
    
    function Toempty($element){
        if (!is_array($element)) {
            $element=[];
        }
    };

    $showcountry = false;
    if (!empty($_POST['country'])) {
        $country = $covid->countryCase(($_POST['country']));
        Toempty($country);
        $showcountry = true;
    }

    $civ = $covid->civCase();
    Toempty($civ);
        
    $civVac = $covid->civVaccine();
    Toempty($civVac);
    
    $global = $covid->globalCase();
    Toempty($global);
       
    $lists = $covid->countryList();
    array_pop($lists);

    $getNews=$news->getNews();
    array_splice($getNews,8,12);
    Toempty($getNews);
    

    ob_start();
?>

<!---->
 <!--       COVID BILAN         -->
<!---->
    <?php if($global !== null):?>

        <div class="row p-5">

            <div class="col-12 bg-white">
                <div class="general">

                    <h1 class="text-center">COVID BILAN</h1>
                    <hr class="w-6 h-3 bg-danger">

                    <?php foreach($global as $data):?>

                        <div class="group">

                            <h1 class="navy text-left"><?= number_format($data['confirmed'],0,'.','.') ?></h1>
                            <h3 class="text-right font-weight-bolder">confirmed</h3>

                        </div>
                        
                        <div class="group">

                            <h1 class="tomato text-left"><?= number_format($data['deaths'],0,'.','.') ?></h1>
                            <h3 class="text-right font-weight-bolder">dead</h3>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    <?php endif; ?>

<!---->
 <!--       COTE D'IVOIRE BILAN        -->
<!---->

    <?php if($civ !== null):?>

        <div class="row text-center pt-3 mt-3 border-primary p-5">

            <div class="col-12">

                <?php foreach($civ as $data):?>

                    <h1><?= strtoupper($data['country']) ?></h1>
                    <hr class="bg-danger">

                    <div class="group">

                        <h3 class="text-left font-weight-bolder">Confirmed</h3> 
                        <h1 class="navy text-right"><?= number_format($data['confirmed'],0,'.','.') ?></h1>

                    </div>

                    <div class="group">

                        <h3 class="text-left font-weight-bolder">Population</h3>
                        <h1 class="text-right font-weight-bolder"><?= number_format($data['population'],0,'.','.')  ?></h1>

                    </div>

                    <div class="group">

                        <h3 class="text-left font-weight-bolder">Dead<h3>
                        <h1 class="tomato text-right"><?= number_format($data['deaths'],0,'.','.')  ?></h1>

                    </div>

                <?php endforeach; ?>

            </div>


            <div class="col-12">

                <?php foreach($civVac as $data):?>

                    <div class="group">

                        <h3 class="text-left font-weight-bolder">People vaccined</h3>
                        <h1 class="navy text-right"><?= number_format($data['vaccined'],0,'.','.') ?></h1>

                    </div>

                    <div class="group">

                        <h3 class="text-left font-weight-bolder">Administered</h3>
                        <h1 class="navy text-right"><?= number_format($data['administered'],0,'.','.') ?></h1>

                    </div>

                    <div class="group">

                        <h3 class="text-left font-weight-bolder">Date<h3> 
                        <h3 class="text-right font-weight-bolder"><?= $data['updated'] ?></h3>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    <?php endif; ?>

    <hr>

<!---->
 <!--       ABOUT CORONA         -->
<!---->

    <div class="about row p-5 bg-dark">

        <div class="text col-12">

            <h1 class="text-center title text-danger" id="covid">What is Coronavirus</h1>
            <hr class="bg-primary">
            <div class="headerimg" style="width: 100%;height:200px;background:url('assets/img/martin-sanchez-VhjsGKMefkk-unsplash.jpg') no-repeat center/cover;font-family:Roboto;">
            </div>

            <h3 class="font-weight-bolder text-danger">Coronavirus disease (COVID19) is an infectious disease caused by the SARS-CoV-2 virus.</h3>

            <p class="font-weight-bolder text text-white">Most people infected with the virus have mild to moderate respiratory illness and recover without needing special treatment. Some, however, fall seriously ill and require medical attention. Older people and those with an underlying medical condition, such as cardiovascular disease, diabetes, chronic respiratory disease, or cancer, are at greater risk of developing a severe form. Anyone, at any age, can contract COVID-19 and become seriously ill or die.</p>

        </div>

            
        <div class="col-12 bg-white mt-2 mb-2 p-1">

            <h1 class="text-center title">How to protect yourself</h1>
            <hr class="bg-primary">
            
            <div class="headerimg" style="width: 100%;height:200px;background:url('assets/img/stopcovid.jpg') no-repeat top/cover;font-family:Roboto;">
            <p class="font-weight-bolder text p-3 text-white">The best way to avoid and slow transmission is to be well informed about the disease and how the virus spreads.</p>
            </div>
            
            <p class="font-weight-bolder text">Protect yourself and others from infection by maintaining a distance of at least one meter from others, wearing a properly fitted mask, and washing your hands frequently with soap and water or an alcohol-based hand rub . Get vaccinated when it is your turn and follow local recommendations</p>
            
            
            <p class="font-weight-bolder text">The virus can spread through droplets of saliva or nasal secretions emitted by an infected person when they cough, sneeze, speak, sing or breathe. It is therefore important to apply the rules of respiratory hygiene, for example by covering your mouth and nose with the bend of your elbow when you cough, and if you do not feel well, to stay at home. and isolate yourself until you recover.</p>

        </div>

    </div>

    <hr>
<!---->
 <!--       COUNTRY SEARCH        -->
<!---->

    <div class="row p-5">

        <div class="col-12 col-md-6" id="search">

            <h3 class="text-center m-4">Search results from other countries</h3>
            <hr class="bg-danger">

            <form action="" method="post" class="form justify-content-between border-danger" id="myForm">

                <select name="country" id="select" >

                    <?php foreach($lists as $list):?>

                        <option value="<?=trim($list)?>"><?= $list?></option>
                        
                    <?php endforeach; ?>

                </select>

                <button type="submit" class="btn btn-primary text-center m-4">Voir</button>

            </form>

        </div>

        
        <?php if($showcountry):?>

            <div class="col-12 col-md-6">

                <?php if($country !== null):?>

                    <?php foreach($country as $data):?>

                        <h1><?= strtoupper($data['country']) ?> <img src="assets/img/Coronavirus.gif" alt="" width="50px" height="50px"></h1>
                        <hr class="bg-danger">

                        <div class="group">

                            <h3 class="text-left font-weight-bolder">Confirmed</h3> 
                            <h1 class="navy text-right"><?= number_format($data['confirmed'],0,'.','.') ?></h1>

                        </div>

                        <div class="group">

                            <h3 class="text-left font-weight-bolder">Population</h3>
                            <h1 class="text-right font-weight-bolder"><?= number_format($data['population'],0,'.','.')  ?></h1>

                        </div>

                        <div class="group">

                            <h3 class="text-left font-weight-bolder">Dead<h3>
                            <h1 class="tomato text-right"><?= number_format($data['deaths'],0,'.','.')  ?></h1>

                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        <?php endif; ?>
    
    </div>

<!---->
 <!--       NEWS        -->
<!---->

    <?php if($getNews !== null):?>

        <div class="container-fluid about">

            <h1 class="text-center">NEWS</h1>
            <hr>

            <div class="row">

                <?php foreach($getNews as $news):?>
                    
                    <div class="col-12 col-md-3 mt-2" >
                        
                        <div class="p-3" style="width:100%;border: 1px solid lightgrey;">

                                <h6><?=$news["title"]?></h6>

                                <div class="imgbox">
                                    
                                    <img src="<?=$news["image"]?>" alt="Not picture available yet" height="100px" width="100%">

                                </div>

                                <a href="<?=$news["link"]?>" target="_blank">>>Read more</a>

                        </div>
                            
                    </div>

                <?php endforeach;?>

            </div>

        </div>

    <?php endif;?>


<?php $content = ob_get_clean();?>
<?php require 'layout/template.php'; ?>
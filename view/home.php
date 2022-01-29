<?php
    require '../class/covid19.php';
    $covid = new covid19();
    $showcountry = false;
    if (!empty($_POST['country'])) {
        $country = $covid->countryCase(($_POST['country']));
        if (!is_array($country)) {
            $country=[];
        }
        $showcountry = true;
    }
    $civ = $covid->civCase();
    if (!is_array($civ)) {
        $civ=[];
    }
    $civVac = $covid->civVaccine();
    if (!is_array($civVac)) {
        $civVac=[];
    }
    
    $global = $covid->globalCase();
    if (!is_array($global)) {
        $global=[];
    }
    $lists = $covid->countryList();
    // var_dump($lists);


    ob_start();
?>
    <?php if($global !== null):?>
    <div class="row">
        <div class="col-md-6 bg-white">
            <div class="general">
            <h1>Covid is real</h1>
            <?php foreach($global as $data):?>
            <h3><?= $data['confirmed'] ?> <span> Cas confirmed</span></h3>
            <h3><?= $data['deaths'] ?> <span> dead</span></h3>
            <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-6">
            <img src="../assets/img/cas.jpg" alt="" class="w-100" height="200px">
        </div>
    </div>
    <?php endif ?>

    <?php if($civ !== null):?>
    <div class="row text-center pt-3 mt-3 border-primary-2">
        <div class="col-12 text-light">
        <?php foreach($civ as $data):?>
            <h3><?= $data['country'] ?></h3>
            <h1>Cas <?= number_format($data['confirmed'],0,'.','.') ?></h1>
            <h2>Population <?= number_format($data['population'],0,'.','.')  ?></h2>
            <h4 class="alert alert-danger">Morts <?= number_format($data['deaths'],0,'.','.')  ?></h3>
        <?php endforeach ?>
        </div>
        <div class="col-12 text-light">
        <?php foreach($civVac as $data):?>
            <h3>Personne Vaccinée <?= number_format($data['vaccined'],0,'.','.') ?></h3>
            <h1>Vaccin administré <?= number_format($data['administered'],0,'.','.') ?></h1>
            <h4 class="alert alert-danger">Mise à jour <?= $data['updated'] ?></h3>
        <?php endforeach ?>
        </div>
    </div>
    <?php endif ?>

    <div class="row">
            <div class="col-12">
                <h3>Le corona</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia repellendus tempora, voluptas quaerat cumque reiciendis impedit aliquid dolorem magnam nostrum recusandae eius rerum, deserunt minus maxime a, adipisci dignissimos repudiandae eos. Dolorum sit officia quod pariatur accusamus. Cumque nesciunt commodi illo illum voluptate laboriosam fugiat ut praesentium deleniti laudantium natus repudiandae, voluptatibus optio ullam earum! Ut quos esse illum, natus id reprehenderit necessitatibus nam impedit libero possimus veniam dolorum perferendis maiores. Unde deserunt beatae excepturi vitae dolor ipsam voluptatibus, error assumenda sint, maiores quasi facilis. At, recusandae sit facere optio tenetur voluptate laborum eligendi. Aspernatur a quasi ex libero aliquid.</p>
                <h3>Comment s'en protéger</h3>
            </div>
            <div class="col-12 col-md-6 bg-white mt-2 mb-2 p-1">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo dolorem illum qui corporis nam itaque perferendis non voluptatibus iure laborum reprehenderit, quam culpa fugit rerum architecto, accusantium vero dicta dolor?</p>
            </div>
            <div class="col-12 col-md-6 bg-white mt-2 mb-2 p-1">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo dolorem illum qui corporis nam itaque perferendis non voluptatibus iure laborum reprehenderit, quam culpa fugit rerum architecto, accusantium vero dicta dolor?</p>
            </div>
            <div class="col-12 col-md-6 bg-white mt-2 mb-2 p-1">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo dolorem illum qui corporis nam itaque perferendis non voluptatibus iure laborum reprehenderit, quam culpa fugit rerum architecto, accusantium vero dicta dolor?</p>
            </div>
            <div class="col-12 col-md-6 bg-white mt-2 mb-2 p-1">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo dolorem illum qui corporis nam itaque perferendis non voluptatibus iure laborum reprehenderit, quam culpa fugit rerum architecto, accusantium vero dicta dolor?</p>
            </div>

    </div>

    <form action="" method="post" class="form-inline" id="myForm">
        <h1 class="alert alert-danger">Rechercher un pays</h1>
        <select name="country" id="">
            <option value=""></option>
        <?php foreach($lists as $list):?>
            <option value="<?=trim($list)?>"><?= $list?></option>
        <?php endforeach ?>
        </select>
        <button type="submit" class="btn btn-primary">Voir</button>
    </form>
    <?php if($showcountry):?>
        <?php if($country !== null):?>
        <?php foreach($country as $data):?>
            <h3><?= $data['country'] ?></h3>
            <h1>Cas <?= number_format($data['confirmed'],0,'.','.') ?></h1>
            <h2>Population <?= number_format($data['population'],0,'.','.')  ?></h2>
            <h4 class="alert alert-danger">Morts <?= number_format($data['deaths'],0,'.','.')  ?></h3>
        <?php endforeach ?>
        <?php else: ?>
        <h5 class="alert alert-danger">Data not found</h5>
        <?php endif ?>
    <?php endif ?>

<?php $content = ob_get_clean();?>
<?php require 'layout/template.php'; ?>
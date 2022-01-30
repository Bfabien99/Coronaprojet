<?php
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
    // array_splice($lists, 62, 1);
    // array_splice($lists, 86, 1);
    // var_dump($lists[0]);    // var_dump($lists);
    // echo count($lists);


    ob_start();
?>
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
            <?php endforeach ?>
            </div>
        </div>
    </div>
    <?php endif ?>

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
        <?php endforeach ?>
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
        <?php endforeach ?>
        </div>
    </div>
    <?php endif ?>

    <div class="about row p-5">
            <div class="text col-12">
            <h1 class="text-center">What is Corona</h1>
            <hr class="bg-primary">
                <p class="font-weight-bolder">Coronavirus disease (COVID19) is an infectious disease caused by the SARS-CoV-2 virus.
                </p>
                <p class="font-weight-bolder">Most people infected with the virus have mild to moderate respiratory illness and recover without needing special treatment. Some, however, fall seriously ill and require medical attention. Older people and those with an underlying medical condition, such as cardiovascular disease, diabetes, chronic respiratory disease, or cancer, are at greater risk of developing a severe form. Anyone, at any age, can contract COVID-19 and become seriously ill or die.</p>
            </div>
            
            <div class="col-12 bg-white mt-2 mb-2 p-1">
                <h1 class="text-center">How to protect yourself</h1>
            <hr class="bg-primary">
                <p class="font-weight-bolder">The best way to avoid and slow transmission is to be well informed about the disease and how the virus spreads.</p>
            
                <p class="font-weight-bolder">Protect yourself and others from infection by maintaining a distance of at least one meter from others, wearing a properly fitted mask, and washing your hands frequently with soap and water or an alcohol-based hand rub . Get vaccinated when it is your turn and follow local recommendations</p>
            
                <p class="font-weight-bolder">The virus can spread through droplets of saliva or nasal secretions emitted by an infected person when they cough, sneeze, speak, sing or breathe. It is therefore important to apply the rules of respiratory hygiene, for example by covering your mouth and nose with the bend of your elbow when you cough, and if you do not feel well, to stay at home. and isolate yourself until you recover.</p>
            </div>

    </div>

    <div class="row p-5">
    <div class="col-12 col-md-6">
    <h3 class="text-center m-4">Search results from other countries</h3>
    <hr class="bg-danger">
    <form action="" method="post" class="form justify-content-between border-danger" id="myForm">
        <select name="country" id="select" >
        <?php foreach($lists as $list):?>
            <option value="<?=trim($list)?>"><?= $list?></option>
        <?php endforeach ?>
        </select>
        <button type="submit" class="btn btn-primary text-center m-4">Voir</button>
    </form>
    </div>
    
    <?php if($showcountry):?>
        <div class="col-12 col-md-6">
        <?php if($country !== null):?>
        <?php foreach($country as $data):?>
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
        <?php endforeach ?>
        <?php else: ?>
        <h5 class="alert alert-danger">Data not found</h5>
        <?php endif ?>
        </div>
    <?php endif ?>
    
    </div>
    <script>
        var name = document.getElementById("select");
    name = name.options[name.selectedIndex].text;
    alert(name)
        function sendData()
{
  var name = document.getElementById("select");
    name = name.options[name.selectedIndex].text;
    alert(name)
  $.ajax({
    type: 'post',
    url: 'insert.php',
    data: {
      name:name,
    },
    success: function (response) {
      $('#res').html("Vos données seront sauvegardées");
    }
  });
    
  return false;
}
    </script>
<?php $content = ob_get_clean();?>
<?php require 'layout/template.php'; ?>
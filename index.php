<?php
    session_start();

    require __DIR__.'/config/config.php';

    if(DEV_MODE == true){
        error_reporting(E_ALL);
        ini_set('error_reporting',true);
    }else{
        error_reporting(0);
        ini_set('error_reporting',false);
    }

    foreach (glob(BASEDIR.'/helpers/*.php') as $file){
        require $file;
    }

    $config['route'][0] = 'home';
    $config['lang'] = 'tr';

    if (isset($_GET['route'])){

        preg_match('@(?<lang>\b[a-z]{2}\b)/(?<route>.+)/?@',$_GET['route'],$sonuc);
    }

    if (isset($sonuc['lang'])){

        if (file_exists(BASEDIR.'language'.$sonuc['lang'].'.php')){
            $config['lang'] = $sonuc['lang'];
        }else{
            $config['lang'] = 'tr';
        }


    }
    if (isset($sonuc['route'])){
        $config['route'] = explode('/',$sonuc['route']);
    }

    require BASEDIR.'/language/'.$config['lang'].'.php';

    if (file_exists(BASEDIR.'/controller/'.$config['route'][0].'.php')){
        require BASEDIR.'/controller/'.$config['route'][0].'.php';
    }else {
        echo '<h1>404 Sayfa Bulunamadı</h1>';
        print_r($config['route']);
    }

    
   

?>
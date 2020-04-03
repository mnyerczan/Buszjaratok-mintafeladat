<?php

function homeController()
{
    view([
        "home"  => 'active',
        "title" => "- Home",
        'view'  => 'home'
    ]);
}

function newBusFormController()
{
    view([       
        "title"     => "- Új buszjárat felvétele",
        'view'      => 'newBusForm'
    ]);  
}

function newTestFormController()
{
     // Adatok, kapcsolat begyűjtése
     $config = getConfig(CONFPATH);
     $pdo    = getConnection($config);
 
     if (!$pdo)
     {
         view([       
             "title"     => "- Hiba",
             'view'      => '_error'            
         ]);        
     }
     

     view([       
        "title"     => "- Új vizsgálat felvétele",
        'view'      => 'newTestForm',
        'ids'       =>  getBusIds($pdo)
    ]);      
}

function newTestController()
{
    // Adatok, kapcsolat begyűjtése
    $test = $_POST;

    $config = getConfig(CONFPATH);
    $pdo    = getConnection($config);

    if (!$pdo)
    {
        view([       
            "title"     => "- Hiba",
            'view'      => '_error'            
        ]);        
    }

     // Módosítás
     $result = newTest($pdo, $test);

     // Visszajelzés
     if (!$result)
     {
         header('Refresh:2;url='.APPROOT.'/newTestForm');
 
         view([       
             "title"     => "- Sikertelen módosítás",
             'view'      => 'unsuccesfulModify'            
         ]);          
     }
     else
     {
         header('Refresh: 2; url='.APPROOT.'/allBus');
 
         view([       
             "title"     => "- Sikeres módosítás",
             'view'      => 'succesfulModify'            
         ]);  
         
     }      
}

function newBusCotroller()
{
     // Adatok, kapcsolat begyűjtése
     $bus = $_POST;

     $config = getConfig(CONFPATH);
     $pdo    = getConnection($config);
 
     if (!$pdo)
     {
         view([       
             "title"     => "- Hiba",
             'view'      => '_error'            
         ]);        
     }
 
    // Módosítás
    $result = newBus($pdo, $bus);

    // Visszajelzés
    if (!$result)
    {
        header('Refresh:2;url='.APPROOT.'/newBusForm');

        view([       
            "title"     => "- Sikertelen módosítás",
            'view'      => 'unsuccesfulModify'            
        ]);          
    }
    else
    {
        header('Refresh: 2; url='.APPROOT.'/allBus');

        view([       
            "title"     => "- Sikeres módosítás",
            'view'      => 'succesfulModify'            
        ]);  
        
    }      
}

function modifyBusCotroller()
{
    // Adatok, kapcsolat begyűjtése
    $bus = $_POST;

    $config = getConfig(CONFPATH);
    $pdo    = getConnection($config);

    if (!$pdo)
    {
        view([       
            "title"     => "- Hiba",
            'view'      => '_error'            
        ]);        
    }

    // Módosítás
    $result = modifyBus($pdo, $bus);

    // Visszajelzés
    if (!$result)
    {
        header('Refresh:2;url='.APPROOT.'/modifyBusForm');

        view([       
            "title"     => "- Sikertelen módosítás",
            'view'      => 'unsuccesfulModify'            
        ]);          
    }
    else
    {
        header('Refresh: 2; url='.APPROOT.'/allBus');

        view([       
            "title"     => "- Sikeres módosítás",
            'view'      => 'succesfulModify'            
        ]);  
        
    }        
}



function modifyBusFormController($datas)
{
    $id = $datas['id'];

    $config = getConfig(CONFPATH);
    $pdo    = getConnection($config);

    if (!$pdo)
    {
        view([       
            "title"     => "- Hiba",
            'view'      => '_error'            
        ]);        
    }

    $bus = getBusById($pdo, $id);
    

    if (!$bus)
    {
        view([           
            "title"     => "- Hiba",
            'view'      => '_error'            
        ]);   
    }

    extract($bus);

    view([           
        "title"     => "- Buszjárat módosítása",
        'view'      => 'modifyBusForm',
        'id'        => $id,
        'indulas'   => $indulas,
        'cel'       => $cel,
        'menetido'  => $menetido,
        'alacsony'  => $alacsony
    ]);  
   
}


function testesController($matches)
{
    $id = $matches['id'];

    $config = getConfig(CONFPATH);
    $pdo    = getConnection($config);

    if(!$pdo)
    {
        view([
            "allBus"    => 'active',
            "title"     => "- Hiba",
            'view'      => '_error'            
        ]);        
    }

    $testes = getTestes($pdo, $id);    
    

    view([    
        "title"         => "- Vizsgálatok",
        'view'          => 'testes',
        'testes'        => $testes,
        'numOfTestes'   => count($testes)
    ]);

}







function allBusController()
{
    $config = getConfig(CONFPATH);
    $pdo    = getConnection($config);

    if(!$pdo)
    {
        view([
            "allBus"    => 'active',
            "title"     => "- Hiba",
            'view'      => '_error'            
        ]);        
    }



    view([
        "allBus"    => 'active',
        "title"     => "- Menetrendek",
        'view'      => 'allBus',
        'buses'     => getAllBuses($pdo)
    ]);
}







/*--------------------------------------------------------------*/
function aboutController($datas)
{
    view([
        "about"  => 'active',
        "title" => "- About",
        'view'  => 'about'
    ]);
}


function notFoundController()
{
    view([        
        "title" => "- Page Not Found",
        'view' => '_404'
    ]);   
}

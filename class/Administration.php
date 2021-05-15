<?php

namespace Woow;

use Woof\Administration as WoofAdministration;


class Administration extends WoofAdministration
{


    public function __construct()
    {
        parent::__construct();


        $this->addPage(
            'Woow admininistration',        // label
            [$this, 'displayAdminPage'],    //callback
            'woow-administration-index'     // slug
        );


        $this->addPage(
            'Woow model test page',                   // caption
            [$this, 'displayModelTestPage'],    //callback
            'woow-administration-sandbox',    // slug
            'woow-administration-index'       // parent
        );



        $this->addPage(
            'Woow documentation',
            [$this, 'displayDocumentationPage'],
            'woow-administration-documentation',
            'woow-administration-index'
        );

    }


    public function displayModelTestPage()
    {
        echo $this->loadTemplate(__DIR__ . '/../views/wow-admin-model-test.php');
    }


    public function displayAdminPage()
    {
        echo $this->loadTemplate(__DIR__ . '/../views/wow-admin-index.php');

    }

    public function displayDocumentationPage()
    {
        echo "Documentation";
    }

}


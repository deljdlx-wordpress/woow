<?php

namespace Woow;

use Woof\Administration as WoofAdministration;


class Administration extends WoofAdministration
{


    public function __construct()
    {
        parent::__construct();


        $this->addPage(
            'Woow admininistration',
            [$this, 'displayAdminPage'],
            'woow-administration-index'
        );

        $this->addPage(
            'Woow documentation',
            [$this, 'displayDocumentationPage'],
            'woow-administration-documentation',
            'woow-administration-index'
        );

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


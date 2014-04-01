<?php

namespace Interim\EmployeeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class InterimEmployeeBundle extends Bundle
{

    public function getParent() {
        return 'FOSUserBundle';
    }

}

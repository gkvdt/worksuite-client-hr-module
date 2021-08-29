<?php

namespace Modules\Hr\Observers;

use Modules\Hr\Entities\ClientDesignation;

class ClientDesignationObserver
{

    public function saving(ClientDesignation $designation)
    {
        // Cannot put in creating, because saving is fired before creating. And we need company id for check bellow
        if (company()) {
            $designation->company_id = company()->id;
        }
    }

}

<?php

namespace Modules\Hr\Observers;

use Modules\Hr\Entities\ClientTeam;

class ClientTeamObserver
{

    public function saving(ClientTeam $team)
    {
        // Cannot put in creating, because saving is fired before creating. And we need company id for check bellow
        if (company()) {
            $team->company_id = company()->id;
        }
    }

}

<?php

namespace Modules\Hr\Entities;

use App\BaseModel;
use App\EmployeeDetails;
use App\Observers\TeamObserver;
use App\Scopes\CompanyScope;
use Modules\Hr\Observers\ClientTeamObserver;
class ClientTeam extends BaseModel
{
    protected static function boot()
    {
        parent::boot();

        static::observe(ClientTeamObserver::class);

        static::addGlobalScope(new CompanyScope);
    }

    public function members()
    {
        return $this->hasMany(EmployeeTeam::class, 'team_id');
    }

    public function member()
    {
        return $this->hasMany(EmployeeDetails::class, 'department_id');
    }
}

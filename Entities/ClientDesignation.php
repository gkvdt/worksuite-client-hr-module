<?php

namespace Modules\Hr\Entities;

use App\Scopes\CompanyScope;
use App\BaseModel;
use App\EmployeeDetails;
use Modules\Hr\Observers\ClientDesignationObserver;


class ClientDesignation extends BaseModel
{
    protected $fillable = ['name', 'company_id'];

    protected static function boot()
    {
        parent::boot();

        static::observe(ClientDesignationObserver::class);

        static::addGlobalScope(new CompanyScope);
    }

    public function members()
    {
        return $this->hasMany(EmployeeDetails::class, 'designation_id'); //TODO: CleintEmployeeDetais olacak
    }

}

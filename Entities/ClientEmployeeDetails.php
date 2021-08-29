<?php

namespace Modules\Hr\Entities;

use App\Observers\EmployeeDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use App\BaseModel;

class ClientEmployeeDetails extends BaseModel
{
    use CustomFieldsTrait;

    protected $table = 'client_employee_details';

    protected $dates = ['joining_date', 'last_date'];

    protected static function boot()
    {
        parent::boot();

        static::observe(EmployeeDetailObserver::class);

        static::addGlobalScope(new CompanyScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withoutGlobalScopes(['active']);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function department()
    {
        return $this->belongsTo(Team::class, 'department_id');
    }
}

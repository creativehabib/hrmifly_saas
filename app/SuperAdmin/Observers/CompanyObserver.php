<?php

namespace App\SuperAdmin\Observers;

use App\Classes\Common;
use App\Models\Company;
use App\Models\Role;
use App\SuperAdmin\Classes\SuperAdminCommon;

class CompanyObserver
{

    public function created(Company $company)
    {
        // $company = Common::addCurrencies($company);

        if (!$company->is_global) {
            $company = $this->addAdminRole($company);
            Common::insertInitSettings($company);

            // Adding Default Subscription Plan
            $company =  SuperAdminCommon::addInitialSubscriptionPlan($company);
        }
    }

    public function addAdminRole($company)
    {
        // Seeding Data
        $adminRole = new Role();
        $adminRole->company_id = $company->id;
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->description = 'Admin is allowed to manage everything of the app.';
        $adminRole->save();

        return $company;
    }
}

<?php

use App\Classes\Common;
use App\Models\Company;
use App\Models\Lang;
use App\Models\Translation;
use App\SuperAdmin\Models\GlobalCompany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('{path}', function () {
    if (file_exists(storage_path('installed'))) {

        $appName = "HrmiflySaas";
        $appVersion = File::get(public_path() . '/superadmin_version.txt');
        $modulesData = Common::moduleInformations();
        $themeMode = session()->has('theme_mode') ? session('theme_mode') : 'light';
        $company = GlobalCompany::first();
        $appVersion = File::get('superadmin_version.txt');
        $appVersion = preg_replace("/\r|\n/", "", $appVersion);
        $globalCompanyLang = DB::table('companies')->select('lang_id')->where('is_global', 1)->first();
        $lang = $globalCompanyLang && $globalCompanyLang->lang_id && $globalCompanyLang->lang_id != null ? Lang::find($globalCompanyLang->lang_id) : Lang::first();
        $loadingLangMessageLang = Translation::where('key', 'loading_app_message')
            ->where('group', 'messages')
            ->where('lang_id', $lang->id)
            ->first();
        // Logo
        if (app_type() == 'saas') {
            $company = Company::withoutGlobalScope('company')
                ->where('is_global', 1)
                ->first();
        } else {
            $company = Company::first();
        }

        return view('welcome', [
            'appName' => $appName,
            'appVersion' => preg_replace("/\r|\n/", "", $appVersion),
            'installedModules' => $modulesData['installed_modules'],
            'enabledModules' => $modulesData['enabled_modules'],
            'themeMode' => $themeMode,
            'company' => $company,
            'appVersion' => $appVersion,
            'appEnv' => env('APP_ENV'),
            'appType' => 'saas',
            'loadingLangMessageLang' => $loadingLangMessageLang->value,
            'defaultLangKey' => $lang->key,
            'loadingImage' => $company->light_logo_url,
        ]);
    } else {
        return redirect('/install');
    }
})->where('path', '^(?!api.*$).*')->name('main');

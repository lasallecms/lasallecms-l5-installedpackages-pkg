<?php

namespace Lasallecms\Installedpackages\Http\Controllers;

/**
 *
 * Installed Packages package for the LaSalle Content Management System, based on the Laravel 5 Framework
 * Copyright (C) 2015 - 2016  The South LaSalle Trading Corporation
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @package    Installed Packages package for the LaSalle Content Management System
 * @link       http://LaSalleCMS.com
 * @copyright  (c) 2015 - 2016, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */

// LaSalle Software
use Lasallecms\Installedpackages\Http\Controllers\Controller;
use Lasallecms\Installedpackages\CreateInstalledPackagesArray;
use Lasallecms\Helpers\HTML\HTMLHelper;

// Laravel facades
use Illuminate\Support\Facades\Config;

/**
 * Class InstalledPackagesController
 */
class InstalledPackagesController extends Controller
{

    /**
     * CandlelightingController constructor.
     */
    public function __construct() {

        // execute base controller's construct method first in order to run the middleware
        parent::__construct();
    }


    /**
     * List the LaSalle Software packages that are installed on this web app
     */
    public function ListInstalledPackages(CreateInstalledPackagesArray $createInstalledPackagesArray) {

        return view('installedpackages::installedpackages', [
            'installedPackages' => $createInstalledPackagesArray->CreateArray(),
            'template'          => Config::get('lasallecmsadmin.admin_template_name'),
            'HTMLHelper'        => HTMLHelper::class,
        ]);
    }
}
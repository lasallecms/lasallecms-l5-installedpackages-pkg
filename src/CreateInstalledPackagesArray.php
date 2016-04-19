<?php

namespace Lasallecms\Installedpackages;

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

/**
 * Class CreateInstalledPackagesArray
 * @package Lasallecms\Installedpackages
 */
class CreateInstalledPackagesArray
{

    /**  
     * What LaSalle Software packages are installed?
     *
     * @return array
     */
    public function CreateArray() {

        $allPackages = $this->allLaSalleSoftwarePackages();

        $installedPackages = [];

        foreach ($allPackages as $class) {

            if ( defined("\\".$class."\\Version::VERSION") ) {

                $installedPackages[] = [
                    'class'       => $class,
                    'version'     => constant("\\".$class."\\Version::VERSION"),
                    'description' => constant("\\".$class."\\Version::PACKAGE"),
                ];
            }
       }

        return $installedPackages;
    }

    public function allLaSalleSoftwarePackages() {
        return [
            'Lasallecms\Lasallecmsapi',
            'Lasallecms\Lasallecmsadmin',
            'Lasallecms\Lasallecmsfrontend',
            'Lasallecms\Formhandling',
            'Lasallecms\Helpers',

            'Lasallecms\Contact',
            'Lasallecms\Candlelighting',
            'Lasallecms\Servicetimes',
            'Lasallecms\Events',
            'Lasallecms\Filemanagement',
            'Lasallecms\Knowledgebase',
            'Lasallecms\Shortmessageservice',
            'Lasallecms\Installedpackages',

            'Lasallecrm\Lasallecrmapi',
            'Lasallecrm\Lasallecrmadmin',
            'Lasallecrm\Lasallecrmcontact',
            'Lasallecrm\Todo',
            'Lasallecrm\Lasallecrmemail',
            'Lasallecrm\Listmanagement',

            'Lasallecast\Lasallecastapi',
            'Lasallecast\Lasallecastadmin',
            'Lasallecast\Lasallecastfrontend',
            'Lasallecast\Lasallecastitunes',
        ];
    }
}
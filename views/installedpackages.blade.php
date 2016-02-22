@extends('lasallecmsadmin::'.$template.'.layouts.default')


@section('content')

    <section class="content">
        <div class="container">

            {{-- form's title --}}
            <div class="row">
                <br /><br />
                {!! $HTMLHelper::adminPageTitle('LaSalleCMS', 'List of Installed LaSalle Software Packages', '') !!}
                <br /><br />
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">

                    <table class="table table-striped table-bordered table-condensed table-hover">

                        <thead>
                        <tr class="info">
                            <th style="text-align: center;">Package Name</th>
                            <th style="text-align: center;">Version</th>
                            <th style="text-align: center;">Description</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($installedPackages as $installedPackage)
                            <tr>
                                <td align="left">{!! $installedPackage['class'] !!}</td>
                                <td align="center">{!! $installedPackage['version'] !!}</td>
                                <td align="left">{!! $installedPackage['description'] !!}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div> <!-- col-md-9 -->
            </div> <!-- row -->

        </div> <!-- container -->
    </section>

@stop
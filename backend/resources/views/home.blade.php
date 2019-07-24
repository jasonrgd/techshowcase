@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> School Statistics</div>
                    <div class="card-body">
                        <?php $timezone = 10; ?>
                        <p>Number of Schools present in database: <?php echo $stats[0]->number_of_schools; ?> </p>
                        <p>Last Updated : <?php echo date("d M Y H:i:s",
                                strtotime($stats[0]->updated_at) + 3600 * ($timezone)); ?>  </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">NSW government school enrolments by head count (2004-2018)</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive table table-striped">
                            <table id="schoolData" class="table">
                                <caption>NSW government school enrolments by head count (2004-2018)</caption>
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col"> School Code</th>
                                    <th scope="col"> School Name</th>

                                    <?php
                                    foreach (config('schooldata.years') as $year) {
                                    ?>
                                    <th scope="col"> <?php echo $year; ?></th>

                                    <?php
                                    }
                                    ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($schools as $school) {
                                ?>
                                <tr>
                                    <th scope="row"> <?php echo $school['School Code']; ?> </th>
                                    <td> <?php echo $school['School Name']; ?> </td>

                                    <?php
                                    foreach (config('schooldata.years') as $year) {
                                    ?>
                                    <th scope="col"> <?php echo $school['HC_'.$year];; ?></th>

                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

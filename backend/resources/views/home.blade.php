@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> School Statistics</div>
                    <div class="card-body">
                        <?php $timezone  = 10; ?>
                        <p>Number of Schools present in database: <?php echo $stats[0]->number_of_schools; ?> </p>
                        <p>Last Updated : <?php echo date( "d M Y H:i:s" ,strtotime($stats[0]->updated_at) + 3600*($timezone)); ?>  </p>
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
                                    <th scope="col"> 2004</th>
                                    <th scope="col"> 2005</th>
                                    <th scope="col"> 2006</th>
                                    <th scope="col"> 2007</th>
                                    <th scope="col"> 2008</th>
                                    <th scope="col"> 2009</th>
                                    <th scope="col"> 2010</th>
                                    <th scope="col"> 2011</th>
                                    <th scope="col"> 2012</th>
                                    <th scope="col"> 2013</th>
                                    <th scope="col"> 2014</th>
                                    <th scope="col"> 2015</th>
                                    <th scope="col"> 2016</th>
                                    <th scope="col"> 2017</th>
                                    <th scope="col"> 2018</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($schools as $school) {
                                ?>
                                <tr>
                                    <th scope="row"> <?php echo $school['School Code']; ?> </th>
                                    <td> <?php echo $school['School Name']; ?> </td>
                                    <td> <?php echo $school['HC_2004']; ?> </td>
                                    <td> <?php echo $school['HC_2005']; ?> </td>
                                    <td> <?php echo $school['HC_2006']; ?> </td>
                                    <td> <?php echo $school['HC_2007']; ?> </td>
                                    <td> <?php echo $school['HC_2008']; ?> </td>
                                    <td> <?php echo $school['HC_2009']; ?> </td>
                                    <td> <?php echo $school['HC_2010']; ?> </td>
                                    <td> <?php echo $school['HC_2011']; ?> </td>
                                    <td> <?php echo $school['HC_2012']; ?> </td>
                                    <td> <?php echo $school['HC_2013']; ?> </td>
                                    <td> <?php echo $school['HC_2014']; ?> </td>
                                    <td> <?php echo $school['HC_2015']; ?> </td>
                                    <td> <?php echo $school['HC_2016']; ?> </td>
                                    <td> <?php echo $school['HC_2017']; ?> </td>
                                    <td> <?php echo $school['HC_2018']; ?> </td>
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

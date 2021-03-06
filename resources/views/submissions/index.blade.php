@extends('layouts.app')

@section('content')

 <div class="container container-pad">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <th>Address</th>
                        <th>City</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">PBM</th>
                        <th class="text-right">Reno Cost</th>
                        <th class="text-right">ARV</th>
                        <th class="text-right">Closing Date</th>
                        </thead>
                        <tbody>
                        @foreach($submissions as $submission)
                            <tr>
                                <td><a href="{{ url('/submissions') }}/{{$submission}}" class="link-blue">{{$submission->address}}</a>&nbsp;</td>
                                <td>{{$submission->city}}&nbsp;</td>
                                <td class="text-right">
                                    <span class=""><i class="fa fa-file-text"></i>
                                        &nbsp;
                                       ${{number_format($submission->offer_price)}}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <span class=""><i class="fa fa-file-text"></i>
                                        &nbsp;
                                       {{strval(round($submission->percent_below_market)).'%'}}
                                    </span>
                                </td>
                                  <td class="text-right">
                                    <span class=""><i class="fa fa-file-text"></i>
                                        &nbsp;
                                       ${{number_format($submission->repair_cost)}}
                                    </span>
                                </td>
                                  <td class="text-right">
                                    <span class=""><i class="fa fa-file-text"></i>
                                        &nbsp;
                                       ${{number_format($submission->arv)}}
                                    </span>
                                  </td>
                                  <td class="text-right">
                                    <span class=""><i class="fa fa-file-text"></i>
                                        &nbsp;
                                        <?php $date = date_create($submission->closing_date); ?>
                                       {{date_format($date,"m-d-Y")}}
                                    </span>
                                  </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

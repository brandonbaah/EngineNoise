@extends('layouts.app')

@section('content')
<div class="">
  <div class="" align="center">
    <h2>{{$submission->address}}</h2><br>

    <div class="progress" style="width: 800px; height: 120px;">
      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"><h2>Good Deal</h2></div>
    </div><br><br>
    <div align="center">

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Address</th>
                    <th>City</th>
                    <th class="text-right">List Price</th>
                    <th class="text-right">Offer Price</th>
                    <th class="text-right">PBM</th>
                    <th class="text-right">Reno Cost</th>
                    <th class="text-right">ARV</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$submission->address}}</td>
                            <td>{{$submission->city}}</td>

                            <td class="text-right">
                                <span class=""><i class="fa fa-file-text"></i>
                                    &nbsp;
                                    ${{number_format($submission->list_price)}}
                                </span>
                            </td>
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>



</div>

@endsection

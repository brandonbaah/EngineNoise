@extends('layouts.app')

@section('content')
<div class="">
  <div class="" align="center">
    <h2>{{$submission->address}}</h2><br>

    <div class="progress" style="width: 800px; height: 120px;">
      <div class="progress-bar {{$bloomRisk}}" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"><h2>{{$submission->name}}</h2></div>
    </div><br><br>
    <div align="center">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Inquire
      </button> <br><br>
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Raise Interest</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          If you submit this inquiry a message will be sent to the investor in possession of this deal.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit Inquiry</button>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

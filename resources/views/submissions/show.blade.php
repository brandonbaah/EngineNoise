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
      </button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editSubmission">
        Edit Deal
      </button><br><br>
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

  <!-- Modal -->
  <div class="modal fade" id="editSubmission" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSubmissionTitle">Edit Deal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="col-xs-4">
          <form action="{{route('submissions.update',$submission->id)}}" method="PATCH">              <div class="form-group mx-sm-3 mb-2">
            List Price
            <div>
                <input type="text" class="form-control" name="list_price" placeholder="List Price" value="{{number_format($submission->list_price)}}">
              </div>
              <div class="form-group mx-sm-3 mb-2">Offer Price
                <input type="text" class="form-control" name="offer_price" placeholder="Offer Price" value="{{number_format($submission->offer_price)}}">
              </div>
              <div class="form-group mx-sm-3 mb-2">Market Value
                <input type="text" class="form-control" name="market_value" placeholder="Market Value" value="{{number_format($submission->market_value)}}">
              </div>
              <div class="form-group mx-sm-3 mb-2">Repair Cost
                <input type="text" class="form-control" name="repair_cost" placeholder="Repair Cost" value="{{number_format($submission->repair_cost)}}">
              </div>
              <div class="form-group mx-sm-3 mb-2">After Repair Value
                <input type="text" class="form-control" name="arv" placeholder="After Repair Value" value="{{number_format($submission->arv)}}">
              </div>
              <div class="form-group mx-sm-3 mb-2">Closing Date
                <input type="date" class="form-control" name="closing_date" placeholder="Closing Date" value="{{$submission->closing_date}}">
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div align='center'><button type="submit" class="btn btn-primary mb-2">Update</button></div>
          </form>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

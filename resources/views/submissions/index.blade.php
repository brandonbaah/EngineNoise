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
                        <th class="text-right">List Price</th>
                        <th class="text-right">Offer Price</th>
                        <th class="text-right">Percentage Below Market</th>
                        </thead>
                        <tbody>
                        @foreach($submissions as $submission)
                            <tr>
                                <td><a href="" class="link-blue">{{$submission->address}}</a></td>
                                <td>brand</td>

                                <td class="text-right">
                                    <span class="approvals one"><i class="fa fa-file-text"></i>
                                        &nbsp;
                                        {{$submission->city}}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <span class="approvals two "><i class="fa fa-file-text"></i>
                                        &nbsp;
                                       {{$submission->offer_price}}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <span class="approvals three"><i class="fa fa-file-text"></i>
                                        &nbsp;
                                       {{$submission->percent_below_market}}
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

 
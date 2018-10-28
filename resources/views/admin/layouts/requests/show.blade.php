
@extends('admin.templates.default')

@section('styles')

@endsection


@section('header')
    <!-- Main Nav -->
    @include('admin.partials.nav')

    <!-- SideNav slide-out button -->
    @include('admin.partials.side-nav')
@endsection


@section('content')
    <!--Main layout-->
    <div class="container-fluid">

        <!--Section: Main panel-->
        <section>
            <div class="row">
                <div class="col-lg-12 col-xs-12 text-center">
                    <div class="card card-cascade narrower mb-5">
                        <h3 class="card-header primary-color white-text gradient-card-header justify-content-between align-items-center"><i class="fa fa-person mr-2" style="color: #fffde7"></i>Investment Request</h3>
                        <div class="card-body">
                            <h4 class="card-title">Viewing Business Investment Request From {{ $request->fullname }}</h4>
                            <div class=" col-md-12">
                                <table class="table table-user-information card-text text-justify">
                                    <tbody>
                                    <tr>
                                        <td>Title:</td>
                                        <td>{{ $request->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>From:</td>
                                        <td>{{ $request->fullname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Business Name:</td>
                                        <td>{{ $request->businessname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Amount Needed ($):</td>
                                        <td>${{ $request->amount_needed }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>{{ $request->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>
                                            {{ $request->email }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Address:</td>
                                        <td>{{ $request->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address Two:</td>
                                        <td>{{ $request->address_two }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality:</td>
                                        <td>{{ $request->nationality }}</td>
                                    </tr>
                                    <tr>
                                        <td>Countries Of Operation:</td>
                                        <td>
                                            @foreach(json_decode($request->operation_countries) as $country)
                                                {{ $country }},
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>City:</td>
                                        <td>{{ $request->city }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td>{{ $request->gender }}</td>
                                    </tr>

                                    <tr>
                                        <td>Status:</td>
                                        <td>{{ $request->status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Accepted Terms & Conditions:</td>
                                        <td>
                                            @if ($request->agreed)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Date Sent</td>
                                        <td>{{ prettyDate($request->created_at) }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="pull-right">
                                <a href="{{ URL::previous() }}" data-original-title="Back To Previous Page" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Section: Main panel-->


    </div>
    <!--Main layout-->
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

        } );

    </script>

@endpush



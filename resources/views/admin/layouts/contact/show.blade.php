
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
                        <h3 class="card-header primary-color white-text gradient-card-header justify-content-between align-items-center"><i class="fa fa-inbox mr-2" style="color: #fffde7"></i>Contact Message</h3>
                        <div class="card-body">
                            <h4 class="card-title">Viewing Message From {{ $contact->name }}</h4>
                            <div class=" col-md-12">
                                <table class="table table-user-information card-text text-justify">
                                    <tbody>
                                    <tr>
                                        <td>From:</td>
                                        <td>{{ $contact->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>{{ $contact->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>
                                            {{ $contact->email }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Date Sent</td>
                                        <td>{{ prettyDate($contact->created_at) }}</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Subject</td>
                                        <td>{{ $contact->subject }}</td>
                                    </tr>
                                    <tr>
                                        <td> Message:</td>
                                        <td>{{ $contact->message }}</td>
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



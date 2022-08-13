@extends('layouts.app')

@section('title','Reservation')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   @include('layouts.partial.message')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">{{ $contact->subject }}</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Name : {{ $contact->name }}</strong><br>
                                    <b>Email : {{ $contact->email }}</b><br>
                                    <strong>Message :</strong><hr>
                                    <p>{{ $contact->message }}</p>
                                    <a href="{{ route('contact.index') }}" class="btn btn-danger btn-sm">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush
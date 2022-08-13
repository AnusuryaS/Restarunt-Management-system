@extends('layouts.app')



@push('css')
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-1">
                    <div class="card">
                        
                        @include('layouts.partial.message')<br>
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">Login</h4>
                        </div>
                        <div class="card-content">
                          <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                   value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="text" class="form-control" name="password">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger">Login</button>
                                <a href="{{ route('indexView') }}" class="btn btn-success">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
  
@endpush
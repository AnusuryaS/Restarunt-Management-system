@extends('layouts.app')

@section('title','Dashboard')


@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


@section('content')

 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats" style="background-color: green;">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                </div>
                  <p class="card-category" style="color: white;">Category/Item</p>
                  <h3 class="card-title" style="color: white;">{{ $categoryCount }}/{{ $itemCount }}
                  </h3>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger" style="color: white;">content_copy</i>
                    <a style="color: white;">Total category and item</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats" style="background-color: blue;">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">slideshow</i>
                  </div>
                </div>
                  <p class="card-category" style="color: white;">Sliders</p>
                  <h3 class="card-title" style="color: white;">{{ $sliderCount }}</h3>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger" style="color: white;">slideshow</i> 
                    <a href="{{ route('slider.index') }}" style="color: white;">Get more details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats" style="background-color: red">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">library_books</i>
                  </div>
                </div>
                  <p class="card-category" style="color: white;">Reservations </p>
                  <h3 class="card-title" style="color: white;">{{ $reservations->count() }}</h3>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger" style="color: white;">library_books</i> 
                    <a style="color: white;">request for reservation</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats" style="background-color: orange">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_paste</i>
                  </div>
                </div>
                  <p class="card-category" style="color: white;">Contact</p>
                  <h3 class="card-title" style="color: white;">{{ $contactCount }}</h3>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger" style="color: white;">content_paste</i> 
                    <a href="{{ route('contact.index') }}" style="color: white;">Message form user</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   @include('layouts.partial.message')
                    <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">All Reservation</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table table-striped table-bordered"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $key=>$reservation)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $reservation->name }}</td>
                                            <td>{{ $reservation->phone }}</td>
                                            <td>
                                            @if($reservation->status == true)
                                            <span class="label label-info">Confirmed</span>
                                            @else
                                            <span class="label label-info">Not Confirm yet</span>
                                            
                                            @endif
                                            </td>
                                            <td>
                                        
                                        @if($reservation->status == false)
                                        
                                             <form id="delete-form-{{ $reservation->id }}}" method="post" action="{{ route('reservation.status',$reservation->id ) }}"
                                                   style="display: none;">
                                                 @csrf
                                             </form>
                                                <button type="button" class="btn btn-info btn-sm" 
                                                    onclick="if(confirm('Are you verity this request by phone?')){
                                                    event.preventDefault();
                                                    document.getElementById('status-form-{{ $reservation->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">done</i></button>
                                        @endif
                                        
                                             <form id="delete-form-{{ $reservation->id }}}" method="post" action="{{ route('reservation.destroy',$reservation->id ) }}"
                                                   style="display: none;">
                                                 @csrf
                                                 @method('DELETE')
                                             </form>
                                                <button type="button" class="btn btn-danger btn-sm" 
                                                    onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $reservation->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                   
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush
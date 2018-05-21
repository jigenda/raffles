@extends('layouts.app')

@section('content')
<div class="container">
<h3>Seller's Account</h3>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#raffles" role="tab" aria-controls="raffles" aria-selected="true">Manage Raffles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#organisations" role="tab" aria-controls="organisations" aria-selected="false">Manage Tickets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Manage Sales</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="raffles" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
            <div class="col">
              
            <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Select Organisation</label>
                <div class="col-sm-10">
                   
              
             @if(count($records) > 1)    
                <select id="orgname" name="orgname" class="form-control">
                   
                    @foreach($records as $key => $org)
                        <option value="{{$key}}">{{ $org}}</option>

                    @endforeach
                    
                </select>
            @else
                    <p>No Organisations Found. Please add Organisation first</p>
            @endif
             
            </div> 
            </div> 
            </div> 
            </div> 
            <div class="card d-none" id="raffles_tab">
            <div class="card-header">
                    <div class="    ">
                        
                        <div class="   float-right">
                            <button class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Add New Raffle</button>
                        </div>
                    </div>
                    </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              <a class="nav-link stat active" id="Draft-tab" data-toggle="pill" href="#Draft" role="tab" aria-controls="Draft" aria-selected="true">Draft</a>
                              <a class="nav-link stat" id="Current-tab" data-toggle="pill" href="#Current" role="tab" aria-controls="Current" aria-selected="false">Current</a>
                              <a class="nav-link stat" id="Previous-tab" data-toggle="pill" href="#Previous" role="tab" aria-controls="Previous" aria-selected="false">Previous</a>
                             
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="Draft" role="tabpanel" aria-labelledby="Draft-tab">
                                    <table id="example" class="table table-striped table-bordered dt-responsive  " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Total Prizes</th>
                                                <th>Total Prize Value</th>
                                                <th>Last Selling Date</th>
                                                <th>Draw date</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="draft_tbody">
                                              
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="Current" role="tabpanel" aria-labelledby="Current-tab">
                                Current
                                </div>
                                <div class="tab-pane fade" id="Previous" role="tabpanel" aria-labelledby="Previous-tab">
                                Previous
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
      <div class="tab-pane fade" id="organisations" role="tabpanel" aria-labelledby="profile-tab">
      Organisations
      </div>
      <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="contact-tab">
      Sellers
      </div>
    </div>
     
</div>
<!-- Large modal -->
 
<div class="modal fade bd-example-modal-lg" id="new_raffle" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Raffle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(['route' => 'createRaffle', 'method' => 'POST']) !!}
      <div class="modal-body">
         
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Raffle Name:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ticket Price:</label>
            <input type="text" class="form-control" id="price" name="price">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label " >Last Selling Date:</label>
            <input type="text" class="form-control datepicker" data-toggle="datepicker" id="end_date" name="end_date">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label "  >Date of Draw:</label>
            <input type="text" class="form-control datepicker" data-toggle="datepicker" id="draw_date" name="draw_date">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Place of Draw:</label>
            <textarea class="form-control" id="message-text" id="draw_location" name="draw_location"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Max Ticket to Sell:</label>
            <input type="number" class="form-control" min="0" id="max_tickets" name="max_tickets"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        <input type="hidden" name="organisation_id" id="organisation_id">
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="new_prizes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prizes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(['route' => 'createRaffle', 'method' => 'POST']) !!}
      <div class="modal-body">
         
           <h2>Prizes Here</h2>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        <input type="hidden" name="organisation_id" id="organisation_id">
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="new_discount" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Discount</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(['route' => 'createRaffle', 'method' => 'POST']) !!}
      <div class="modal-body">
         
           <h2>Discount Here</h2>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        <input type="hidden" name="organisation_id" id="organisation_id">
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

 <script src="{{ asset('js/datepicker.js') }}" type="text/javascript" defer></script> 
<script>

    var role = "{{Auth::user()->role_id}}";
    
    $(document).ready(function() {
        $('#example').DataTable();

        $('[data-toggle="datepicker"]').datepicker({
            autoHide: true,
            zIndex: 2048,
          });
        $("#orgname").on('change', function(){
            if($(this).val() != 0){
                //get data
                $.get('/getRaffles',{org:$(this).val(),status:'Draft'}, function(data,status){
                    console.log(status);
                    console.log(data);
                    if(data.length > 0){
                      var table = '';
                      $.each(data, function(i,v){
                        console.log(v.status)
                        table += `<tr>
                                  <td>${v.name}</td>
                                  <td>Not Set</td>
                                  <td>Not Set</td>
                                  <td>${v.end_date}</td>
                                  <td>${v.draw_date}</td>
                                  <td>${v.price}</td>
                                  <td><button class="btn btn-info btn-sm">View</button>
                                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#new_discount">Discount</button>
                                  <button class="btn btn-primary btn-sm prizes" data-toggle="modal" data-target="#new_prizes">Prizes</button>
                                  <button class="btn btn-danger btn-sm">Delete</button></td>
                                  </tr>`;
                      });
                      $("#example").DataTable().destroy();
                      $("#draft_tbody").html(table);
                       
                         
                      draft_table = $("#example").DataTable({
                            responsive: true,
                            "autoWidth": false,
                            "order": [[ 0, "asc" ]],
                            "bDestroy": true  ,
                            "deferRender": false,
                            "processing": true,
                             "columnDefs": [
                                              {className: " text-left", targets: [0]},
                                              {className: "text-left", targets:[1]},
                                              {className: "text-left", targets:[2]},
                                              {className: "text-left", targets:[3]},
                                              {className: "text-left", targets:[4]},
                                              {className: "text-left", targets:[5]},
                                              {className: "text-left", targets:[6]},
                                              
                                              { orderable: false, targets: [6] }
                                            ],

                            'fnCreatedRow': function (nRow, aData, iDataIndex) {
                               // $(nRow).attr('id',   + aData[6]); // or whatever you choose to set as the id

                            } 
                         });

                    }
                });
                $("#raffles_tab").removeClass('d-none');
            }else{
                $("#raffles_tab").addClass('d-none');
            }
            $("#organisation_id").val($(this).val());
        });

        $('#new_raffle').on('shown.bs.modal', function() {
            if (role == 2) {
                $.get('/getSellers',{org:$("#orgname").val()}, function(data,status){
                    console.log(status);
                    console.log(data);
                });
            }
        });

        $(".stat").on('click', function(){
            console.log($(this).attr('href'));
            console.log($("#orgname").val())
        })

    } );
</script>
@endsection

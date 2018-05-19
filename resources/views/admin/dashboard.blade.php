@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#raffles" role="tab" aria-controls="raffles" aria-selected="true">Manage Raffles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#organisations" role="tab" aria-controls="organisations" aria-selected="false">Manage Organisations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Manage Sellers</a>
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
                            <button class="btn btn-info">Add New Raffle</button>
                        </div>
                    </div>
                    </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Draft</a>
                              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Current</a>
                              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Previous</a>
                             
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Total Prizes</th>
                                                <th>Total Prize Value</th>
                                                <th>Last Selling Date</th>
                                                <th>Draw date</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                Current
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
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
<script>
    $(document).ready(function() {
    $('#example').DataTable();

        $("#orgname").on('change', function(){
            if($(this).val() != 0){
                //get data
                $.get('/admin/getRaffles',{draft:$(this).val()}, function(status,data){
                    console.log(status);
                    console.log(data);
                });
                $("#raffles_tab").removeClass('d-none');
            }else{
                $("#raffles_tab").addClass('d-none');
            }
        });

    } );
</script>
@endsection

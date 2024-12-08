@extends('layouts.admin.dashboard')
@section('contents')
@if(Session::has('success'))
<script>
Swal.fire({
    position: 'center',
    icon: 'success',
    text: '{{Session::get('success')}}',
    showConfirmButton: true,
    timer: '5000',
})
</script>
@endif
@if(Session::has('error'))
<script>
Swal.fire({
    position: 'center',
    icon: 'error',
    text: '{{Session::get('error')}}',
    showConfirmButton: true,
    timer: '5000',
})

</script>

@endif


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-md-8">
                            
                            <h4 class="card-title"><i class="fa fa-users"></i><b> All Orders</b></h4>
                        </div>
                        <div class="col-md-4 text-right">
                        </div>
                    </div>

                </div>       
                <div class="card-body">
                    
                    <div class="table-responsive">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover dt-responsive">
                        
                        <thead class="bg-primary text-white">
                        <tr>
                            
                            <th>#</th>
                            
                            
                            <th>Customer Name</th>
                            <th>Food Item</th>
                            
                            <th>Food Quantity</th>
                            <th>Subtotal</th>
                            
                            <th>Total</th>
                            
                            
                            <th>Order Time</th>
                            <th>Manage</th>
                        </tr>

                        </thead>
                        <tbody>
                        
                        @php
                            $c=1;
                            $order=0;
                        @endphp
                        
                        
                        @foreach($all as $data)
                        <tr>
                            
                            @php if($order==$data->orderNumber->id){ @endphp
                            <td></td>
                            <td></td>
                            @php }else{ @endphp
                            
                            <td><b>{{$c++}}</b></td>
                            <td class="text-success"><b><a href="{{ route('customer_profile', ['id' => $data->customer_id]) }}">{{$data->customerInfo->name}}</a></b></td>

                            @php } @endphp
                            
                            <td class="text-success"><b>{{$data->foodInfo->food_item_name}}</b></td>
                            
                            <td class="text-danger"><b>{{$data->order_quantity}}</b></td>
                            
                            <td class="text-success"><b>{{ number_format($data->total_price, 2) }} <span class="text-warning">Taka</span></b></td>
                            @php if($order==$data->orderNumber->id){ @endphp
                            <td></td>
                            @php }else{ @endphp

                            <td class="text-success"><b>{{ number_format($data->orderNumber->order_total_price, 2)}} <span class="text-danger">Taka</span></b></td>
                            @php } @endphp
                            @php if($order==$data->orderNumber->id){ @endphp
                            <td></td>
                            @php }else{ @endphp
                            <td class="text-info">
                                <b>                            
                                    @php
                                    $date = strtotime($data->created_at);
                                    if($data->created_at!=NULL){
                                        echo date("F j, Y, g:i a", $date);
                                    }
                                    @endphp
                                </b>
                            
                            </td>
                            
                            @php } @endphp
                            
                            @php if($order==$data->orderNumber->id){ @endphp
                            <td></td>
                            @php }else{ @endphp
                            <td>
                                @if($data->order_deliver_status=='0')
                                <a href="{{ route('order_deliver', ['id' => $data->id]) }}" class="btn btn-success">Delivery</a>
                                @else
                                <span class="text-success"><b>@php echo 'Delivered'; @endphp</b></span>
                                @endif
                            </td>
                            @php } @endphp
                        </tr>
                        @php $order = $data->orderNumber->id; @endphp
                        @endforeach


                    
                    </tbody>
                    
                    </table>
                    
                
                    </div>
                
                </div>

                <div class="card-footer">
                </div>

            </div>
        </div>
    </div>

</div>

<!-- delete modal start -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    
    <form method="post" action="{{ route('delete_customer') }}">

    @csrf


    <div class="modal-content">
        <div class="modal-header modal_header">
            <h5 class="modal-title mt-0" id="myModalLabel"></h5>
        </div>
        <div class="modal-body modal_card">
          Are you want to delete this customer?
          
          <input type="hidden" id="modal_id" name="modal_id">
        
        </div>
        
        
        <div class="modal-footer">


            <button type="submit" class="btn btn-md btn-danger text-white waves-effect waves-light">Yes</button>
            <button type="button" class="btn btn-md btn-info waves-effect" data-dismiss="modal">No</button>
        
        </div>
    
    </div>
    
    </form>
  
</div>


</div>


@endsection







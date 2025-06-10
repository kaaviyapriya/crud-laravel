<div class="row">
   <div class="col-lg-12 margin-tb">
       <div class="pull-left">
           <h2>Edit Product</h2>
       </div>
      
   </div>
</div>

@if ($errors->any())
   <div class="alert alert-danger">
       <strong>Whoops!</strong> There were some problems with your input.<br><br>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<form action="{{ url('testupdate') }}" method="POST">
   @csrf
   @method('PUT')

    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Name:</strong>
               <input type="text" name="name" value="{{ $tests->name }}" class="form-control" placeholder="Name">
           </div>
       </div>
       <input type="hidden" name="id" value="{{ $tests->id }}" class="form-control" placeholder="Name">
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Email:</strong>
               <input type="text" name="email" value="{{ $tests->email }}" class="form-control" placeholder="Name">
           </div>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Mobile:</strong>
               <input type="text" name="mobile" value="{{ $tests->mobile }}" class="form-control" placeholder="Mobile">
           </div>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Address:</strong>
               <textarea class="form-control" style="height:150px" name="address" placeholder="Detail">{{ $tests->address }}</textarea>
           </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
         <button type="submit" class="btn btn-primary">Submit</button>
       </div>
   </div>

</form>
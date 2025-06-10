<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="{{url('/contact')}}" method="post">
@csrf

  <label for="fname">name:</label><br>
  <input type="text" id="name" name="name">
  @if ($errors->has('name'))
                          <div>
                             <h4 class="card-title" style="color: red;">{{ $errors->first('name') }}
                             </h4>
                          </div>  
                        @endif
  <br>
  <label for="lname">Email:</label><br>
  <input type="text" id="email" name="email">
  @if ($errors->has('email'))

  <div>
        <h4 class="card-title" style="color: red;">{{ $errors->first('email') }}
         </h4>
        </div>
        @endif
<br>
        <label for="lname">Mobile:</label><br>
  <input type="text" id="mobile" name="mobile">
  @if ($errors->has('mobile'))

  <div>
        <h4 class="card-title" style="color: red;">{{ $errors->first('mobile') }}
         </h4>
        </div>
        @endif


        <br>
  <label for="lname">Address:</label><br>
  <input type="text" id="address" name="address"><br><br>
  <input type="submit" value="Submit">
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">Mobile</th>
      <th scope="col">address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($tests as $test)
    <tr>
      <th scope="row">{{$test->id}}</th>
      <td>{{$test->name}}</td>
      <td>{{$test->email}}</td>
      <td>{{$test->mobile}}</td>
      <td>{{$test->address}}</td>
      <td><a class="btn btn-primary" href="{{url('edittest',$test->id)}}">Edit</a> 
        <a class="btn btn-danger" href="{{url('deletetask',$test->id)}}">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>

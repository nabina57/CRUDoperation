<!doctype html>
<html lang="en">
  <head>
    <title>Customer Info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <h2><center>{{$title}}</center></h2>
    <form action="{{$url}}" method="post">
        @csrf
    <div class="container">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Enter name here." value="{{$customer->name}}" >
        <span>
            @error('name')
            {{$message}}
            @enderror
        </span>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Enter email here." value="{{$customer->email}}">
            <span>@error('email')
                {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" id="address" class="form-control" placeholder="Enter address here." value="{{$customer->address}}" >
        <span>
            @error('address')
            {{$message}}
            @enderror
        </span>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Enter password here.">
          <span>
            @error('password')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="form-group">
          <label for="gender">Gender</label><br>
          <input type="radio" name="gender" id="gender" value="M" {{$customer->gender=="M" ? "checked" : ""}}>Male
          <input type="radio" name="gender" id="gender" value="F" {{$customer->gender=="F" ? "checked" : ""}}>Female
          <input type="radio" name="gender" id="gender" value="O" {{$customer->gender == "O" ? "checked" : ""}}>Other
          <br><span>
            @error('gender')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <input type="radio" name="status" id="status" value="1"checked="checked">Active
          <input type="radio" name="status" id="status" value="0">Inactive
        </div> 
        <div class="form-group">
          <label for="dob">Date_of_Birth</label>
          <input type="date" name="dob" id="dob" class="form-control"value="{{$customer->date_of_birth}}">
          @error('dob')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" name="Submit">
          <input type="reset" class="btn btn-warning" name="Reset">
        </div>
    </div>
    </form>
  </body>
</form>
</html>
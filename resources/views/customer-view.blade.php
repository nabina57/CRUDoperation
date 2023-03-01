<!doctype html>
<html lang="en">
  <head>
    <title>Table of Customers</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
    <a href="{{route('customer.create')}}">
    <button class="btn btn-primary">Add Customer</button></a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Date_of_birth</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td scope="row">{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td>@if($customer->gender=="M")
                    Male
                    @elseif($customer->gender=="F")
                    Female
                    @else
                    Other
                    @endif
                </td>
                <td>@if($customer->status=="1")
                    Active
                    @else
                    Inactive
                    @endif
                </td>
                <td>{{$customer->date_of_birth}}</td>
                <td>
                    <a href="{{url('/form/delete/')}}/{{$customer->id }}"><button class="btn btn-danger">Delete</button>
                    </a>
                </td>
                <td>
                    <a href="{{route('customer.edit',['id'=> $customer->id])}}"><button class="btn btn-primary">Edit</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
  </body>
</html>
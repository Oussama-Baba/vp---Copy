<!-- resources/views/user.blade.php -->

@extends('layouts.dashbordcus')

@section('title', 'User Dashboard')

@section('content')
   <style>
       .container {
           margin: 20px auto; /* Auto margin for centering */
           padding: 20px;
           background-color: #f0f0f0;
           border: 1px solid #ccc;
           border-radius: 5px;
           text-align: center; /* Center-align text */
       }
       h1 {
           color: #333;
           font-size: 24px;
           margin-bottom: 10px;
       }
       p {
           color: #666;
           font-size: 16px;
       }

       .table-responsive {
        margin: 40px auto; /* Auto margin for centering */
           max-width: calc(100% - 200px); /* Maximum width minus 100px left and right */
           overflow-x: auto; /* Enable horizontal scroll if necessary */
           height: 500px;

       }
       .text-red {
    color: rgb(0, 0, 0);
    background-color: #ff4b4b; /* Light red background */
  }

  .text-yellow {
    color: rgb(5, 5, 0);
    background-color: yellow;
     /* Light yellow background */
  }
  .text-bleau {
    color: rgb(5, 5, 0);
    background-color: rgb(79, 69, 219);
     /* Light yellow background */
  }
  .btn-outline-success {
           float: right; /* Float the element to the right */
           margin-bottom: 50px;
       }
   </style>

   <div class="container">
       <h1>Welcome to the User Dashboard</h1>
       <p>This is the content of the user dashboard.</p>
   </div>
   <div class="table-responsive">
    <button type="button" class="btn btn-outline-success">Ajouter</button>
    <table class="table table-hover table-borderless">
      <thead>
        <tr>
          <th>id</th>
          <th>Name</th>
          <th>email</th>
          <th>tele</th>
          <th>role</th>
          <th>action</th>

        </tr>
      </thead>
      <tbody class="table-group-divider">
        <tr>
          <td>
           1
          </td>
          <td>oussama</td>
          <td>oussama@gmail.com</td>
          <td>067654</td>
          <td>admin</td>
          <td>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">More</button>

                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item text-red" href="#">supprimer</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-yellow" href="#">modifier</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-bleau" href="#">afficher</a>
                    </li>
                </ul>
            </div>
        </td>
        </tr>

      </tbody>
    </table>
    </div>


@endsection

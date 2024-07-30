<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Directory Landing Page</title>

      
		
       
      
        <link rel="stylesheet" href="./css/font-awesome.min.css">

     
		<link rel="stylesheet" href="./css/linearicons.css">

		
        <link rel="stylesheet" href="./css/animate.css">

	
        <link rel="stylesheet" href="./css/flaticon.css">

		
        <link rel="stylesheet" href="./css/slick.css">
		<link rel="stylesheet" href="./css/slick-theme.css">
		
        
        <link rel="stylesheet" href="./css/bootstrap.min.css">
		
	
		<link rel="stylesheet" href="./css/bootsnav.css" >	
        
      
        <link rel="stylesheet" href="./css/style.css">

        <link rel="stylesheet" href="./css/responsive.css">
       

    </head>
    <body >
    

<div class="container">

    <h3 align="center" class="mt-10">Yes IT Lab Test</h3>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

      
        
        <div class="form-area">
        
           
            <form action="{{url('upload_data')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>prpfile Image</label>
                        <input type="file"  name="file" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" maxlength="25"/>
                    </div>
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email"/>
                    </div>
                    <div class="col-md-6">
                    
                        <label>Address</label>
                       <input type="text" class="form-control" name="address" required/>

                    </div>
                    <div class="col-md-6">
                        <label>phone</label>
                      <input class="form-control" placeholder="Phone" name="number" value="{{old('phone')}}" id="validate_phone" minlength="10" maxlength="10" type="tel" tabindex="3" required>
                    </div>
                    <div class="col-md-6">
                    <label>city</label>
                      <input type="text" class="form-control" name="city" required/>
                     </div>

                     <div class="col-md-6">
                        <label>State</label>
                     <select name="state" class="form-control" required>
                        <option > Select State </option>
                        <option value="CA"> CA </option>
                        <option value="NY"> NY </option>
                        <option value="AT"> AT </option>
                        </select>
                     </div>

                     <div class="col-md-6">
                        <label>Country</label>
                     <select name="country" class="form-control" required>
                        <option > Select Country </option>
                        <option value="IN"> IN </option>
                        <option value="US"> US </option>
                        <option value="UE"> UE </option>
                        </select>
                     </div>

                </div>
             
                <div class="row">
                <div> <span> Please Enter Correct Details</span> </div>
                    <div class="col-md-12 mt-3">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>

                </div>
            </form>
        </div>
        </div>
    </div>
</div>


<section class="table_outer">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div
                        class="card-header with-border d-flex justify-content-start align-items-center media_card_header">

                        <div class="container-fluid">
                            <div class="row">
                                
                                <div class="col-md-4 p-0">
                                    <a href="{{route('download.csv')}}"> 
                                        <button class="btn btn-warning ">Download CSV</button>
                                    </a>
                                </div>

                              
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-borderless custom_table">
                                <thead class="table-success">
                                    <tr>
                                        {{-- <th scope="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="select_all" />
                                            </div>
                                        </th> --}}
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">feature Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $data)
                                        <tr class="">
                                            <th scope="row">
                                                {{-- <div class="form-check">
                                                    <input class="form-check-input checkbox" type="checkbox"
                                                        value="" id="flexCheckDefault1"
                                                        data-id="show"
                                                        value="" />
                                                </div> --}}
                                            </th>
                                            <td> {{$data->name}} </td>
                                            <td>
                                               {{$data->address}}
                                            </td>

                                            <td> {{$data->city}} </td>
                                            <td>
                                               {{$data->state}}
                                            </td>
                                            <td>
                                               {{$data->country}}
                                            </td>
                                            <td>
                                                {{$data->number}}
                                             </td>
                                            <td>  <ul class="persons single">
                                                <li>
                                                    <a href="#">
                                                       
                                                        <img src="dataimage/{{($data->image)}}"
                                                            alt="Person" class="img-fluid" width="60" height="80">
                                                    </a>
                                                </li>
                                            </ul></td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        {{-- <nav aria-label="Page navigation example">
                            {{ $post->links('pagination::bootstrap-5') }}
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
















    </body>
</html>

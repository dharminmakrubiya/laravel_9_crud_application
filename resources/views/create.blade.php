{{-- @extends('master') --}}

{{-- @section('content') --}}

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- Bootstrap CSS Link --}}
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class=" text-black" style="border-radius: 25px;">
                        <div class="p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Student Registration</p>
                                    <form method="post" action="{{ route('students.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Student Name</label>
                                                <input type="text" name="student_name" class="form-control" />
                                                @if ($errors->has('student_name'))
                                                    <span class="text-danger">{{ $errors->first('student_name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Student Email</label>
                                                <input type="text" name="email" class="form-control" />
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Student Phone Number</label>
                                                <input type="text" name="student_phone" class="form-control" />
                                                @if ($errors->has('student_phone'))
                                                    <span class="text-danger">{{ $errors->first('student_phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Student Gender</label>
                                                <select name="student_gender" class="form-control">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                {{-- @if ($errors->has('student_gender'))
                                                    <span class="text-danger">{{ $errors->first('student_gender') }}</span>
                                                @endif --}}
                                            </div>
                                           
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                
                                                <label class="form-label">Student Hobbies:-</label><br>
                                                <input type="checkbox" name="student_hobbies[]" value="Readbooks" />Readbooks
                                                <input type="checkbox" name="student_hobbies[]" value="Games" /> Games
                                                <input type="checkbox" name="student_hobbies[]" value="Cricket" /> Cricket
                                                <input type="checkbox" name="student_hobbies[]" value="Music" /> Music<br>
                                                @if ($errors->has('student_hobbies'))
                                                    <span class="text-danger">{{ $errors->first('student_hobbies') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Student Address</label>
                                                <textarea type="text" name="student_address" class="form-control" /></textarea>
                                                @if ($errors->has('student_address'))
                                                    <span class="text-danger">{{ $errors->first('student_address') }}</span>
                                                @endif
                                            </div>
                                            
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Student Image</label>
                                                <input type="file" name="student_image" class="form-control" />
                                                @if ($errors->has('student_image'))
                                                    <span class="text-danger">{{ $errors->first('student_image') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Student Password</label>
                                                <input type="password" name="password" class="form-control" />
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                      
                                        <div class="text">
                                            <input type="submit" class="btn btn-primary" value="Register" />
                                        </div>

                                        
                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <label class="form-check-label" for="form2Example3">
                                                Have already an account?  <a href="{{ route('login') }}"> Login</a>
                                            </label>
                                          </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        {{-- Bootstrap JS Link --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        </script>
    </body>

    </html>



{{-- @endsection('content') --}}

@extends('master')

@section('content')
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

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Student</p>

                                    <form method="post" action="{{ route('students.update', $student->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                            	<label class="form-label">Student Name</label>
                                                <input type="text" name="student_name" class="form-control"
                                                    value="{{ $student->student_name }}" />
													@if ($errors->has('student_name'))
                                                    	<span class="text-danger">{{ $errors->first('student_name') }}</span>
                                                	@endif
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                            	<label class="form-label">Student Email</label>
                                                <input type="text" name="student_email" class="form-control"
                                                    value="{{ $student->student_email }}" />
													@if ($errors->has('student_email'))
                                                    	<span class="text-danger">{{ $errors->first('student_email') }}</span>
                                                	@endif
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                            	<label class="form-label">Student Phone Number</label>
                                                <input type="text" name="student_phone" class="form-control"
                                                value="{{ $student->student_phone }}" />
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
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                            <label class="form-label">Student Hobbies:-</label><br>
                                                <input type="checkbox" name="student_hobbies[]" value="Readbooks" />
                                                Readbooks
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
                                                <input type="text" name="student_address" class="form-control"
                                                    value="{{ $student->student_address }}" />
													@if ($errors->has('student_address'))
                                                    	<span class="text-danger">{{ $errors->first('student_address') }}</span>
                                                	@endif
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                            <label class="form-label">Student Image</label>
                                                <input type="file" class="form-control" name="student_image" />
                                                <br />
                                                <img src="{{ asset('images/' . $student->student_image) }}" width="100"
                                                    class="img-thumbnail" />
                                                <input type="hidden" name="hidden_student_image"
                                                    value="{{ $student->student_image }}" />
													@if ($errors->has('student_image'))
                                                    	<span class="text-danger">{{ $errors->first('student_image') }}</span>
                                                	@endif
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input type="hidden" name="hidden_id" value="{{ $student->id }}" />
                                            <input type="submit" class="btn btn-primary" value="Update" />
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
        <script>
            document.getElementsByName('student_gender')[0].value = "{{ $student->student_gender }}";
        </script>

        {{-- Bootstrap JS Link --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        </script>

    </body>

    </html>
@endsection('content')

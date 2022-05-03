@extends('dashboard.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 margin-tb mb-4">


            <div class="pull-left" style="margin-top: 10px;">
                <a class="btn btn-primary" href=" {{ url('/add-patient') }}"> Add Patients Details </a>
            </div>
        </div>
    </div>
    @if(Session::has('patient_deleted'))
    <p class="alert alert-success"> {{ Session::get('patient_deleted') }}</p>
    @endif
</br>
    <form  action="{{ route('patient.search') }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row ">
                            <div class="col-sm-2 text-right">
                                <label for="Branch name"> Phone No:</label>

                            </div>
                            <div class="col-sm-10  ">
                                <input type="text" name="phoneNumber" placeholder="Enter Phone No">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>

                            </div>
                        </div>
                    </div>

                 



                

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 text-right"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>

                    </div>
            </form>


    <div style="width:90%;  overflow:auto;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Patient Name </th>
                    <th scope="col">Address </th>
                    <th scope="col">Phone No </th>
                    <th scope="col">Email </th>
                    <th scope="col">Date Of Birth </th>
                    <th scope="col">Action</th>



                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient )


                <tr>

                    <th scope="row">P{{ $patient->id}}-{{ $patient->phone_no}}</th>
                    <td> {{ $patient->name}} </td>
                    <td> {{ $patient->address}} </td>
                    <td> {{ $patient->phone_no}} </td>
                    <td> {{ $patient->email}} </td>
                    <td> {{ $patient->dob}} </td>




                    <td>
                        <div style="font-size: 12px;">
                            <a href="/add-report/{{ $patient->id }}">Add Report </a>/ <a href="/edit-patient/{{ $patient->id }}">Edit </a>
                        </div>


                    </td>



                </tr>

                @endforeach


            </tbody>
        </table>
    </div>



    </table>


</div>
<style>
    .imagetext img {
        width: 150px;

    }
</style>



@endsection
@extends('dashboard.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 margin-tb">


            <div class="pull-left" style="margin-top: 10px;">
                <a class="btn btn-primary" href=" {{ url('/add-post') }}"> Add News And Events</a>
            </div>
        </div>
    </div>
    @if(Session::has('report_deleted'))
    <p class="alert alert-success"> {{ Session::get('report_deleted') }}</p>
    @endif

    <div style="width:90%;  overflow:auto;">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <!-- <th scope="col">Id</th> -->
                <th scope="col"> Date</th>
                <th scope="col">Patient ID  </th>
                <th scope="col">Creatinine</th>
                <th scope="col">Blood Sugar </th>              
                <th scope="col">Blood Pressure </th>
                <th scope="col">Urine Albumin </th>
                <th scope="col">Doc </th>
                <th scope="col">Opt. doc </th> 
                <th scope="col">Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach ( $reports as $report )


            <tr>

                <!-- <th scope="row">{{ $report->id}}</th> -->
                <th scope="row">{{ $report->report_date }}</th>
                <td> {{ $report->patient_id?? null}} </td>
                <td> {{ $report->creatinine?? null}} </td>
                <td> {{ $report->blood_sugar ?? null}} </td>
                <td> {{ $report->blood_pressure ?? null}} </td>
                <td> {{ $report->urine_albumin ?? null}} </td>
                <td> 
                @if($report->document )
                    <button>
                       <a href="uploads/report/{{ $report->document }}" target="_blank" > Viewreport </a> 
                    </button> 
                @endif    
                </td>
                <td> 
                    @if($report->optional_document )
                        
                   
                    <button>
                       <a href="uploads/optional_document/{{ $report->optional_document }}" target="_blank" > Viewnextreport </a> 
                    </button> 

                    @endif
                </td>              
                <td>
                    <a href="/edit-report/{{ $report->id}}" >Edit </a>/

                    <a href="/delete-report/{{ $report->id}}" >Delete </a>
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
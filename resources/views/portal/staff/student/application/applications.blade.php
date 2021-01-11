@extends('layouts.portal')

@section('content')

<script type="text/javascript">

    // ACTIVE NAVIGATION ENTRY
    $(document).ready(function ($) {
        $('#students').addClass("active");
    });

</script>
    <!-- BREACRUMB -->
    <section class="col-sm-12 mb-3">
        <div class="row">
           
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{ url('/portal/staff/') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Applications</li>
            </ol>
          </nav>



        </div>
    </section>
    <!-- /BREACRUMB -->

    <!-- CONTENT -->
    
    <div class="col-12 applications min-vh-100">
      <div class="row">
          
        <!-- APPLICATIONS LIST -->
        <div class="col-12 md-5">
          <div class="card">
            <div class="card-header">Applications</div>
            <div class="card-body">
              <table class="table yajra-datatable">
                <thead class="text-center">
                  <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Submitted Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($applications as $application)
                    <tr class="text-center">
                      <td>{{$application->student->initials}} {{$application->student->last_name}}</td>
                      <td>{{$application->student->user->email}}</td>
                      <td>{{$application->created_at->isoFormat('YYYY-MM-DD')}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-primary" id="btnViewModalApplicant{{$application->student->id}}" data-tooltip="tooltip" data-placement="bottom" title="View Applicant Details" onclick="view_modal_applicant({{$application->student->id}})"><i class="fas fa-user"></i> View <span id="spinner" class="spinner-border spinner-border-sm d-none " role="status" aria-hidden="true"></span></button>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
        <!-- /APPLICATIONS LIST -->

      </div>
      @include('portal.staff.student.application.modal')
      @include('portal.staff.student.application.scripts')
    </div>
    <!-- /CONTENT -->
    
@endsection

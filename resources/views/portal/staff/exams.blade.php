@extends('layouts.portal')

@section('content')

<script type="text/javascript">

    // ACTIVE NAVIGATION ENTRY
    $(document).ready(function ($) {
        $('#exams').addClass("active");
    });

</script>
    <!-- BREACRUMB -->
    <section class="col-sm-12 mb-3">
        <div class="row">
           
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{ url('/portal/staff/') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Exams</li>
            </ol>
          </nav>

        </div>
    </section>
    <!-- /BREACRUMB -->

    <!-- CONTENT -->
    
    <div class="col-12 staff-exams">
      <div class="row">

        <!-- CREATE EXAM SCHEDULE -->
        <div class="col-12 mb-5">
          <div class="card">
            <div class="card-header">Create Exam Schedule</div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-row align-items-center px-4">
                  <div class="form-group col-xl-3 col-lg-6">
                    <label for="subject">Subejct</label>
                    <select name="subject" id="subject" class="form-control">
                      @foreach ($subjects as $subject)
                      <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-xl-3 col-lg-6">
                    <label for="examType">Exam Type</label>
                    <select name="examType" id="examType" class="form-control">
                      @foreach ($exam_types as $type)
                          <option value="{{ $type->id }}">{{ $type->exam_type }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-xl-3 col-lg-6">
                    <label for="examDate">Date</label>
                    <input type="date" name="examDate" class="form-control"/>
                  </div>
                  <div class="form-group col-xl-2 col-lg-6">
                    <label for="startTime">Start Time</label>
                    <input type="time" name="startTime" class="form-control"/>
                  </div>
                  {{-- <div class="form-group col-xl-1 col-lg-4">
                    <label for="endTime">End Time</label>
                    <input type="time" name="endTime" class="form-control"/>
                  </div> --}}
                  <div class="form-group col-xl-1 col-lg-12">
                    <label for="submitExam">&nbsp;</label>
                    <button type="button" class="btn btn-outline-primary form-control" onclick="create_schedule();" id="submitExam" name="submitExam"><i class="fas fa-plus"></i></button>
                  </div>
                  
                </div>
              </form>

              <div class="col-12 mt-5">
                <table class="table yajra-datatable">
                  <thead class="text-center">
                    <tr>
                      <th>Subject Code</th>
                      <th>Subject Name</th>
                      <th>Exam Type</th>
                      <th>Date</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach ($exams as $exam)
                    <tr>
                      <td>FIT {{ $exam->subject->code }}</td>
                      <td>{{ $exam->subject->name }}</td>
                      <td>{{ $exam->type->exam_type }}</td>
                      <td>{{ $exam->date }}</td>
                      <td>{{ $exam->start_time }}</td>
                      <td>{{ $exam->end_time }}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-success" data-tooltip="tooltip" data-toggle="modal" data-placement="bottom" title="Approve" onclick="approve_schedule()"><i class="fas fa-file-signature"></i></button>
                          <button type="button" class="btn btn-outline-info" data-tooltip="tooltip" data-toggle="modal" data-placement="bottom" title="Request Approval" onclick="request_schedule_approval()"><i class="fas fa-share-square"></i></button>
                          <button type="button" class="btn btn-outline-primary" data-tooltip="tooltip" data-toggle="modal" data-placement="bottom" title="Release" onclick="relase_individual_schedule()" ><i class="fas fa-hand-point-right"></i></button>
                          <button type="button" class="btn btn-outline-warning" data-tooltip="tooltip" data-toggle="modal" data-placement="bottom" title="Edit" data-target="#editSchedule"><i class="fas fa-edit"></i></button>
                          <button type="button" class="btn btn-outline-danger" data-tooltip="tooltip" data-placement="bottom" title="Delete" onclick="delete_before_release()"><i class="fas fa-trash-alt"></i></button>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="text-center">
                  <button type="submit" class="btn btn-outline-primary" onclick="release_schedules()">RELEASE EXAM SCHEDULE</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /CREATE EXAM SCHEDULE -->


        <!-- EXAM SCHEDULE TABLE -->
        <div class="col-12 md-5">
          <div class="card">
            <div class="card-header">Exam Schedules</div>
            <div class="card-body">
              <table class="table yajra-datatable">
                <thead class="text-center">
                  <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Exam Type</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($exams as $exam)
                  <tr class="text-center">
                    <td>FIT {{ $exam->subject->code }}</td>
                    <td>{{ $exam->subject->name }}</td>
                    <td>{{ $exam->type->exam_type }}</td>
                    <td>{{ $exam->date }}</td>
                    <td>{{ $exam->start_time }}</td>
                    <td>{{ $exam->end_time }}</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning" data-tooltip="tooltip" data-placement="bottom" title="Postpone Exam" data-toggle="modal" data-target="#postponeExam"><i class="fas fa-calendar-plus"></i></button>
                        <button type="button" class="btn btn-outline-danger" data-tooltip="tooltip" data-placement="bottom" title="Delete" onclick="delete_after_release()"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
        <!-- /EXAM SCHEDULE TABLE-->

        <!-- EXAMS HELD -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-header">Exams Held</div>
            <div class="card-body">
              <!-- SEARCH -->
              <form>
                <div class="form-row mb-5">
                  <div class="form-group col-xl-2 col-lg-3">
                    <label for="selectSearchExamYear">Year</label>
                    <select name="selectSearchExamYear" id="selectSearchExamYear" class="form-control">
                      <option value="" slected>2020</option>
                      <option value="">2019</option>
                      <option value="">2018</option>
                    </select>
                  </div>
                  <div class="form-group col-xl-2 col-lg-3">
                    <label for="selectSearchExamDate">Date</label>
                    <input type="date" class="form-control" id="selectSearchExamDate" name="selectSearchExamDate" />
                  </div>
                  <div class="form-group col-xl-2 col-lg-3">
                    <label for="selectSearchExamType">Exam Type</label>
                    <select name="selectSearchExamType" id="selectSearchExamType" class="form-control">
                      @foreach ($exam_types as $type)
                          <option value="{{ $type->id }}">{{ $type->exam_type }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-xl-3 col-lg-3">
                    <label for="selectSearchSubject">Subject</label>
                    <select name="selectSearchSubject" id="selectSearchSubject" class="form-control">
                      @foreach ($subjects as $subject)
                      <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                      @endforeach
                     
                    </select>
                  </div>
                  <div class="form-group col-xl-3 col-lg-12">
                    <label for="btnSearchExam">&nbsp;</label>
                    <button type="button" class="btn btn-outline-primary form-control" onclick="" id="btnSearchExam" name="btnSearchExam"><i class="fa fa-search"></i> Search</button>
                  </div>

                </div>
              </form>
              <!-- /SEARCH -->
              
              <!-- HELD EXAM TABLE -->
              <table class="table yajra-datatable mb-4">
                <thead class="text-center">
                  <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Exam Type</th>
                    <th>Date</th>
                    <th>Started Time</th>
                    <th>Ended Time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($exams as $exam)
                  <tr class="text-center">
                    <td>FIT {{ $exam->subject->code }}</td>
                    <td>{{ $exam->subject->name }}</td>
                    <td>{{ $exam->type->exam_type }}</td>
                    <td>{{ $exam->date }}</td>
                    <td>{{ $exam->start_time }}</td>
                    <td>{{ $exam->end_time }}</td>
                  </tr>
                      
                  @endforeach
                </tbody>
              </table>
              <!-- /HELD EXAM TABLE -->

          </div>

          </div>
          
        </div>
        <!-- /EXAMS HELD -->

        @include('portal.staff.exams.modal')

      </div>
    </div>

    <!-- /CONTENT -->



    <!-- HEADING -->

    <!--
    <div class="col-lg-12 mt-5">
        <div class="row">
          
          <div class="card w-100">
              <div class="card-header">{{ __('Dashboard') }}</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  {{ __('You are logged in as Staff!') }}
              </div>
          </div>

      </div>
    </div> -->

    @include('portal.staff.exams.scripts')

@endsection

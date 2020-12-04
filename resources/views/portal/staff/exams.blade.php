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

        <!-- CREATE EXAM SHEDULE -->
        <div class="col-12 mb-5">
          <div class="card">
            <div class="card-header">Create Exam Shedule</div>
            <div class="card-body">
              <form>
                <div class="form-row align-items-center px-4">
                  <div class="form-group col-xl-3 col-lg-6">
                    <label for="subject">Subejct</label>
                    <select name="subject" id="subject" class="form-control">
                      <option value="">ICT Applications</option>
                      <option value="">English for ICT</option>
                      <option value="">Mathematics for ICT</option>
                    </select>
                  </div>
                  <div class="form-group col-xl-3 col-lg-6">
                    <label for="examType">Exam Type</label>
                    <select name="examType" id="examType" class="form-control">
                      <option value="">e-Test</option>
                      <option value="">Practical</option>
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
                    <label for="endTime">&nbsp;</label>
                    <button type="submit" class="btn btn-outline-primary form-control"><i class="fas fa-plus"></i></button>
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
                      <td>e-Test</td>
                      <td>{{ $exam->date }}</td>
                      <td>2:30PM</td>
                      <td>4.30PM</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editShedule"><i class="fas fa-edit"></i></button>
                          <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                          <button type="button" class="btn btn-outline-info"><i class="fas fa-share-square"></i></button>
                          <button type="button" class="btn btn-outline-success"><i class="fas fa-file-signature"></i></button>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="text-center">
                  <button type="submit" class="btn btn-outline-primary" onclick="release_shedule()">RELEASE SHEDULE</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /CREATE EXAM SHEDULE -->


        <!-- EXAM SHEDULE TABLE -->
        <div class="col-12 md-5">
          <div class="card">
            <div class="card-header">Exam Shedules</div>
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
                    <td>e-Test</td>
                    <td>{{ $exam->date }}</td>
                    <td>10.00AM</td>
                    <td>12.00PM</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#postponeExam"><i class="fas fa-calendar-plus"></i></button>
                        <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
        <!-- /EXAM SHEDULE TABLE-->

        <!-- EXAMS HELD -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-header">Exams Held</div>
            <div class="card-body">
              <table class="table yajra-datatable">
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
                    <td>{{ $exam->subject->code }}</td>
                    <td>{{ $exam->subject->name }}</td>
                    <td>e-Test</td>
                    <td>{{ $exam->date }}</td>
                    <td>10:30 AM</td>
                    <td>12:30 PM</td>
                  </tr>
                      
                  @endforeach
                </tbody>
              </table>

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

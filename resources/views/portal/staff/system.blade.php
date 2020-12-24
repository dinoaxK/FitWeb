@extends('layouts.portal')

@section('content')

  <script type="text/javascript">

    // ACTIVE NAVIGATION ENTRY
    $(document).ready(function ($) {
        $('#system').addClass("active");
    });

  </script>

  <!-- BREACRUMB -->
  <section class="col-sm-12 mb-3">
      <div class="row">
          
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/portal/staff/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">System</li>
          </ol>
        </nav>

      </div>
  </section>
  <!-- /BREACRUMB -->

  <!-- CONTENT -->
  <div class="col-md-12 system">
    <div class="row">

      <!-- USER ROLE -->
      <div class="col-xl-5 col-lg-12">
        <div class="card">
          <div class="card-header">USER ROLE</div>
          <div class="card-body">
            <div class="card-text">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th>Role Name</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <thead>
                  @foreach ($roles as $role)
                  <tr>
                    <td>{{ $role->name }}</td>
                    <td class="text-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-view-role"><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-role"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="delete_role();"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-role"><i class="fas fa-plus"></i></button></div>
        </div>
      </div>
      <!-- /USER ROLE -->

      <!-- PERMISSION -->
      <div class="col-xl-7 col-lg-12">
        <div class="card">
          <div class="card-header">PERMISSIONS</div>
          <div class="card-body">
            <div class="card-text">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <thead>
                  @foreach ($permissions as $permission)
                  <tr>
                    <td>{{ $permission->permission }}</td>
                    <td>{{ $permission->description }}</td>
                    <td class="text-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-permission"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="delete_permission();"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-permission"><i class="fas fa-plus"></i></button></div>
        </div>
      </div>
      <!-- /PERMISSION -->

      <!-- SUBJECT -->
      <div class="col-xl-6 col-lg-12 mt-xl-5">
        <div class="card">
          <div class="card-header">SUBJECTS</div>
          <div class="card-body">
            <div class="card-text">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <thead>
                  @foreach ($subjects as $subject)
                  <tr>
                    <td><b>FIT{{ $subject->code }}</b></td>
                    <td>{{ $subject->name }}</td>
                    <td class="text-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-subject"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="delete_subject();"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-subject"><i class="fas fa-plus"></i></button></div>
        </div>
      </div>
      <!-- /SUBJECT -->

      <!-- EXAM TYPE -->
      <div class="col-xl-6 col-lg-12 mt-xl-5">
        <div class="card">
          <div class="card-header">EXAM TYPES</div>
          <div class="card-body">
            <div class="card-text">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th>Type Name</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <thead>
                  @foreach ($exam_types as $type)
                  <tr>
                    <td>{{ $type->exam_type }}</td>
                    <td class="text-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-exam-type"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="delete_exam_type();"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-exam-type"><i class="fas fa-plus"></i></button></div>
        </div>
      </div>
      <!-- /EXAM TYPE -->

      <!-- STUDENT PHASES -->
      <div class="col-xl-5 col-lg-12 mt-xl-5">
        <div class="card">
          <div class="card-header">STUDENT PHASES</div>
          <div class="card-body">
            <div class="card-text">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <thead>
                  @foreach ($phases as $phase)
                  <tr>
                    <td>{{ $phase->code }}</td>
                    <td>{{ $phase->name }}</td>
                    <td>{{ $phase->description }}</td>
                    <td class="text-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-student-phase"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="delete_student_phase();"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-student-phase"><i class="fas fa-plus"></i></button></div>
        </div>
      </div>
      <!-- /STUDENT PHASES -->

      <!-- PAYMENT METHODS -->
      <div class="col-xl-6 col-lg-12 mt-xl-5">
        <div class="card">
          <div class="card-header">PAYMENT METHODS</div>
          <div class="card-body">
            <div class="card-text">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th>Method Name</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <thead>
                  @foreach ($payment_methods as $method)
                  <tr>
                    <td>{{ $method->method }}</td>
                    <td class="text-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-payment-method"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="delete_payment_method();"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-payment-method"><i class="fas fa-plus"></i></button></div>
        </div>
      </div>
      <!-- /PAYMENT METHODS -->

      <!-- PAYMENT TYPES -->
      <div class="col-xl-6 col-lg-12 mt-xl-5">
        <div class="card">
          <div class="card-header">PAYMENT TYPES</div>
          <div class="card-body">
            <div class="card-text">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th>Type Name</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <thead>
                  @foreach ($payment_types as $type)
                  <tr>
                    <td>{{ $type->type }}</td>
                    <td class="text-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-payment-type"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="delete_payment_type();"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-create-payment-type"><i class="fas fa-plus"></i></button></div>
        </div>
      </div>
      <!-- /PAYMENT METHODS -->

      @include('portal.staff.system.modal')
    
    </div>
  </div>
  <!-- /CONTENT -->

  @include('portal.staff.system.scripts')

@endsection

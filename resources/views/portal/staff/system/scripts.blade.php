<script type="text/javascript">
// USER ROLE
  // ROLE NAME EDITABILITY
  InputRoleName_editable = () => {
    if($('#InputRoleName').attr('disabled')){
      $('#InputRoleName').removeAttr('disabled');
    }
    else{
      document.getElementById('InputRoleName').setAttribute("disabled","disabled");
    }
  }
  function InputRoleName_readonly() {
    document.getElementById('InputRoleName').setAttribute("disabled","disabled");
  }
  // /ROLE NAME EDITABILITY

  // CREATE
  create_role = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Create!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //Remove previous validation error messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();
        //Form Payload
        var formData = new FormData($("#formUserRole")[0]);
        // var formData = new FormData();
        // //Add data
        // formData.append('inputNewRoleName', $('#inputNewRoleName').val())
        // formData.append('inputNewRoleDescription', $('#inputNewRoleDescription').val())

        //Validate information
        $.ajax({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ url('/portal/staff/system/createUserRole') }}",
          type: 'post',
          data:formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnCreateUserRole').attr('disabled','disabled');},
          success: function(data){
            console.log('success in create role ajax');
            $('#btnCreateUserRole').removeAttr('disabled','disabled');
            if(data['errors']){
              console.log('errors on validating data');
              $.each(data['errors'], function(key, value){
                $('#error-'+key).show();
                $('#'+key).addClass('is-invalid');
                $('#error-'+key).append('<strong>'+value+'</strong>');
              });
              //SwalCancelWarning.fire({title: 'Role creation Aborted!',text: 'You have no permission to create a role',})
            }
            else if(data['status'] == 'success'){
              console.log('create role is success');
              SwalDoneSuccess.fire({
                title: 'Created!',
                text: 'User role created.',
                })
                $('#modal-create-role').modal('hide')
                location.reload();
            }
          },
          error: function(err){
            $('#btnCreateUserRole').removeAttr('disabled','disabled');
            console.log('error in create role ajax');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'User role creation cancelled.',
        })
      }
    })
  }
  // /CREATE

  // EDIT
  edit_role = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Update!',
    })
    .then((result) => {
      if (result.isConfirmed) {

        SwalDoneSuccess.fire({
          title: 'Updated!',
          text: 'User role has been updated.',
        })
        $('#modal-edit-role').modal('hide')
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'User role has not been updated.',
        })
      }
    })
  }
  // /EDIT

  // DELETE
  delete_role = (role_id) => {
    SwalQuestionDanger.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, delete it!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        // PAYLOAD
        var formData = new FormData;
        formData.append('role_id', role_id)

        //DELETE ROLE CONTROLLER
        $.ajax({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ url('/portal/staff/system/deleteUserRole') }}",
          type: 'post',
          data:formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnDeleteUserRole-'+role_id).attr('disabled','disabled');},
          success: function(data){
            console.log('success : delete user role ajax');
            $('#tbl-userRole-tr-'+role_id).remove();
            SwalDoneSuccess.fire({
              title: 'Deleted!',
              text: 'User role has been deleted.',
            })
          },
          error: function(err){
            console.log('error : delete user role ajax');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'User role has not been deleted.',
        })
      }
    })
  }
  // /DELETE
// /USER ROLE

// PERMISSION
  // CREATE
  create_permission = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Create!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //Remove previous validation error messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();

        //Form Data
        var formData = new FormData($('#formCreatePermission')[0]);
        //Validate information
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "{{ url('/portal/staff/system/createPermission') }}",
          type: 'post',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnCreatePermission').attr('disabled','disabled');},
          success: function(data){
            console.log('Success in create permission ajax.');
            $('#btnCreatePermission').removeAttr('disabled','disabled');
            if(data['errors']){
              console.log('Errors on validation data.');
              $.each(data['errors'], function(key, value){
                $('#error-'+key).show();
                $('#'+key).addClass('is-invalid');
                $('#error-'+key).append('<strong>'+value+'</strong>');
              });
            }
            else if(data['status'] == 'success'){
              console.log('Create permission success.');
              SwalDoneSuccess.fire({
                title: 'Created!',
                text: 'Permission created.',
              })
              $('#modal-create-permission').modal('hide');
              location.reload();
            }
          },
          error: function(err){
            $('#btnCreatePermission').removeAttr('disabled','disabled');
            console.log('Error in create permission ajax.');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Permission has not been created.',
        })
      }
    })
  }
  // /CREATE

  // EDIT
  edit_permission_modal_invoke = (permission_id) =>{
    //Payload
    var formData = new FormData();
    formData.append('permission_id',permission_id);

    //Edit permission get detials
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('/portal/staff/system/editPermissionGetDetails') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function(){$('#btnEditPermission-'+permission_id).attr('disabled','disabled');},
      success: function(data){
        console.log('Success in edit permission get detials ajax.');
        if(data['status'] == 'success'){
          $('#modal-edit-permission-title').html(data['permission']['name']);
          $('#permissionID').val(data['permission']['id']);
          $('#permissionName').val(data['permission']['name']);
          $('#permissionDescription').val(data['permission']['description']);
          $('#modal-edit-permission').modal('show');
          $('#btnEditPermission-'+permission_id).removeAttr('disabled','disabled');
        }
      },
      error: function(err){
        console.log('Error in edit permission get details ajax.');
        $('#btnEditPermission-'+permission_id).removeAttr('disabled','disabled');
        SwalSystemErrorDanger.fire();
      }
    });
  }

  edit_permission = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Update!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        SwalDoneSuccess.fire({
          title: 'Updated!',
          text: 'Permission has been updated.',
        })
        $('#modal-edit-permission').modal('hide')
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Permission has not been updated.',
        })
      }
    })
  }
  // /EDIT

  // DELETE
  delete_permission = (permission_id) => {
    SwalQuestionDanger.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, delete it!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //Payload
        var formData = new FormData();
        formData.append('permission_id',permission_id);

        //Delete permission controller
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "{{ url('/portal/staff/system/deletePermission') }}",
          type: 'post',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnDeletePermission-'+permission_id).attr('disabled','disabled');},
          success: function(data){
            console.log('Success in delete permission ajax.');
            //remove delete data included row
            $('#tbl-permission-tr-'+permission_id).remove();
            SwalDoneSuccess.fire({
              title: 'Deleted!',
              text: 'Permission has been deleted.',
            })
          },
          error: function(err){
            console.log('Error in delete permission ajax.');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Permission has not been deleted.',
        })
      }
    })
  }
  // /DELETE
// /PERMISSION

// SUBJECT
  // CREATE
  create_subject = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Create!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //Remove previous validation error messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();
        //Get form data
        var formData = new FormData($('#formCreateSubject')[0]);

        //Validate infromation
        $.ajax({
          headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
          url: "{{ url('/portal/staff/system/createSubject') }}",
          type: 'post',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnCreateSubject').attr('disabled','disabled');},
          success: function(data){
            console.log('Success in create subject ajax.');
            $('#btnCreateSubject').removeAttr('disabled','disabled');
            if(data['errors']){
              console.log('Errors on validating data.');
              $.each(data['errors'], function(key, value){
                $('#error-'+key).show();
                $('#'+key).addClass('is=invalid');
                $('#error-'+key).append('<strong>'+value+'</strong>');
              });
            }
            else if(data['status'] == 'success'){
              console.log('Create subject is success');
              SwalDoneSuccess.fire({
                title: 'Created!',
                text: 'Subject created.',
              })
              $('#modal-create-subject').modal('hide');
              location.reload();
            }
          },
          error: function(err){
            $('#btnCreateSubject').removeAttr('disabled','disabled');
            console.log('Error in create subject ajax.')
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Subject creation cancelled.',
        })
      }
    })
  }
  // /CREATE

  // EDIT
  edit_subject_modal_invoke = (subject_id) => {
    //Form payload
    var formData = new FormData();
    formData.append('subject_id',subject_id);

    //Edit subject get details
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('/portal/staff/system/editSubjectGetDetails') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function(){$('#btnEditSubject-'+subject_id).attr('disabled','disabled');},
      success: function(data){
        console.log('Success in edit subject get details ajax.');
        if(data['status'] == 'success'){
          $('#modal_edit_subject_title').html(data['subject']['name']);
          $('#subjectId').val(data['subject']['id']);
          $('#subjectCode').val(data['subject']['code']);
          $('#subjectName').val(data['subject']['name']);
          $('#modal-edit-subject').modal('show');
          $('#btnEditSubject-'+subject_id).removeAttr('disabled','disabled');
        }
      },
      error: function(err){
        console.log('Error in edit subject get details ajax.');
        $('#btnEditSubject-'+subject_id).removeAttr('disabled','disabled');
        SwalSystemErrorDanger.fire();
      }
    });
  }

  edit_subject = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Update!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        SwalDoneSuccess.fire({
          title: 'Updated!',
          text: 'Subject has been updated.',
        })
        $('#modal-edit-subject').modal('hide')
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Subject has not been updated.',
        })
      }
    })
  }
  // /EDIT

  //DELETE
  delete_subject = (subject_id) => {
    SwalQuestionDanger.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, delete it!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //Payload
        var formData = new FormData();
        formData.append('subject_id',subject_id);

        //Delete subject controller
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "{{ url('/portal/staff/system/deleteSubject') }}",
          type: 'post',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnDeleteSubject-'+subject_id).attr('disabled','disabled');},
          success: function(data){
            console.log('Success in delete subject ajax.');
            $('#tbl-subject-tr-'+subject_id).remove();
            SwalDoneSuccess.fire({
              title: 'Deleted!',
              text: 'Subject has been deleted.',
            })
          },
          error: function(err){
            console.log('Error in delete subjecr ajax.');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Subject has not been deleted.',
        })
      }
    })
  }
  // /DELETE
// /SUBJECT

// EXAM_TYPE
  // CREATE
  create_exam_type = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Create!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //Remove previous validation error messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();
        //Payload
        var formData = new FormData($('#formCreateExamType')[0]);

        //Validate information
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "{{ url('/portal/staff/system/createExamType') }}",
          type: 'post',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnCreateExamType').attr('disabled','disabled');},
          success: function(data){
            console.log('Success in create exam type ajax.');
            $('#btnCreateExamType').removeAttr('disabled', 'disabled');
            if(data['errors']){
              console.log('Errors in validating data.');
              $.each(data['errors'], function(key, value){
                $('#error-'+key).show();
                $('#'+key).addClass('is-invalid');
                $('#error-'+key).append('<strong>'+value+'</strong>');
              });
            }
            else if(data['status'] == 'success'){
              console.log('Create role is success');
              SwalDoneSuccess.fire({
              title: 'Created!',
              text: 'Exam Type created.',
              })
              $('#modal-create-exam-type').modal('hide')
              location.reload();
              }
          },
          error: function(err){
            $('#btnCreateExamType').removeAttr('disabled', 'disabled');
            console.log('Error in creare exam type ajax.');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Exam Type has not been created.',
        })
      }
    })
  }
  // /CREATE
  // EDIT
  edit_exam_type_modal_invoke = (exam_type_id) => {
    //Form payload
    var formData = new FormData();
    formData.append('exam_type_id',exam_type_id);

    //Edit exam type get details
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('/portal/staff/system/editExamTypeGetDetails') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function(){$('#bntEditExamType-'+exam_type_id).attr('disabled','disabled');},
      success: function(data){
        console.log('Success in edit exam type get details ajax.');
        if(data['status'] == 'success'){
          $('#modal-edit-exam-type-title').html(data['exam_type']['name']);
          $('#examTypeId').val(data['exam_type']['id']);
          $('#examTypeName').val(data['exam_type']['name']);
          $('#modal-edit-exam-type').modal('show');
          $('#bntEditExamType-'+exam_type_id).removeAttr('disabled','disabled');
        }
      },
      error: function(err){
        console.log('Error in edit exam type get details ajax.');
        $('#bntEditExamType-'+exam_type_id).removeAttr('disabled','disabled');
        SwalSystemErrorDanger.fire();
      }
    });
  }
  edit_exam_type = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Update!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        SwalDoneSuccess.fire({
          title: 'Updated!',
          text: 'Exam type has been updated.',
        })
        $('#modal-edit-exam-type').modal('hide')
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Subject has not been updated.',
        })
      }
    })
  }
  // /EDIT
  //DELETE
  delete_exam_type = (exam_type_id) => {
    SwalQuestionDanger.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, delete it!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        // Payload
        var formData = new FormData();
        formData.append('exam_type_id',exam_type_id);

        //Delete exam type controller
        $.ajax({
          headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
          url: "{{ url('/portal/staff/system/deleteExamType') }}",
          type: 'post',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnDeleteExamType-'+exam_type_id).attr('disabled','disabled');},
          success: function(data){
            console.log('Success in delete exam type ajax.');
            $('#tbl-examType-tr-'+exam_type_id).remove();
            SwalDoneSuccess.fire({
              title: 'Deleted!',
              text: 'Exam type has been deleted.',
            })
          },
          error: function(err){
            console.log('Error in delete exam type ajax.');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Exam type has not been deleted.',
        })
      }
    })
  }
  // /DELETE
// /EXAM_TYPE

// STUDENT PHASE
  // CREATE
  create_student_phase = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Create!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //remove past validation messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();

        //Form Data
        var formData = new FormData($("#formCreatePhase")[0]);

        $.ajax({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ url('/portal/staff/system/createStudentPhase') }}",
          type: 'post',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnCreatePhase').attr('disabled','disabled');},
          success: function(data){
            console.log('Success in create phase ajax');
            $('#btnCreatePhase').removeAttr('disabled','disabled');
            if(data['errors']){
              console.log('Errors on validating data.');
              $.each(data['errors'], function(key, value){
                $('.form-text').hide();
                $('#error-'+key).show();
                $('#'+key).addClass('is-invalid');
                $('#error-'+key).append('<strong>'+value+'</strong>');
              });
            }
            else if(data['status'] == 'success'){
              console.log('Create phase is success.');
              SwalDoneSuccess.fire({
                title: 'Created!',
                text: 'Student Phase created.',
              })
              $('#modal-create-student-phase').modal('hide')
              location.reload();
            }
          },
          error: function(err){
            $('#btnCreatePhase').removeAttr('disabled','disabled');
            console.log('Error in create phase ajax');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Student Phase creation cancelled.',
        })
      }
    })
  }
  // /CREATE
  // EDIT
  edit_student_phase_modal_invoke = (student_phase_id) => {
    //Form payload
    var formData = new FormData();
    formData.append('student_phase_id',student_phase_id);

    //Edit student phase get details
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('/portal/staff/system/editStudentPhaseGetDetails') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function(){$('#btnEditStudentPhase-'+student_phase_id).attr('disabled', 'disabled');},
      success: function(data){
        console.log('Success in edit student phase get details ajax.');
        if(data['status'] == 'success'){
          $('#modal-edit-student-phase-title').html(data['student_phase']['name']);
          $('#phaseId').val(data['student_phase']['id']);
          $('#phaseCode').val(data['student_phase']['code']);
          $('#phaseName').val(data['student_phase']['name']);
          $('#phaseDescription').val(data['student_phase']['description']);
          $('#modal-edit-student-phase').modal('show');
          $('#btnEditStudentPhase-'+student_phase_id).removeAttr('disabled','disabled');
        }
      },
      error: function(err){
        console.log('Error in edit student phase get details ajax.');
        $('#btnEditStudentPhase-'+student_phase_id).removeAttr('disabled','disabled');
        SwalSystemErrorDanger.fire();
      }
    });
  }

  edit_student_phase = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Update!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        SwalDoneSuccess.fire({
          title: 'Updated!',
          text: 'Student phase has been updated.',
        })
        $('#modal-edit-student-phase').modal('hide')
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Student phase has not been updated.',
        })
      }
    })
  }
  // /EDIT
  // DELETE
  delete_student_phase = (phase_id) => {
    SwalQuestionDanger.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, delete it!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //Payload
        var formData = new FormData();
        formData.append('phase_id',phase_id);

        //Delete student phase controller
        $.ajax({
          headers: {'X-CSRF-token' : $('meta[name="csrf-token"]').attr('content')},
          url: "{{ url('/portal/staff/system/deleteStudentPhase') }}",
          type: 'post',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnDeleteStudentPhase-'+phase_id).attr('disabled','disabled');},
          success: function(data){
            console.log('Success in delete student phase ajax.');
            $('#tbl-studentPhase-tr-'+phase_id).remove();
            SwalDoneSuccess.fire({
              title: 'Deleted!',
              text: 'Student phase has been deleted.',
            })
          },
          error: function(err){
            console.log('Error in delete student phase ajax.');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Student phase has not been deleted.',
        })
      }
    })
  }
  // /DELETE
// /STUDENT PHASE

// PAYMENT METHOD
  // CREATE
  create_payment_method = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Create!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //Remove previous validation error messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();
        //Form Payload
        var formData = new FormData($("#formCreatePaymentMethod")[0]);

        //Validate information
        $.ajax({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ url('/portal/staff/system/createPaymentMethod') }}",
          type: 'post',
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnCreatePaymentMethod').attr('disabled','disabled');},
          success: function(data){
            console.log('Success in create payment method ajax.');
            $('#btnCreatePaymentMethod').removeAttr('disabled','disabled');
            if(data['errors']){
              console.log('Errors on validating data');
              $('small').hide();
              $.each(data['errors'], function(key, value){
                $('#error-'+key).show();
                $('#'+key).addClass('is-invalid');
                $('#error-'+key).append('<strong>'+value+'</strong>');
              });
              //SwalCancelWarning.fire({title: 'Role creation Aborted!',text: 'You have no permission to create a role',})
            }
            else if(data['status'] == 'success'){
              console.log('Success in create payment method.');
              SwalDoneSuccess.fire({
                title: 'Created!',
                text: 'Payment method created.',
                })
                $('#modal-create-payment-method').modal('hide')
                location.reload();
            }
          },
          error: function(err){
            $('#btnCreatePaymentMethod').removeAttr('disabled','disabled');
            console.log('Error in create payment method ajax');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Payment method creation cancelled.',
        })
      }
    })
  }
  // /CREATE
  // EDIT
  edit_payment_method = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Update!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        SwalDoneSuccess.fire({
          title: 'Updated!',
          text: 'Payment method has been updated.',
        })
        $('#modal-edit-payment-method').modal('hide')
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Payment method has not been updated.',
        })
      }
    })
  }
  // /EDIT
  // DELETE
  delete_payment_method = (payment_method_id) => {
    SwalQuestionDanger.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, delete it!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        // PAYLOAD
        var formData = new FormData;
        formData.append('payment_method_id', payment_method_id)

        //DELETE PAYMENT METHOD CONTROLLER
        $.ajax({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ url('/portal/staff/system/deletePaymentMethod') }}",
          type: 'post',
          data:formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnDeletePaymentMethod-'+payment_method_id).attr('disabled','disabled');},
          success: function(data){
            console.log('Success : delete payment method ajax.');
            $('#tbl-paymentMethod-tr-'+payment_method_id).remove();
            SwalDoneSuccess.fire({
              title: 'Deleted!',
              text: 'Payment method has been deleted.',
            })
          },
          error: function(err){
            console.log('Error : delete payment method ajax.');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Payment method has not been deleted.',
        })
      }
    })
  }    
  // /DELETE
// /PAYMENT METHOD

// PAYMENT TYPE
  // CREATE
  create_payment_type = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Create!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        //Remove previous validation error messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();
        //Form Payload
        var formData = new FormData($("#formCreatePaymentType")[0]);

        //Validate information
        $.ajax({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ url('/portal/staff/system/createPaymentType') }}",
          type: 'post',
          data:formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnCreatePaymentType').attr('disabled','disabled');},
          success: function(data){
            console.log('Success : create payment type ajax.');
            $('#btnCreatePaymentType').removeAttr('disabled','disabled');
            if(data['errors']){
              console.log('errors on validating data');
              $('small').hide();
              $.each(data['errors'], function(key, value){
                $('#error-'+key).show();
                $('#'+key).addClass('is-invalid');
                $('#error-'+key).append('<strong>'+value+'</strong>');
              });
              //SwalCancelWarning.fire({title: 'Role creation Aborted!',text: 'You have no permission to create a role',})
            }
            else if(data['status'] == 'success'){
              console.log('Success: create payment type.');
              SwalDoneSuccess.fire({
                title: 'Created!',
                text: 'Payment type created.',
                })
                $('#modal-create-payment-type').modal('hide')
                location.reload();
            }
          },
          error: function(err){
            $('#btnCreatePaymentType').removeAttr('disabled','disabled');
            console.log('Error : create payment type ajax.');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Payment type creation cancelled.',
        })
      }
    })
  }
  // /CREATE
  // EDIT
  edit_payment_type = () => {
    SwalQuestionSuccessAutoClose.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, Update!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        SwalDoneSuccess.fire({
          title: 'Updated!',
          text: 'Payment type has been updated.',
        })
        $('#modal-edit-payment-type').modal('hide')
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Payment type has not been updated.',
        })
      }
    })
  }
  // /EDIT
  // DELETE
  delete_payment_type = (payment_type_id) => {
    SwalQuestionDanger.fire({
    title: "Are you sure?",
    text: "You wont be able to revert this!",
    confirmButtonText: 'Yes, delete it!',
    })
    .then((result) => {
      if (result.isConfirmed) {
        // PAYLOAD
        var formData = new FormData;
        formData.append('payment_type_id', payment_type_id)

        //DELETE ROLE CONTROLLER
        $.ajax({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ url('/portal/staff/system/deletePaymentType') }}",
          type: 'post',
          data:formData,
          processData: false,
          contentType: false,
          beforeSend: function(){$('#btnDeletePaymentType-'+payment_type_id).attr('disabled','disabled');},
          success: function(data){
            console.log('Success : delete payment type ajax');
            $('#tbl-paymentType-tr-'+payment_type_id).remove();
            SwalDoneSuccess.fire({
              title: 'Deleted!',
              text: 'Payment type has been deleted.',
            })
          },
          error: function(err){
            console.log('Error : delete payment type ajax');
            SwalSystemErrorDanger.fire();
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Cancelled!',
          text: 'Payment type has not been deleted.',
        })
      }
    })
  }
  // /DELETE
// /PAYMENT TYPE
</script>
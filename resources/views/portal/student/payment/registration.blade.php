@extends('layouts.student_portal')

@section('content')

<script type="text/javascript">

    // ACTIVE NAVIGATION ENTRY
    $(document).ready(function ($) {
      $('#registration').addClass("active");
    });

</script>

    <!-- CONTENT -->
    <div class="col-lg-12 payment min-vh-100">
      <form id="registerPaymentForm">      
        <div class="row row-cols-1 row-cols-md-2">
          {{-- PAYMENT DETAILS --}}
          <div class="col mb-3">
            <div class="card w-100 h-100" >
              <div class="card-header">Payment Details</div>
              <div class="card-body">
                <div class="col-12">
                  <div class="row">
                    {{-- PAYMENT TYPE --}}
                    <div class="col-md-4">Payment Type :</div>
                    <div class="col-md-8">Year Registration</div>
                    {{-- /PAYMENT TYPE --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- /PAYMENT DETAILS --}}

          {{-- SUBJECT DETAILS --}}
            <div class="col mb-3">        
              <div class="card w-100 h-100" >
                <div class="card-header">Year Details</div>
                <div class="card-body">

                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-4">Registration Expires On:</div>
                      <div class="col-md-8" >{{now()->isoFormat('MMMM Do')}} {{ now()->year+1 }}</div>
                    </div>
  
                  </div>

                </div>
              </div>
            </div>
          {{-- /SUBJECT DETAILS --}}
        </div>
        <div class="row row-cols-1">
          {{-- PAYMENT --}}
          <div class="col">
            <div class="card w-100 my-2">
              <div class="card-header">
                <div class="text-left">TOTAL PAYMENT : {{ $reg_fee}}/=</div>
                <div class="text-right">
                  <a class="btn btn-warning" target="_blank" href="{{ asset('documents/Payment_Voucher.pdf') }}">Download Payment Voucher</a>
                </div>
              </div>
              <div class="card-body">
                <div class="col-12">
                  <div class="row">

                    {{-- PAYMENT ACTION --}}
                    <ul class="nav nav-tabs col-12" id="PaymentMethodTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="true">Pay Through Bank Slip</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="online-tab" data-toggle="tab" href="#online" role="tab" aria-controls="online" aria-selected="false">Pay Online</a>
                      </li>
                    </ul>

                    <div class="tab-content col-12" id="PaymentMethodTabContent">
                      {{-- BANK PAYMENT --}}
                      <div class="tab-pane fade show active mt-4" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                        <form enctype="multipart/form-data">
                          <div class="form-row">                    
                            <div class="col-lg-6">
                              <div class="form-group row">
                                <label for="selectPaidBank" class="col-sm-3 col-form-label">Paid Bank</label>
                                <div class="col-sm-9">
                                  <select class="form-control" id="paidBank" name="paidBank">
                                    <option value="" selected disabled>Select Bank</option>
                                    @if($banks != NULL)
                                      @foreach ($banks as $bank)
                                        @if($bank->name == 'Peoples Bank')
                                          <option value="{{$bank->id}}" selected>{{$bank->name}}</option>
                                        @else
                                          <option value="{{$bank->id}}">{{$bank->name}}</option>
                                        @endif;
                                      @endforeach
                                    @else
                                      <option value="" disabled>No Banks Found</option>
                                    @endif
                                  </select>
                                  <span class="invalid-feedback" id="error-paidBank" role="alert"></span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPaidBankBranch" class="col-sm-3 col-form-label">Paid Branch Branch</label>
                                <div class="col-sm-9">
                                  <select class="form-control" id="paidBankBranch" name="paidBankBranch">
                                    <option value="" selected disabled>Select Bank Branch</option>
                                    @if($banks != NULL)
                                      @foreach ($banks->where('name', 'Peoples Bank')->first()->branch()->orderBy('name')->get() as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                      @endforeach
                                    @else
                                      <option value="" disabled>No Branches Found</option>
                                    @endif
                                  </select>
                                  <span class="invalid-feedback" id="error-paidBankBranch" role="alert"></span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPaidDate" class="col-sm-3 col-form-label">Paid Date</label>
                                <div class="col-sm-9">
                                  <input type="date" class="form-control" id="paidDate" name="paidDate">
                                  <span class="invalid-feedback" id="error-paidDate" role="alert"></span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPaidAmount" class="col-sm-3 col-form-label">Paid Amount</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" id="paidAmount" name="paidAmount">
                                  <span class="invalid-feedback" id="error-paidAmount" role="alert"></span>
                                </div>
                              </div>  
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group mx-2">
                                <small id="InputStudentNameHelp" class="form-text text-muted">Upload your scanned bank slip here in JPEG/ PNG file format</small>
                                <div class="drop-zone">
                                  <span class="drop-zone__prompt">Scanned Bank Slip <br><small>Drop image File here or click to upload</small> </span>
                                  <input type="file" name="bankSlip" id="bankSlip" class="drop-zone__input form-control"/>
                                </div>
                                <span class="invalid-feedback" id="error-bankSlip" role="alert"></span>
                              </div>
                            </div>
                          </div>

                          <div class="form-row justify-content-end">

                            <div class="mt-3 col-xl-2 col-md-6 order-sm-1 order-3" id="divResetForm">
                                <button type="button" class="btn btn-secondary form-control" id="btnResetForm" onclick="reset_form()">Discard</button>
                            </div>
                            <div class="mt-3 col-xl-3 col-md-6 order-sm-2 order-2" id="divSaveInformation">
                                <button type="button" class="btn btn-outline-primary form-control" id="btnSavePayment" role="button" aria-expanded="false" aria-controls="declaration" onclick="save_payment()">
                                  Submit Payment
                                  <span id="spinner" class="spinner-border spinner-border-sm d-none " role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                          </div>

                        </form>
                      </div>
                      {{-- /BANK PAYMENT --}}

                      {{-- ONLINE PAYMENT --}}
                      <div class="tab-pane fade mt-4" id="online" role="tabpanel" aria-labelledby="online-tab">
                        <div class="alert alert-info" role="alert">
                          You will be redirected to bank online payment gateway!
                        </div>
                        <button type="button" class="btn btn-outline-primary">Pay Online</button>
                      </div>
                      {{-- ONLINE PAYMENT --}}
                    </div>
                    {{-- /PAYMENT ACTION --}}

                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- /PAYMENT --}}

        </div>
      </form>

    </div>
    <!-- /CONTENT -->

    @include('portal.student.payment.registration.scripts')


@endsection

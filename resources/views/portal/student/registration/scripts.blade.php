<script type="text/javascript">


// INSERT CURRENT ADDRESS
/*
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
  } */

  address_editable = () => {
    console.log('hello');
    if(document.getElementById("current_address").checked == true) {
      //console.log('disabled');
      $('#currentHouse').removeAttr('disabled');
      $('#currentAddressLine1').removeAttr('disabled');
      $('#currentAddressLine2').removeAttr('disabled');
      $('#currentAddressLine3').removeAttr('disabled');
      $('#currentAddressLine4').removeAttr('disabled');
      $('#currentCity').removeAttr('disabled');
      $('#plusCurrentField').removeAttr('disabled');
    }
    else{
      document.getElementById('currentHouse').setAttribute("disabled","disabled");
      document.getElementById('currentAddressLine1').setAttribute("disabled","disabled");
      document.getElementById('currentAddressLine2').setAttribute("disabled","disabled");
      document.getElementById('currentAddressLine3').setAttribute("disabled","disabled");
      document.getElementById('currentAddressLine4').setAttribute("disabled","disabled");
      document.getElementById('currentCity').setAttribute("disabled","disabled");
      document.getElementById('plusCurrentField').setAttribute("disabled","disabled");

    }
  }
  
  // /INSERT CURRENT ADDRESS
  </script>
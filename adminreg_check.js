function check() {
    if(document.formcheck.operator.value=="") {
        alert("Select Data Entry Operator");
        document.formcheck.operator.focus();
        return false;
    }
    if(document.formcheck.admission_year.value=="") {
        alert("Select Admission Year");
        document.formcheck.admission_year.focus();
        return false;
    }
    if(document.formcheck.batch.value=="") {
        alert("Select Batch");
        document.formcheck.batch.focus();
        return false;
    }
    if(document.formcheck.admission_number.value=="") {
        alert("Enter Admission Number");
        document.formcheck.admission_number.focus();
        return false;
    }
    if(document.formcheck.name.value=="") {
        alert("Enter Name");
        document.formcheck.name.focus();
        return false;
    }
    if(document.formcheck.bd.value=="") {
        alert("Enter Date of Birth");
        document.formcheck.bd.focus();
        return false;
    }
    if(document.formcheck.bm.value=="") {
        alert("Enter Month of Birth");
        document.formcheck.bm.focus();
        return false;
    }
    if(document.formcheck.by.value=="") {
        alert("Enter Year of Birth");
        document.formcheck.by.focus();
        return false;
    }
    if(document.formcheck.sex.value=="") {
        alert("Enter Sex");
        document.formcheck.sex.focus();
        return false;
    }
    if(document.formcheck.bloodgroup.value=="") {
        alert("Enter Blood Group");
        document.formcheck.bloodgroup.focus();
        return false;
    }
    if(document.formcheck.weight.value=="") {
        alert("Enter Weight");
        document.formcheck.weight.focus();
        return false;
    }
    if(document.formcheck.branch.value=="") {
        alert("Enter Branch of Study");
        document.formcheck.bloodgroup.focus();
        return false;
    }
    if(document.formcheck.district.value=="") {
        alert("Enter District");
        document.formcheck.district.focus();
        return false;
    }
    if(document.formcheck.email.value=="") {
        alert("Enter Email");
        document.formcheck.email.focus();
        return false;
    }
    var reg = /^([a-z0-9_\-\.])+\@([a-z0-9_\-\.])+\.([a-z]{2,4})$/;
    var address = document.formcheck.email.value;
    if(reg.test(address) == false) {
      alert('Invalid Email Address');
      document.formcheck.email.focus();
      return false;
    }
    if(document.formcheck.address.value=="") {
        alert("Enter the address");
        document.formcheck.repass.focus();
        return false;
    }
}
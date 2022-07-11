function validate()
{
  if( document.form1.id.value == '' )
   {
     alert( 'Please provide an ID!' );
     document.form1.id.focus();
     return false;
   }

   if( document.form1.username.value == '' )
   {
     alert( 'Please provide a username!' );
     document.form1.username.focus();
     return false;
   }
   
   if( document.form1.password.value == '' )
   {
     alert( 'Please provide a password!' );
     document.form1.password.focus();
     return false;
   }

   if( document.form1.managerName.value == '' )
   {
     alert( 'Please provide a name!' );
     document.form1.managerName.focus();
     return false;
   }

    return (true);
}

function validateApp()
{
   if( document.myForm.name.value == '' )
   {
     alert( 'Please provide your name!' );
     document.myForm.name.focus();
     return false;
   }

   if( document.myForm.gender.value == '' )
   {
     alert( 'Please choose your Gender!' );
     cocument.myForm.gender.focus();
     return false;
   }

   if( document.myForm.email.value == '' )
   {
     alert( 'Please provide your Email!' );
     document.myForm.email.focus();
     return false;
   }

   if( validateEmail() == false )
    return false;
   
   if( document.myForm.collegeName.value == '-1' )
   {
     alert( 'Please provide your college!' );
     return false;
   }

   if( document.myForm.roomType.value == '' )
   {
     alert( 'Please choose your room type!' );
     document.myForm.roomType.focus() ;
     return false;
   }

    return (true);
}

function validateEmail() {
  var emailID = document.forms['myForm']['email'].value;
  atpos = emailID.indexOf('@');
  dotpos = emailID.lastIndexOf('.');
  
  if (atpos < 1 || ( dotpos - atpos < 2 )) {
     alert('Please enter correct email ID')
     document.myForm.email.focus() ;
     return false;
  }
  return (true);
}

function disableSubmit() {
  document.getElementById('submitButton').disabled = true;
 }

 function activateButton(element) {

  if(element.checked) {
    document.getElementById('submitButton').disabled = false;
   }
   else  {
    document.getElementById('submitButton').disabled = true;
  }
}
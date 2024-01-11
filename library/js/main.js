
$(()=>{
    
 $('.studentclasslist').on('click',(e)=>{
  e.preventDefault()
/////
  $('.stt').css('display','none');
  let classs = e.target.querySelector('.class');
 
  let campusselect = e.target.querySelector('.campusselect');
 
  let data = {classs:classs.value,campusselect:campusselect.value};
  data = JSON.stringify(data);
console.log(classs);
console.log(campusselect);
console.log(data);
 

alert()
  $.ajax({
    url:'class.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlist').append(suss);
   }
  })
  $.ajax({
    url:'check.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlistch').append(suss);
   }
  })
  $.ajax({
    url:'result.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlistd5').append(suss);
   }
  })
  $.ajax({
    url:'domitory.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlistd').append(suss);
   }
  })

  $.ajax({
    url:'attendance-students.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlist2').append(suss);
   }
  })
  $.ajax({
    url:'students2.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlistst').append(suss);
   }
  })
 
 
  $.ajax({
    url:'students3.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlistsy').append(suss);
   }
  })
 
  $.ajax({
    url:'students4.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlistsz').append(suss);
   }
  })
 
 
  $.ajax({
    url:'exampro.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlist4').append(suss);
   }
  })

  if(e.target.innerText == 0){
    alert('no student')
  }
  else{
    $('.popperclasslist').removeClass('d-none');

  }

///////
   e.preventDefault();
 });
 $('.studentclasslist2').on('click',(e)=>{
/////
  $('.stt').css('display','none');
   
  let feename=e.target.querySelector('.fee');
 let classs = e.target.querySelector('.class');
 let campusselect = e.target.querySelector('.campusselect');


 let data = {classs:classs.value,campusselect:campusselect.value,feename:feename.value};
 data = JSON.stringify(data);

 
 
  $.ajax({
    url:'acountant.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlist3').append(suss);
   }
  })
  if(e.target.innerText == 0){
    alert('no student')
  }
  else{
    $('.popperclasslist').removeClass('d-none');

  }

///////
   e.preventDefault();
 });








 $('.studentclasslist3').on('click',(e)=>{
/////
  $('.stt').css('display','none');
   
  let bookname=e.target.querySelector('.book');
 let school = e.target.querySelector('.school');
 let campusselect = e.target.querySelector('.campusselect');


 let data = {book:bookname.value,campusselect:campusselect.value,school:school.value};
 data = JSON.stringify(data);
 console.log(data)

 
 
  $.ajax({
    url:'library.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
$('.thestudentlist3').append(suss);
   }
  })
  if(e.target.innerText == 0){
    alert('no student')
  }
  else{
    $('.popperclasslist').removeClass('d-none');

  }

///////
   e.preventDefault();
 });
 $('.studentclasslistcheck').on('click',(e)=>{
   $('.popperclasslistcheck').removeClass('d-none');
   e.preventDefault();
 });

 $('.prefectadd').on('click',(e)=>{
   $('.popperprefectlistcheck').removeClass('d-none');
   e.preventDefault();
 });
 $('.makepayment').on('click',(e)=>{
   $('.poppermakepayment').removeClass('d-none');
   e.preventDefault();
 });
 $('.popperbook').on('click',(e)=>{
   $('.popperbookmodify').removeClass('d-none');
   e.preventDefault();
 });
 $('.bookadd').on('click',(e)=>{
   $('.popperbookadd').removeClass('d-none');
   e.preventDefault();
 });
 $('.bookreturn').on('click',(e)=>{
   $('.popperbookreturn').removeClass('d-none');
   e.preventDefault();
 });
 $('.bookloan').on('click',(e)=>{
   $('.popperbookloan').removeClass('d-none');
   e.preventDefault();
 });
 $('.studentclasslistabsent').on('click',(e)=>{
   $('.popperclasslistabsent').removeClass('d-none');
   e.preventDefault();
 });
 $('.classpayment').on('click',(e)=>{
   $('.popperclasslistpayment').removeClass('d-none');
   e.preventDefault();
 });
 $('.student').on('click',(e)=>{
   $('.popperstudent').removeClass('d-none');
   
   e.preventDefault();
 });
 $('.classpaymentedit').on('click',(e)=>{
   $('.popperclasslistpaymentedit').removeClass('d-none');
   e.preventDefault();
 });
 $('.feelist').on('click',(e)=>{
   $('.popperfeelist').removeClass('d-none');
   e.preventDefault();
 });
 let hclass = document.querySelector('.hclass');

 $('.popoutsubject').on('click',(e)=>{

   let grandm = e.target;
   let ul = grandm.parentElement.querySelector('ul');
    
    hclass.value = grandm.querySelector('.click').value;
    console.log(ul);

    ul.classList.remove('d-none');


  
    e.preventDefault();
 });
 $('.editsubject').on('click',(e)=>{
 
  e.target.parentElement.classList.add('d-none')
    $('.poppereditsubject ').removeClass('d-none');
    e.preventDefault();
 });
 $('.addcampus').on('click',(e)=>{
    $('.poppereditcampus ').removeClass('d-none');
    e.preventDefault();
 });
 $('.classimg').on('click',(e)=>{
    $('.popperpicture ').removeClass('d-none');
    e.preventDefault();
 });
 $('.teachersdetails').on('click',(e)=>{
  $('.appentteachersresponse').html('');

  let teacher = e.target.querySelector('.teacherid');
  let campusselect = e.target.querySelector('.campusselect');
  let data = {classteachrsname:teacher.value,campusselect:campusselect.value};
  data = JSON.stringify(data);

  $.ajax({
    url:'class.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
       $('.appentteachersresponse').html(suss);
    }
  })
  $.ajax({
    url:'lbook.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
       $('.appentteachersresponsel').html(suss);
    }
  })

  $.ajax({
    url:'teachers4.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
       $('.appentteachersresponsett').html(suss);
    }
  })


  if(teacher.value == 'not assigned'){
    alert('no teacher assigned')
  }
  else{
    $('.popperteachersdetails').removeClass('d-none');

  }

   e.preventDefault();
 });
 $('.teachersdetails2').on('click',(e)=>{
  $('.appentteachersresponse').html('');

  let teacher = e.target.querySelector('.teacherid');
  let campusselect = e.target.querySelector('.campusselect');
  let data = {classteachrsname2:teacher.value,campusselect2:campusselect.value};
  data = JSON.stringify(data);

  $.ajax({
    url:'class.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
       $('.appentteachersresponse').html(suss);
    }
  })


  if(teacher.value == 'not assigned'){
    alert('no teacher assigned')
  }
  else{
    $('.popperteachersdetails').removeClass('d-none');

  }

   e.preventDefault();
 });



 $('.teachersdetails2').on('click',(e)=>{
  $('.appentteachersresponse').html('');

  let teacher = e.target.querySelector('.teacherid');
  let campusselect = e.target.querySelector('.campusselect');
  let data = {classteachrsname:teacher.value,campusselect:campusselect.value};
  data = JSON.stringify(data);

  $.ajax({
    url:'prefects.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
       $('.appentteachersresponse').html(suss);
    }
  })


  if(teacher.value == 'not assigned'){
    alert('no teacher assigned')
  }
  else{
    $('.popperteachersdetails').removeClass('d-none');

  }

   e.preventDefault();
 });
 $('.teachersdetails3').on('click',(e)=>{
  alert()

  let teacher = e.target.querySelector('.teacherid');
  let campusselect = e.target.querySelector('.campusselect');
  let data = {classteachrsname3:teacher.value,campusselect3:campusselect.value};
  data = JSON.stringify(data);

  $.ajax({
    url:'attendance-teacher.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
       $('.appentteachersresponser').append(suss);
    }
  })
  $.ajax({
    url:'attendance-staff.php',
    type:'POST',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(suss)=>{
       $('.appentteachersresponser2').append(suss);
    }
  })


  if(teacher.value == 'not assigned'){
    alert('no teacher assigned')
  }
  else{
    $('.popperregular').removeClass('d-none');

  }

   e.preventDefault();
 });
 $('.studentdetails').on('click',(e)=>{
   $('.popperstudenrdetails').removeClass('d-none');

   e.preventDefault();
 });
 $('.exam').on('click',(e)=>{
   $('.examq').removeClass('d-none');

   e.preventDefault();
 });
 $('.createfees').on('click',(e)=>{
   $('.poppercreatefees').removeClass('d-none');

   e.preventDefault();
 });
 $('.createfees2').on('click',(e)=>{
   $('.poppercreatefees2').addClass('d-none');

   e.preventDefault();
 });
 $('.customfees').on('click',(e)=>{
   $('.poppercreatefees2').removeClass('d-none');

   e.preventDefault();
 });
 $('.regular').on('click',(e)=>{
   $('.popperregular').removeClass('d-none');

   e.preventDefault();
 });
 $('.editclass').on('click',(e)=>{
  
  let grandm = e.target;
  iclass = document.querySelector('.iclass')  ;
  iclass.value = grandm.querySelector('.class').value;
  alert(iclass.value);
   $('.poppereditclass').removeClass('d-none');
   e.preventDefault();
 });
 $('.close').on('click',(e)=>{
    let target = e.target;
    target.parentElement.parentElement.classList.add('d-none')
    
 })
 $('.close2').on('click',(e)=>{
    let target = e.target;
    target.parentElement.classList.add('d-none')
    
 })
 
 $('.closesubject').on('click',(e)=>{
    $('.subjectlist ').addClass('d-none');
   
  
    
 })
 


 setInterval(()=>{
  let seconds = new Date().getSeconds();
  $('.seconds').html(seconds);
 },1000)
 



 
 
 
//  $('.canselcamp').on('click',()=>{
//   alert()
//  })
// console.log($('.canselcamp').length)

let delbuth = document.getElementsByClassName('deletesubjectbuth');
let i;
for(i=0;i<delbuth.length;i++){
delbuth[i].addEventListener('click',(e)=>{


  let input = e.target.parentElement.innerText;
  alert(input)

  input = {
    input:input.innerText
  }
  input = JSON.stringify(input);
  $.ajax({
   
   url:'class.php',
   type:'POST',
   data: input,
   contentType:'application/json',
   catch:false,
   processData:false,
   success:(suss)=>{
     
   }
  })
  e.preventDefault()

  })
}

$('.search').on('input',(e)=>{
  let val = e.target.value;
  
  let tr = document.getElementsByClassName('d');
  let td = document.getElementsByClassName('dc');

  for(i=0;i<tr.length;i++){
    tr[i].style.display='none';
  }
  for(i=0;i<td.length;i++){
    if(td[i].innerText.includes(val)){
      td[i].parentElement.style.display='flex';
    }
 } 
}) 

let fee = document.querySelectorAll('.feeupdate');
for(i=0;i<fee.length;i++){
fee[i].addEventListener('click',(e)=>{
  let feeamount = e.target.querySelector('.feeamount')
  let vall = e.target.parentElement.parentElement
  feeamount = vall.querySelector('.tdc');
  let feename = e.target.querySelector('.feename')
  let data ={
    updateamount:feeamount.value,
    feename:feename.value,
  };
  data=JSON.stringify(data);
    $.ajax({
      type:'POST',
      url:'acountant.php',
      data:data,
      contentType:'application/json',
      processData:false,
      catch:false,
      success:(s)=>{
         alert('updated')
      }
    })
  })
}

$('.answer').on('click',(e)=>{
  let question = e.target.parentElement.querySelector('.question');
  let ans = e.target.parentElement.querySelector('.ans');
  console.log(question)
  data = {
    question:question.value,
    ans:ans.value
  }
  data= JSON.stringify(data);
  $.ajax({
    type:'POST',
    url:'exam-online.php',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(s)=>{
       alert('sent')
    }
  })
})

setInterval(()=>{
 let data = {
    online:'yes'
  }
  data = JSON.stringify(data)
  $.ajax({
    type:'POST',
    url:'../../views/messenger/chat.php',
    data:data,
    contentType:'application/json',
    processData:false,
    catch:false,
    success:(s)=>{
    }
  })

},10000)


})
  

$('#sonline').on('submit',(e)=>{
  e.preventDefault();
 let data = document.querySelector('#sonline');
  $.ajax({
    type:'POST',
    url:'../../views/messenger/chat.php',
    data: new FormData(data),
    contentType:false,
    processData:false,
    catch:false,
    success:(s)=>{
      console.log(s)
      $('.pon').html(s)
      $('.popperon').removeClass('d-none')

    }
  })
})

$('#toggle').on('click',()=>{
  $('.navigate').addClass('navigateshow');
  $('.navigateshow').removeClass('navigate');
 

})
$('#toggle2').on('click',()=>{
  $('.navigateshow').addClass('navigate');
  $('.navigate').removeClass('navigateshow');
 

})
 
$('.dbuth').on('click',()=>{
  $('.dbuth').val($('.appendstudentdetails').html());
})

$('ul form button').removeClass('btn-primary');
$('ul form button').addClass('btn-dark');
          


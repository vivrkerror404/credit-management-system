 function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}

Array.from(document.getElementsByClassName('senduser')).map(elem=>elem.addEventListener('click',ShowPopup));
Array.from(document.getElementsByClassName('loanapply')).map(elem=>elem.addEventListener('click',ShowLoanPopup));
function ShowPopup(e)
{
	var name=e.target.getAttribute('data-name');
	var email=e.target.getAttribute('data-email');

	document.getElementById('dynamicname').value=name;
	document.getElementById('dynamicemail').value=email;
   $.get(`View/fetchusers.php?email=${email}`, function(data, status){
    console.log(data);
    document.getElementById('ajaxname').innerHTML=data
    // alert("Data: " + data + "\nStatus: " + status);
  });

	document.getElementsByClassName('sendpopup')[0].style.display="flex";
}
function ShowLoanPopup(e)
{
	var name=e.target.getAttribute('data-name');
	var email=e.target.getAttribute('data-email');

	document.getElementById('dynname').value=name;
	document.getElementById('dynemail').value=email;


	document.getElementsByClassName('loanpopup')[0].style.display="flex";
}
document.addEventListener('click',function(e){
	if(e.target.classList.contains('sendpopup') || e.target.classList.contains('loanpopup'))
	{
		document.getElementsByClassName('sendpopup')[0].style.display="none";
	document.getElementsByClassName('loanpopup')[0].style.display="none";

	}
})
/*!
* Start Bootstrap - Clean Blog v6.0.4 (https://startbootstrap.com/theme/clean-blog)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-clean-blog/blob/master/LICENSE)
*/
window.addEventListener('DOMContentLoaded', () => {
    let scrollPos = 0;
    const mainNav = document.getElementById('mainNav');
    const headerHeight = mainNav.clientHeight;
    window.addEventListener('scroll', function() {
        const currentTop = document.body.getBoundingClientRect().top * -1;
        if ( currentTop < scrollPos) {
            // Scrolling Up
            if (currentTop > 0 && mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-visible');
            } else {
                console.log(123);
                mainNav.classList.remove('is-visible', 'is-fixed');
            }
        } else {
            // Scrolling Down
            mainNav.classList.remove(['is-visible']);
            if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-fixed');
            }
        }
        scrollPos = currentTop;
    });
})



function postAjaxCom(){


    //let searchParams = new URLSearchParams(window.location.search);
    //let param = searchParams.has('post&id');

    //console.log(param);

    // console.log(window.location.href);


    // var getUrlParameter = function getUrlParameter(sParam) {
    //     var sPageURL = window.location.search.substring(1),
    //         sURLVariables = sPageURL.split('&'),
    //         sParameterName,
    //         i;
    
    //     for (i = 0; i < sURLVariables.length; i++) {
    //         sParameterName = sURLVariables[i].split('=');
    
    //         if (sParameterName[0] === sParam) {
    //             return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    //         }
    //     }
        
    // };

    // var post = getUrlParameter('post');

    // console.log(post);


    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "./controllers/ControllerCom.php";
    var fn = document.getElementById("cont").value;

    var cont=document.getElementsByName('cont')[0];


    if( fn ) {
        console.log(fn);

        var vars = "comcontent="+fn;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // Access the onreadystatechange event for the XMLHttpRequest object
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                document.getElementById("status").innerHTML = return_data;
            }
        
        
        }
        // Send the data to PHP now... and wait for response to update the status div
        hr.send(vars); // Actually execute the request
        document.getElementById("status").innerHTML = "En cours d'envoi,Patientez svp..";
        cont.value='';
        cont.rows = "1";

    }else{
        document.getElementById("status").innerHTML = "Le champs commentaire ne peut être vide. Merci d'indiquer votre commentaire.";

    }
    
}


//Ajouté par kéké
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});








            

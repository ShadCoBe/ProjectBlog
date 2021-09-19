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




//Modal de modification d'un article (Vue admin)
$(document).ready(function(){
    $('.editbtn').on('click', function(){

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();

        }).get();

        console.log(data);

        $('#id').val(data[1]);
        $('#name-user').val(data[2]);
        $('#title-edit').val(data[3]);
        $('#sub-title-edit').val(data[4]);
        $('#content-edit').val(data[5]);
       
      


        document.getElementById('id').innerHTML = data[1];
        document.getElementById('labelid').innerHTML = data[1];



    });

});



//Modal de gestion des utilisateurs
$(document).ready(function(){
    $('.editbtnuser').on('click', function(){

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();

        }).get();

        console.log(data);

      
        $('#sub-title-edit').val(data[4]);
        $('#content-edit').val(data[5]);
        $('#id').val(data[1]);


        document.getElementById('id').innerHTML = data[1];
        document.getElementById('labelid').innerHTML = data[3];
        document.getElementById('username').innerHTML = "Nom utilisateur => <b>"+ data[2]+"</b>";
        document.getElementById('useremail').innerHTML = "Email utilisateur => <b>"+ data[4] +"</b>";



    });

});



        




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






            

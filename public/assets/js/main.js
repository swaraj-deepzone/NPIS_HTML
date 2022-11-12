document.querySelectorAll(".drop-zone__input").forEach((inputElement) => { console.log('ddsssss');
	const dropZoneElement = inputElement.closest(".drop-zone");

	dropZoneElement.addEventListener("click", (e) => {
		inputElement.click();
	});

	inputElement.addEventListener("change", (e) => { 
		var file_type = inputElement.files[0].type; console.log(file_type);
		var file_size = inputElement.files[0].size;  console.log(file_size);

		var allowedExtensions=["image/jpeg", "image/png"];
		
		if(allowedExtensions.indexOf(file_type) == -1)  
        {
			document.getElementById("gambar_profile").style.display = 'block';
			document.getElementById("gambar_profile").textContent="Jenis fail tidak sah";
			return false;
		}

		if(file_size>2000000)  
        {
			document.getElementById("gambar_profile").style.display = 'block';
			document.getElementById("gambar_profile").textContent="saiz fail tidak membiri 2 mb";
			return false;
		}
		document.getElementById("gambar_profile").style.display = 'none';


		if (inputElement.files.length) {
			updateThumbnail(dropZoneElement, inputElement.files[0]);
		}
	});

	dropZoneElement.addEventListener("dragover", (e) => {
		e.preventDefault();
		dropZoneElement.classList.add("drop-zone--over");
	});

	["dragleave", "dragend"].forEach((type) => {
		dropZoneElement.addEventListener(type, (e) => {
			dropZoneElement.classList.remove("drop-zone--over");
		});
	});

	dropZoneElement.addEventListener("drop", (e) => {
		e.preventDefault();

		if (e.dataTransfer.files.length) {
			inputElement.files = e.dataTransfer.files;
			updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
		}

		dropZoneElement.classList.remove("drop-zone--over");
	});
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {  console.log(file['name']);

		const currentYear = new Date().getFullYear();
		const currentMonth = new Date().getMonth() + 1;
		const currentDay = new Date().getDate();
		const currentHour = new Date().getHours();
		const currentMinute = new Date().getMinutes();
		const currentSecond = new Date().getSeconds();

	  var newFileName = currentYear+"_"+currentMonth+"_"+currentDay+"_"+currentHour+"_"+currentMinute+"_"+currentSecond+"_"+file['name']; console.log(newFileName);
	  var formData = new FormData();
      formData.append("file", file, newFileName);  console.log(formData);

	  let x = document.cookie;
	  var xsrf_token = x.split('=').pop();
	  $.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': xsrf_token
		  }
	  });
	  const api_url = document.getElementById("api_url").value;  console.log(api_url);


	$.ajax({
        type: "POST",
		url: api_url+'api/gambar-profil-upload',
        dataType: 'json',
		cache: false,
        contentType: false,
        processData: false,
		data: formData,
        success: function (result) { console.log(result)
			document.getElementById("image_path").value= result.uploaded_path;
			document.getElementById("image_name").value= result.image_name;
        }
    });

	let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

	// First time - remove the prompt
	if (dropZoneElement.querySelector(".drop-zone__prompt")) {
		dropZoneElement.querySelector(".drop-zone__prompt").remove();
	}

	// First time - there is no thumbnail element, so lets create it
	if (!thumbnailElement) {
		thumbnailElement = document.createElement("div");
		thumbnailElement.classList.add("drop-zone__thumb");
		dropZoneElement.appendChild(thumbnailElement);
	}

	thumbnailElement.dataset.label = file.name;

	// Show thumbnail for image files
	if (file.type.startsWith("image/")) {
		const reader = new FileReader();

		reader.readAsDataURL(file);
		reader.onload = () => {
			thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
		};
	} else {
		thumbnailElement.style.backgroundImage = null;
	}
}


//image upload - done

// document upload started

document.querySelectorAll(".drop-zone__input_dokumen").forEach((inputElement) => {
	const dropZoneElementDokumen = inputElement.closest(".drop-zone_dokumen");

	dropZoneElementDokumen.addEventListener("click", (e) => {
		inputElement.click();
	});

	inputElement.addEventListener("change", (e) => { 
		var file_type = inputElement.files[0].type; console.log(file_type);
		var file_size = inputElement.files[0].size;  console.log(file_size);

		var allowedExtensions=["application/pdf", "image/jpeg", "image/png", "application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
		
		if(allowedExtensions.indexOf(file_type) == -1)  
        {
			document.getElementById("dokumen_error").style.display = 'block';
			document.getElementById("dokumen_error").textContent="Jenis fail tidak sah";
			return false;
		}

		if(file_size>2000000)  
        {
			document.getElementById("dokumen_error").style.display = 'block';
			document.getElementById("dokumen_error").textContent="saiz fail tidak membiri 2 mb";
			return false;
		}
		document.getElementById("dokumen_error").style.display = 'none';


		if (inputElement.files.length) {
			updateThumbnaildokumen(dropZoneElementDokumen, inputElement.files[0]);
		}
	});

	dropZoneElementDokumen.addEventListener("dragover", (e) => {
		e.preventDefault();
		dropZoneElementDokumen.classList.add("drop-zone--over");
	});

	["dragleave", "dragend"].forEach((type) => {
		dropZoneElementDokumen.addEventListener(type, (e) => {
			dropZoneElementDokumen.classList.remove("drop-zone--over");
		});
	});

	dropZoneElementDokumen.addEventListener("drop", (e) => {
		e.preventDefault();

		if (e.dataTransfer.files.length) {
			inputElement.files = e.dataTransfer.files;
			updateThumbnail(dropZoneElementDokumen, e.dataTransfer.files[0]);
		}

		dropZoneElementDokumen.classList.remove("drop-zone--over");
	});
});


function updateThumbnaildokumen(dropZoneElementDokumen, file) {  console.log(file['name']);

		const currentYear = new Date().getFullYear();
		const currentMonth = new Date().getMonth() + 1;
		const currentDay = new Date().getDate();
		const currentHour = new Date().getHours();
		const currentMinute = new Date().getMinutes();
		const currentSecond = new Date().getSeconds();


	  var newFileName = currentYear+"_"+currentMonth+"_"+currentDay+"_"+currentHour+"_"+currentMinute+"_"+currentSecond+"_"+file['name']; console.log(newFileName);
	  var formData = new FormData();
      formData.append("file", file, newFileName);  console.log(formData);

	  let x = document.cookie;
	  var xsrf_token = x.split('=').pop();
	  $.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': xsrf_token
		  }
	  });
	  const api_url = document.getElementById("api_url").value;  console.log(api_url);
	$.ajax({
        type: "POST",
		url: api_url+'api/dokumen-sokongan',
        dataType: 'json',
		cache: false,
        contentType: false,
        processData: false,
		data: formData,
        success: function (result) { console.log(result)
			document.getElementById("dokumen_path").value= result.dokumen_path;
			document.getElementById("dokumen_name").value= result.dokumen_name;
        }
    });

	let thumbnailElementDokumen = dropZoneElementDokumen.querySelector(".drop-zone__thumb_dokumen");

	// First time - remove the prompt
	if(thumbnailElementDokumen){
		if (thumbnailElementDokumen.querySelector(".drop-zone__prompt_dokumen")) {
			thumbnailElementDokumen.querySelector(".drop-zone__prompt_dokumen").remove();
		}
	}
	console.log('avv');

	document.getElementById("doku_image_new").style.display = 'block';
	document.getElementById("dokumen_span").style.display = 'none';
	document.getElementById("doku_label").innerHTML = file.name;


	// // First time - there is no thumbnail element, so lets create it
	// if (!thumbnailElementDokumen) { 
	// 	thumbnailElementDokumen = document.createElement("div");
	// 	thumbnailElementDokumen.classList.add("drop-zone__thumb_dokumen");
	// 	dropZoneElementDokumen.appendChild(thumbnailElementDokumen);
	// }

	// thumbnailElementDokumen.dataset.label = file.name;

	// Show thumbnail for image files
	// if (file.type.startsWith("image/")) {
	// 	const reader = new FileReader();

	// 	reader.readAsDataURL(file);
	// 	reader.onload = () => {
	// 		thumbnailElementDokumen.style.backgroundImage = `url('${reader.result}')`;
	// 	};
	// } else {
	// 	thumbnailElementDokumen.style.backgroundImage = null;
	// }
}


//document upload - done




$(document).ready(function() {
	const api_url = document.getElementById("api_url").value;  console.log(api_url);
	$('#show-me').hide();   
	$('input[type="radio"]').click(function() { //alert($(this).attr('id'));
		if($(this).attr('id') == 'agensi_luar') {
			 $('#show-me').show();           
		}
 
		else {
			 $('#show-me').hide();   
		}
	});

	let x = document.cookie;
    var xsrf_token = x.split('=').pop();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': xsrf_token
        }
    });

	// var dropDown = document.getElementById("kementerian");
    // $.ajax({
    //     type: "GET",
    //     url: api_url+"GetKementerian/",
    //     dataType: 'json',
    //     success: function (result) { console.log(result)
    //         if (result) {
    //             $.each(result, function (key, item) {
	// 				var opt = item.id;
	// 				var el = document.createElement("option");
	// 				el.textContent = item.Name;
	// 				el.value = opt;
	// 				dropDown.appendChild(el);
    //             })
    //         }
    //         else {
    //             $.Notification.error(result.Message);
    //         }
    //     }
    // });

	var JabatandropDown =  document.getElementById("Jabatan");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jabatan/list/",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_jabatan;
					el.value = opt;
					JabatandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

	var bahagiandropDown =  document.getElementById("bahagian");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/bahagian/list/",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_bahagian;
					el.value = opt;
					bahagiandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

	var negeridropDown =  document.getElementById("negeri");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/negeri/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_negeri;
					el.value = opt;
					negeridropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

	var daerahdropDown =  document.getElementById("daerah");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/daerah/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_daerah;
					el.value = opt;
					daerahdropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

	var jawatandropDown =  document.getElementById("jawatan");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jawatan/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_jawatan;
					el.value = opt;
					jawatandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

	var greddropDown =  document.getElementById("gred");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/gredjawatan/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_gred_jawatan;
					el.value = opt;
					greddropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

    $("#submit").click(function(){

		if(!document.myform.nama.value)  { 
			document.getElementById("error_name").innerHTML="medan nama diperlukan"; 
			document.getElementById("name").focus();
			return false; 
		}
		if(!document.myform.no_kod_penganalan.value)  { 
			document.getElementById("error_no_kod_penganalan").innerHTML="medan no kod penganalan diperlukan"; 
			document.getElementById("no_kod_penganalan").focus();
			return false; 
		}
		if(!document.myform.emel_rasmi.value)  { 
			document.getElementById("error_email").innerHTML="medan emel rasmi diperlukan"; 
			document.getElementById("emel_rasmi").focus();
			return false; 
		}
		if(!document.myform.no_telefon.value)  { 
			document.getElementById("error_telefon").innerHTML="medan no telefon diperlukan";   
			document.getElementById("no_telefon").focus();
			return false; 
		}

		let x = document.cookie;
		var xsrf_token = x.split('=').pop();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': xsrf_token
			}
		});
		const api_url = document.getElementById("api_url").value;  console.log(api_url);

		$.ajax({
			type: 'POST',
			url: api_url+"api/user/create/",
			data: $('#create_user_form').serialize(), 
			success: function(response) { console.log(response)
			   alert(response); 
			},
		   error: function() {
				//$("#commentList").append($("#name").val() + "<br/>" + $("#body").val());
			   alert("There was an error submitting data");
		   }
		});
	});




 });
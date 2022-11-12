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
console.log(xsrf_token);
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': xsrf_token
        }
    });
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jabatan/list/",
        dataType: 'json',
        Headers: { "X-XSRF-TOKEN":xsrf_token},
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
        url: api_url+"GetBahagian/",
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
        url: api_url+"GetNegeri/",
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
        url: api_url+"Getdaerah/",
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
        url: api_url+"GetJawatan/",
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
        url: api_url+"GetGred/",
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

    var tmp_user =  document.getElementById("user_type").value;
    var list_user_api='';
    var update_user_api='';

    if(tmp_user=='table_users')
    {
         list_user_api = api_url+"getUser/";
         update_user_api = api_url+"updateUser/";
    }
    else
    {
        list_user_api = api_url+"getTempUser/";
        update_user_api = api_url+"addTempUser/";
    }
   // console.log(list_user_api);
    $.ajax({
        type: "GET",
        url: list_user_api,
        dataType: 'json',
        success: function (result) { console.log(result[0])
            if (result) { //console.log(document.getElementById("nama").innerHTML);
                document.getElementById("name").value= result[0].name;
                document.getElementById("nama").innerHTML= result[0].name;
                document.getElementById("no_telefon").value= result[0].no_telefon;
                document.getElementById("emel_rasmi").value= result[0].email;
                document.getElementById("jawatan").value= result[0].jawatan_id;
                document.getElementById("gred").value= result[0].gred_jawatan_id;
                document.getElementById("kementerian").value= result[0].kementerian_id;
                document.getElementById("Jabatan").value= result[0].jabatan_id;
                document.getElementById("bahagian").value= result[0].bahagian_id;
                document.getElementById("negeri").value= result[0].negeri_id;
                document.getElementById("daerah").value= result[0].daerah_id;
                document.getElementById("catatan").value= result[0].catatan;
                if(result[0].status_pengguna_id==1 && result[0].row_status==1)
                {
                    document.getElementById("inputState").value= 1;
                    document.getElementById("active").style.display = 'block';
                    document.getElementById("inactive").style.display = 'none';
                }
                else
                {
                    document.getElementById("inputState").value= 0;
                    document.getElementById("inactive").style.display = 'block';
                    document.getElementById("active").style.display = 'none';
                }
                document.getElementById("gambar_image").src = result[0].gambar_profile;
                if(result[0].dokumen_sokungan && result[0].jenis_pengguna_id==0)
                {
                    document.getElementById("doku_sec").style.display = 'block';
                    document.getElementById("document_url").href = result[0].dokumen_sokungan;
                    document.getElementById("user_data_type").innerHTML = "Pengguna Agensi Luar";
                }
                 else 
                { 
                    document.getElementById("doku_sec").style.display = 'none !important';
                    document.getElementById("user_data_type").innerHTML = "Pentadbir";
                }

                document.getElementById("no_kod_penganalan").value= result[0].no_ic;
                document.getElementById("no_kod_penganalan").value= result[0].no_ic;
            }
            else {

            }
        }
    });

    $('.save').click(function(){ console.log($('#update_user_form').serialize());
        $.ajax({
            type: 'POST',
            url: update_user_api,
            data: $('#update_user_form').serialize(), 
            success: function(response) { console.log(response)
                $("#exampleModalCenter").modal('show');
                if(tmp_user=='table_users')
                {
                    document.getElementById("user_pop-up").style.display = 'block';
                    document.getElementById("tmp_user_pop-up").style.display = 'none';
                }
                else
                {
                    document.getElementById("user_pop-up").style.display = 'none';
                    document.getElementById("tmp_user_pop-up").style.display = 'block';
                }
            }
        });
    });
    $('.close').click(function(){
        $("#exampleModalCenter").modal('hide');
    });
});
document.getElementById("btn-toggle").addEventListener("click", () => {
    // // // // // // //     // Ketika tombol id=> btn-toggle kita klik akan menambah/menjinglakan class active-sidebar
    document.getElementById("sidebar").classList.toggle("active-sidebar");
    // // // // // // //     // Ketika tombol id=> diklik akan menambah/menjinglakan class active-main-content
    document.getElementById("main-content").classList.toggle("active-main-content");
  });

  $(document).ready(function(){
    $('#btnModalPetugas').click(function(){
        $('#petugasModal').modal('show');
        $('#titlePetugasModal').text('Tambah Data');
        $('#btnPetugas').text('Simpan');
        $('txtnik').val('');
        $('txtnama').val('');
        $('txttempat').val('');
        $('txttgl').val('');
        $('txttelp').val('');
        $('txtalamat').val('');
    });

    $('#btnPetugas').click(function(){
        if ($('#btnPetugas').text()=='Simpan'){
            // area kode simpan data
            if($('#txtnik').val().length==0){
                    swal({
                        title:'Form Petugas',type:'warning',
                        text:'NIK Wajib Diisi'
                    });
                }else if ($('#txtnama').val().lenghth==0){
                    swal({
                        title:'Form Petugas',type:'Warning',
                        text:'Nama Wajib Diisi'
                    });
                }else if ($('#txttempat').val().lenghth==0){
                    swal({
                        title:'Form Petugas',type:'Warning',
                        text:'Tempat Lahir Wajib Diisi'
                    });
                }else if ($('#txttgl').val().lenghth==0){
                    swal({
                        title:'Form Petugas',type:'Warning',
                        text:'Tanggal Lahir Wajib Diisi'
                    });
                }else if ($('#txttelp').val().lenghth==0){
                    swal({
                        title:'Form Petugas',type:'Warning',
                        text:'No Telp Wajib Diisi'
                    });
                }else if ($('#txtalamat').val().lenghth==0){
                    swal({
                        title:'Form Petugas',type:'Warning',
                        text:'Alamat Wajib Diisi'
                    });
                }else{
                //area ajax CRUD petugas
                $.ajax({ 
                    url: "source/controller/controllerPetugas.php", 
                    type: "POST", 
                    data: { 
                        js_nikPetugas:$('#txtnik').val(), 
                        js_namaPetugas:$('#txtnama').val(), 
                        js_tempatLahirPetugas:$('#txttempat').val(), 
                        js_tanggalLahirPetugas:$('#txttgl').val(), 
                        js_telpPetugas:$('#txttelp').val(), 
                        js_alamatPetugas:$('#txtalamat').val(), 
                        method_petugas:'Simpan_Petugas' 
                    }, 
                    success: function(data, textStatus, jqXHR)
                    { 
                    // Acuan Ajax kode simpan data petugas  
                        $resp = JSON.parse(data);

                        if($resp['duplicate']== 'Duplicate Yes'){ 
                            swal($resp['message']); 
                            //cek duplikasi Primarykey NIK
                            $.ajax({
                                url:"source/controller/controllerPetugas.php",
                                type:"POST",
                                data : {
                                js_nikPetugas:$('#txtnik').val(),
                                method_petugas:'Cari_NIK_petugas'
                                },
                                success: function(data_duplikasi,textStatus, jqXHR)
                                {
                                    $respDupikasi = JSON.parse(data_duplikasi);
                                    $('#txttnama').val($respDupliksi['data'][0]['nama']);
                                    $('#txttempat').val($respDupliksi['data'][0]['tempat_lahir']);
                                    $('#txttgl').val($respDupliksi['data'][0]['tanggal_lahir']);
                                    $('#txttelp').val($respDupliksi['data'][0]['telp']);
                                    $('#txtalamat').val($respDupliksi['data'][0]['alamat']);
                                }
                            }); 
                } else { 
                    // area kode berhasil disimpan 
                    $("#petugasModal").modal("hide");
                    let tempTable = $('#table-petugas').DataTable();
                    //#table_petugas merupakan nama ID tabel pada HTML
                    tempTable.ajax.reload(null,false); 
                    swal($resp['message']); 
                        } 
                    }, 
                error: function (request, textStatus, errorThrown) { 
                    swal("Error", request.responseJSON.message, "error"); 
                    } 
                });
                }
        }else {
            // area kode ubah data
            $.ajax({
                        url: "source/controller/controllerPetugas.php",
                        type: "POST",
                        data: {
                                js_nikPetugas:$('#txtnik').val(),
                                js_namaPetugas:$('#txtnama').val(),
                                js_tempatLahirPetugas:$('#txttempat').val(),
                                js_tanggalLahirPetugas:$('#txttgl').val(),
                                js_telpPetugas:$('#txttelp').val(),
                                js_alamatPetugas:$('#txtalamat').val(),
                                method_petugas:'Ubah_Petugas'
                            },
                        success: function(data, textStatus, jqXHR){
                            $resp = JSON.parse(data);
                            swal($resp['message']);
                            let tempTable = $('#table_petugas').DataTable();
                            // #table_petugas merupakan nama ID tabel pada HTML
                            tempTable.ajax.reload(null, false);
                        }
                    });
        }
    });
    
    // menampilkan data
    $('#table-petugas').dataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "processing": true,
        "ordering": false,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 100,
        "dom": '<"top"f>rtip',
        "fnDrawCallback": function(osettings){   
        },
        "ajax": {
            "url": "./source/controller/controllerPetugas.php",
            "type": "POST",
            "data": {
                method_petugas: "recordDataPetugas"
        },
        Error: function(request, textStatus, errorThrown) {
            swal(request.responseJSON.message);
        }
    },
    columns:[
        {"data": null,render : function (data,type,full,meta) {
            return meta.row + 1;
        }},
        {"data":"nik"},
        {"data":"nama"},
        {"data":"tempat_lahir"},
        {"data":"tempat_lahir"},
        {"data":"telp"},
        {"data":"alamat"},
        {"data":null, render : function(data,type,row){
            return "<button title= 'Edit' class='btn btn-edit-petugas btn-warning btn-xs'><i class='fafa-pencil'></i> Edit</button> <button title= 'Delete' class='btn btn-hapus-petugas btn-danger btn-xs><i class='fa fa-remove'></i>Delete</button>";
    
        }  },
    ]
    });

    // Membuat Kode hapus data petugas 
    $(document).on("click",".btn-hapus-petugas",function(){ 
        let posisiBaris = $(this).parents('tr'); 
        if (posisiBaris.hasClass('child')) { 
              posisiBaris = posisiBaris.prev(); 
        } 
        let table = $('#table-petugas').DataTable(); 
        let data = table.row(posisiBaris).data(); 
         
        swal({ 
            title: "Delete", 
            text: "Apakah anda yakin menghapus data ini ?", 
            type: "warning", 
            showCancelButton: true, 
            confirmButtonClass: "btn-danger", 
            confirmButtonText: "Delete", 
            closeOnConfirm: false, 
            showLoaderOnConfirm: true 
        }, 
            function () { 
        
                $.ajax({ 
                url:"source/controller/controllerPetugas.php", 
                type: "POST", 
                data: { 
                            js_nikPetugas: data.nik, 
                            method_petugas:'Hapus_Petugas' 
                        }, 
                success: function(data, textStatus, jqXHR)
                { 
                        $resp = JSON.parse(data); 
                        if($resp['hasil'] == true){ 
                        swal($resp['message']); 
                        let xtable = $('#table-petugas').DataTable(); 
                        xtable.ajax.reload( null, false ); 
                        }else{ 
                        swal(" hapus Petugas: "+$resp['message']) 
                        } 
                    },
                    error: function(request, textStatus, errorThrown){
                        swal("Error ", request.responseJSON.message, "error");
                    } 
                }); 
            }); 
        });

}); //akhir
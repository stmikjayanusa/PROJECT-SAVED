          $(document).ready(function() {
        $(document).on('focusout','.username',function(e){
             data="&username="+$('.username').val();
            $.ajax({
                url: Usernamecek,
                type: "post",
                data: data,
                dataType: "json",
                cache: false,
                success: function(response){
                    $('.error').html('');
                    if (response.status == true) {
                        $('.username').html("correct account <i class='text-green fa fa-check'></i>");

                        $('.error').removeClass('text-red');
                        $('.error').addClass('text-green');
                        
                    }else{
                        $('.error').removeClass('text-green');
                        $('.error').addClass('text-red');
                        $('.username').html("uncorrect account <i class='text-red fa fa-close'></i>");
                    }
                }
            });
        });
        $(document).on('keypress', '.password', function(e) {
                 if(event.which == 13){
                        $('.btnLogin').click();
                 }
        });
        $(document).on('focusout', '.password', function(e) {
                formData="&username="+$('.username').val()+"&password="+$('.password').val();
                 $.ajax({
                    url: Passwordcek,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    success: function(response) {
                        $('.error').html('');
                        if (response.status == true) {
                            $('.password').html("correct password <i class='text-green fa fa-check'></i>");
                            $('.error').removeClass('text-red');
                            $('.error').addClass('text-green');
                            setTimeout(function(){
                                $('.btnLogin').click();
                            },1000)

                        } else {
                            $('.error').removeClass('text-green');
                            $('.error').addClass('text-red');
                            $('.password').html("uncorrect password <i class='text-red fa fa-close'></i>");
                        }
                    }

            });
             });
        $(document).on('click','.btnLogin',function(e){
                FDta="&username="+$('.username').val()+"&password="+$('.password').val();
                $.ajax({
                    url: Login,
                    type: 'post',
                    data: FDta,
                    dataType: 'json',
                    cache: false,
                    beforeSend: function(){
                         $('.btnLogin').attr('disabled', 'disabled');
                            $('.btnLogin').html('<i class="fa fa-spinn fa-spinner"></i> Sign-In Proses');
                        //   setTimeout(function(){
                        // },1000)
                        
                    },
                    success: function (response) {
                        $('.error').html('');
                         if (response.status == true) {
                                setTimeout(function(){
                                $('.btnLogin').html('<i class="fa fa-check"></i> Sign-In Success');
                                },1000)
                                setTimeout(function(){
                                location.href=Home;                                 
                                },1000)
                            }else{
                                 $('.btnLogin').html('<i class="fa  fa-times"></i> Sign-In Filed');
                                setTimeout(function(){
                                 $('.btnLogin').html('<i class="fa fa-key"></i> sign-In ');
                                },1000)
                            }
                        }
                });
        });
      });


//       $(document).ready(function() {
//             $(document).on('focusout', '.username', function(e) {
//                 formData="&username="+$('.username').val();
//                  $.ajax({
//                     url: '<?= site_url('Usernamecek')  ?>',
//                     type: "post",
//                     data: formData,
//                     dataType: "json",
//                     cache: false,
//                     success: function(response) {
//                         $('.error').html('');
//                         if (response.status == true) {
//                             $('.username').html("correct mail <i class='text-green fa fa-check'></i>");

//                         $('.error').removeClass('text-red');
//                         $('.error').addClass('text-green');
//                         $('.usernameform').removeClass('has-feedback has-error');
//                         $('.usernameform').addClass('has-success');

//                         } else {
//                         $('.error').removeClass('text-green');
//                         $('.error').addClass('text-red');

//                         $('.usernameform').removeClass('has-feedback has-success');
//                         $('.usernameform').addClass('has-error');
//                             $('.username').html("uncorrect mail <i class='text-red fa fa-close'></i>");
//                         }
//                     }

//             });
//              });
//              $(document).on('focusout', '.password', function(e) {
//                 formData="&username="+$('.username').val()+"&password="+$('.password').val();

//                  $.ajax({
//                     url: '<?= site_url('Passwordcek')  ?>',
//                     type: "post",
//                     data: formData,
//                     dataType: "json",
//                     cache: false,
//                     success: function(response) {
//                         $('.error').html('');
//                         if (response.status == true) {
//                             $('.password').html("correct password <i class='text-green fa fa-check'></i>");

//                                 $('.error').removeClass('text-red');
//                                 $('.error').addClass('text-green');
//                                 $('.passwordform').removeClass('has-feedback has-error');
//                                 $('.passwordform').addClass('has-success');

//                         setTimeout(function(){
//                             $('.btnLogin').click();
//                         },1000)

//                         } else {
//                         $('.error').removeClass('text-green');
//                         $('.error').addClass('text-red');

//                         $('.passwordform').removeClass('has-feedback has-success');
//                         $('.passwordform').addClass('has-error');
//                             $('.password').html("uncorrect password <i class='text-red fa fa-close'></i>");
//                         }
//                     }

//             });
//              });
//             $(document).on('click', '.btnLogin', function(e) {
//                 formData="&username="+$('.username').val()+"&password="+$('.password').val();
//                 $.ajax({
//                     url: '<?= site_url('login')  ?>',
//                     type: "post",
//                     data: formData,
//                     dataType: "json",
//                     cache: false,
//                     beforeSend: function() {
//                         $('.boxbuton').removeClass('col-xs-1');
//                         $('.boxbuton').addClass('col-xs-2');
//                         $('.btnLogin').attr('disabled', 'disabled');
//                         $('.btnLogin').html('<i class="fa fa-spin fa-spinner"></i> Login Proses');
//                     },
//                     success: function(response) {
//                         $('.error').html('');
//                                 $('.iconnotifie').removeClass('text-black fa-spin fa-spinner text-green fa-check text-red fa-close ');
//                         if (response.status == true) {
// //Munculkan_Notifikasi
//                                 $('#modal-Login-Eror').modal('show');
//                                 $('.iconnotifie').addClass('text-black fa-spin fa-spinner');
//                                 setTimeout(function(){
//                                   $('.iconnotifie').removeClass('text-black fa-spin fa-spinner');
//                                     $('.iconmesage').text('Login Success');
//                                     $('.iconnotifie').addClass('text-green fa-check ');
//                                 }, 1000);
// //Tutup_Notifikasi
//                                 setTimeout(function(){
//                                 $('#modal-Login-Eror').modal('hide');
//                                 window.location.href = "<?= site_url('auth') ?>";
//                                 }, 2000);


//                         } else {
//                                  $.each(response.pesan, function(i, m) {
//                                 $('.' + i).text(m);

// //Munculkan_Notifikasi

//                                 $('#modal-Login-Eror').modal('show');
//                                 $('.iconnotifie').addClass('text-black fa-spin fa-spinner');
//                                 setTimeout(function(){
//                                   $('.iconnotifie').removeClass('text-black fa-spin fa-spinner');
//                                     $('.iconmesage').text('Login Filed');
//                                     $('.iconnotifie').addClass('text-red fa-close ');
//                                 }, 1000);
// //Tutup_Notifikasi
//                                 setTimeout(function(){
//                                 $('#modal-Login-Eror').modal('hide');
//                                 }, 2000);
//                             });
//                         }
//                         },
//                     complete: function() {
//                         $('.boxbuton').removeClass('col-xs-2');
//                         $('.boxbuton').addClass('col-xs-1');
//                         $('.btnLogin').removeAttr('disabled');
//                         $('.btnLogin').html('<i class="fa fa-key"></i> Login');
//                     }
//             });
//         });
//         });
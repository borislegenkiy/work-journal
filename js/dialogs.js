var set_post=0;
var set_company=0;
var push_ok=0;

$(function() {
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		var 
			
			machines_user = $( "#machines_user" ),
			machines_admin = $( "#machines_admin" ),
			claim_text_user = $( "#claim_text_user" ),
			claim_text_admin = $( "#claim_text_admin" ),
			shift_user = $( "#shift_user" ),
			shift_admin = $( "#shift_admin" ),
			employee_id = $( "#employee_id" ),
			super_user = $( "#super_user" ),
			
			
			name_machine = $( "#name_machine" ),
			name = $( "#name" ),
			login = $( "#login" ),
			password = $( "#password" ),
			post = $( "#post" ),
			post_edit = $( "#post_edit" ),			
			name_edit = $( "#name_edit" ),
			login_edit = $( "#login_edit" ),			
			new_password_edit = $( "#new_password_edit" ),
			allFields = $( [] ).add(name_machine).add(super_user).add(machines_user).add(machines_admin).add(shift_user).add(shift_admin).add(name).add(post).add(login).add(password).add(claim_text_user).add(claim_text_admin).add(name_edit).add(post_edit).add(login_edit).add(new_password_edit),
			tips = $( ".validateTips" );
			
		function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "Length of " + n + " must be between " +
					min + " and " + max + "." );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}	
		
		//dialogs
		$.fx.speeds._default = 777;
		$( "#dialog-help" ).dialog({
			autoOpen: false,
			closeOnEscape: true,
			height: 70,
			width: 160,
			modal: true,
			hide: "explode",
			buttons: {
				Ok: function() {
				
					$( this ).dialog( "close" );
				}
			}
		});
		
		$( "#dialog-employee" ).dialog({
			autoOpen: false,
			closeOnEscape: true,
			height: 570,
			width: 400,
			modal: true,
			buttons: {
				"Add employee": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					
					bValid = bValid && checkLength( name, "name", 3, 34);
					bValid = bValid && checkLength( post, "post", 5, 34 );
					bValid = bValid && checkLength( login, "login", 5, 34 );
					bValid = bValid && checkLength( password, "password", 5, 34 );

					bValid = bValid && checkRegexp( name, /^[A-ZА-Я]([а-яa-z_0-9 ])+$/i, "Name may consist of а-я,a-z,0-9 underscores, space begin with a big letter." );
					bValid = bValid && checkRegexp( post, /^[A-ZА-Яa-zа-я]([а-яa-z0-9-_ ])+$/i, "Post may consist of а-я,a-z, underscores, space , `-`, `0-9`." );
					bValid = bValid && checkRegexp( login, /^[A-Za-z]([a-z_0-9-])+$/i, "Login may consist of a-z,0-9,-, underscores." );	
					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z@+()*&^%$#-_,.:;])+$/, "Password field only allow : a-z 0-9 @-_,.:;" );
					var super_user=0;
					if (document.getElementById('super_user').checked )
						super_user=1;
					if ( bValid ) {
						$.ajax({
							type: "POST",
							data: "a=add_user"+"&name=" + name.val()+ "&post=" + post.val() +"&login=" + login.val() + "&password=" + password.val() + "&super_user=" + super_user,
							url: "ajax.php",
							success: function(data){
								var employee = JSON.parse(data);	
								$("#tabl2").html(employee[0].tabl1);
								$("#tabl2").tablesorter({	
								});
								$("#tabl_employee").html(employee[0].tabl2);
								$("#l_employee").html(employee[0].link);
								
							}
						});
						$( this ).dialog( "close" );	
						return false;
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		$( "#dialog-machine" ).dialog({
			autoOpen: false,
			closeOnEscape: true,
			height: 300,
			width: 400,
			modal: true,
			buttons: {
				"Add machine": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					bValid = bValid && checkLength( name_machine, "name_machine", 3, 34);
					bValid = bValid && checkRegexp( name_machine, /^([A-Zа-яа-яa-z_0-9, ])+$/i, "Name of machines may consist of а-я,a-z,0-9 underscores, space." );
				
					if ( bValid ) {
						
						$.ajax({
							type: "POST",
							data: "a=add_machine"+"&name_machine=" + name_machine.val() ,
							url: "ajax.php",
							cashe: false,
							success: function(data){
									var machine = JSON.parse(data);	
									$("#machines").append(machine[0].tabl);
									$("#machines_admin").append(machine[0].select);
									$("#machines_user").append(machine[0].select); 
								}
							
						});
						$( this ).dialog( "close" );	
						return false;
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		$( "#dialog-record-user" ).dialog({
			autoOpen: false,
			closeOnEscape: true,
			height: 440,
			width: 400,
			modal: true,
			buttons: {
				"Add record": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					bValid = bValid && checkLength( claim_text_user, "claim_text_user", 0, 255);
					if ( bValid ) {
						
						$.ajax({
							type: "POST",
							data: "a=add_record_user"+ "&claim_text_user=" + claim_text_user.val() +"&shift_user=" + shift_user.val() +"&employee_id=" + employee_id.val() +"&machines_user=" + machines_user.val(),
							url: "ajax.php",
							cashe: false,
							success: function(data)	{
								$("#tabl3").html(data);
								$("#tabl3").tablesorter({	
								});
							}
						});
						$( this ).dialog( "close" );	
						return false;
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		$( "#dialog-record-admin" ).dialog({
			autoOpen: false,
			closeOnEscape: true,
			height: 440,
			width: 400,
			modal: true,
			buttons: {
				"Add record": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					bValid = bValid && checkLength( claim_text_admin, "claim_text_admin", 0, 255);
			
					if ( bValid ) {
						
						$.ajax({
							type: "POST",
							data: "a=add_record_admin"+ "&claim_text_admin=" + claim_text_admin.val() +"&shift_admin=" + shift_admin.val()  +"&employee_id=" + employee_id.val() + "&machines_admin=" + machines_admin.val() ,
							url: "ajax.php",
							cashe: false,
							success: function(data){
								$("#tabl1").html(data);
								$("#tabl1").tablesorter({	
								});
							}
						});
						$( this ).dialog( "close" );	
						return false;
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		$( "#dialog-edit-employee" ).dialog({
			autoOpen: false,
			closeOnEscape: true,
			height: 530,
			width: 400,
			modal: true,
			buttons: {
				"Edit employee": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					bValid = bValid && checkLength( name_edit, "name_edit", 3, 34);
					bValid = bValid && checkLength( post_edit, "post_edit", 5, 34 );
					bValid = bValid && checkLength( login_edit, "login_edit", 5, 34 );
					

					bValid = bValid && checkRegexp( name_edit, /^[A-ZА-Я]([а-яa-z_0-9 ])+$/i, "Name may consist of а-я,a-z,0-9 underscores, space begin with a big letter." );
					bValid = bValid && checkRegexp( post_edit, /^[A-ZА-Яa-zа-я]([а-яa-z0-9-_ ])+$/i, "Post may consist of а-я,a-z, underscores, space , `-`, `0-9`." );
					bValid = bValid && checkRegexp( login_edit, /^[A-Za-z]([a-z_0-9-])+$/i, "Login may consist of a-z,0-9,-, underscores." );	
					
					
					var super_user_edit=0;
					if (document.getElementById('super_user_edit').checked )
						super_user_edit=1;
					if ( bValid ) {			
						$.ajax({
							type: "POST",
							data: "a=edit_employee"+"&name=" + name_edit.val()+ "&login="+login_edit.val()+"&post=" + post_edit.val() + "&new_password=" + new_password_edit.val()  + "&super_user_edit=" + super_user_edit,
							url: "ajax.php",
							
							success: function(data){	
								window.location.reload(true);
							}
						});
						$( this ).dialog( "close" );	
						return false;
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		$( "#dialog-delete-employee" ).dialog({
			autoOpen: false,
			closeOnEscape: true,
			height: 480,
			width: 320,
			modal: true,
			buttons: {
				    "Delete employee": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					allFields.val( "" ).removeClass( "ui-state-error" );
					
					if ( bValid ) {
						var ch = document.getElementsByName('demployees[]')
					    var CheckBoxArr = [];
						var del_check=0;
						
						for (var i = 0; i < ch.length; i++) {
						   if (ch[i].checked) {
						     CheckBoxArr.push(ch[i].value);
						     del_check=1;
						   }	
					    }
						if(del_check==1) {
			     					$.ajax({
								        type: "POST",
								        data: "a=del_employee"+"&idemployee=" +CheckBoxArr,
								        url: "ajax.php",
								        success: function(){
											window.location.reload(true);
									 }
						  	        });
									$( this ).dialog( "close" );
					        }					
					}		
				}, 
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		$( "#dialog-delete-machine" ).dialog({
			autoOpen: false,
			closeOnEscape: true,
			height: 480,
			width: 320,
			modal: true,
			buttons: {
				    "Delete machine": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					if ( bValid ) {
						var ch = document.getElementsByName('dmachines[]')
					    var CheckBoxArr = [];
						var del_check=0;
						
						for (var i = 0; i < ch.length; i++) {
						   if (ch[i].checked) {
						     CheckBoxArr.push(ch[i].value);
						     del_check=1;
						   }	
					    }
						if(del_check==1) {
			     					$.ajax({
								        type: "POST",
								        data: "a=del_machine"+"&idmachine=" +CheckBoxArr,
								        url: "ajax.php",
								        success: function(){
											window.location.reload(true);
									 }
						  	        });
									$( this ).dialog( "close" );
					        }					
					}		
				}, 
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
	
		//calls
		$( "#add_employee" )
			.click(function() {
				$( "#dialog-employee" ).dialog( "open" );
		});	
		$( "#add_machine" )
			.click(function() {
				$( "#dialog-machine" ).dialog( "open" );
		});	
		$('#check')
			.button()
			.click(function(){
			
		});
		$( "#make_record_user" )
			.click(function() {
				$( "#dialog-record-user" ).dialog( "open" );
		});	
		$( "#make_record_admin" )
			.click(function() {
				$( "#dialog-record-admin" ).dialog( "open" );
		});	
		$( "#help" )
			.click(function() {
				$( "#dialog-help" ).dialog( "open" );
		});	
		
		$( "#delete_employee" )
			.click(function() {
				$( "#dialog-delete-employee" ).dialog( "open" );
		});
		
		$( "#delete_machine" )
			.click(function() {
				$( "#dialog-delete-machine" ).dialog( "open" );
		});
		
		$( "#select-all-employee" )
			.click(function() {
				if(set_company==0) {			 	
				  var check = document.getElementsByName("demployees[]");
		  		  for (var i=0; i<check.length; i++) {
					check[i].checked = "obj.checked";
  				  }
				  set_company=1;
				  document.getElementById("select-all-employee").innerHTML = 'Unselect';
				}
				else {
			 	  var check = document.getElementsByName("demployees[]");
		  		  for (var i=0; i<check.length; i++) {
					check[i].checked = "";
  				  }
			 	  set_company=0;
			 	  document.getElementById("select-all-employee").innerHTML = 'Select';
				}
		});
		
		$( "#select-all-machine" )
			.click(function() {
				if(set_company==0) {			 	
				  var check = document.getElementsByName("dmachines[]");
		  		  for (var i=0; i<check.length; i++) {
					check[i].checked = "obj.checked";
  				  }
				  set_company=1;
				  document.getElementById("select-all-machine").innerHTML = 'Unselect';
				}
				else {
			 	  var check = document.getElementsByName("dmachines[]");
		  		  for (var i=0; i<check.length; i++) {
					check[i].checked = "";
  				  }
			 	  set_company=0;
			 	  document.getElementById("select-all-machine").innerHTML = 'Select';
				}
		});
		
		var isShift = false;
		var isCtrl = false;
		$(document).keyup(function (e) {
			if(e.which == 16) isShift=false;
			if(e.which == 17) isCtrl=false;
		}).keydown(function (e) {
			if(e.which == 16) isShift=true;
			if(e.which == 17) isCtrl=true;
			    if(e.which == 49 && isShift == true) {
				$( "#dialog-employee" ).dialog( "open" );
			    }
			    if(e.which == 50 && isShift == true) {
				$( "#dialog-delete-employee" ).dialog( "open" );
			    }
			    if(e.which == 51 && isShift == true) {
				$( "#dialog-record-admin" ).dialog( "open" );
			    }
				if(e.which == 52 && isShift == true) {
				
				$( "#dialog-help" ).dialog( "open" );
			    }
		});
		
		$(document).ready(function(){
				$("#tabl1").tablesorter({	
				});
				$("#tabl2").tablesorter({	
				});
				$("#tabl3").tablesorter({	
				});
				
		});

});


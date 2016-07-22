<?php /* Smarty version Smarty-3.1.3, created on 2011-10-24 17:52:37
         compiled from "templates/java_dialogs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6636549054e985a2d0a4542-62787678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92c74eaf58b486fc0bae3fe2d8575277687fdff4' => 
    array (
      0 => 'templates/java_dialogs.tpl',
      1 => 1319467956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6636549054e985a2d0a4542-62787678',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_4e985a2d219db',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e985a2d219db')) {function content_4e985a2d219db($_smarty_tpl) {?> 
<script>
	var set=0;
		
	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		var 	
			push_ok=0,
			node = $("#node"),
			ipf = $( "#ipf" ),
			ipu = $( "#ipu" ),
			nodef = $("#nodef"),
			nodes = $("#nodes"),
			vps = $( "#vps" ),
			allFields = $( [] ).add( ipu ).add( nodes ).add( vps ),
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
		
		$.fx.speeds._default = 777;
		$( "#dialog-message" ).dialog({
			autoOpen: false,
			height: 180,
			width: 350,
			modal: true,
			hide: "explode",
			buttons: {
				Yes: function() {
					push_ok=1;
					$( this ).dialog( "close" );
				},
				No: function() {
					push_ok=0;
					$( this ).dialog( "close" );
				}
			}
		});
			
		$( "#dialog-add-ip" ).dialog({
			autoOpen: false,
			maxHeight: 420,
			maxWidth: 310,
			modal: true,
			buttons: {
				"Add IP": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					bValid = bValid && checkLength( ipu, "ipu", 1, 35);
						//bValid = bValid && checkRegexp( node, /^[A-Za-z]([0-9a-zA-Z_])+$/, "NODE may consist of A-Z,a-z,0-9, underscores, begin with a letter!" );
						bValid = bValid && checkRegexp( ipu, /^[0-9]([0-9.,])+$/, "IP 0-9 ,. begin with a digit!" );
					if(vps.val().length > 0 ) {
						bValid = bValid && checkLength( vps, "vps", 1, 35);
						//bValid = bValid && checkRegexp( node, /^[A-Za-z]([0-9a-zA-Z_])+$/, "NODE may consist of A-Z,a-z,0-9, underscores, begin with a letter!" );
						bValid = bValid && checkRegexp( vps, /^[Vv]([0-9pPsS_])+$/, "VPS may consist of V,v,P,p,S,s,0-9, underscores, begin with a letter!" );
					}
					
					if ( bValid ) {
						if(vps.val()!=0) {	
							$.ajax({
							        type: "POST",
							        data: "a=add_used_ip"+"&vps=" + vps.val()+ "&ipu=" + ipu.val()+ "&nodes=" + nodes.val(),
							        url: "ajax.php",
							        success: function(){
									window.location.reload(true);
								 }
					  	      	      });
					  	 }					  	 
					  	 else {
					  		 $.ajax({
							        type: "POST",
							        data: "a=add_free_ip"+ "&ipu=" + ipu.val()+ "&nodes=" + nodes.val(),
							        url: "ajax.php",
							        success: function(){
									window.location.reload(true);
								 }
					  	      	      });
					  	 
					  	 }
							$( this ).dialog( "close" );	
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
					window.location.reload(true);
					
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		$( "#dialog-move-ip" ).dialog({
			autoOpen: false,
			maxHeight: 420,
			maxWidth: 310,
			modal: true,
			buttons: {
				"Ok": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					bValid = bValid && checkLength( ipu, "ipu", 1, 35);
						//bValid = bValid && checkRegexp( node, /^[A-Za-z]([0-9a-zA-Z_])+$/, "NODE may consist of A-Z,a-z,0-9, underscores, begin with a letter!" );
						bValid = bValid && checkRegexp( ipu, /^[0-9]([0-9.,])+$/, "IP 0-9 ,. begin with a digit!" );
					if(vps.val().length > 0 ) {
						bValid = bValid && checkLength( vps, "vps", 1, 35);
						//bValid = bValid && checkRegexp( node, /^[A-Za-z]([0-9a-zA-Z_])+$/, "NODE may consist of A-Z,a-z,0-9, underscores, begin with a letter!" );
						bValid = bValid && checkRegexp( vps, /^[Vv]([0-9pPsS_])+$/, "VPS may consist of V,v,P,p,S,s,0-9, underscores, begin with a letter!" );
					}
					
					if ( bValid ) {
						if(vps.val()!=0) {	
							$.ajax({
							        type: "POST",
							        data: "a=add_used_ip"+"&vps=" + vps.val()+ "&ipu=" + ipu.val()+ "&nodes=" + nodes.val(),
							        url: "ajax.php",
							        success: function(){
									window.location.reload(true);
								 }
					  	      	      });
					  	 }					  	 
					  	 else {
					  		 $.ajax({
							        type: "POST",
							        data: "a=add_free_ip"+ "&ipu=" + ipu.val()+ "&nodes=" + nodes.val(),
							        url: "ajax.php",
							        success: function(){
									window.location.reload(true);
								 }
					  	      	      });
					  	 
					  	 }
							$( this ).dialog( "close" );	
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
					window.location.reload(true);
					
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		
		
		$( "#dialog-delete-node" ).dialog({
			autoOpen: false,
			maxHeight: 480,
			maxWidth: 320,
			modal: true,
			buttons: {
				        "Delete Node": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					if ( bValid ) {
						push_ok=0;
						var ch = document.getElementsByName('dnodes[]')
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
								        data: "a=del_nodes"+"&idnodes=" +CheckBoxArr,
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
	
		$( "#dialog-node" ).dialog({
			autoOpen: false,
			height: 280,
			width: 300,
			modal: true,
			buttons: {
				        "Add Node": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
		
					bValid = bValid && checkLength( node, "node", 5, 5 );
					//bValid = bValid && checkRegexp( node, /^[A-Za-z]([0-9a-zA-Z_])+$/, "NODE may consist of A-Z,a-z,0-9, underscores, begin with a letter!" );
					bValid = bValid && checkRegexp( node, /^[Vv]([0-9zZ])+$/, "NODE may consist of V,Z,v,z,0-9, begin with a letter!" );
					
					if ( bValid ) {
						$.ajax({
						        type: "POST",
						        data: "a=add_node"+"&node=" + node.val(),
						        url: "ajax.php",
						        success: function(){
								window.location.reload(true);
							 }
				  	      	      });
					      $( this ).dialog( "close" );				
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
		
	
		$( "#add_ip" )
			.click(function() {
				$( "#dialog-add-ip" ).dialog( "open" );
			});
			
		$( "#make_node" )
			.click(function() {
				$( "#dialog-node" ).dialog( "open" );
			});
		$( "#delete_node" )
			.click(function() {
				$( "#dialog-delete-node" ).dialog( "open" );
			});
		$( "#move_ip" )
			.button()
			.click(function() {
				$( "#dialog-move-ip" ).dialog( "open" );
		});
		$( "#delete_ipf" )
			.button()
			.click(function() {
				var ch = document.getElementsByName('ip_free[]')
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
						data: "a=del_free_ip"+"&id_free=" +CheckBoxArr,
						url: "ajax.php",
						success: function(){
							window.location.reload(true);
						}
					});
					$( this ).dialog( "close" );
							
				}	
		});
		$( "#delete_ip" )
			.button()
			.click(function() {
				var ch = document.getElementsByName('items[]')
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
						data: "a=del_used_ip"+"&id_used=" +CheckBoxArr,
						url: "ajax.php",
						success: function(){
							window.location.reload(true);
						}
					});
					$( this ).dialog( "close" );
							
				}	
			});	
		$( "#free_ip" )
			.button()
			.click(function() {
				var ch = document.getElementsByName('items[]')
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
						data: "a=free_used_ip"+"&id_used=" +CheckBoxArr,
						url: "ajax.php",
						success: function(){
							window.location.reload(true);
						}
					});
					$( this ).dialog( "close" );
							
				}	

			});
		$( "#select-all-node" )
			.click(function() {
				if(set==0)
				{
				  $("input:checkbox").attr("checked","checked"); 
				  set=1;
				  document.getElementById("select-all-node").innerHTML = 'Unselect';
				}
				else
				{
			 	  $("input:checkbox").removeAttr("checked");
			 	  set=0;
			 	  document.getElementById("select-all-node").innerHTML = 'Select';
				}
		});
		$( "#del_item" )
			.click(function() {
				if(set==0)
				{
				  $("input:checkbox").attr("checked","checked"); 
				  set=1;
				  document.getElementById("del_item").innerHTML = 'Unselect';
				}
				else
				{
			 	  $("input:checkbox").removeAttr("checked");
			 	  set=0;
			 	  document.getElementById("del_item").innerHTML = 'Select';
				}
		});
		
		$( "#del_free_item" )
			.click(function() {
				if(set==0)
				{
			 	  $("input:checkbox").attr("checked","checked");
				  set=1;
				  document.getElementById("del_free_item").innerHTML = 'Unselect';
				}
				else
				{
			 	  $("input:checkbox").removeAttr("checked");
			 	  set=0;
			 	  document.getElementById("del_free_item").innerHTML = 'Select';
				}
		});
		
		function checkAll(oForm, cbName, checked) {
			for (var i=0; i < oForm[cbName].length; i++) 
				oForm[cbName][i].checked = checked;
		}
		
		$( "#accordion" ).accordion({
		  	autoHeight: false,
            		navigation: false,
            		animated: 'slide',
            		animated: 'bounceslide'
             	});
	});
</script>
 <?php }} ?>
var readUrl   = 'index.php/home/read',
    updateUrl = 'index.php/home/update',
    delUrl    = 'index.php/home/delete',
    delHref,
    updateHref,
	updateId;


$( function() {
    
    $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
    });
    
    readUsers();
    
    $( '#msgDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'Ok': function() {
                $( this ).dialog( 'close' );
            }
        }
    });
    
    $( '#updateDialog' ).dialog({
        autoOpen: false,
        buttons: {
            'Update': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: updateHref,
                    type: 'POST',
                    data: $( '#updateDialog form' ).serialize(),
                    
                    success: function( response ) {
                        
                        //$( '#msgDialog > p' ).html( response );
                        //$( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        //--- update row in table with new values ---
						
						//var updateId = $( 'tr#' + updateId + ' td' )[ 1 ];
						var updateTxt = $( 'tr#' + updateId + ' td' )[ 1 ];
						//var updateCreated = $( 'tr#' + updateId + ' td' )[ 2 ];
	                    var userAccountId = $( 'tr#' + updateId + ' td ' )[ 3 ];   
					
						//$( updateId ).html( $( '#updateId' ).val() );
						$( updateTxt ).html( $( '#updateTxt' ).val() ); 
						//$( updateCreated ).html( $( '#updateCreated' ).val() );
						$( userAccountId ).html( $( '#userAccountId' ).val() );
						//$( updateTime ).html( $( '#updateTime' ).val() );
                                               
                        //--- clear form ---
                        $( '#updateDialog form input' ).val( '' );
                        
                    } //end success
                    
                }); //end ajax()
            },
            
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
    }); //end update dialog
    
    $( '#delConfDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'No': function() {
                $( this ).dialog( 'close' );
            },
            
            'Yes': function() {
                //display ajax loader animation here...
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: delHref,
					success: function ( response ) {
                        //hide ajax loader animation here...
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        //$( '#msgDialog > p' ).html( response );
                        //$( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        						
						//$( 'a[href="' + delHref + '"]' ).parents( 'tr' )
                        //.animate({'backgroundColor':'#fb6c6c'},300);
												
                        $( 'a[href="' + delHref + '"]' ).parents( 'tr' )
                        .fadeOut( 'slow', function() {
                            $( this ).remove();
							//alert("HELLO WORLD!");
                        });
//added JB
						//refresh list of users by reading it
                        //readUsers();
                        
                    } //end success
                });
                
            } //end Yes
            
        } //end buttons
        
    }); //end dialog
    
    $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'index.php/home/getById/' + updateId,
            dataType: 'json',
            
            success: function( response ) {
				$( '#updateId' ).val( response.update_id );
				$( '#userAccountId' ).val( response.user_account_id );
                $( '#updateTxt' ).val( response.update_txt );
				//$( '#updateCreated' ).val( response.update_created );
				//$( '#updateTime' ).val( response.update_time );
				$( '#ajaxLoadAni' ).fadeOut( 'slow' );
                //--- assign id to hidden field ---
                $( '#updateId' ).val( updateId );
                
				$( '#updateDialog' ).dialog( 'open' );
            }
        });
        
        return false;
    }); //end update 
	
    
    $( '#records' ).delegate( 'a.deleteBtn', 'click', function() {
        delHref = $( this ).attr( 'href' );
	    deleteId = $( this ).parents( 'tr' ).attr( "id" );
		
		$( '#delConfDialog' ).dialog( 'open' );
        
        return false;// Prevent browser from visiting `#`
    
    }); //end delete delegate
    
    
    // --- Create Record with Validation ---
    $( '#create form' ).validate({
        rules: {
            cUpdateTxt: { required: true }
			//dont forget to add a comma after each one
        },
        
        /*
        //uncomment this block of code if you want to display custom messages
        messages: {
            cName: { required: "Name is required." },
            cEmail: {
                required: "Email is required.",
                email: "Please enter valid email address."
            }
        },
        */
        
        submitHandler: function( form ) {
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/home/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( response );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of users by reading it
                    readUsers();
                    
                    //open Read tab
                    $( '#tabs' ).tabs( 'select', 0 );
                }
            });
            
            return false;
        }
    });
    
}); //end document ready

function readUsers() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    
    $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {
            
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].update_id;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].update_id;
            }
            
            //clear old rows
            $( '#records' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#records" );
            
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });

} // end readUsers




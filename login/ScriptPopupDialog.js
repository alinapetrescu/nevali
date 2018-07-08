<?php
$POPUP=false;
if($POPUP){echo"
							<script>
							function closeAllPopup()
							{Popup_closeAllPopup();}
							function showLoginDialogOnly()
							{Popup_showLoginDialogOnly();}
							function showSearchDialogOnly()
							{Popup_showSearchDialogOnly();}
							function showCreateOnly()
							{Popup_showCreateOnly();}
							function showRegisterOnly()
							{Popup_showRegisterOnly();}
							</script>";}
else{echo"
					<script>
					function closeAllPopup()
					{Dialog_closeAllPopup();}
					function showLoginDialogOnly()
					{Dialog_showLoginDialogOnly();}
					function showSearchDialogOnly()
					{Dialog_showSearchDialogOnly();}
					function showCreateOnly()
					{Dialog_showCreateOnly();}
					function showRegisterOnly()
					{Dialog_showRegisterOnly();}
					</script>";}
?>


<!-- FONCTIONS POPUP -->
<script>
function Popup_closeAllPopup()
{
	$('#dialogLogin').css('display','none');
	$('#dialogSearch').css('display','none');
	$('#dialogCreate').css('display','none');
	$('#dialogRegister').css('display','none');
}
function Popup_showLoginDialogOnly()
{
	closeAllPopup();
	$('#dialogLogin').css('display','block');
}
function Popup_showSearchDialogOnly()
{
	closeAllPopup();
	$('#dialogSearch').css('display','block');
}
function Popup_showCreateOnly()
{
	closeAllPopup();
	$('#dialogCreate').css('display','block');
}
function Popup_showRegisterOnly()
{
	closeAllPopup();
	$('#dialogRegister').css('display','block');
}
</script>

<!-- FONCTIONS DIALOG -->
    <script>
    $( '#dialogSearch' ).dialog({ autoOpen: false });
    $( "#dialogSearch" ).dialog( "option", "dialogClass", "initialised" );
    $( "#dialogSearch" ).dialog({ draggable: false });
    $( "#dialogSearch" ).dialog( "option", "height", "auto" );
    $( "#dialogSearch" ).dialog( "option", "width", "auto" );
    $( "#dialogSearch" ).dialog( "option", "hide", "fade" );
    $( "#dialogSearch" ).dialog( "option", "modal", true );
    $( "#dialogSearch" ).dialog( "option", "resizable", false );
    $( "#dialogSearch" ).dialog( "option", "position", "top");
    </script>
    <script>
    $( '#dialogLogin' ).dialog({ autoOpen: false });
    $( "#dialogLogin" ).dialog( "option", "dialogClass", "initialised" );
    $( "#dialogLogin" ).dialog({ draggable: false });
    $( "#dialogLogin" ).dialog( "option", "height", "auto" );
    $( "#dialogLogin" ).dialog( "option", "width", "auto" );
    $( "#dialogLogin" ).dialog( "option", "hide", "fade" );
    $( "#dialogLogin" ).dialog( "option", "modal", true );
    $( "#dialogLogin" ).dialog( "option", "resizable", false );
    $( "#dialogLogin" ).dialog( "option", "position", "top");
    </script>

         


<script>
//function Dialog_closeAllPopup() //inutile grace a modal
//{
	//$('#dialogLogin').css('display','none');
	//$('#dialogLogin').dialog("close");
	//$('#dialogSearch').css('display','none');
	//$('#dialogSearch').dialog("option", "hide", "explode");
	//$('#dialogSearch').hide("explode");
	//$('#dialogCreate').css('display','none');
	//$('#dialogRegister').css('display','none');
//}
function Dialog_showLoginDialogOnly()
{
	//closeAllPopup();
	$('#dialogLogin').css('display','block');
	$('#dialogLogin').dialog("open");
	//$('#dialog').dialog("close");
	//$('#dialogSearch').css('display','none');
	//$('#dialogCreate').css('display','none');
	//$('#dialogRegister').css('display','none');
}
function Dialog_showSearchDialogOnly()
{
	//closeAllPopup();
	$('#dialogSearch').css('display','block');
	$('#dialogSearch').dialog("open");
	//$('#dialogLogin').dialog("close");
	//$('#dialogLogin').css('display','none');
	//$('#dialogCreate').css('display','none');
	//$('#dialogRegister').css('display','none');
}
function Dialog_showCreateOnly() //popup par choix
{
	//closeAllPopup();
	$('#dialogCreate').css('display','block');
	//$('#dialogSearch').dialog("open");
	//$('#dialogLogin').dialog("close");
	//$('#dialogLogin').css('display','none');
	//$('#dialogCreate').css('display','none');
	//$('#dialogRegister').css('display','none');
}
function Dialog_showRegisterOnly()
{
	$('#dialogRegister').css('display','block');
	$('#dialogRegister').dialog("open");
}
</script>

$( document ).ready(function() {
		
$.post(
  "/gateway",
  onAjaxSuccess
);

function onAjaxSuccess(data)
{
  var obj = jQuery.parseJSON( data );
  if(obj.show == '1')
  {
    IniMesseageBox('5', obj.width, obj.height, Base64.decode(obj.title), Base64.decode(obj.content), obj.Saves, obj.close);
  }
}
	
});

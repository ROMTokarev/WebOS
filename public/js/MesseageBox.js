


var LoadProcess = '<div style="margin-top: 25%; "><div class="cssload-thecube">'+
	'<div class="cssload-cube cssload-c1"></div>'+
	'<div class="cssload-cube cssload-c2"></div>'+
	'<div class="cssload-cube cssload-c4"></div>'+
	'<div class="cssload-cube cssload-c3"></div>'+
'</div></div>';






function OutMesseageBox(id, width, height, title, content, close){
  var widthr = width-40;
  var widthformfooter = width-26;
  var WidthFormFooterRight = width-26;
  var WidthFormBgRight = width-8;
  var SigninMenuMargin = width-14;

  var MesseageBox = '<div id="form'+id+'" class="box1 form1" style="margin-top: -'+width/3+'px;">'+
  '<div id="element'+id+'" style="width: '+width+'px; position: absolute;">'+
    '<div onmousemove="window.StarDrag=true; window.LinkDrag=false;"><div class="header_left"></div><h2 style="width: '+ widthr +'px;">'+title;

	if(close==1) MesseageBox += ' <span class="close" onclick="DropMesseageBox(\''+id+'\');" id="close'+id+'">Close it</span> ';

	MesseageBox += '<div class="header_right"></div></h2></div>'+
    '<div style="background: url(/public/images/form-bg-left.png); width: 8px; height:'+height+'px; position:absolute;  float: left;  "></div><div class="formcont">'+
      '<fieldset id="signin_menu"  style="height: '+height+'px; overflow-y:scroll; width: '+SigninMenuMargin+'px; margin: 0px 0px 0px 7px; background:rgba(255,255,255,1.00);">'+
      '<span onmousemove="window.StarDrag=false; window.LinkDrag=false;" class="message">'+content+'</span>'+
      '</fieldset>'+
    '</div> <div style="background: url(/public/images/form-bg-right.png); width: 8px; height:'+height+'px; position:absolute; float:right;  margin: -'+height+'px 0px 0px '+WidthFormBgRight+'px; z-index:5000;  "></div>'+
    '<div style="background: url(/public/images/footer-left.png); width: 13px; height:13px; position:absolute; margin: -2px 0px 0px 0px; "></div><div style="width: '+ widthformfooter +'px; margin: -2px 0px 0px 13px;" class="formfooter">    <div style="background: url(/public/images/footer-right.png); width: 13px; height:13px; position:absolute; margin: 0px 0px 0px '+WidthFormFooterRight+'px;  "></div>     </div>'+
  '</div>'+
'</div>';

 return MesseageBox;
}

function DropMesseageBox(id) { document.getElementById('GenBox'+id).innerHTML = ""; }

function BoxTodo(id, Saves)
{
  var e=todo.get('element'+id)
  e.style.left=e.offsetLeft+'px';
  e.style.top=e.offsetTop+'px';

  if(Saves==1) todo.drag(e, 'element'+id);
  if(Saves==0) todo.drag(e);
}

function IniMesseageBox(id, width, height, title, content, Saves, close)
{

	if ($('#GenBox'+id).length > 0) {
      document.getElementById('GenBox'+id).innerHTML = OutMesseageBox(id, width, height, title, content, close);
    }
	 else {
      document.getElementById('MBox').insertAdjacentHTML('beforeend', '<div id="GenBox'+id+'"></div>');
      document.getElementById('GenBox'+id).innerHTML = OutMesseageBox(id, width, height, title, content, close);
    }



  BoxTodo(id, Saves);
  $("#form"+id).toggle();
}

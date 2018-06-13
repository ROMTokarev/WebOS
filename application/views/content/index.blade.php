<script>
function FormValid() {


					if(mineradd.MinerName.value == '' || mineradd.MinerIP.value == '' ||
					   mineradd.MinerPort.value == '') {
		            	alert("You must fill in all fields.");
		             	return false;
		            }

					$('form#mineradd').submit();

			    }

	function LinkTodo(id)
{

            var e=todo.get(id)
			e.style.left=e.offsetLeft+'px';
			e.style.top=e.offsetTop+'px';
			todo.drag(e, id);
}
	
</script>



<script type="text/javascript">


var x = 0;

$(document).mouseup(function() {
	var i=0;


@if(count($miner_config)>0)
 @foreach ($miner_config as $item)

  $("#BOX{{ $item["miner_id"] }}").dblclick(function(e){
			e.preventDefault();
			i++;
			if(x<i)
			{
			 x=i;
             var id = "BOX{{ $item["miner_id"] }}WINDOW";
			 IniMesseageBox(id, '787', '460', '{{ $item["miner_name"] }}', LoadProcess, 1, 1);
			  $.post
			  (
                "/ajax/{{ $item["miner_type"] }}",
				{ miner_ip: "{{ $item["miner_ip"] }}", miner_port: "{{ $item["miner_port"] }}" })
               .done(function( data ) {
               IniMesseageBox(id, '787', '460', '{{ $item["miner_name"] }}', data, 1, 1);
            });
			}
		});

 @endforeach
@endif

		$("#BOXMinerAdd").dblclick(function(e){
			e.preventDefault();
			i++;
			if(x<i)
			{
			 x=i;
             var id = "BOXMinerAddWINDOW";
			 IniMesseageBox(id, '487', '250', 'Miner Add', LoadProcess, 1, 1);
			  $.post
			  (
                "/ajax/mineradd"
			  )
               .done(function( data ) {
               IniMesseageBox(id, '487', '250', 'Miner Add', data, 1, 1);
            });
			}
		});




	 $("#BOXExit").click(function(e){
					e.preventDefault();
					IniMesseageBox('xc4', '250', '100', 'Exit',
					'<p align="center">Do you want to exit?</p><div class="remember" > <div align="left" style="margin: 0px 0px 0px 18px;"><input id="exit_submit" value="Exit" type="button"  onclick="window.location = \'http://{{$_SERVER['HTTP_HOST']}}/auth/logout\'"></div> <div align="right" style="margin: -25px 18px 0px 0px;"><input id="cancel_submit" value="Cancel" type="button" onclick="DropMesseageBox(\'xc4\');"></div></div>',
					0, 1);
				});

			});



</script>



<div id="cont">

<div style="padding: 0px 0px 20px 0px;">
<div style=" width:100%; height:30px; background: url(/public/images/bg-btn.png);">

<span style="position: absolute; cursor: pointer; margin: 8px 0px 0px 0px; font-weight:700!important; font-size: 16px!important; right:100px;" id="BOXExit"><span class="icon-head"></span></span>

<span style="position: absolute; cursor: pointer; margin: 8px 0px 0px 0px; right:75px; font-weight:700!important; font-size: 16px!important;" id="FullScreen" onClick="toggleFullScreen();"><span class="icon-resize-full-screen"></span></span>
<div id="clock" style="position: absolute; right:10px; margin: 3px 0px 0px 0px; font-weight:700!important; font-size: 16px!important;"></div>

</div>
</div>


<div onmousemove="window.StarDrag=true; window.LinkDrag=true;"  style="text-align: center; width:120px; height:120px; vertical-align: middle;">
<div id="BOXMinerAdd" align="center" style="width:120px; cursor: pointer; height:120px; text-align: center; line-height: 20px; vertical-align: middle; padding-left:20px;">
<div class="rollover" style="padding: 8px 0px 8px 0px; border-radius: 5px 5px 5px 5px;">
<img src="/public/images/plus.png" width="50" height="50" alt=""/>
<br/>
<span style="color: rgba(255,255,255,1); width:100%; height:100%; line-height: 35px!important;">Miner Add</span>
</div>
</div>
</div>

<script>LinkTodo("BOXMinerAdd");	</script>

@if(count($miner_config)>0)
 @foreach ($miner_config as $item)

<div onmousemove="window.StarDrag=true; window.LinkDrag=true;" style="text-align: center; width:120px; height:120px; vertical-align: middle;">
<div id="BOX{{ $item["miner_id"] }}" align="center" style="width:120px; cursor: pointer; height:120px; text-align: center; line-height: 20px; vertical-align: middle; padding-left:20px;">
<div class="rollover" style="padding: 8px 0px 8px 0px; border-radius: 5px 5px 5px 5px;">
<img src="/public/images/mining-stat.png" width="50" height="50" alt=""/>
<br/>
<span style="color: rgba(255,255,255,1); width:100%; height:100%; line-height: 35px!important;">{{ $item["miner_name"] }}</span>
</div>
</div>
</div>

<script>LinkTodo("BOX{{ $item["miner_id"] }}");	</script>

 @endforeach
@endif

<div style="bottom:10px; position:absolute; color:#FFF; right: 10px;"><a href="http://bit-panel.com/" style="color:#FFF; text-decoration: underline;" target="_blank">WebOS: Spector, Version: 0.0.3-alpha</a> <br> InstallKey: {{$InstallKey}}</div>




<div id="MBox"></div>


</div>

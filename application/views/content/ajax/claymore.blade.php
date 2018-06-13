
<!-- menu row ends -->
<!-- start: Body Main -->
<div class="wrapper row-offcanvas row-offcanvas-left"  >
    <!-- Left side column. contains the logo and sidebar -->


<section class="content-header"><!-- Stats boxes -->
<div class="row">

        <div class="col-lg-12 col-xs-12">
        <!-- small stat box -->
        <div class="small-box bg-aqua">
            <div class="inner">
			<h3>
			@if($uptime_unit=="") {{"N/A"}} @else {{ $uptime_unit }} @endif </h3>
                <p>
                    Elapsed
                </p>
            </div>
            <div class="icon">
                <span class="icon-clock"></span>
            </div>
                <span class="small-box-footer">
                    <strong>Miner:</strong> Claymore {{ isset($version) ? $version : 'N/A' }}               </span>
            <!--a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a-->
        </div>
    </div><!-- ./col -->


</div>
<!-- Stats boxes -->
 

</section>








<section class="content">



<div class="row">
    <div class="col-md-12">
        <div class="box" style="left:0px!important; top:0px!important;">
            <div class="box-header">
                <i class="fa fa-plus-sign"></i>
                <h3 class="box-title">Mining</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <!-- SHOW LAST (=$last_no_blocks_found) BLOCKS -->
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th align="left" style="text-align: center">Device</th>
                        <th align="left" style="text-align: center">Rate</th>
						<th align="left" style="text-align: center">Status</th>
                        <th align="left" style="text-align: center">Temp</th>
                        <th align="left" style="text-align: center">Fan Speed</th>
                        <th align="left" style="text-align: center">Fan Percent</th>
                        <th align="left" style="text-align: center">GPU Clock</th>
						<th align="left" style="text-align: center">Memory Clock</th>
						<th align="left" style="text-align: center">Intensity</th>
						<th align="left" style="text-align: center">HW Errors</th>
                    </tr>
                    </thead>
                    <tbody>

                @for ($i = 0; $i < $SSR2GPUcount; $i++)
@if(($i % 2) == 0)
					 <tr>
					  <td style="text-align: center">
				      <span class="icon-drive">  GPU{{ $i/2 }}</span>
					  </td>
					  <td style="text-align: center">
					   <font color="green">{{ $SSRGPU[$i/2] }}</font></td>
					   <td style="text-align: center">Online</td>
					  <td style="text-align: center">@if(($i % 2) == 0) {{$GPUTempFun[$i]}} @endif C
					 </td>
					  <td style="text-align: center">N/A</td>
@endif
@if(($i % 2) == 1)
					  <td style="text-align: center">@if(($i % 2) == 1) {{$GPUTempFun[$i]}} @endif%</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					 </tr>
@endif
                @endfor
					  </tbody>



					  </table>

          </div>

        </div>
    </div>
</div>




<br>





<div class="row">
    <div class="col-md-12">
        <div class="box" style="left:0px!important; top:0px!important;">
            <div class="box-header">
                <i class="fa fa-plus-sign"></i>
                <h3 class="box-title">Pools</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <!-- SHOW LAST (=$last_no_blocks_found) BLOCKS -->
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th align="left" style="text-align: center">Pool</th>
                        <th align="left" style="text-align: center">URL</th>
						<th align="left" style="text-align: center">Status</th>
                        <th align="left" style="text-align: center">Total Speed</th>
                        <th align="left" style="text-align: center">Total Shares</th>
                        <th align="left" style="text-align: center">Accepted</th>
                        <th align="left" style="text-align: center">Rejected</th>
						<th align="left" style="text-align: center">Discarded</th>
						<th align="left" style="text-align: center">Stale</th>
                    </tr>
                    </thead>
                    <tbody>



				@for ($i = 0; $i < count($Pools); $i++)
                  
@if(($i % 2) == 0)  
					 <tr>
					  <td style="text-align: center">
					  <span class="icon-onedrive"> Pool{{ $i+1 }}</span>
					  </td>
					   <td style="text-align: center">
					   <font color="green">{{ $Pools[$i] }}</font></td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">{{$SSR['0']}}</td>
					  <td style="text-align: center">{{$SSR['1']}}</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">{{$SSR['2']}}</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					 </tr>
@endif

@if(($i % 2) == 1)  
					 <tr>
					  <td style="text-align: center">
					  <span class="icon-onedrive"> Pool{{ $i+1 }}</span>
					  </td>
					   <td style="text-align: center">
					   <font color="green">{{ $Pools[$i] }}</font></td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">{{$SSR2['0']}}</td>
					  <td style="text-align: center">{{$SSR2['1']}}</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">{{$SSR2['2']}}</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					 </tr>
@endif
				@endfor

				@if (count($Pools) == 0)

                     <tr>
					  <td style="text-align: center">
					  <span class="icon-onedrive"> N/A</span>
					  </td>
					   <td style="text-align: center">
					   <font color="green">N/A</font></td>
					  <td style="text-align: center">
					   N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					 </tr>
				@endif


					  </tbody>

					  </table>
          </div>
        </div>
    </div>
</div>






</section>




</div>

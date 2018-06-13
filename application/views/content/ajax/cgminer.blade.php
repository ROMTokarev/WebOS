

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
                    <strong>Miner:</strong> {{ isset($miner_program) ? $miner_program : 'N/A' }}               </span>
            <!--a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a-->
        </div>
    </div><!-- ./col -->


</div>
<!-- Stats boxes -->
<div class="row">



	    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
				{{ $total_errors }}<sup style="font-size: 20px">HW</sup>
                </h3>
                <p>
                    Total HW Errors
                </p>
            </div>
            <div class="icon">
                <span class="icon-warning"></span>
            </div>
                <span class="small-box-footer">
                  Total Device Hardware: {{ $Total_Device_Hardware }}<sup>%</sup>
                </span>
        </div>
    </div>








    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">


                <h3>
				{{ $total_rate }} <sup style="font-size: 20px">{{ isset($hash_speed[0]) ? $hash_speed[0] : 'N/A' }}</sup>
                </h3>
                <p>
                    Total Hashrate
                </p>
            </div>
            <div class="icon">
                <span class="icon-gauge"></span>
            </div>
                <span class="small-box-footer">
                   All Shares: {{ $all_shares }}
                </span>
            <!--a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a-->
        </div>
    </div><!-- ./col -->

</div>

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

                @for ($i = 0; $i < $asic_count; $i++)

					 <tr>
					  <td style="text-align: center">
				      <span class="icon-drive">  {{ $device_name[$i] }}</span>
					  </td>
					  <td style="text-align: center">
					   <font color="green">{{ $hash_rate[$i] }} {{ $hash_speed[$i] }}</font></td>
					   <td style="text-align: center">{{ $asic_info[$i]["Status"] }}</td>
					  <td style="text-align: center">{{ $asic_temperature[$i] }}
					 </td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">N/A</td>
					  <td style="text-align: center">{{ $asic_info[$i]["Hardware Errors"] }}</td>
					 </tr>

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
                        <th align="left" style="text-align: center">User</th>
                        <th align="left" style="text-align: center">Confirmed</th>
                        <th align="left" style="text-align: center">Accepted</th>
                        <th align="left" style="text-align: center">Rejected</th>
						<th align="left" style="text-align: center">Discarded</th>
						<th align="left" style="text-align: center">Stale</th>
                    </tr>
                    </thead>
                    <tbody>



				@for ($i = 0; $i < $pool_count; $i++)

					 <tr>
					  <td style="text-align: center">
					  <span class="icon-onedrive"> Pool{{ $i+1 }}</span>
					  </td>
					   <td style="text-align: center">
					   <font color="green">{{ explode("//", $rig_pool[$i]["POOL" . $i]["URL"])[1] }}</font></td>
					  <td style="text-align: center">
					   {{ $rig_pool[$i]["POOL" . $i]["Status"] }}</td>
					  <td style="text-align: center" title="{{$rig_pool[$i]["POOL" . $i]["User"]}}">{{ substr($rig_pool[$i]["POOL" . $i]["User"], 0, 10) }}...</td>
					  <td style="text-align: center">{{ $confirmed_rewards[$i] }}</td>
					  <td style="text-align: center">{{ $rig_pool[$i]["POOL" . $i]["Accepted"] }}</td>
					  <td style="text-align: center">{{ $rig_pool[$i]["POOL" . $i]["Rejected"] }}</td>
					  <td style="text-align: center">{{ $rig_pool[$i]["POOL" . $i]["Discarded"] }}</td>
					  <td style="text-align: center">{{ $rig_pool[$i]["POOL" . $i]["Stale"] }}</td>
					 </tr>
				@endfor

				@if ($pool_count == 0)

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
				@if ($pool_count > 0)
					    <div class="box-footer">
              	<tfoot>
					<tr>
						<td class="total-text" style="text-align: center"><span class="icon-pie-chart"> <strong>Total:</strong></span></td>
						<td class="dont-display"></td>
						<td class="dont-display"></td>
						<td class="dont-display"></td>
						<td style="text-align: center" data-title="Confirmed">{{ $total_confirmed }}</td>
						<td style="text-align: center" data-title="Accepted">{{ $total_accepted }}</td>
						<td style="text-align: center" data-title="Rejected">{{ $total_rejected }}</td>
						<td style="text-align: center" data-title="Discarded">{{ $total_discarded }}</td>
						<td style="text-align: center" data-title="Stale">{{ $total_stale }}</td>
					</tr>
				</tfoot>

		   </div>
			@endif
					  </table>
          </div>
        </div>
    </div>
</div>






</section>




</div>

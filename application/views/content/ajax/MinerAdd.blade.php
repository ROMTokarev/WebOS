


<div style="width: 350px; margin: 0px auto;">
      <fieldset id="signin_menu">
      <span class="message">Please, enter miner setting</span>
      <form method="post" id="mineradd" action="/ajax/mineradd/getminer">
        <p>
	   <label for="MinerName">Miner Name</label>
        <input id="MinerName" name="MinerName" value="" title="Miner Name" class="required" tabindex="4" type="text">
        </p>
        <p>
     <label for="MinerType" style="margin: 0px 0px 0px !important;">Miner Type</label>

     <select name="MinerType" id="MinerType" style="float: right; width: 180px;" class="required">
             <option value="cgminer">cgminer</option>
             <option value="claymore">claymore</option>
         </select>

        </p>
        <p>
	   <label for="MinerIP">Miner IP</label>
        <input id="MinerIP" name="MinerIP" value="" title="Miner IP" class="required" tabindex="4" type="text">
        </p>
		<p>
	   <label for="MinerPort">Miner Port</label>
        <input id="MinerPort" name="MinerPort" value="" title="Miner Port" class="required" tabindex="4" type="text">
        </p>
        <p class="clear"></p>
        <p class="remember">
          <input id="mineradd_submit" value="Miner ADD" tabindex="6" onclick="FormValid()" type="button">
          <input id="cancel_submit" value="Cancel" tabindex="7" onclick="DropMesseageBox('BOXMinerAddWINDOW');" type="button">
        </p>
      </form>
      </fieldset>
   </div>

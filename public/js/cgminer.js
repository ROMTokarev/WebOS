
function MinerInitialization(IniID){
 $(IniID).dblclick(function(e){
			e.preventDefault(); 
			var id = "BOX587X460WINDOW";
			 
			 IniMesseageBox(id, '787', '460', '587X460', LoadProcess, 1, 1);
			  $.post
			  (
                "/ajax/cgminer", 
				{ name: "John", time: "2pm" })
               .done(function( data ) {
               IniMesseageBox(id, '787', '460', '587X460', data, 1, 1);
            });
			 	 
		}); 
}
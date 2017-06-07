
<script src="../js/jquery-1.12.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-select.min.js"></script>
<script src="../js/bootstrap-table.min.js"></script>
<script src="../js/bootstrap-table-es-ES.js"></script>
<script src="../js/funciones.js"></script>
<script>
	function msgerror(msg,tiempo) {
         
         $('#lblerror').html(msg);
         $('#modalerror').modal('show');
        

        // Si marco el tiempo de cierre automatico
         if(tiempo){
             window.setTimeout(function(){
                 $('#modalerror').modal('hide');
             }, tiempo);
         }
             
        return true;    
    }

	function muestroMsg(msg,tiempo,cuadroChico) {
		
		$('#modalRanMsg').html(msg);
		$('#modalRanTipo').addClass('alert alert-success');
		if(cuadroChico){
			$('#modalRanTipo').addClass('modal-sm');
		}
		$('#modalran').modal('show');
		
        // Si marco el tiempo de cierre automatico
        if(tiempo){
        	window.setTimeout(function(){
        		$('#modalran').modal('hide');
        	}, tiempo);
        }
        
        return true;	
    }
</script>

</body>
</html>
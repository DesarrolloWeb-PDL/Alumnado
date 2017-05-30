<script>

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


function cambio_formato_fecha(fecha)
{
	if(fecha=='')
	{
		return fecha;
	}
	else
	{
		vector =  fecha.split('/');
		fechanew = vector[2]+'-'+ vector[1]+'-'+vector[0];
		return fechanew;
	}
}
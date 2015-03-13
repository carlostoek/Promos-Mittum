function fnFormatDetails ( oTable, nTr )
{
    /*for(x=0; x<datosTablaParseados.length; x++) {
        console.log(datosTablaParseados[x].id);
        console.log(datosTablaParseados[x].nombre);
        var limite = datosTablaParseados[x].limite;
    }*/
    var aData = oTable.fnGetData( nTr );
    var sOut = '<table cellspacing="0" border="0" style="padding-left:50px;">';
    sOut += '<tr><td>Nombre de campaña:</td><td>'+aData[1]+' </td><td> Gerencia:</td><td>'+aData[3]+' </td><td> Fecha de creación:</td><td>'+  moment(aData[2]).format('LL')+' </td></tr>';
    sOut += '<tr><td>Límite de ganadores:</td><td>'+aData[4]+'</td><td>Participantes:</td><td>'+aData[5]+'</td></td><td>Ganadores hasta ahora:</td><td>'+aData[5]+'</td></tr>';
    sOut += '</table>';
    
    return sOut;
}

$(document).ready(function() {

    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="images/details_open.png">';
    nCloneTd.className = "center";

    $('#hidden-table-info thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );

    $('#hidden-table-info tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );

    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#hidden-table-info').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
    });

    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $(document).on('click','#hidden-table-info tbody td img',function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            this.src = "images/details_open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
            this.src = "images/details_close.png";
            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
        }
    } );
} );
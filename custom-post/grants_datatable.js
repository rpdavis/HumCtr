<script type="text/javascript">
$(document).ready(function() {
$('#dataTable').DataTable( {
"sDom": 'W<"clear">lfrtip',
"oColumnFilterWidgets": {
"sSeparator": ', ',
"aiExclude": [ 0,1,4 ],

}

} );
} );
</script>
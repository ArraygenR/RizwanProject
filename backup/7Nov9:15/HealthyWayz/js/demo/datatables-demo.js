// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
    $("thead").addClass("table-primary");
   // $("tfoot").addClass("table-primary");
   $('#dataTable1').DataTable({
        paging: false,
         ordering: false,
   });
    $('#dataTable2').DataTable({
        paging: false,
         ordering: false,
   });
    $("thead").addClass("table-primary");
});

// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#example').DataTable( {
  //"pageLength": 50
  paging: false,
  ordering: false,
} );
});


    $(function(){
    var current = location.pathname.replace('/HealthyWayz/','');
    $('.sidebar li a').each(function(){
        var this1 = $(this);
        // if the current path is like this link, make it active
       // alert(current);
        if(this1.attr('href').indexOf(current) !== -1 && this1.attr('href')==current){
            this1.parent().addClass('active');
            
        }
    })
})
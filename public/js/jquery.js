$(document).ready(function(){
    $('input[name="reportType"]').change(function(){
      var selectedValue = $(this).val();
      if(selectedValue === 'monthly') {
        $('#monthDropdown').show();
        $('#yearDropdown').show();
      } else if(selectedValue === 'yearly') {
        $('#monthDropdown').hide();
        $('#yearDropdown').show();
      }
    });
  });
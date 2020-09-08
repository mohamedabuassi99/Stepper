$(document).ready(function() {
  /**
   * Setup Ajax Config
   */
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  /**
   * Setup Toastr
   **/
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  /**
   * Uncheck all options when "None from above" checked
   * description.blade.php
   */
  function handleDescriptionsCheckedState(e)
  {
    var checkboxes = $('input[type="checkbox"][name="description[]"]');

    if($(this).val() === 'none-of-above')
    {
      // Uncheck all other than "None from above"
      checkboxes.each(function() {
        if($(this).val() !== 'none-of-above')
        {
          $(this).prop('checked', false);
        }
      });

      return;
    }

    // Uncheck "None from above"
    checkboxes.each(function() {
      if($(this).val() === 'none-of-above')
      {
        if($(this).is(':checked'))
        {
          $(this).prop('checked', false);
        }
      }
    });
  }
  $('input[type="checkbox"][name="description[]"]').on('change', handleDescriptionsCheckedState);
  
  /**
   * Change button outer height, to center it
   * Program diet pages
   */
  function changeListItemsButtonHeight() 
  {
    $('#list-items-next-btn-outer').css('min-height', $('#list-items').height() + 'px');
  } changeListItemsButtonHeight();
  $(window).resize(changeListItemsButtonHeight);

  /**
   * Remove Items From Diet Lists
   */
  function removeItemProteinSources(e)
  {
    e.preventDefault();

    var key = $(this).attr("data-key"),
    el = $(this).attr("data-el"),
    url = '/session/protein-sources/remove';

    $.post( url, { key: key } , function(data) {
      $('label[for='+ el +']').remove();
      
      changeListItemsButtonHeight();
      
      toastr.success('تم حذف العنصر بنجاح');
    })
    .fail(function() {
      console.log('error occured.');
    });
  }
  $('a[id^=remove-item-protein-sources-]').click(removeItemProteinSources);
  
  function removeItemVegetables(e)
  {
    e.preventDefault();

    var key = $(this).attr("data-key"),
    el = $(this).attr("data-el"),
    url = '/session/vegetables/remove';

    $.post( url, { key: key } , function(data) {
      $('label[for='+ el +']').remove();
      
      changeListItemsButtonHeight();
      
      toastr.success('تم حذف العنصر بنجاح');
    })
    .fail(function() {
      console.error('error occured.');
    });
  }
  $('a[id^=remove-item-vegetables-]').click(removeItemVegetables);

  function removeItemFruits(e)
  {
    e.preventDefault();

    var key = $(this).attr("data-key"),
    el = $(this).attr("data-el"),
    url = '/session/fruits/remove';

    $.post( url, { key: key } , function(data) {
      $('label[for='+ el +']').remove();
      
      changeListItemsButtonHeight();
      
      toastr.success('تم حذف العنصر بنجاح');
    })
    .fail(function() {
      console.error('error occured.');
    });
  }
  $('a[id^=remove-item-fruits-]').click(removeItemFruits);
  
});
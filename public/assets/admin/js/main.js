$(document).ready(function() {
  /**
   * Clear File Input
   */
  function removeSelectedFiles() {
    var input = $('#attachments');
    input.prop('type', 'text');
    input.prop('type', 'file')
  }
  $('#remove-selected-files').click(removeSelectedFiles);

  /**
   * Validate Followup message
   * Validate Followup Files
   */
  function validateFollowUpMessage(e)
  {
    // Message
    var message = $('textarea[name=message]').val().trim();

    $('#followup-form #message-error-msg').hide();
    $('#followup-form #files-error-msg').hide();

    if(message === '')
    {
      e.preventDefault();

      $('#followup-form #message-error-msg').show();
    }

    // File Input
    var fileInput = $('input[type=file][name="attachments[]"]');
    var files = $(fileInput).prop('files');
    var allowedFileExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'docx', 'rtf'];

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      var fileExtension = file.name.split('.').pop();

      if(! allowedFileExtensions.includes(fileExtension)) {
        e.preventDefault();

        $('#followup-form #files-error-msg').show();
      }
    }
  }
  $('#followup-form').on('submit', validateFollowUpMessage);

  /**
   * Update Avatar 
   **/
  function changeAvatar(e) {
    var input = e.target;

    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(ev) {
        console.log(ev);
        
        $('#avatar-preview').attr('src', ev.target.result).show();
        $('#material-icons-avatar').hide();
      }
      
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('input[type=file]#avatar').on('change', changeAvatar);
  
  /**
   * ContactUS - Wrap numbers inside a span element
   */
  function onContactusMessageKeydown(e) {
    var message = $('#contactus-message').text();
    console.log(message);
    
  }
  $('#contactus-message').on('keydown', onContactusMessageKeydown);



  /* End Of DocumentReady */
});
var apiBaseUrl = location.origin + '/api/dashboard';

function sendMessage(userId, apiUrl, token) {
  var message = $('#message').val();

  if(message.trim() !== '' && !isNaN(userId) && apiUrl.trim() !== '' && token.trim() !== '')
  {
    $.ajax({
      url: apiUrl,
      type: "post",
      cache: false,
      headers: {
        'Authorization':'Bearer ' + token,
        'Accept': 'application/json',
      },
      data: {
        'message': message,
      },
      success: function(result) {
        $('#message').val('');
        populateInbox(userId, token);
      },
      error:function(error) {
        console.log(error);
      }
    });
  }
}

function populateInbox(userId, token) {
  $.ajax({
    url: apiBaseUrl + '/inbox/user/'+ userId +'/retrieve',
    type: "get",
    cache: false,
    headers: {
      'Authorization':'Bearer ' + token,
      'Accept': 'application/json',
    },
    success: function(result) {
      var messages = result.messages;
      var rightElement = '', leftElement = '', conversation = '';

      if(messages.length>0) {
        messages.forEach(message => {
          if(message.user_id == userId) {
            rightElement = '<div class="flex items-center py-4 border-b border-gray-300">';

            rightElement += message.avatar ? '<span class="inline-block ml-4 w-10 h-10 rounded-full overflow-hidden"><img class="w-full h-full" src="/storage/'+ message.avatar +'"></span>'
            : '<span class="inline-block ml-4 text-5xl"><i class="far fa-user-circle"></i></span>';

            rightElement += '<span class="text-gray-700">'+ message.message +'</span>';
            rightElement += '</div>';
            conversation += rightElement;
          } else {
            leftElement = '<div class="flex items-center justify-end py-4 border-b border-gray-300">';
            leftElement += '<span class="text-gray-700">'+ message.message +'</span>';

            leftElement += message.avatar ? '<span class="inline-block mr-4 w-10 h-10 rounded-full overflow-hidden"><img class="w-full h-full" src="/storage/'+ message.avatar +'"></span>'
            : '<span class="inline-block mr-4 text-5xl"><i class="far fa-user-circle text-5xl"></i></span>';

            leftElement += '</div>';
            conversation += leftElement;
          }
        });
      } else {
        var emptyInbox = '<div class="flex justify-center items-center h-20">لا توجد رسائل</div>';
        conversation += emptyInbox;
      }

      $('#conversation-box').html(conversation);

      setTimeout(populateInbox.bind(null, userId, token), 10000);
    },
    error:function(error) {
      console.log(error);
    }
  });
}

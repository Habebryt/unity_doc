$(document).ready(function() {
    // Submit feedback form
    $('#customer-feedback-form').submit(function(e) {
      e.preventDefault();
      var name = $('#name').val();
      var company = $('#company').val();
      var position = $('#position').val();
      var email = $('#email').val();
      var feedback = $('#feedback').val();
  
      // Adding customer feedback to the feedback list
      var feedbackItem = $('<li>', {
        class: 'customer-feedback-item',
        html: '<h4>' + name + ' <span>(' + position + ', ' + company + ')</span></h4><p>' + feedback + '</p>'
      });
      $('#customer-feedback-list').prepend(feedbackItem);
  
      // Displaying the "See More Feedbacks" button if there are more than 4 feedback items using basic loop
      if ($('#customer-feedback-list li').length > 4) {
        $('#see-more-btn').show();
      }
  
      // Clear form fields
      $('#name').val('');
      $('#company').val('');
      $('#position').val('');
      $('#email').val('');
      $('#feedback').val('');
    });
  });
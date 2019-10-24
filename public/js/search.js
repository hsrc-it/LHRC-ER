
function search()
{
  event.preventDefault();


	$.ajax({
		type: 'get',
		dataType: 'html',
		url: $('#SearchForm').attr('action'),
		data: {
				keyword: $("#keyword").val(),
				gender: $("#gender").val(),
				age_group: $("#age_group").val(),
        language: $("#language").val(),
        topic: $("#topic").val()
				},
		success: function (response) {
	       //console.log(response);
	       $("#results").html(response);
	    },
        error: function (data) {
              $("#results").html(data);
            }
		});
	 //alert("The form was submitted");
}

function clearFormFields()
{
  event.preventDefault();
  location.reload();
}

$(document).on('click', '.pagination a', function(event){
	event.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	var URL = $(this).attr('href').substring(0, $(this).attr('href').indexOf('?'));
	getNextPage(page, URL);
    event.preventDefault();
	});
function getNextPage(page, URL) {

$.ajax({
  type: 'get',
  dataType: 'html',
  url: URL+'?page=' + page,
  data: {
      keyword: $("#keyword").val(),
      gender: $("#gender").val(),
      age_group: $("#age_group").val(),
      language: $("#language").val(),
      topic: $("#topic").val()
      },
  success: function (response) {
       //console.log(response);
       $("#results").html(response);
    },
      error: function (data) {
            $("#results").html(data);
          }
	});
}

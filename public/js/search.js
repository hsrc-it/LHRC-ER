
function search()
{
  event.preventDefault();

	$.ajax({
		type: 'get',
		dataType: 'html',
		url: "/search",
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

function resetFormFields()
{
  event.preventDefault();

	 $("#keyword").val("");
	 $("#gender").val("");
	 $("#age_group").val("");
   $("#language").val("");
   $("#topic").val("");
}

$(document).on('click', '.pagination a', function(event){
	event.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	var fullURL = $(this).attr('href');
	//var route = fullURL.split('/')[3]; // Split a string into an array of substrings the "/" is the spaerator of stings
	var route = fullURL.indexOf('/', fullURL.indexOf('/')+1);
	var pageIndex = fullURL.indexOf('?');
	//var actualURL = LastPartURL.substring(, LastPartURL.indexOf('?'));
	var URL = fullURL.substring(route, pageIndex);
	//console.log(fullURL);
	//console.log(route);
	//console.log(pageIndex);
	//console.log(actualURL);
	getNextPage(page, URL);
    event.preventDefault();
	});
function getNextPage(page, URL) {

$.ajax({
  type: 'get',
  dataType: 'html',
  url: '/search?page=' + page,
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

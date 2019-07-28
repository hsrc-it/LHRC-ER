//create variable to hold authors of Resource
  var authors = new Array();
  //check if form data was retuned back
  $( document ).ready(function() {
    if($("#url").val() != ""){
      document.getElementById("upload").required = false;
    }
    if($("#authors").val() != ""){
      authors = JSON.parse($("#authors").val());
      //get table were you will add row
      var table = document.getElementById("authorsTable");
      table.rows[1].cells[0].innerHTML = authors[0].id;
      table.rows[1].cells[1].innerHTML = '<input class="form-control" type="text" name="name" id="author-name-'+(table.rows.length-1) +'" required value="'+authors[0].name+'">';
      table.rows[1].cells[2].innerHTML = '<input class="form-control" type="email" name="email" id="author-email-'+(table.rows.length-1) +'" required value="'+authors[0].email+'">';
      table.rows[1].cells[3].innerHTML = '<input class="form-control" type="text" name="phone" id="author-phone-'+(table.rows.length-1) +'" required value="'+authors[0].phone+'">';
      table.rows[1].cells[4].innerHTML = '';
      var row = 2;
      for (i = 1; i < authors.length; i++) {
        //create row
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);

        cell1.innerHTML = authors[i].id;
        cell2.innerHTML = '<input class="form-control" type="text" name="name" id="author-name-'+(table.rows.length-1) +'" required value="'+authors[i].name+'">';
        cell3.innerHTML = '<input class="form-control" type="email" name="email" id="author-email-'+(table.rows.length-1) +'" value="'+authors[i].email+'">';
        cell4.innerHTML = '<input class="form-control" type="text" name="phone" id="author-phone-'+(table.rows.length-1) +'" value="'+authors[i].phone+'">';
        cell5.innerHTML = '<buttn type="submit" onclick="removeRow('+(table.rows.length-1)+')" class="btn btn-danger">X</buton>';
        }
    }
  });

  //monitor  file field if choosed then get the file name and presnt it
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  //monitor any field related to authors(name, email and phone) if changed update the authors hidden field
  $(document).on('change', '[id^=author-]', function(event)
  {
    //get the id of field
    var id = $(this).attr('id')
    //from the id get the row number
    var row = id.slice(-1);
    //get name of field that changed
    var property = $(this).attr('name');
    //get value of field
    var value = $(this).val();
    //check if the oject was found in the authors array and updated if the object was not found it will be pushed to the authors array
    var updated = false;
    //loop through the selected articles list
    if(authors.length > 0)
    {
				for (i = 0; i < authors.length; i++) {
					if(authors[i]["id"] == row)
					{
            authors[i][property] = value;
            updated = true;
            $('#authors').val(JSON.stringify(authors));
            break;
					}
				}
      }
     if(updated != true || authors.length <= 0)
      {
        var author = new Object();
        author.id = row;
        switch(property){
          case "name":{
            author.name = $(this).val();
            author.email = "";
            author.phone = "";
          }
          break;
          case "email": {
            author.name = "";
            author.email = $(this).val();
            author.phone = "";
          }
          break;
          case "phone": {
            author.name = "";
            author.email = "";
            author.phone = $(this).val();
          }
          break;
        }
        authors.push(author);
        $('#authors').val(JSON.stringify(authors));
      }

  });
  //Add multiple author row fields
  $(document).on('click', '#addAuthorField', function(event)
  {
    event.preventDefault();
    //get table were you will add row
    var table = document.getElementById("authorsTable");
    //insert row after the last row
    var row = table.insertRow(table.rows.length);
    // Insert cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);

    cell1.innerHTML = (table.rows.length-1);
    cell2.innerHTML = '<input class="form-control" type="text" name="name" id="author-name-'+(table.rows.length-1) +'" required>';
    cell3.innerHTML = '<input class="form-control" type="email" name="email" id="author-email-'+(table.rows.length-1) +'">';
    cell4.innerHTML = '<input class="form-control" type="text" name="phone" id="author-phone-'+(table.rows.length-1) +'">';
    cell5.innerHTML = '<buttn type="submit" onclick="removeRow('+(table.rows.length-1)+')" class="btn btn-danger">X</buton>';

  });

  function removeRow(row)
  {
    //first find author in authors array
    for (i = 0; i < authors.length; i++) {
      if(authors[i]["id"] == row)
      {
        //then reomve the found author from the authors array
				authors.splice(i, 1);
        $('#authors').val(JSON.stringify(authors));
        break;
      }
    }
    var table = document.getElementById("authorsTable");
    table.deleteRow(row);
  }

  //check if URL field is empty to make upload field required otherwise make upload field optional
  function changeRequiredUpload()
  {
  if($("#url").val() != ""){
    document.getElementById("customFile").required = false;

  }
  if($("#url").val() == ""){
    document.getElementById("customFile").required = true;
  }
}

  //get format of uploaded file
  function getExtension(event) {

    if (!event || !event.target || !event.target.files || event.target.files.length === 0) {
      return;
    }

    const name = event.target.files[0].name;
    const lastDot = name.lastIndexOf('.');

    const fileName = name.substring(0, lastDot);
    const ext = name.substring(lastDot + 1);

    switch (ext) {
      case 'docx':
        $("#format").val(1);
        break;
      case 'pptx':
      $("#format").val(2);
        break;
      case 'pdf':
        $("#format").val(3);
        break;

      default:
      $("#format").val('');

    }

  }

  //create variable to hold sources of Resource
  var sources = new Array();
  //check if form data was retuned back
  $( document ).ready(function() {
    if($("#url").val() != ""){
      document.getElementById("upload").required = false;
    }
    if($("#sources").val() != ""){
      sources = JSON.parse($("#sources").val());
      //get table were you will add row
      var table = document.getElementById("sourcesTable");
      for (i = 0; i < sources.length; i++) {
          table.rows[i+1].cells[0].innerHTML = sources[i].id;
          table.rows[i+1].cells[1].innerHTML = '<input class="form-control" type="text" name="name" id="source-name-'+(table.rows.length-1) +'" required value="'+sources[i].name+'">';
          table.rows[i+1].cells[2].innerHTML = '<input class="form-control" type="email" name="email" id="source-email-'+(table.rows.length-1) +'" required value="'+sources[i].email+'">';
          table.rows[i+1].cells[3].innerHTML = '<input class="form-control" type="text" name="phone" id="source-phone-'+(table.rows.length-1) +'" required value="'+sources[i].phone+'">';
          table.rows[i+1].cells[4].innerHTML = '<buttn type="submit" onclick="removeRow('+sources[i].id+')" class="btn btn-danger">X</buton>';
        }
    }
  });
  $(document).on('change', '[id^=source-]', function(event)
  {
    //get the id of field
    var id = $(this).attr('id')
    //from the id get the row number
    var row = id.slice(-1);
    //get name of field
    var property = $(this).attr('name');
    //get value of field
    var value = $(this).val();
    //check if the oject was foun in the sources array and updated if the object was not found it will be pushed to the sourcs array
    var updated = false;
    //loop through the selected articles list
    if(sources.length != 0)
    {
				for (i = 0; i < sources.length; i++) {
					if(sources[i]["id"] == row)
					{
            sources[i][property] = value;
            updated = true;
            $('#sources').val(JSON.stringify(sources));
            break;
					}
				}
      }
     if(updated != true || sources.length == 0)
      {
        var source = new Object();
        source.id = row;
        switch(property){
          case "name":{
            source.name = $(this).val();
            source.email = "";
            source.phone = "";
          }
          break;
          case "email": {
            source.name = "";
            source.email = $(this).val();
            source.phone = "";
          }
          break;
          case "phone": {
            source.name = "";
            source.email = "";
            source.phone = $(this).val();
          }
          break;
        }
        sources.push(source);
        $('#sources').val(JSON.stringify(sources));
      }

  });
  //Add multiple sources fields
  $(document).on('click', '#addSourceField', function(event)
  {
    event.preventDefault();
    //get table were you will add row
    var table = document.getElementById("sourcesTable");
    //insert row after the last row
    var row = table.insertRow(table.rows.length);
    // Insert cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);

    cell1.innerHTML = (table.rows.length-1);
    cell2.innerHTML = '<input class="form-control" type="text" name="name" id="source-name-'+(table.rows.length-1) +'" required>';
    cell3.innerHTML = '<input class="form-control" type="email" name="email" id="source-email-'+(table.rows.length-1) +'" required>';
    cell4.innerHTML = '<input class="form-control" type="text" name="phone" id="source-phone-'+(table.rows.length-1) +'" required>';
    cell5.innerHTML = '<buttn type="submit" onclick="removeRow('+(table.rows.length-1)+')" class="btn btn-danger">X</buton>';

  });

  function removeRow(row)
  {
    //first find source in sources array
    for (i = 0; i < sources.length; i++) {
      if(sources[i]["id"] == row)
      {
        //then reomve the found source from the sources array
				sources.splice(i, 1);
        $('#sources').val(JSON.stringify(sources));
        break;
      }
    }
    var table = document.getElementById("sourcesTable");
    table.deleteRow(row);
  }
  //check if URL field is empty
  function changeRequiredUpload()
  {
  if($("#url").val() != ""){
    document.getElementById("upload").required = false;

  }
  if($("#url").val() == ""){
    document.getElementById("upload").required = true;
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

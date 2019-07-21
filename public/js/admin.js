
  var counter = 1;
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
    counter++;
    cell1.innerHTML = counter;
    cell2.innerHTML = '<input class="form-control" type="text" name="source-name-' + counter +'" id="source-name-'+counter +'">';
    cell3.innerHTML = '<input class="form-control" type="text" name="source-email-' + counter +'" id="source-email-'+counter +'">';
    cell4.innerHTML = '<input class="form-control" type="text" name="source-phone-' + counter +'" id="source-phone-'+counter +'">';

  });

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

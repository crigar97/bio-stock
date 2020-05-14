function displayFileName()
{
  var fileName = document.getElementById('file-upload').files[0].name;
  document.getElementById('file-name').placeholder = fileName;

  document.getElementById('btn-import').disabled = false;
}

function changeToWhiteIcon()
{
  document.getElementById("upload-icon").src="{{ url('storage/view-images/white-upload-file.png') }}";
}
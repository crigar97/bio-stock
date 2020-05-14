function addAttribute(idAttributeModal, idValueModal, idSectionAttributes)
{
  //console.log(idAttributeModal);
  /** Create tag attribute... */
  var selectedItem = document.getElementById(idAttributeModal);
  var option = selectedItem.options[selectedItem.selectedIndex];
  var valueModal = document.getElementById(idValueModal);
  //console.log(option);
  var newAttribute = document.getElementById("new_attribute").cloneNode(true);
  newAttribute.id = option.value + '_' + valueModal.value;
  newAttribute.style = "display: inline;"
  var childs = newAttribute.childNodes;
  var tagChild = childs[1];
  var inputChild = childs[3];
  switch (idSectionAttributes) {

    case 'taxonomie_attributes_section':
      tagChild.style.backgroundColor = "#87c9d6";
      inputChild.name = 'taxonomies@' + option.value + '@' + valueModal.value;
      break;

    case 'curatorial_attributes_section':
      tagChild.style.backgroundColor = "#8dbcae";
      inputChild.name = 'curatorials@' + option.value + '@' + valueModal.value;
      break;

    case 'collection_attributes_section':
      tagChild.style.backgroundColor = "#caaa8d";
      inputChild.name = 'collections@' + option.value + '@' + valueModal.value;
      break;

    case 'caste_attributes_section':
      tagChild.style.backgroundColor = "#432229";
      inputChild.name = 'curatorials@' + option.value + '@' + valueModal.value;
      break;
  }
  //console.log('este es el valor' + valueModal.value);
  inputChild.value = option.textContent + '| ' + valueModal.value;
  resizeInputChild(inputChild);
  //console.log(textChild.textContent);
  var attributesSection = document.getElementById(idSectionAttributes);
  attributesSection.appendChild(newAttribute);

  valueModal.value = "";
}

function deleteAttribute(button)
{
  //console.log(button.parentElement.parentElement.id);
  //console.log(button.parentElement.id);
  var parent = button.parentElement.parentElement;
  var child = button.parentElement;
  parent.removeChild(child);
}

function resizeInputChild(inputChild) {
  size = inputChild.value.length * 8.1;
  inputChild.style.width = size + "px";
}

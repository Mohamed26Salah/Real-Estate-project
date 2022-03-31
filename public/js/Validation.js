function lettersandnumbers(input){
    var regex=/[^a-z A-Z 0-9]/gi;
    input.value=input.value.replace(regex,"");
  }
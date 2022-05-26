function numbers(input){
    var regex=/[^0-9.]/gi;
    input.value=input.value.replace(regex,"");
  }
  //٠١٢٣٤٥٦٧٨٩
   function letters(input){
    var regex=/[^a-z A-Z]/gi;
    input.value=input.value.replace(regex,"");
  }
  function lettersandnumbers(input){
    var regex=/[^a-z A-Z 0-9 ا-ي ؤأإئء؟]/gi;
    input.value=input.value.replace(regex,"");
  }
  function lettersandnumbersEnglishOnly(input){
    var regex=/[^a-z A-Z 0-9]/gi;
    input.value=input.value.replace(regex,"");
  }

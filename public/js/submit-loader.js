function isValidASCII(input) {
    for (var i = 0; i < input.length; i++) {
      if (input.charCodeAt(i) > 127) {
        return false;
      }
    }
    return true;
  }

$(function() {
    $('#main-form').on('submit', function(e){
        if($('.uang').length) {
            let listUang = $('.uang');
            for(let i = 0; i < $('.uang').length; i++) {
                if($(listUang[i]).prop('required') && (!$(listUang[i]).val() || $(listUang[i]).val() == "Rp. 0")) {
                    return false;
                }
            }
        }

        // if($('input[type=text], textarea').length) {
        //     let listText = $('input[type=text], textarea');
        //     for(let i = 0; i < $('input[type=text], textarea').length; i++) {
        //         if (!isValidASCII($(listText[i]).val())) {
        //             alert("Teks yang di-input tidak sesuai dengam format ASCII. Harap gunakan font standar pada pengaturan perangkat Anda.");
        //             return false;
        //         }
        //     }
        // }
        if($('.alamat').length) {
            let listText = $('.alamat');
            for(let i = 0; i < $('.alamat').length; i++) {
                if (!isValidASCII($(listText[i]).val())) {
                    alert("Data alamat yang di-input tidak sesuai dengan format ASCII. Harap gunakan font standar pada pengaturan keyboard perangkat Anda.");
                    return false;
                }
            }
        }

        if(typeof $(this).valid === 'function') {
            if(!$(this).valid()) return false
        }
        $(e.originalEvent.submitter)
            .prop('disabled', true)
            .append('<span class="ml-2 spinner-border spinner-border-sm" id="form-spinner"></span>');
    });
});